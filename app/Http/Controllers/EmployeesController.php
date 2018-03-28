<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use File;

class EmployeesController extends Controller
{
	public function index(Request $request){
		if($request->session()->has('currentUser')){
    		$employees = DB::table('employees')->orderBy('serial')->get();
			return view('admin.employees.index', ['employees' => $employees]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function getEmployee(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('employees')->where('id', $id)->first();
            return view('admin.employees.detailsEmployee', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function editEmployee(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('employees')->where('id', $id)->first();
            $request->session()->put('tempnid', $data->nid);
            return view('admin.employees.editEmployee', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function addEmployee(Request $request){
		if($request->session()->has('currentUser')){
    		return view('admin.employees.addEmployee');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function deleteEmployee(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('employees')->where('id', $id)->first();
            return view('admin.employees.deleteEmployee', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function create(Request $request){
		if($request->session()->has('currentUser')){
            $name = $request->input('name');
    		$position = $request->input('position');
    		$email = $request->input('email');
            $address = $request->input('address');
            $nid = $request->input('nid');
            $moto = $request->input('moto');
    		$serial = $request->input('serial');


            date_default_timezone_set('Asia/Dhaka');
            $date = date('Y-m-d H:i:s', time());

            $data = array('name' => $name, 'position' => $position, 'email' => $email, 'address' => $address, 'nid' => $nid, 'moto' => $moto, 'serial' => $serial, 'created_at' => $date, 'updated_at' => $date);

            if(DB::table('employees')->insert($data)){
                Input::file('photo')->move('uploads/employees',$nid.'.jpg');
            }
            else{
                echo "can't insert";
            }

            return redirect('/admin/employees');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function update(Request $request){
        if($request->session()->has('currentUser')){
            $id = $request->input('id');
            $name = $request->input('name');
            $position = $request->input('position');
            $email = $request->input('email');
            $address = $request->input('address');
            $nid = $request->input('nid');
            $moto = $request->input('moto');

            date_default_timezone_set('Asia/Dhaka');
            $date = date('Y-m-d H:i:s', time());

            $data = array('name' => $name, 'position' => $position, 'email' => $email, 'address' => $address, 'nid' => $nid, 'moto' => $moto, 'updated_at' => $date);

            if(Input::has('photo')){
                DB::table('employees')->where('id', $id)->update($data);
                File::delete('uploads/employees/'.$request->session()->get('tempnid').'.jpg');
                Input::file('photo')->move('uploads/employees',$nid.'.jpg');
            }

            //File::delete('uploads/'.$employee->nid.'.jpg');

            return redirect('/admin/employees');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function delete(Request $request){
        if($request->session()->has('currentUser')){
            $id = $request->input('id');
            $employee = DB::table('employees')->where('id', $id)->first();

            DB::table('employees')->where('id', '=', $id)->delete();
            File::delete('uploads/employees/'.$employee->nid.'.jpg');

            return redirect('/admin/employees');
        }
        else{
            return view('errors/unauthorized');
        }
    }
}
