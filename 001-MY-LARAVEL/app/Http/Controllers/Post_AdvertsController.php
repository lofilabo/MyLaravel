<?php

namespace App\Http\Controllers;

use App\DataTables\Post_AdvertsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePost_AdvertsRequest;
use App\Http\Requests\UpdatePost_AdvertsRequest;
use App\Repositories\Post_AdvertsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Post_Adverts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\employer;

class Post_AdvertsController extends AppBaseController
{
    /** @var  Post_AdvertsRepository */
    private $postAdvertsRepository;

    public function __construct(Post_AdvertsRepository $postAdvertsRepo)
    {
        $this->postAdvertsRepository = $postAdvertsRepo;
    }

    /**
     * Display a listing of the Post_Adverts.
     *
     * @param Post_AdvertsDataTable $postAdvertsDataTable
     * @return Response
     */
    public function index(Post_AdvertsDataTable $postAdvertsDataTable)
    {
        return $postAdvertsDataTable->render('post__adverts.index');
    }

    /**
     * Show the form for creating a new Post_Adverts.
     *
     * @return Response
     */
    public function create()
    {

        $userID = Auth::user()->id;
        $employerID = employer::where('userid', $userID)->pluck('id')->first();

        $optionslist = employer::pluck('contact_name', 'id');

        return view('post__adverts.create')->with('optionslist', $optionslist)->with('employerID', $employerID);
    }

    /**
     * Store a newly created Post_Adverts in storage.
     *
     * @param CreatePost_AdvertsRequest $request
     *
     * @return Response
     */
    public function store(CreatePost_AdvertsRequest $request)
    {
      //     $employer = $this->employerRepository->create($request);
      //     $employer->contact_name = $request->input('contact_name');
      //     dd($employer->toArray());
      //     $employer->save();


        $input = $request->all();

        $postAdverts = $this->postAdvertsRepository->create($input);


        // $postAdvert = new Post_Adverts;
        // $postAdvert->job_title = $request->job_title;
        // $postAdvert->client = $request->client;
        // $postAdvert->location = $request->location;
        // $postAdvert->countryCode = $request->countryCode;
        // $postAdvert->category = $request->category;
        // $postAdvert->industry = $request->industry;
        // $postAdvert->number_of_positions = $request->number_of_positions;
        // $postAdvert->contract_duration = $request->contract_duration;
        // $postAdvert->contract_type = $request->contract_type;
        // $postAdvert->minimum_salary = $request->minimum_salary;
        // $postAdvert->maximum_salary = $request->maximum_salary;
        // $postAdvert->currency = $request->currency;
        // $postAdvert->payment_cycle = $request->payment_cycle;
        // $postAdvert->job_description = $request->job_description;
        // $postAdvert->employer_id = $optionslist;
        // $postAdvert->save();

        Flash::success('Post  Adverts saved successfully.');

        return redirect(route('postAdverts.index'));
    }

    /**
     * Display the specified Post_Adverts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postAdverts = $this->postAdvertsRepository->find($id);

        if (empty($postAdverts)) {
            Flash::error('Post  Adverts not found');

            return redirect(route('postAdverts.index'));
        }

        return view('post__adverts.show')->with('postAdverts', $postAdverts);
    }

    /**
     * Show the form for editing the specified Post_Adverts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postAdverts = $this->postAdvertsRepository->find($id);

        if (empty($postAdverts)) {
            Flash::error('Post  Adverts not found');

            return redirect(route('postAdverts.index'));
        }

        return view('post__adverts.edit')->with('postAdverts', $postAdverts);
    }

    /**
     * Update the specified Post_Adverts in storage.
     *
     * @param  int              $id
     * @param UpdatePost_AdvertsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePost_AdvertsRequest $request)
    {
        $postAdverts = $this->postAdvertsRepository->find($id);

        if (empty($postAdverts)) {
            Flash::error('Post  Adverts not found');

            return redirect(route('postAdverts.index'));
        }

        $postAdverts = $this->postAdvertsRepository->update($request->all(), $id);

        Flash::success('Post  Adverts updated successfully.');

        return redirect(route('postAdverts.index'));
    }

    /**
     * Remove the specified Post_Adverts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postAdverts = $this->postAdvertsRepository->find($id);

        if (empty($postAdverts)) {
            Flash::error('Post  Adverts not found');

            return redirect(route('postAdverts.index'));
        }

        $this->postAdvertsRepository->delete($id);

        Flash::success('Post  Adverts deleted successfully.');

        return redirect(route('postAdverts.index'));
    }

    public function getJobAdvertsData(){
      $jobAdvertsData = Post_Adverts::all();
      return datatables()->of($jobAdvertsData)->toJson();
    }

    public function checkApiUser($request){
        /*
        no-one but a verfied employer has any business in this class.
        */
        $token = $request->bearerToken();
        $this->user = User::where('api_token', $token)->first();

        // dd($this->user->toArray());

        $this->hasRoleEmployer = $this->user->hasRole(['employer']);
        // dd($this->hasRoleEmployer );
        $this->hasRoleAdmin= $this->user->hasRole(['admin']);

        if($this->hasRoleEmployer != true && $this->hasRoleAdmin != true){
            exit("He is no ninja.");
        }
        $this->userId = $this->user->id;

        if($this->user==null){
            exit("Leave the temple! And do not return until your Kung Fu is better!.");
        }
    }

    public function api_getallJobAdverts(Request $request){
        $this->checkApiUser($request);
        $userId = $this->user->id;
        $employerRole = $this->hasRoleEmployer;
        $adminRole = $this->hasRoleAdmin;

        if($employerRole){
        $postAdvertsData = employer::where('userid', $userId)->get();

        // $postAdvertsData = Post_Adverts::where('user_id', $userId)->get();
        return Response::json($postAdvertsData , 200);
        }else{
        if($adminRole){
          $postAdvertsData = Post_Adverts::all();
          return Response::json($postAdvertsData , 200);
        }
      }
    }

}
