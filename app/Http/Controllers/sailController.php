<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class sailController extends Controller
{
    //
    public function getCompany(){
        $sailor = DB::table('sailor')->where('id', Auth::user()->user_user_id)->first();
        $ranks = DB::table('myrank')->get();
        $history = DB::table('service_history')->where('sailor_id', Auth::user()->user_user_id)->get();
        return view('sail.sail', compact('sailor', 'history', 'ranks'));
    }
}
