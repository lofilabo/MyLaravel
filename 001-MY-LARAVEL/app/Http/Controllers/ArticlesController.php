<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticlesRequest;
use App\Http\Requests\UpdateArticlesRequest;
use App\Repositories\ArticlesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Articlecategories;
use App\Models\Articles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends AppBaseController
{
    /** @var  ArticlesRepository */
    private $articlesRepository;
    public $uzrz;
    public $optionslist;

    public function __construct(ArticlesRepository $articlesRepo)
    {
        //$this->middleware('auth');
        $this->articlesRepository = $articlesRepo;
        $this->optionslist = Articlecategories::pluck('optionval','id');
        
        //$this->uzrz = User::whereHas('roles', function($q){$q->where('name', 'editor');})->pluck('name', 'id'); 

        /*
        make a list including all editors and authors.
        This will be the basis of the pulldown which give the list of people to whom the editor can assign an article.
        */
        $toAppearInListOfAuthors = ['editor', 'author'];
        $this->uzrz = User::whereHas('roles', static function ($query) use ($toAppearInListOfAuthors) {
                    return $query->whereIn('name', $toAppearInListOfAuthors);
                })->pluck('name', 'id');   
    }

    /**
     * Display a listing of the Articles.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //dd(Auth::user()->hasRole('author'));
        //dd(Auth::user()->hasRole('admin'));

        /*
        If the signed-in user is 'only' an author, they can read only their own articles.
        Editors and Adminstrators can see everything.
        Users of other roles can't even see this part of the system.
        */
        if(Auth::user()->hasRole('author')){
                $articles = Articles::where( 'exfield1', Auth::user()->id )->get();
        }else{
                $articles = $this->articlesRepository->all();
        }    
        return view('articles.index')->with('articles', $articles)->with('optionslist', $this->optionslist);
    }

    /**
     * Show the form for creating a new Articles.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create')->with('optionslist', $this->optionslist)->with('authorslist', $this->uzrz);
    }

    /**
     * Store a newly created Articles in storage.
     *
     * @param CreateArticlesRequest $request
     *
     * @return Response
     */
    public function store(CreateArticlesRequest $request)
    {

        $input = $request->all();

        /*
        Start by crudely assigning object values to form values.
        We'll overwrite some important things below.
        */
        $articles = $this->articlesRepository->create($input);


        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }
        $detail = $this->do_image_things($request);
        $articles->body = $detail;
        $articles->cat = 0;
        $articles->exfield1 =Auth::user()->id;//exfield1 holds the authors' id, which is got from their logged-in Auth user
        $articles->save();

        Flash::success('Articles saved successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified Articles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articles = $this->articlesRepository->find($id);
        //$optionslist = Articlecategories::pluck('optionval','id');

        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }

        return view('articles.show')->with('articles', $articles)->with('optionslist', $this->optionslist);
    }

    /**
     * Show the form for editing the specified Articles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articles = $this->articlesRepository->find($id);
        //$optionslist = Articlecategories::pluck('optionval','id');

        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }

        return view('articles.edit')->with('articles', $articles)->with('optionslist', $this->optionslist)->with('authorslist', $this->uzrz);
    }

    /**
     * Update the specified Articles in storage.
     *
     * @param int $id
     * @param UpdateArticlesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticlesRequest $request)
    {
        $articles = $this->articlesRepository->find($id);

        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }
        $detail = $this->do_image_things($request);
        //dd($request);
        $articles->bruid = $request->bruid;
        $articles->title = $request->title;
        $articles->summary = $request->summary;
        $articles->cat = $request->cat;
        $articles->exfield1 = $request->exfield1;//exfield1 holds the authors' name
        $articles->exfield2 = $request->exfield2;
        $articles->exfield3 = $request->exfield3;
        $articles->exfield4 = $request->exfield4;
        $articles->body = $detail;
        $articles->save();
        Flash::success('Articles updated successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified Articles from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articles = $this->articlesRepository->find($id);

        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }

        $this->articlesRepository->delete($id);

        Flash::success('Articles deleted successfully.');

        return redirect(route('articles.index'));
    }






    private function do_image_things($request){

        $detail=$request->summernote;  //here, 'summernote' is the id/name of the text editor field.
        $detail=str_replace('<!--?xml encoding="UTF-8"-->', "", $detail);//get rid of old + multiple instances of this string
        $detail=str_replace('<?xml encoding="UTF-8">', "", $detail); //and this one.  We'll prepend a new one right at the bottom.
        $dom = new \domdocument();//sorcery!
        $dom->loadHtml('<?xml encoding="UTF-8">' . $detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';

        $detail .= $dom->saveHTML( $dom->documentElement );

        $images = $dom->getelementsbytagname('img');
        /*
        $images will be a big chunk of mixed text and image data,
        we are concerned only with the image data just here.
        */
        foreach($images as $k => $img){
        
            if(null !== ($img->getattribute('src'))){
                $data = $img->getattribute('src');
        
                if(strpos($data, ";") and strpos($data, ",") ){                
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);

                    $data = base64_decode($data);
                    /*
                    write up each Binary chunk of text-editor-data
                    as a .png file and save it to /public/upload with a
                    unique name based on time.
                    */
                    $image_name= time().$k.'.png';
                    $path = public_path() .'/upload/'. $image_name;

                    file_put_contents($path, $data);

                    $img->removeattribute('src');
                    $img->setattribute('src', '/upload/' . $image_name);
                }
            }
        }
        /*
        save out the contents of the dom without the Binary parts; sub in
        the <img src> HTML components.
        */
        $detail = $dom->savehtml();
        $detail=str_replace('<!--?xml encoding="UTF-8"-->', "", $detail);
        $detail=str_replace('<?xml encoding="UTF-8">', "", $detail);
        $detail='<!--?xml encoding="UTF-8"-->' . $detail;
        //dd($detail);
        return $detail;
    }



}
