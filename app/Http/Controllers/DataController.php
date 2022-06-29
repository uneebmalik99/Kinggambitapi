<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\employes;

class DataController extends Controller
{
    //
    function list(){
        return data::all();
        // return DB::table('data')->get();
    //     return DB::connection('mysql2')->table('employes')->get();
    }
}
