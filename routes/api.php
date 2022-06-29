<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\MemberController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:sanctum'], function()
    {
//     //All secure URL's

Route::get("userinfo/{id?}",[RegisterController::class,'list']);
Route::get("loadinfo/{id?}",[LoadController::class,'get']);
Route::post("load",[LoadController::class,'add']);
       
    });
    Route::post("register",[RegisterController::class,'test']);
    Route::post("login",[LoginController::class,'login']);
   
        // Route::apiResource("member",MemberController::class);








// Route::put("update",[userController::class,'update']);
// Route::delete("delete/{id}",[userController::class,'delete']);
// Route::get("search/{name}",[userController::class,'search']);
// Route::post("validator",[userController::class,'valide']);

// Route::post("login",[UserController::class,'index']);
// Route::post("insert",[UserController::class,'insert']);
// Route::post("add",[UserController::class,'add']);




