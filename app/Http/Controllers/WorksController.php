<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use File;

class WorksController extends Controller
{
	public function index(Request $request){
		if($request->session()->has('currentUser')){
    		$works = DB::table('works')->get();
			return view('admin.works.index', ['works' => $works]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function getWork(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('works')->where('id', $id)->first();
            return view('admin.works.detailsWork', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function editWork(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('works')->where('id', $id)->first();
            return view('admin.works.editWork', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function addWork(Request $request){
		if($request->session()->has('currentUser')){
    		return view('admin.works.addWork');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function deleteWork(Request $request, $id){
        if($request->session()->has('currentUser')){
            $data = DB::table('works')->where('id', $id)->first();
            return view('admin.works.deleteWork', ['data' => $data]);
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function create(Request $request){
		if($request->session()->has('currentUser')){
            $name = $request->input('name');
    		$details = $request->input('details');
    		$link = $request->input('link');


            date_default_timezone_set('Asia/Dhaka');
            $date = date('Y-m-d H:i:s', time());

            $data = array('name' => $name, 'details' => $details, 'link' => $link, 'created_at' => $date, 'updated_at' => $date);

            if(DB::table('works')->insert($data)){
                $temp = DB::table('works')->where('name', $name)->first();
                Input::file('photo')->move('uploads/works',$temp->id.'.jpg');
            }
            else{
                echo "can't insert";
            }

            return redirect('/admin/works');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function update(Request $request){
        if($request->session()->has('currentUser')){
            $id = $request->input('id');
            $name = $request->input('name');
            $details = $request->input('details');
            $link = $request->input('link');

            date_default_timezone_set('Asia/Dhaka');
            $date = date('Y-m-d H:i:s', time());

            $data = array('name' => $name, 'details' => $details, 'link' => $link, 'updated_at' => $date);

            if(Input::has('photo')){
                DB::table('works')->where('id', $id)->update($data);
                File::delete('uploads/works/'.$id.'.jpg');
                Input::file('photo')->move('uploads/works',$id.'.jpg');
            }

            //File::delete('uploads/'.$employee->nid.'.jpg');

            return redirect('/admin/works');
        }
        else{
            return view('errors/unauthorized');
        }
    }

    public function delete(Request $request){
        if($request->session()->has('currentUser')){
            $id = $request->input('id');
            $work = DB::table('works')->where('id', $id)->first();

            DB::table('works')->where('id', '=', $id)->delete();
            File::delete('uploads/works/'.$work->id.'.jpg');

            return redirect('/admin/works');
        }
        else{
            return view('errors/unauthorized');
        }
    }
}
