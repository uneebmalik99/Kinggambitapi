<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PushController extends Controller
{
    public function Notification()
    {
        $data=[];
        $data['message']='some message';
        $data['Booking_id']='My booking id';

        $tokens=[];
        $tokens[]='';
        $response=$this->sendFirebasePush($tokens,$data);
    }
    public function sendFirebasePush($tokens,$data)
    {
        $serverKey='';

        $msg=array
        (
            'message' => $data['message'],
            'Booking_id' => $data['My booking id'],
        );
        $notifyData = [
            'body'=> $data['message'],
            'tittle'=>'Project name'
        ];

        $registrationIds = $tokens;

        if(count($tokens)>1){
            $fields = array
            (
                'registration_Ids' => $registrationIds,  //for multiple user notification
                'notification' =>  $notifyData,
                'data' => $msg,
                'priority' => 'high'
            );
        }
        else
        {
            $fields = array
            (
                'to' => $registrationIds[0],  //for one user notification
                'notification' =>  $notifyData,
                'data' => $msg,
                'priority' => 'high'
            );
        }
        $header[] = 'Content-Type : application/json';
        $header[] = 'Authorization: Key=' .$serverkey;

        $ch = curl_init ();
        curl_setopt ($ch,CURLOPT_URL,"");
        curl_setopt ($ch,CURLOPT_POST,True);
        curl_setopt ($ch,CURLOPT_HTTPHEADER,$header);
        curl_setopt ($ch,CURLOPT_RETURNTRANSFER,True);
        // curl_setopt ($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt ($ch,CURLOPT_POSTFIELDS, json_encode($fields) );
        $result = curl_exec($ch);
        if($result ===FALSE)
        {
            die('FCM Send Error:' .curl_error($ch) );
        }
        curl_close($ch);
        return $result;
        
    }
}
