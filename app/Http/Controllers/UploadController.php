<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class UploadController extends Controller
{
    public function index(){
		return view('upload');
	}
	
	public function create(Request $request){

		Input::file('file')->move('uploads',Input::file('file')->getClientOriginalName());
	}
}
