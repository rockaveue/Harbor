<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sailorController extends Controller
{
    //
    public function registerForm(){
        return view('sailor.registerSailor');
    }

    public function register(Request $request){
        DB::insert('insert into sailor(`rank_id`, `sailor_name`, `date_of_birth`, `maritial_status`, `address`, `height`, `weight`, `shoe_size`, `blood_type`, `job_status`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [ $request->rank, $request->name, $request->birthDate, $request->marital, $request->homeAddress, $request->height, $request->weight, $request->shoeSize, $request->bloodType, 1]);
        return redirect()->back()->with('message', 'Амжилттай бүртгэлээ');
    }

    public function showServiceHistory(){
        $history = DB::table('service_history')->get();
        // $status = [1,2,4];
        // $sailors = DB::table('Sailor')->where('rank_id', $job[0]->rank_id)->whereIn('job_status', $status)->get();
        return view('sailor.historyService', compact('history'));
    }

    public function signOffSailor($sailor_id){
        $mysailor = DB::table('sailor')->where('id', '=', $sailor_id)->first();
        $sailor = json_encode($mysailor);
        return view('sailor.sailor', compact('sailor'));
    }
}
