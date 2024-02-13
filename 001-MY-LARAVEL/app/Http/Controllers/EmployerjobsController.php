<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployerjobsRequest;
use App\Http\Requests\UpdateEmployerjobsRequest;
use App\Repositories\EmployerjobsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\employerjobs;
use App\Models\jobs;
use Illuminate\Support\Facades\Auth;
use Flash;
use Response;

$user = null;
$userId = null;
class EmployerjobsController extends AppBaseController
{
    /** @var  EmployerjobsRepository */
    private $employerjobsRepository;

    public function __construct(EmployerjobsRepository $employerjobsRepo, CreateEmployerjobsRequest $request)
    {
        $this->employerjobsRepository = $employerjobsRepo;
    }

    public function api_userbytoken(Request $request){
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        if($user==null){
            exit("How dare you tries to sneak in here. Are you Ninja?");
        }else{
            return Response::json($user->id , 200);
        }
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
        $hasRole = $this->user->hasRole(['employer']);

        if($hasRole != true){
            exit("He is no ninja.");
        }
        $this->userId = $this->user->id;
    }

    public function checkApiUser_Candidate($request){
        /*
        no-one but a verfied candidate can pass this check.
        BUT WHAT IS A VERIFIED CANDIDATE?

        For now, we'll just say "a registered user"

        In the future, we will have to expand this to include only candidates who have completed
        first-level data entry.
        */
        $token = $request->bearerToken();
        $this->user = User::where('api_token', $token)->first();

        //dd($this->user);
        if($this->user==null){
            exit("Log in, Sucka.");
        }

        $this->userId = $this->user->id;
    }

    public function isRealEmployer(Request $request){
        $this->checkApiUser($request);
        return( Response::json(true , 200)   );
    }

    public function api_getalljobs_if_candidate(CreateEmployerjobsRequest $request){

        $this->checkApiUser_Candidate($request);
        $userId = $this->user->id;
        $jobs=employerjobs::query();
        $jobs = $jobs->get();
        return Response::json($jobs , 200);

    }


    public function api_newjob(CreateEmployerjobsRequest $request){

        $this->checkApiUser($request);
        //new_bruid = datetime.datetime.utcnow().strftime('%Y-%m-%d--%H-%M-%S-%f')[:-3]
        $mils = substr( (string)gettimeofday()['usec'] , 0, 2 );
        $bruid = date('Y-m-d--H-i-s-') . $mils;
        $userId = $this->user->id;
        //dd($user);
        $input = $request->all();
        $input['employerid'] = $userId . "";
        $input['bruid'] = $bruid . "";
        //dd($input);
        $employerjobs = $this->employerjobsRepository->create($input);
        return Response::json($bruid , 200);

    }

    public function api_update($id, UpdateEmployerjobsRequest $request){
        $this->checkApiUser($request);

        $employerjobs = $this->employerjobsRepository->find($id);

        //try record ID first, then BRUID.  Nice to have both.
        if(null == $employerjobs){
            $employerjobs=employerjobs::query();
            $employerjobs=$employerjobs->where('bruid', $id);
            //dd($employerjobs->first());
            if(null == $employerjobs->first()){return [];}
            $employerjobs = $employerjobs->first()->toArray();
        }
        if(null == $employerjobs){return [];}
        if($this->user->id != $employerjobs['employerid']){return(Response::json("Hand Off My Sister" , 403)); }
        $employerjobs = $this->employerjobsRepository->update($request->all(), $employerjobs['id']);
        //dd($employerjobs);

        return Response::json(true , 200);
    }


    public function api_delete($id, Request $request){
        $this->checkApiUser($request);

        $employerjobs = $this->employerjobsRepository->find($id);

        //try record ID first, then BRUID.  Nice to have both.
        if(null == $employerjobs){
            $employerjobs=employerjobs::query();
            $employerjobs=$employerjobs->where('bruid', $id);
            $employerjobs = $employerjobs->first()->toArray();
        }
        if(null == $employerjobs){return [];}
        if($this->user->id != $employerjobs['employerid']){return(Response::json("Git yer cotton-pickin' smars outta my pants, bwoy" , 403)); }
        //dd($employerjobs['id']);
        $this->employerjobsRepository->delete($employerjobs['id']);
        return Response::json(true , 200);
    }

    public function api_getjobbyid(CreateEmployerjobsRequest $request, $id){

        //$this->checkApiUser($request);
        //$userId = $this->user->id;

        $jobs = $this->employerjobsRepository->find($id);

        if(null == $jobs){
            $jobs=employerjobs::query();
            $jobs=$jobs->where('bruid', $id);
            $jobs = $jobs->first();
        }

        //dd($jobs);

        if(null == $jobs){return [];}
        //if($jobs->employerid != $userId){
        //    return("Hands Off, That Ain't Yours.");
        //}
        return Response::json($jobs , 200);
    }


    public function api_searchbasic(Request $request){

        $city = $request->input('city') ? $request->input('city') : "";
        $jobtitle = $request->input('jobtitle') ? $request->input('jobtitle') : "";
        $jobdescription = $request->input('jobdescription') ? $request->input('jobdescription') : "";

        $jobs=employerjobs::query();
        //$jobs->where('city', 'like',  '%'. '11' .'%' );
        if($city != ""){$jobs->where('city', 'like',  '%'. $city .'%' );}
        //if($jobtitle != ""){$jobs->where('jobtitle', 'like',  '%'. $jobtitle .'%' );}
        //if($jobdescription != ""){$jobs->where('jobdescription', 'like',  '%'. $jobdescription .'%' );}

        if($jobtitle != ""){
            $jobs = $jobs->where(function($query) use ($jobtitle){
                $query->where('jobtitle', 'like', '%'. $jobtitle .'%' )->orWhere('jobdescription', 'like', '%'. $jobtitle .'%' );

            });
        }

        $jobsresults  =$jobs->get();
        return Response::json($jobsresults , 200);
    }

    public function api_getalljobs(CreateEmployerjobsRequest $request){

        $this->checkApiUser($request);
        $userId = $this->user->id;
        $jobs=employerjobs::query();
        $jobs=$jobs->where('employerid', $userId);
        $jobs = $jobs->get();
        return Response::json($jobs , 200);

    }


    public function api_getjobwithtitleanddescription(CreateEmployerjobsRequest $request){

        $this->checkApiUser($request);
        $userId = $this->user->id;
        $jobdescription = $request->input('jobdescription') ? $request->input('jobdescription') : "";
        $jobtitle = $request->input('jobtitle') ? $request->input('jobtitle') : "";
        $jobs=employerjobs::query();
        $jobs=$jobs->where('employerid', $userId);

        if($jobdescription != ""){
            $jobs = $jobs->where(function($query) use ($jobdescription){
                $query->where('jobdescription', 'like', '%'. $jobdescription .'%' );
            });
        }

        if($jobtitle != ""){
            $jobs = $jobs->where(function($query) use ($jobtitle){
                $query->where('jobtitle', 'like', '%'. $jobtitle .'%' );
            });
        }

        $jobs = $jobs->get();
        return Response::json($jobs , 200);
    }


    /**
     * Display a listing of the Employerjobs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //dd(Auth::user()->id);
        $jobs=employerjobs::query();
        $jobs=$jobs->where('employerid', Auth::user()->id);
        $jobs = $jobs->get();
        return view('employerjobs.index')
            ->with('employerjobs', $jobs);
    }

    /**
     * Show the form for creating a new Employerjobs.
     *
     * @return Response
     */
    public function create()
    {
        return view('employerjobs.create');
    }

    /**
     * Store a newly created Employerjobs in storage.
     *
     * @param CreateEmployerjobsRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployerjobsRequest $request)
    {
        //dd(Auth::user()->id);
        $input = $request->all();

        $input['employerid'] = Auth::user()->id . "";

        $employerjobs = $this->employerjobsRepository->create($input);

        Flash::success('Employerjobs saved successfully.');

        return redirect(route('employerjobs.index'));
    }

    /**
     * Display the specified Employerjobs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employerjobs = $this->employerjobsRepository->find($id);

        if (empty($employerjobs)) {
            Flash::error('Employerjobs not found');

            return redirect(route('employerjobs.index'));
        }

        return view('employerjobs.show')->with('employerjobs', $employerjobs);
    }

    /**
     * Show the form for editing the specified Employerjobs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employerjobs = $this->employerjobsRepository->find($id);

        if (empty($employerjobs)) {
            Flash::error('Employerjobs not found');

            return redirect(route('employerjobs.index'));
        }

        return view('employerjobs.edit')->with('employerjobs', $employerjobs);
    }

    /**
     * Update the specified Employerjobs in storage.
     *
     * @param int $id
     * @param UpdateEmployerjobsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployerjobsRequest $request)
    {
        $employerjobs = $this->employerjobsRepository->find($id);

        if (empty($employerjobs)) {
            Flash::error('Employerjobs not found');

            return redirect(route('employerjobs.index'));
        }

        $employerjobs = $this->employerjobsRepository->update($request->all(), $id);

        Flash::success('Employerjobs updated successfully.');

        return redirect(route('employerjobs.index'));
    }

    /**
     * Remove the specified Employerjobs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employerjobs = $this->employerjobsRepository->find($id);

        if (empty($employerjobs)) {
            Flash::error('Employerjobs not found');

            return redirect(route('employerjobs.index'));
        }

        $this->employerjobsRepository->delete($id);

        Flash::success('Employerjobs deleted successfully.');

        return redirect(route('employerjobs.index'));
    }
}
