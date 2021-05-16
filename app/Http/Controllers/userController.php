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
        $ranks = DB::table('myrank')->get();
        $vessels = DB::table('vessel')->get();
        $companies = DB::table('company')->get();
        // $vessels = json_encode($vessel);
        return view('job.jobOffers', compact('jobs', 'ranks', 'vessels', 'companies'));
    }
    
    public function jobOffer($id){
        $job = DB::select('select * from job_offer where id = ?', [$id]);
        $status = [1,2,4];
        $ranks = DB::table('myrank')->get();
        
        $sailors = DB::table('Sailor')->where('rank_id', $job[0]->rank_id)->whereIn('job_status', $status)->get();
        
        return view('job.assignOffer', compact('job', 'sailors', 'ranks'));
    }
    public function assignOffer(Request $request, $id){
        $myjob = DB::table('job_offer')->where('id', '=', $id)->first();
        // $myjob = DB::select('select * from job_offer where id = ?', [$id]);
        // $sda = json_encode($myjob);
        DB::transaction(function() use($request, $myjob, $id){
            // Carbon::now()->addDays($myjob->contract_period)
            DB::insert('insert into service_history(sailor_id,rank_id,vessel_id,sign_on_date, sign_on_port, sign_off_date,sign_off_port,contract_period,contract_end_date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)', [$request->sailorId, $myjob->rank_id, $myjob->vessel_id, Carbon::now(), $myjob->sign_on_port, null,  null, $myjob->contract_period, $myjob->contract_end_date ]);
            
            DB::table('job_offer')->where('id', $id)->update(['state'=>2]);
            DB::table('sailor')->where('id', $request->sailorId)->update(['job_status'=>2]);
        });
        return redirect()->back()->with('message', 'Амжилттай ажилтныг бүртгэлээ');
    }
    
    public function sailorList(){
        $sailors = DB::table('sailor')->get();
        $ranks = DB::table('myrank')->get();
        return view('sailor.sailors', compact('sailors', 'ranks'));
    }
}
