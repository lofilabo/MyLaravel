<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonsadvRequest;
use App\Http\Requests\UpdateLessonsadvRequest;
use App\Repositories\LessonsadvRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Articlecategories;

use App\Models\CatDef_AgeGroup;
use App\Models\CatDef_Subject;
use App\Models\CatDef_Topic;
use App\Models\CatDef_Concept;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Flash;
use Response;

class LessonsadvController extends AppBaseController
{
    /** @var  LessonsadvRepository */
    private $lessonsadvRepository;

    public function __construct(LessonsadvRepository $lessonsadvRepo)
    {
        $this->lessonsadvRepository = $lessonsadvRepo;

        $this->optionslist =    Articlecategories::pluck('optionval','id');
        $this->ls_agegroup =    CatDef_AgeGroup::pluck('optionval','id');
        $this->ls_subject =     CatDef_Subject::pluck('optionval','id');
        $this->ls_topic =       CatDef_Topic::pluck('optionval','id');
        $this->ls_concept =     CatDef_Concept::pluck('optionval','id');

    }


    public function checkApiUser($request){
         /*
         no-one but a verfied employer has any business in this class.
         */
         $token = $request->bearerToken();
        
        $this->user = User::where('api_token', $token)->first();

         //dd($this->user);
         if($this->user==null){
             exit("Leave the temple! And do not return until your Kung Fu is better!.");
         }
         $hasRole = $this->user->hasRole(['employer','admin']);

         if($hasRole != true){
             exit("He is no ninja.");
         }
         $this->userId = $this->user->id;
     }


    /**
     * Display a listing of the Lessonsadv.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       $lessonsadvs = $this->lessonsadvRepository->all();

       return view('lessonsadvs.index')
            ->with('lessonsadvs', $lessonsadvs)->with('optionslist', $this->optionslist)->with('ls_agegroup', $this->ls_agegroup)->with('ls_subject', $this->ls_subject)->with('ls_topic', $this->ls_topic)->with('ls_concept', $this->ls_concept);
        /*
        return view('lessonsadvs.index')
            ->with('lessonsadvs', $lessonsadvs);
        */
    }

    /**
     * Show the form for creating a new Lessonsadv.
     *
     * @return Response
     */
    public function create()
    {

        return view('lessonsadvs.create')->with('isCreate',1)->with('optionslist', $this->optionslist)->with('ls_agegroup', $this->ls_agegroup)->with('ls_subject', $this->ls_subject)->with('ls_topic', $this->ls_topic)->with('ls_concept', $this->ls_concept);;

        //return view('lessonsadvs.create');
    }

    public function getAllListOptions(Request $request){

        $all = [];
        
            $all['agegroup']['title'] = "Age Group";
            $all['subject']['title'] = "Subject";
            $all['topic']['title'] = "Topic";
            $all['concept']['title'] = "Concept";
                    
            $all['agegroup']['options'] = $this->ls_agegroup;
            $all['subject']['options'] = $this->ls_subject;
            $all['topic']['options'] = $this->ls_topic;
            $all['concept']['options'] = $this->ls_concept;


        return Response::json($all, 200);
    }

    public function api_makeLessonInfo ( CreateLessonsadvRequest $request )
    {
        $this->checkApiUser($request);
        $userId = $this->user->id;
        $input = $request->all();
        //dd($input);
        $lessonsadv = $this->lessonsadvRepository->create($input);
        $lessonsadv->author = $userId;
        $lessonsadv->save();
        //$lessonsadv->author =Auth::user()->id;//exfield1 holds the authors' id, which is got from their logged-in Auth user
        $lessonsadv->save();
        return Response::json(true , 200);  
    }

    public function store(CreateLessonsadvRequest $request)
    {

        //$this->checkApiUser($request);
        //$userId = $this->user->id;

        $input = $request->all();
        $lessonsadv = $this->lessonsadvRepository->create($input);

        if( Auth::user()->hasRole('admin') || ( Auth::user()->id == $r['author'] )  ){
            //dd( $lessonsadv );
            $lessonsadv->author =Auth::user()->id;//exfield1 holds the authors' id, which is got from their logged-in Auth user
            $lessonsadv->save();
            Flash::success('Lessonsadv saved successfully.');
            return redirect(route('lessonsadvs.index'));
        }
    }

    /**
     * Display the specified Lessonsadv.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $lessonsadv = $this->lessonsadvRepository->find($id);

        if (empty($lessonsadv)) {
            Flash::error('Lessonsadv not found');

            return redirect(route('lessonsadvs.index'));
        }

        return view('lessonsadvs.show')->with('lessonsadv', $lessonsadv);
    }

    public function api_showLessonInfoAll(Request $request){

        //dd("HERE api_showLessonInfoAll");
        $this->checkApiUser($request);
        $lessonsadv = $this->lessonsadvRepository->all();
        return Response::json($lessonsadv , 200);  
    }


    public function api_putLessonInfo(){

        dd("HERE api_putLessonInfo");

    }

    public function api_showLessonInfo($id, Request $request){
        //dd("HERE: " . $id);
        $this->checkApiUser($request);
        $lessonsadv = $this->lessonsadvRepository->find($id);
        return Response::json($lessonsadv , 200);  
    }

    public function api_delete_Lesson(){

        $this->lessonsadvRepository->delete($id);

    }

    public function api_updateLessonInfo($id, UpdateLessonsadvRequest $request)
    {

      $this->checkApiUser($request);
      $userId = $this->user->id;
        //dd($this->user);
        //dd("HERE api_updateLessonInfo");
        //dd($id);
        //dd( $request->toArray() );
        //dd( Auth::user() );
        
        $lessonsadv = $this->lessonsadvRepository->find($id);

        if (empty($lessonsadv)) {
            return Response::json(false , 200); 
        }

        //dd($lessonsadv->author);
        //dd($this->user->id);

        if( $lessonsadv->author !=  $this->user->id ){
            return Response::json("You are not the correct kind of Ninja!  Begone!" , 200); 
        }

        $r = $request->all();
        //dd( $this->user->hasRole('employer') );
        if( $this->user->hasRole('employer') || $this->user->hasRole('admin') ){
            isset($r['extref1']) ? $r['extref1'] = gettype($r['extref1'])=='array' ? implode(",", $r['extref1']) : $r['extref1'] : $w=0;
            isset($r['extref2']) ? $r['extref2'] = gettype($r['extref2'])=='array' ? implode(",", $r['extref2']) : $r['extref2'] : $w=0 ;
            isset($r['extref3']) ? $r['extref3'] = gettype($r['extref3'])=='array' ? implode(",", $r['extref3']) : $r['extref3'] : $w=0 ;
            isset($r['extref4']) ? $r['extref4'] = gettype($r['extref4'])=='array' ? implode(",", $r['extref4']) : $r['extref4'] : $w=0 ;
            isset($r['extref5']) ? $r['extref5'] = "true" : $r['extref5'] = "" ;
            $lessonsadv = $this->lessonsadvRepository->update( $r , $id);
            return Response::json(true , 200);  
        }else{
            return Response::json("Only a Ninja may enter here!" , 200); 
        }

    }



    /**
     * Show the form for editing the specified Lessonsadv.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lessonsadv = $this->lessonsadvRepository->find($id);

        if (empty($lessonsadv)) {
            Flash::error('Lessonsadv not found');

            return redirect(route('lessonsadvs.index'));
        }

        //return view('lessonsadvs.edit')->with('lessonsadv', $lessonsadv);

        return view('lessonsadvs.edit')->with('lessonsadv', $lessonsadv)->with('optionslist', $this->optionslist)->with('ls_agegroup', $this->ls_agegroup)->with('ls_subject', $this->ls_subject)->with('ls_topic', $this->ls_topic)->with('ls_concept', $this->ls_concept);

    }

    /**
     * Update the specified Lessonsadv in storage.
     *
     * @param int $id
     * @param UpdateLessonsadvRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLessonsadvRequest $request)
    {
        $lessonsadv = $this->lessonsadvRepository->find($id);

        if (empty($lessonsadv)) {
            Flash::error('Lessonsadv not found');
            return redirect(route('lessonsadvs.index'));
        }

        $r = $request->all();
        /*
        only an admin or this lesson's Author may save this item.
        */
        if( Auth::user()->hasRole('admin') || ( Auth::user()->id == $r['author'] )  ){
            /*
            what??
            The extref fields might return as arrays or strings.
            If their type is array, we have to implode into a string.
            If not, we just use as a string as normal.
            */
            isset($r['extref1']) ? $r['extref1'] = gettype($r['extref1'])=='array' ? implode(",", $r['extref1']) : $r['extref1'] : $w=0;
            isset($r['extref2']) ? $r['extref2'] = gettype($r['extref2'])=='array' ? implode(",", $r['extref2']) : $r['extref2'] : $w=0 ;
            isset($r['extref3']) ? $r['extref3'] = gettype($r['extref3'])=='array' ? implode(",", $r['extref3']) : $r['extref3'] : $w=0 ;
            isset($r['extref4']) ? $r['extref4'] = gettype($r['extref4'])=='array' ? implode(",", $r['extref4']) : $r['extref4'] : $w=0 ;
            isset($r['extref5']) ? $r['extref5'] = "true" : $r['extref5'] = "" ;
            //dd($r);        
            $lessonsadv = $this->lessonsadvRepository->update( $r , $id);

            Flash::success('Lessons updated successfully.');
        }

        /*
        $lessonsadv = $this->lessonsadvRepository->update($request->all(), $id);
        Flash::success('Lessonsadv updated successfully.');
        return redirect(route('lessonsadvs.index'));
        */
    }

    /**
     * Remove the specified Lessonsadv from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lessonsadv = $this->lessonsadvRepository->find($id);

        if (empty($lessonsadv)) {
            Flash::error('Lessonsadv not found');

            return redirect(route('lessonsadvs.index'));
        }

        $this->lessonsadvRepository->delete($id);

        Flash::success('Lessonsadv deleted successfully.');

        return redirect(route('lessonsadvs.index'));
    }
}
