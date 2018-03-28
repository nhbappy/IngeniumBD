<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use File;

class ClientsController extends Controller
{
	public function index(Request $request){
		if($request->session()->has('currentUser')){
    		$clients = DB::table('clients')->get();
			return view('admin.clients.index', ['clients' => $clients]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function addClient(Request $request){
		if($request->session()->has('currentUser')){
    		return view('admin.clients.addClient');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function deleteClient(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('clients')->where('id', $id)->first();
            return view('admin.clients.deleteClient', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function create(Request $request){
		if($request->session()->has('currentUser')){
            $name = $request->input('name');


            date_default_timezone_set('Asia/Dhaka');
            $date = date('Y-m-d H:i:s', time());

            $data = array('name' => $name, 'created_at' => $date, 'updated_at' => $date);

            if(DB::table('clients')->insert($data)){
                Input::file('photo')->move('uploads/clients',$name.'.jpg');
            }
            else{
                echo "can't insert";
            }

            return redirect('/admin/clients');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function delete(Request $request){
        if($request->session()->has('currentUser')){
            $id = $request->input('id');
            $client = DB::table('clients')->where('id', $id)->first();

            DB::table('clients')->where('id', '=', $id)->delete();
            File::delete('uploads/clients/'.$client->name.'.jpg');

            return redirect('/admin/clients');
        }
        else{
            return view('errors/unauthorized');
        }
    }
}
