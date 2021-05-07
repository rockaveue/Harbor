<?php
// B180910062 Dulguun
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class userController extends Controller
{
    //
    public function burtgel(){
        $sailors = DB::table('Sailor')->where('rank')->get();
        return view('burtgel', compact('sailors'));
    }

    public function jobOffers(){
        $jobs = DB::table('job_offer')->get();
        return view('job.jobOffers', compact('jobs'));
    }

    public function jobOffer($id){
        $job = DB::select('select * from job_offer where id = ?', [$id]);
        $status = [1,2,4];
        $sailors = DB::table('Sailor')->where('rank_id', $job[0]->rank_id)->whereIn('job_status', $status)->get();
        return view('job.assignOffer', compact('job', 'sailors'));
    }
    public function assignOffer(Request $request, $id){
        $myjob = DB::table('job_offer')->where('id', '=', $id)->first();
        // $myjob = DB::select('select * from job_offer where id = ?', [$id]);
        // $sda = json_encode($myjob);
        DB::insert('insert into service_history(sailor_id,rank_id,vessel_id,sign_on_date, sign_on_port, sign_off_date,sign_off_port,contract_period,contract_end_date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)', [$request->sailorId, $myjob->rank_id, null, Carbon::now(), Carbon::now()->addDays($myjob->contract_period),null,  null, $myjob->contract_period, $myjob->contract_end_date ]);
        return redirect()->back()->with('message', 'sadasdasd');
    }
}
