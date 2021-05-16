<?php
// B180910044 Battushig
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class companyController extends Controller
{
    //
    public function getSailors(){
        $vessel = DB::table('vessel')->where('company_id', Auth::user()->roles);
        
        $company = DB::table('company')->where('id', Auth::user()->user_user_id)->first();

        $sailors = DB::table('service_history')->where('vessel_id', )->get();

        return view('company.company', compact('company'));
    }

}
