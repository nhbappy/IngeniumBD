<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')->orderBy('serial')->get();
        $clients = DB::table('clients')->get();
        $works = DB::table('works')->get();
        return view('welcome',compact('employees','clients','works'));
    }
}
