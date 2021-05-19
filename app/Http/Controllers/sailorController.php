<?php
// B180910044 Battushig
namespace App\Http\Controllers;

use App\Models\ServiceHistory;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facades\App\Repository\Rank;
use Facades\App\Repository\Sailors;
use Facades\App\Repository\ServiceHistories;
use Facades\App\Repository\Vessels;

class sailorController extends Controller
{
    //
    public function registerForm(){
        return view('sailor.registerSailor');
    }

    public function register(Request $request){
        DB::insert('insert into sailor(`rank_id`, `sailor_name`, `date_of_birth`, `maritial_status`, `address`, `height`, `weight`, `shoe_size`, `blood_type`, `job_status`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [ $request->rank, $request->name, $request->birthDate, $request->marital, $request->homeAddress, $request->height, $request->weight, $request->shoeSize, $request->bloodType, 1]);
        cache()->forget('SAILORS.ID');
        return redirect()->back()->with('message', 'Амжилттай бүртгэлээ');
    }

    public function showServiceHistory(){
        $history = ServiceHistories::all('id');
        // $status = [1,2,4];
        // $sailors = DB::table('Sailor')->where('rank_id', $job[0]->rank_id)->whereIn('job_status', $status)->get();
        return view('sailor.historyService', compact('history'));
    }
    // 
    public function historyServiceOrder(Request $request){
        if($request->ajax()){
            $service = ServiceHistories::all($request->order);
            return response()->json(['data' => $service]);
        }
    }

    public function editSailor($sailor_id){
        $sailor = DB::table('sailor')->where('id', '=', $sailor_id)->first();
        // $sailor = json_encode($mysailor);
        return view('sailor.sailor', compact('sailor'));
    }

    public function updateSailor(Request $request, $sailor_id){
        
        // 'sailor_id' => ['required', 'boolean'],
        // 'sailor_name' => ['required'],
        $validated = $request->validate([
            // 'job_status' => ['required', 'regex:/^(3|4|5)$/u'],
            'job_status' => ['required', 'regex:/^(1|3|4|5)$/u'],
        ]);
        DB::table('sailor')->where('id', $sailor_id)->update(['job_status' => $request->job_status]);
        $myService = ServiceHistory::where('sailor_id','=', $sailor_id)->where('sign_off_date','=', null)->first();
        // $service = json_decode($myService);
        if($myService != null){
            // return redirect()->back()->with('message', $myService->sign_on_port);
            DB::table('service_history')->where('sailor_id', $sailor_id)->where('sign_off_date', null)->update(['sign_off_port' => $myService->sign_on_port, 'sign_off_date' => now()]);
        }
        // $service = json_decode($myService);
        
        return redirect()->back()->with('message', 'Амжилттай ажилтныг мэдээллийг засварлалаа');
    }

    public function searchFromHistory(Request $request){
        $ranks = Rank::all('id');
        $vessel = Vessels::all('id');
        if($request->ajax()){
            if(in_array($request->selected, array("id"))){
                $jsonResponse = ServiceHistory::where($request->selected, '>=', $request->mydata)->get();
            }
            else{
                $jsonResponse = ServiceHistory::where($request->selected, $request->mydata)->orWhere($request->selected, 'like', '%'.$request->mydata.'%')->orderBy('id', 'asc')->get();
            }
            // Log::info($request->mydata);
            return response()->json(['data' => $jsonResponse, 'ranks'=>$ranks, 'vessel'=>$vessel]);
        }
    }
}
