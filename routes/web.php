<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function(){
	return view('welcome');
});*/




//************************ Home Route Start *****************************
Route::get('/','HomeController@index');
//************************** Home Route End *****************************



//************************ Login Route Start *****************************
Route::get('/portal','LoginController@index');

Route::post('/portal/trytologin',array('uses'=>'LoginController@login'));
//************************ Login Route End *****************************



//************************ Admin Route Start *****************************
Route::get('/portal/admin', 'AdminController@index');
//************************ Admin Route End *****************************



//************************ Logout Route Start *****************************
Route::get('/logout','LogoutController@index');
//************************ Logout Route End *****************************



//************************ Users Route Start *****************************
Route::get('/admin/users','UsersController@index');
Route::get('/admin/adduser','UsersController@addUser');
Route::get('/admin/user/details/{id}','UsersController@getUser');
Route::get('/admin/user/edit/{id}','UsersController@editUser');
Route::get('/admin/user/delete/{id}','UsersController@deleteUser');

Route::post('/admin/trytoadduser',array('uses'=>'UsersController@create'));
Route::post('/admin/trytoupdateuser',array('uses'=>'UsersController@update'));
Route::post('/admin/trytodeleteuser',array('uses'=>'UsersController@delete'));
//************************ Users Route End *****************************



//************************ Employees Route Start *****************************
Route::get('/admin/employees','EmployeesController@index');
Route::get('/admin/addemployee','EmployeesController@addEmployee');
Route::get('/admin/employee/details/{id}','EmployeesController@getEmployee');
Route::get('/admin/employee/edit/{id}','EmployeesController@editEmployee');
Route::get('/admin/employee/delete/{id}','EmployeesController@deleteEmployee');

Route::post('/admin/trytoaddemployee','EmployeesController@create');
Route::post('/admin/trytoupdateemployee',array('uses'=>'EmployeesController@update'));
Route::post('/admin/trytodeleteemployee',array('uses'=>'EmployeesController@delete'));
//************************ Employees Route End *****************************



//************************ Works Route Start *****************************
Route::get('/admin/works','WorksController@index');
Route::get('/admin/addwork','WorksController@addWork');
Route::get('/admin/work/details/{id}','WorksController@getWork');
Route::get('/admin/work/edit/{id}','WorksController@editWork');
Route::get('/admin/work/delete/{id}','WorksController@deleteWork');

Route::post('/admin/trytoaddwork','WorksController@create');
Route::post('/admin/trytoupdatework',array('uses'=>'WorksController@update'));
Route::post('/admin/trytodeletework',array('uses'=>'WorksController@delete'));
//************************ Works Route End *****************************



//************************ Clients Route Start *****************************
Route::get('/admin/clients','ClientsController@index');
Route::get('/admin/clients/addClient','ClientsController@addClient');
Route::get('/admin/client/delete/{id}','ClientsController@deleteClient');

Route::post('/admin/trytoaddclient','ClientsController@create');
Route::post('/admin/trytodeleteclient','ClientsController@delete');
//************************ Clients Route End *****************************


/*
//************************ Upload Route Start *****************************
Route::get('/upload','UploadController@index');

Route::post('/upload','UploadController@create');
//************************ Upload Route End *****************************
*/


Auth::routes();
