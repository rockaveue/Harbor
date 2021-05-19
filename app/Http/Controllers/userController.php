<?php
// B180910062 Dulguun
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Facades\App\Repository\Sailors;
use Facades\App\Repository\Rank;
use Facades\App\Repository\Vessels;
use Facades\App\Repository\JobOffers;
use Facades\App\Repository\ServiceHistories;
use Facades\App\Repository\Companies;
use App\Models\Sailor;
use App\Models\JobOffer;
use App\Repository\Companies as RepositoryCompanies;
use App\Repository\Rank as RepositoryRank;
use Illuminate\Support\Facades\Log;

class userController extends Controller
{
    //
    public function burtgel(){
        $sailors = DB::table('Sailor')->where('rank')->get();
        return view('burtgel', compact('sailors'));
    }
    // ajil ruu orohod avah medeelel
    public function jobOffers(){
        $jobs = JobOffers::all('id');
        $ranks = Rank::all('id');
        $vessels = Vessels::all('id');
        $companies = DB::table('company')->get();
        // $vessels = json_encode($vessel);
        return view('job.jobOffers', compact('jobs', 'ranks', 'vessels', 'companies'));
    }
    // ajiin huseltiin erembelelt
    public function jobOfferOrder(Request $request){
        $ranks = Rank::all('id');
        $vessels = Vessels::all('id');
        if($request->ajax()){
            $jobs = JobOffers::all($request->order);
            return response()->json(['data' => $jobs, 'ranks'=>$ranks, 'vessel'=>$vessels]);
        }
    }
    // ajliin 1 huselt ruu oroh
    public function jobOffer($id){
        $job = DB::select('select * from job_offer where id = ?', [$id]);
        $status = [1,2,4];
        $ranks = Rank::all('id');
        
        $sailors = DB::table('Sailor')->where('rank_id', $job[0]->rank_id)->whereIn('job_status', $status)->get();
        
        return view('job.assignOffer', compact('job', 'sailors', 'ranks'));
    }
    //ajliin sanal ajilchind uguh
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
    // dalaichdiin jagsaalt harah
    public function sailorList(){
        $sailors = Sailors::all('id');
        $ranks = Rank::all('id');
        return view('sailor.sailors', compact('sailors', 'ranks'));
    }

    // dalaichin haih
    public function searchSailors(Request $request){
        $ranks = Rank::all('id');
        if($request->ajax()){
            if(in_array($request->selected, array("id", "weight", "height", "shoe_size"))){
                $jsonResponse = Sailor::where($request->selected, '>=', $request->mydata)->get();
            }
            else{
                $jsonResponse = Sailor::where($request->selected, $request->mydata)->orWhere($request->selected, 'like', '%'.$request->mydata.'%')->orderBy('id', 'desc')->get();
            }
            // Log::info($request->mydata);
            return response()->json(['data' => $jsonResponse, 'ranks'=>$ranks]);
        }
    }

    // dalaichin erembeleh
    public function sailorListOrder(Request $request){
        $ranks = Rank::all('id');
        if($request->ajax()){
            $sailors = Sailors::all($request->order);
            return response()->json(['data' => $sailors, 'ranks'=>$ranks]);
        }
    }


    public function searchJobOffer(Request $request){
        $ranks = Rank::all('id');
        $vessel = Vessels::all('id');
        $company = Companies::all('id');
        if($request->ajax()){
            if(in_array($request->selected, array("id", "contract_period"))){
                $jsonResponse = JobOffer::where($request->selected, '>=', $request->mydata)->get();
            }
            else{
                $jsonResponse = JobOffer::where($request->selected, $request->mydata)->orWhere($request->selected, 'like', '%'.$request->mydata.'%')->orderBy('id', 'asc')->get();
            }
            // Log::info($request->mydata);
            return response()->json(['data' => $jsonResponse, 'ranks'=>$ranks, 'vessel'=>$vessel, 'company' => $company]);
        }
    }
}
