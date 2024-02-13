<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\SharedControllers\SharedEmailController;
use App\Models\Schedulings;
use App\Models\Timed_Actions;
use App\Models\Check_Actions;
use Illuminate\Http\Request;

class TimedActionsFunnelCandidateInnerLoop extends AppBaseController
{
  public function __construct(SharedEmailController $sharedEmailController, Request $request)
  {
      $this->sharedEmailController = $sharedEmailController;
      $this->Request = $request;
  }

  public function index()
  {
    echo 'Hello';
  }

  public function executeTimedActionsInnerLoopFunnelCandidates($DataSrcID, $totalDuration, $taskName, $emailAddress, $firstName, $lastName, $countryCode, $location, $long, $lat, $keywords)
  {



    $timedActions = Timed_Actions::get();
    //Timed Actions Inner loop
    foreach ($timedActions as $timedAction)
    {
      $recordID = $timedAction->id;
      $actionName = $timedAction->action_name;
      $description = $timedAction->description;
      $duration = $timedAction->duration;
      $actionCommand = $timedAction->action_command;
      $dataSrcName = $timedAction->data_src_name;
      $templateID = $timedAction->template_id; //Comment this line out for A-B Testing

      $recordExists = Check_Actions::select('number_of_executions', 'scheduling_id', 'timed_actions_id', 'data_src_name', 'id')->where('scheduling_id', $DataSrcID)->where('timed_actions_id', $recordID)->get()->first();
          if($recordExists){
            if($dataSrcName == 'FunnelCandidates')
            {
                if($totalDuration > $duration && $taskName == 'Test')
                {
                    $numberOfExecutions = $recordExists->number_of_executions;
                    $recordExists->number_of_executions++;
                    $dataSrcNameCheckActions = $recordExists->data_src_name;
                    $recordExists->save();
                    echo 'Updated' . '<br>';

                    if($dataSrcNameCheckActions == $dataSrcName)
                    {
                      echo '<br>' . $DataSrcID . '<br>'. $dataSrcNameCheckActions .'<br>' . $recordID;
                    }
                }
              }
          }else{

              if($dataSrcName == 'FunnelCandidates')
              {
                if($totalDuration > $duration && $taskName == 'Test' ) {

                    $checkActionRecord = new Check_Actions;
                    $checkActionRecord->scheduling_id = $DataSrcID;
                    $checkActionRecord->timed_actions_id = $recordID;
                    $checkActionRecord->number_of_executions = 0;
                    $checkActionRecord->data_src_name = 'FunnelCandidates';
                    $checkActionRecord->save();
                    echo 'New records created';

                          $emailFunctionName  = $timedAction->action_command; //Pass the $DataSrcID instead of $templateID into emailFunctionName for A-B Testing
                          $this->sharedEmailController->$emailFunctionName($emailAddress, $this->Request, $templateID, $firstName, $lastName, $countryCode, $location, $long, $lat, $keywords);
                          echo $dataSrcName . '<br>' . $recordID . '<br>' . $emailFunctionName;
              }
          }
        }
    }
  }
}
