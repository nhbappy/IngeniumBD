<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
	public function index(Request $request){
    	if($request->session()->has('currentUser')){
    		$email = $request->session()->get('currentUser');
    		$user = DB::table('users')->where('email', $email)->first();
            return view('admin/admin', ['user' => $user]);
        }
        else{
            return view('errors/unauthorized');
        }
    }
}
