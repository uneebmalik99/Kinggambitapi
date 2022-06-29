<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  function test(Request $req){
      $rules=array(
        "Name"=>"required" ,
        "Email"=>"required",
        "Phone"=>"required",
        "Date_of_Birth"=>"required",
        "Company_Name"=>"required",
        "EIN"=>"required",
        "Password"=>"required |min:8 | max:15",
        "Token"=>"required",
        "Role"=>"required",
        "Payment_Type"=>"required",      
      );
       $check = Validator::make($req->all(),$rules);
      if($check->fails()){
        return response()->json($check->errors(),401);
      }
      else
      {
     $user = new User;
     $user->Name=$req->Name;
     $user->Email=$req->Email;
     $user->Phone=$req->Phone;
     $user->Date_of_Birth=$req->Date_of_Birth;
     $user->Company_Name=$req->Company_Name;
     $user->EIN=$req->EIN;
     $user->Password=Hash::make($req->Password);
     $user->Token=$req->Token;
     $user->Role=$req->Role;
     $user->Payment_Type=$req->Payment_Type;
     $user->Bank_Number=$req->Bank_Number;
     $user->Bank_Info=$req->Bank_Info;
     $user->Credit_Card_No=$req->Credit_Card_No;
     $user->Expire_Date=$req->Expire_Date;
     $user->Security_Code=$req->Security_Code;
     $user->Zip_Code=$req->Zip_Code;
    
     $result=$user->save();
     if($result){
      return response()->json(["result"=> "SUCCESS"]);
       }
     else{
      return response()->json(["result"=>"operation failed"]);
     }
    }
     
  } 

        function list($id=null)
        {
            return $id? user::find($id):user::all();
        }
  // function update(Request $req)
  // {
  //   $Data= Data::find($req->id);
  //   $Data->Name=$req->Name;
  //   $Data->Profession=$req->Profession;
  //   $Data->City=$req->City;
  //   $result=$Data->save();
  //   if($result){
  //     return ["result"=>"data have been updated"];
  //    }
  //    else{
  //     return ["result"=>"update failed"];
  //    }
     
  // }
  // function delete($id)
  // {
  //   $Data=Data::find($id);
  //   $result=$Data->delete();
  //   if($result){
  //   return ["result"=>"data has been deleted"];
  // }
  // else{
  //   return ["result"=>"data has not been deleted"];
  // }
    
  // }
  // function search($name)
  // {
  //   $result= Data::where('name','like','%'.$name.'%')->get();
  //   if(count($result)>0){
  //     return $result;
  //   }
  //   else{
  //     return ["result"=>"No Data Founded"];
  //   }
  // }
  //             // Validation
  // function valide(Request $req){
  //   $rules=array(
  //     "Name"=>"required | max:8",
  //     "Profession"=>"required",
  //   );
  //   $check = Validator::make($req->all(),$rules);
  //   if($check->fails()){
  //     return response()->json($check->errors(),401);
  //   }
  //   else{
  //      $Data= new Data;
  //      $Data->Name=$req->Name;
  //      $Data->Profession=$req->Profession;
  //      $Data->City=$req->City;
  //      $result=$Data->save();
  //      if($result){
  //       return ["result"=>"Data saved"];
  //      }
  //      else{
  //       return ["result"=>"Some things wrong."];
  //      }
  //   }
  // }
};

