<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\IkhlaqController;
use App\Http\Controllers\DataController;


// Route::get('/wel',function(){
//     return view('welcome');
// });

//  Route::view('/Home','Home');
// //  Route::view('/About','About');
// Route::get('/About/{name}{id?}',function($name,$id=""){
//     return 'hi'.' '.$name. " ".'thats ur id:'. ' '. $id ;
// })->where(['name'=>'[a-zA-Z]+','id'=>'[0-9]+']);


// Route::get('/About/{name}',function($name){
//     return $name;
// })
// Route::get('/Contact Us/{name}',function($name){
//     return 'hi'.$name;
// })

// Route::view('/Contact us','Contact us');
// Route::view("/Admin","Admin");
// Route::view("/Employ","Employ");

// });
// Route::get('/insert',function(){
//     DB::insert('insert into list(id,Name,Profession) values(?,?,?)',[1,'khan','coding']);
// })
// Route::get('/select',function(){
//    $employes = DB::select('select * from employes');
//     foreach($employes as $employes){
//         echo $employes->Name . ':';
//         echo $employes->Profession.':';
//         echo $employes->Expertise.':';
//         echo $employes->Joining.'<br>';
//     }
// });
Route::get("list",[DataController::class,'list']);
