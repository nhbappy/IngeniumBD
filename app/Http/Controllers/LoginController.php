<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('currentUser')){
            return redirect('/portal/admin');
        }
        else{
            return view('login')->with('message','');
        }
    }

	public function login(Request $request){
        $loginStat = false;

        $email = $request->input('email');
    	$password = $request->input('password');

        if(DB::table('users')->where('email', $email)->first()){
            $user = DB::table('users')->where('email', $email)->first();
            $name = $user->name;
            if($user->password == $password){
                $loginStat = true;
                $request->session()->put('currentUser', $email);
                $request->session()->put('name', $name);
            }
        }

        if($loginStat == true){
            return redirect('/portal/admin');
        }
        else{
            return view('login')->with('message','invalid username or password');
        }
    }
}
