<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepwdresetRequest;
use App\Http\Requests\UpdatepwdresetRequest;
use App\Repositories\pwdresetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pwdreset;
use Illuminate\Routing\UrlGenerator;
use Flash;
use Response;

class pwdresetController extends AppBaseController
{
    /** @var  pwdresetRepository */
    private $pwdresetRepository;
    protected $url;


    public function __construct(pwdresetRepository $pwdresetRepo, UrlGenerator $url)
    {
        $this->pwdresetRepository = $pwdresetRepo;
        $this->url = $url;
    }




    public function pwdreset_stepone_web(Request $request){
        //wrapper around pwdreset_stepthree to return a 'nice' web page on TRUE
        //In future, do the following:
        //  1.  Return a template to look nice
        //  2.  Call a different email function to call a different reset template
        return $this->pwdreset_stepone($request);
        //return Response::json( "Check Your Mail" , 200);
    }

    public function pwdreset_stepone(Request $request){

        /*
        STEPS:
        Get the user's email address.
        Check that it exists in the user database
        Get the user ID
        Make annew record in the pwdreset table, with these things:
            1. A big and complicated GUID.
            2. User ID
            3. User email

        Send an email with the one-time URL made up of:
        1. The reset screen address + the big, complicated GUID.
        */

        //dd( $request->email);
        $user = User::where('email', $request->email)->first()->toArray();
        //dd($user['id']);

        if(!null == $user){
            $guid = $this->GUID();
            $input = $request->all();
            //dd($input);
            $input['userid'] = $user['id'];
            $input['guid'] = $guid;
            //dd($input);
            $pwdreset = $this->pwdresetRepository->create($input);   
            //dd( $pwdreset);
            $this->send_email_pwd_reset( $request->email, $guid ); 
            return Response::json( "Check your Email.  You will shortly recieve a mail with a link to reset your password.  Now close this browser tab" , 200);    

        }else{
            return Response::json( "No Such Email Address.  Stop phishing." , 410); 
        }


    }


    public function pwdreset_steptwo(Request $request){
        /*
        STEPS:
        Get the big GUID from the request
        Show a form with the GUID as a hidden field, and a field for the new password

        The 'web' version should submit to /pwdresetexe -------> pwdreset_stepthree_web
        The 'api' version should submit to /api/pwdresetexe ---> pwdreset_stepthree

        */

        /*
        There is only the 'web' version of this now and for ever.
        Any 'API Version' will be a form outside this project,
        and the designers will just make a GET request to 
        /api/pwdresetexe with the parms 
        guid:xxx-yyy-xxx
        newpwd:value-of-new-password
        */

        //return view('pwdchange')->with('guid', $request->guid)->with('baseurl', $this->url->to('/'));
        return view('pwdchange', [ 'guid'=>$request->guid, 'page_ref_url'=>$this->url->to('/')])->render();

    }


    public function pwdreset_stepthree_web(Request $request){ 
        //wrapper around pwdreset_stepthree to return a 'nice' web page on TRUE
        //In future, probably return a nice template,
        //return $this->pwdreset_stepthree($request);
        $this->pwdreset_stepthree($request);
        return redirect('/login');
    }

    public function pwdreset_stepthree(Request $request){
     

        //dd($request->newpwd);

        /*
        STEPS: 
        From the form, get the GUID, and the user's new password.
        Use the GUID to look up the User ID from the pwdreset table
        Update the user record with the new password
        Tell the user that their password has been changed.
        DELETE THE RECORD.
        */

        $record = pwdreset::where('guid', $request->guid)->first();
        //dd($record);
        
        if(null==$record){
            return Response::json( "Request Already Used, or never existed.  Issue a new one." , 410); 
        }
        $record = $record->toArray();

        //REMEMBER TO DELETE THE RECORD HERE:
        //It can only be used once, regardless of success or fail.
        
        $id_to_delete = $record['id'];
        //dd($id_to_delete);


        $delrez = pwdreset::find($id_to_delete)->delete();
        //dd($delrez);

        $userrec = User::find( $record['userid'] );
        //dd($userrec);

        $userrec->password = Hash::make($request->newpwd);
        $rez = $userrec->save();
        //dd($rez);
        if(true==$rez){
            return Response::json( "Your Password was changed Successfully" , 200);  
        }else{
            return Response::json( "Password Reset Failed.  Please try again" , 200); 
        }
    }

    public function send_email_pwd_reset( $emailaddress, $guid ){

        $arrEmail = ["email"=>$emailaddress, "guid"=>$guid];
        $absurl = ($this->url->to('/'));
        $trunkurl = substr( $absurl, strpos( $absurl, "://" )+3 );
        //dd($trunkurl);
        $html = view('emails.reset', [ 'myvar'=>$arrEmail, 'page_ref_url'=>$trunkurl])->render();
        //dd($html);

        $email = new \SendGrid\Mail\Mail(); 
        
        $email->setFrom("noreply@boardrm.com", "PASSWORD RESET MAIL");
        $email->setSubject("Password Reset Request");
        $email->addTo($emailaddress, "PASSWORD RESET MAIL");
        $email->addContent( "text/plain", $html);

        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            //print $response->statusCode() . "\n";
            //print_r($response->headers());
            //print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

    }

    /**
     * Display a listing of the pwdreset.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pwdresets = $this->pwdresetRepository->all();

        return view('pwdresets.index')
            ->with('pwdresets', $pwdresets);
    }

    /**
     * Show the form for creating a new pwdreset.
     *
     * @return Response
     */
    public function create()
    {
        return view('pwdresets.create');
    }

    /**
     * Store a newly created pwdreset in storage.
     *
     * @param CreatepwdresetRequest $request
     *
     * @return Response
     */
    public function store(CreatepwdresetRequest $request)
    {
        $input = $request->all();

        $pwdreset = $this->pwdresetRepository->create($input);

        Flash::success('Pwdreset saved successfully.');

        return redirect(route('pwdresets.index'));
    }

    /**
     * Display the specified pwdreset.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pwdreset = $this->pwdresetRepository->find($id);

        if (empty($pwdreset)) {
            Flash::error('Pwdreset not found');

            return redirect(route('pwdresets.index'));
        }

        return view('pwdresets.show')->with('pwdreset', $pwdreset);
    }

    /**
     * Show the form for editing the specified pwdreset.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pwdreset = $this->pwdresetRepository->find($id);

        if (empty($pwdreset)) {
            Flash::error('Pwdreset not found');

            return redirect(route('pwdresets.index'));
        }

        return view('pwdresets.edit')->with('pwdreset', $pwdreset);
    }

    /**
     * Update the specified pwdreset in storage.
     *
     * @param int $id
     * @param UpdatepwdresetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepwdresetRequest $request)
    {
        $pwdreset = $this->pwdresetRepository->find($id);

        if (empty($pwdreset)) {
            Flash::error('Pwdreset not found');

            return redirect(route('pwdresets.index'));
        }

        $pwdreset = $this->pwdresetRepository->update($request->all(), $id);

        Flash::success('Pwdreset updated successfully.');

        return redirect(route('pwdresets.index'));
    }

    /**
     * Remove the specified pwdreset from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pwdreset = $this->pwdresetRepository->find($id);

        if (empty($pwdreset)) {
            Flash::error('Pwdreset not found');

            return redirect(route('pwdresets.index'));
        }

        $this->pwdresetRepository->delete($id);

        Flash::success('Pwdreset deleted successfully.');

        return redirect(route('pwdresets.index'));
    }


    public function GUID()
    {

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}
