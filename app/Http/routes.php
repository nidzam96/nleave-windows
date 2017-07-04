<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Route for AdminController
Route::get('admin/dashboard', 'AdminController@dashboard');

Route::get('admin/users', 'AdminController@users');

Route::get('admin/leave', 'AdminController@leave');

Route::get('admin/leaves', ['as' => 'admin.leaves', 'uses' => 'AdminController@leave']);

Route::get('admin/benefits', 'AdminController@benefits');

Route::get('admin/profile', 'AdminController@showProfile');

Route::get('admin/user/add_user', ['as' => 'admin.add_user', 'uses' => 'AdminController@add_user']);

Route::get('/first_login', 'AdminController@first_login');

Route::post('user/setpassword', ['as' => 'user.setpassword', 'uses' => 'AdminController@setpassword']);

//Route for leave
Route::get('admin/events', 'LeavesController@index');

Route::get('leave/approve/{id}{user_id}', ['as' => 'leave.approve', 'uses' => 'LeavesController@approve']);

Route::get('leave/reject/{id}', ['as' => 'leave.reject', 'uses' => 'LeavesController@reject']);

Route::post('leaves/applyLeave', ['as' => 'leaves.apply', 'uses' => 'LeavesController@applyLeave']);

Route::get('leaves/days/{leave_type_id}', 'LeavesController@getLeaveDays');

Route::resource('leaves', 'LeavesController');

//Route for EmailController
Route::post('/send', ['as' => 'send', 'uses' => 'EmailController@send'] );

//Route for StaffsController
Route::post('/admin/user/add', ['as' => 'admin.user.add', 'uses' => 'StaffsController@store']);

Route::get('/admin/user/profile/{id}', ['as' => 'admin.user.profile', 'uses' => 'StaffsController@userprofile']);

Route::post('/user/profile/editpersonal/{id}', ['as' => 'user.profile.edit.personal', 'uses' => 'StaffsController@editStaffInfo']);

Route::post('/user/profile/edit/employment', ['as' => 'user.profile.edit.employment', 'uses' => 'StaffsController@editEmployment']);

Route::post('/user/profile/edit/compensation', ['as' => 'user.profile.edit.compensation', 'uses' => 'StaffsController@editCompensation']);
