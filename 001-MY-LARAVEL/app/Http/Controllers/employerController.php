<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateemployerRequest;
use App\Http\Requests\UpdateemployerRequest;
use App\Repositories\employerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Flash;
use Response;
use App\Models\employer;
use App\Models\User;
use App\Models\Model_Has_Roles;
use Illuminate\Support\Facades\Auth;

class employerController extends AppBaseController
{
    /** @var  employerRepository */
    private $employerRepository;

    public function __construct(employerRepository $employerRepo)
    {
        $this->employerRepository = $employerRepo;
    }

    /**
     * Display a listing of the employer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $employers = $this->employerRepository->all();

        return view('employers.index')
            ->with('employers', $employers);
    }

    /**
     * Show the form for creating a new employer.
     *
     * @return Response
     */
    public function create()
    {
        return view('employers.create');
    }

    public function store(Request $request)
    {


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->save();

        $users = User::get();
        foreach ($users as $user)
        {
          $userID = $user->id;
        }

        $employer = new employer;
        $employer->userid = $userID;
        $employer->contact_name = $request->contact_name;
        $employer->contact_email = $request->contact_email;
        $employer->contact_phone_no = $request->contact_phone_no;
        $employer->company = $request->company;
        $employer->registered_address = $request->registered_address;
        $employer->registered_company_no = $request->registered_company_no;
        $employer->billing_address = $request->billing_address;
        $employer->vat_number = $request->vat_number;
        $employer->save();

        $modelHasRoles = new Model_Has_Roles;
        $modelHasRoles->model_id = $userID;
        $modelHasRoles->model_type = $request->model_type;
        $modelHasRoles->role_id = $request->role_id;
        $modelHasRoles->save();



        Flash::success('Employer saved successfully.');

        return redirect(route('employers.index'));
    }

    // /**
    //  * Store a newly created employer in storage.
    //  *
    //  * @param CreateemployerRequest $request
    //  *
    //  * @return Response
    //  */
    // public function store(CreateemployerRequest $request)
    // {
    //
    //
    //     $employer = $this->employerRepository->create($request);
    //     $employer->contact_name = $request->input('contact_name');
    //     dd($employer->toArray());
    //     $employer->save();
    //
    //     Flash::success('Employer saved successfully.');
    //
    //     return redirect(route('employers.index'));
    // }

    /**
     * Display the specified employer.
     *
     * @param int $id
     *
     * @return Response
   */

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
    public function api_getallemployers(CreateemployerRequest $request){

      $this->checkApiUser($request);
      $userId = $this->user->id;

      $employers = employer::where('userid', $userId)->get();
      return Response::json($employers , 200);
      // $jobs=employerjobs::query();
      // $jobs=$jobs->where('employerid', $userId);
      // $jobs = $jobs->get();

    }

    public function api_updateemployer(UpdateemployerRequest $request, $id){
      $this->checkApiUser($request);
      $id = $this->user->id;

      $employers = employer::find($id);
      $employers = employer::where('userid', $id);
      $employers->update($request->all());
      // $jobApplication = $this->employerJobApplicationRepository->update($request->all(), $id);
      return Response::json(true , 200);

    }


    public function api_getemployerbyid(CreateemployerRequest $request){



     //  if(isset( $request['userid']) ){
     //
     //    $id = $request['userid'];
     //
     //  }else{
     //
     //   $id = "";
     //
     // }

     if(isset($request['userid']) ? $id = $request['userid'] : $id = "");
     if(isset($request['contact_name']) ? $contactName = $request['contact_name'] : $contactName = "");
     if(isset($request['contact_email']) ? $contactEmail = $request['contact_email'] : $contactEmail = "");
     if(isset($request['company']) ? $company = $request['company'] : $company = "");


      $employers = employer::where('userid', $id)
      ->orWhere('contact_name', $contactName)
      ->orWhere('company', $company)
      ->orWhere('contact_email', $contactEmail)
      ->get();


      return Response::json($employers , 200);

    }

    public function api_deleteEmployer(Request $request, $id){

      $employers = employer::where('userid', $id);
      $modelHasRoles = Model_Has_Roles::where('model_id', $id);
      $users = User::where('id', $id);
      $employers->delete();
      $modelHasRoles->delete();
      $users->delete();


      return Response::json(true , 200);
    }

    public function show($id)
    {
        $employer = $this->employerRepository->find($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employers.show')->with('employer', $employer);
    }

    /**
     * Show the form for editing the specified employer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employer = $this->employerRepository->find($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employers.edit')->with('employer', $employer);
    }

    /**
     * Update the specified employer in storage.
     *
     * @param int $id
     * @param UpdateemployerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateemployerRequest $request)
    {
        $employer = $this->employerRepository->find($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $employer = $this->employerRepository->update($request->all(), $id);

        Flash::success('Employer updated successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Remove the specified employer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employer = $this->employerRepository->find($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $this->employerRepository->delete($id);

        Flash::success('Employer deleted successfully.');

        return redirect(route('employers.index'));
    }
}
