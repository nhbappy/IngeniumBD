<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
	public function index(Request $request){
		if($request->session()->has('currentUser')){
    		$users = DB::table('users')->get();
			return view('admin.users.index', ['users' => $users]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function getUser(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('users')->where('id', $id)->first();
            return view('admin.users.detailsUser', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function editUser(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('users')->where('id', $id)->first();
            return view('admin.users.editUser', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function addUser(Request $request){
		if($request->session()->has('currentUser')){
    		return view('admin.users.addUser');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function deleteUser(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('users')->where('id', $id)->first();
            return view('admin.users.deleteUser', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function create(Request $request){
		if($request->session()->has('currentUser')){
            $name = $request->input('name');
    		$role = $request->input('role');
    		$email = $request->input('email');
    		$password = $request->input('password');

            date_default_timezone_set('Asia/Dhaka');
            $date = date('Y-m-d H:i:s', time());

            $data = array('name' => $name, 'role' => $role, 'email' => $email, 'password' => $password, 'created_at' => $date, 'updated_at' => $date);

            DB::table('users')->insert($data);

            return redirect('/admin/users');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function update(Request $request){
        if($request->session()->has('currentUser')){
            $id = $request->input('id');
            $name = $request->input('name');
            $role = $request->input('role');
            $email = $request->input('email');
            $password = $request->input('password');

            date_default_timezone_set('Asia/Dhaka');
            $date = date('Y-m-d H:i:s', time());

            $data = array('name' => $name, 'role' => $role, 'email' => $email, 'password' => $password, 'updated_at' => $date);

            DB::table('users')->where('id', $id)->update($data);

            return redirect('/admin/users');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function delete(Request $request){
        if($request->session()->has('currentUser')){
            $id = $request->input('id');
            DB::table('users')->where('id', '=', $id)->delete();
            return redirect('/admin/users');
        }
        else{
            return view('errors/unauthorized');
        }
    }
}
