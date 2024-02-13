<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployerjobsRequest;
use App\Http\Requests\UpdateEmployerjobsRequest;
use App\Repositories\EmployerjobsRepository;

use App\Http\Requests\CreateemployerRequest;
use App\Http\Requests\UpdateemployerRequest;
use App\Repositories\employerRepository;


use App\Http\Requests\CreateEmployerJobApplicationRequest;
use App\Http\Requests\UpdateEmployerJobApplicationRequest;
use App\Repositories\EmployerJobApplicationRepository;

use App\Models\User;
use App\Models\Employerjobs;
use App\Models\employer;
use App\Models\EmployerJobApplication;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

use Flash;
use Response;

class EmployerJobApplicationController extends AppBaseController
{
    /** @var  EmployerJobApplicationRepository */
    private $employerJobApplicationRepository;

    public $user = null;

    public function __construct(EmployerJobApplicationRepository $employerJobApplicationRepo)
    {
        $this->employerJobApplicationRepository = $employerJobApplicationRepo;
    }





    public function checkApiUser($request){
        /*
        no-one but a verfied user has any business in this class.
        */
        $token = $request->bearerToken();
        $this->user = User::where('api_token', $token)->first();

        //dd($this->user);
        if($this->user==null){
            exit("Log in, Sucka.");
        }
    }

    public function api_update($id, UpdateEmployerJobApplicationRequest $request){
        $this->checkApiUser($request);
        $jobApplication = $this->employerJobApplicationRepository->find($id);
        if($this->user->id != $jobApplication['userid']){return(Response::json("Not Your Record" , 403)); }
        $jobApplication = $this->employerJobApplicationRepository->update($request->all(), $id);
        return Response::json(true , 200);
    }
    

    public function api_put(Request $request){

        $this->checkApiUser($request);
        $id = $this->user->id;
        $input = $request->all();
        
        //Let's use record ID and BRUID to find the employer-job.        
        if( isset($input['jobid']) and isset($input['job_bruid']) ){
            //scenario 0: The Best: job ID and job BRUID
            //we have a choice, so we'll use ID.
            $employerjobs=employerjobs::query();
            $employerjobs = $employerjobs->find($input['jobid']);
            //if the ID is mistaken, we call fall back to BRUID.
            if(null == $employerjobs){
                $employerjobs=employerjobs::query();
                $employerjobs=$employerjobs->where('bruid', $input['job_bruid']);
                //dd($employerjobs->first());
                $employerjobs = $employerjobs->first();
                if(null == $employerjobs){return Response::json("Record Not Found" , 404);}
            }
            $employerjobs = $employerjobs->toArray();
            //dd($employerjobs);
        }elseif( isset($input['jobid']) and !isset($input['job_bruid']) ){        
            //scenario 1: job ID but no job BRUID
            $employerjobs=employerjobs::query();
            $employerjobs = $employerjobs->find($input['jobid']);
            if(null == $employerjobs){return  Response::json("Record Not Found" , 404);}
            $employerjobs = $employerjobs->toArray();
            //dd($employerjobs);
        }elseif( !isset($input['jobid']) and isset($input['job_bruid']) ){
            //scenario 2: job BRUID but no job ID
            $employerjobs=employerjobs::query();
            $employerjobs=$employerjobs->where('bruid', $input['job_bruid']);
            if(null == $employerjobs->first()){return  Response::json("Record Not Found" , 404);}
            $employerjobs = $employerjobs->first()->toArray();
            //dd($employerjobs);
        }elseif( !isset($input['jobid']) and !isset($input['job_bruid']) ){
            //scenario 3: neither
            return("can't do nuttin fo yo, man");
        }
        //dd($employerjobs);
        
        //let's make sure that this user (candidate) hasn't logged an application already.
        $employerjobscheck=EmployerJobApplication::query();
        $employerjobscheck->where( 'jobid', $employerjobs['id'] );
        $employerjobscheck->where( 'userid', $id );
        $employerjobscheck = $employerjobscheck->first();
        //dd($employerjobscheck);
        if(null != $employerjobscheck){
            return Response::json("Outstanding Application Exists" , 400);
        }

        
        //update userID, employerID, jobID, jobBRUID and progress
        $input['userid'] = $id;
        $input['progress'] =  $employerjobs['pitch'];
        $input['employerid'] =   $employerjobs['employerid'];
        $input['jobid'] =   $employerjobs['id'];
        $input['job_bruid'] =  $employerjobs['bruid'];
        $input['t1'] =  $employerjobs['jobtitle'] . "\n\n" . $employerjobs['jobdescription'];
        //dd($input);
        $jobApplication = $this->employerJobApplicationRepository->create($input);
        return Response::json(true , 200);
    }

    public function api_show(Request $request){
        $this->checkApiUser($request);
        $id = $this->user->id;
        //dd($id);
        $retval = EmployerJobApplication::where('userid', $id)->get();
        return Response::json($retval , 200);
    }

    public function api_delete($id, Request $request){
        $this->checkApiUser($request);
        $this->employerJobApplicationRepository->delete($id);
        return Response::json(true , 200);
    }


    /**
     * Display a listing of the EmployerJobApplication.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $employerJobApplications = $this->employerJobApplicationRepository->all();

        return view('employer_job_applications.index')
            ->with('employerJobApplications', $employerJobApplications);
    }

    /**
     * Show the form for creating a new EmployerJobApplication.
     *
     * @return Response
     */
    public function create()
    {
        return view('employer_job_applications.create');
    }

    /**
     * Store a newly created EmployerJobApplication in storage.
     *
     * @param CreateEmployerJobApplicationRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployerJobApplicationRequest $request)
    {
        $input = $request->all();

        $employerJobApplication = $this->employerJobApplicationRepository->create($input);

        Flash::success('Employer Job Application saved successfully.');

        return redirect(route('employerJobApplications.index'));
    }

    /**
     * Display the specified EmployerJobApplication.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employerJobApplication = $this->employerJobApplicationRepository->find($id);

        if (empty($employerJobApplication)) {
            Flash::error('Employer Job Application not found');

            return redirect(route('employerJobApplications.index'));
        }

        return view('employer_job_applications.show')->with('employerJobApplication', $employerJobApplication);
    }

    /**
     * Show the form for editing the specified EmployerJobApplication.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employerJobApplication = $this->employerJobApplicationRepository->find($id);

        if (empty($employerJobApplication)) {
            Flash::error('Employer Job Application not found');

            return redirect(route('employerJobApplications.index'));
        }

        return view('employer_job_applications.edit')->with('employerJobApplication', $employerJobApplication);
    }

    /**
     * Update the specified EmployerJobApplication in storage.
     *
     * @param int $id
     * @param UpdateEmployerJobApplicationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployerJobApplicationRequest $request)
    {
        $employerJobApplication = $this->employerJobApplicationRepository->find($id);

        if (empty($employerJobApplication)) {
            Flash::error('Employer Job Application not found');

            return redirect(route('employerJobApplications.index'));
        }

        $employerJobApplication = $this->employerJobApplicationRepository->update($request->all(), $id);

        Flash::success('Employer Job Application updated successfully.');

        return redirect(route('employerJobApplications.index'));
    }

    /**
     * Remove the specified EmployerJobApplication from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employerJobApplication = $this->employerJobApplicationRepository->find($id);

        if (empty($employerJobApplication)) {
            Flash::error('Employer Job Application not found');

            return redirect(route('employerJobApplications.index'));
        }

        $this->employerJobApplicationRepository->delete($id);

        Flash::success('Employer Job Application deleted successfully.');

        return redirect(route('employerJobApplications.index'));
    }
}
