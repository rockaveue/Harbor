<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    //
    public function index(){
        if(!Auth::check()){
            return redirect()->intended('mylogin');

        }
    }
    public function login(){
        // $accounts = DB::table('account')->get();
        return view('login.login');
    }

    public function dologin(Request $request){
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('dashboard');
        }
        return redirect()->back()->withErrors('Хандах эрхгүй хэрэглэгч');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
