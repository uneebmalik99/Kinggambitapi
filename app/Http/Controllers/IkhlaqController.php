<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data;
class IkhlaqController extends Controller
{
    //
    function list(data $key=null)
    {
         return $key?data::find($key):data::all();
    }
};
