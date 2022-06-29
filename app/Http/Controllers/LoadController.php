<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Load;
use Validator;
use Illuminate\Support\Facades\Hash;

class LoadController extends Controller
{
    
    function add(Request $req){
          $rules=array(
            "Driver_Id"=>"required",
            "Pick_up_Location"=>"required",
            "Pick_up_Time"=>"required",
            "Destination"=>"required",
            "Load_Description"=>"required",
            "Dock_Number"=>"required",
            "Drop_of_Time"=>"required",
            "Pricing"=>"required",
            
          );
          $check = Validator::make($req->all(),$rules);
          if($check->fails()){
            return response()->json($check->errors(),401);
          }
          else{
        $load = new Load;
        $load->Driver_Id = $req->Driver_Id; 
        $load->Pick_up_Location = $req->Pick_up_Location;
        $load->Pick_up_Time = $req->Pick_up_Time;
        $load->Destination = $req->Destination;
        $load->Load_Description = $req->Load_Description;
        $load->Dock_Number = $req->Dock_Number;
        $load->Drop_of_Time = $req->Drop_of_Time;
        $load->Confirmation_Pic = $req->Confirmation_Pic;  
        $load->Sealed_Pic = $req->Sealed_Pic;  
        $load->Pricing = $req->Pricing;  
        $result=$load->save();
       
        if($result)
        {
            return ["result"=>"thanks for detail"];
        }
        else{
            return ["result"=>"the detail is not founding"];
        }
     }
    }
    function get($id=null)
    {
        return $id? load::find($id):load::all();
    }
};
