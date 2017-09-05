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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    return view('login_form');
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

Route::get('admin/claim', ['as' => 'admin.claim', 'uses' => 'AdminController@claim']);

Route::get('admin/user/add_user', ['as' => 'admin.add_user', 'uses' => 'AdminController@add_user']);

Route::get('/first_login', 'AdminController@first_login');

Route::post('user/setpassword', ['as' => 'user.setpassword', 'uses' => 'AdminController@setpassword']);

Route::get('/admin/create/staff', 'AdminController@newStaff');

Route::get('user/setUserRole', 'AdminController@setUserRole');

Route::get('/register_form', 'AdminController@registerform');

//Route for leave
Route::get('admin/events', 'LeavesController@index');

Route::get('admin/birthday', 'LeavesController@birthday');

Route::get('admin/holiday', 'LeavesController@holiday');

Route::get('admin/holiday/date/{dtStart}{dtEnd}', ['as' => 'admin.holiday.date', 'uses' => 'LeavesController@holidayDate']);

Route::get('admin/holidayDay/{data}', 'LeavesController@holidayDay');

Route::get('leave/approve/{id}{user_id}', ['as' => 'leave.approve', 'uses' => 'LeavesController@approve']);

Route::post('leave/reject', ['as' => 'leave.reject', 'uses' => 'LeavesController@reject']);

Route::post('leaves/applyLeave', ['as' => 'leaves.apply', 'uses' => 'LeavesController@applyLeave']);

Route::get('leaves/days/{leave_type_id}', 'LeavesController@getLeaveDays');

Route::get('leaves/checkRemain/{leave_type_id}', 'LeavesController@checkLeaveDayRemain');

Route::get('leaves/getUserId', 'LeavesController@getUserId');

Route::post('leaves/newDepartment', ['as' => 'leave.create.department', 'uses' => 'LeavesController@newDepartment']);

Route::resource('leaves', 'LeavesController');

//Route for EmailController
Route::post('/send', ['as' => 'send', 'uses' => 'EmailController@send'] );

//Route for StaffsController
Route::post('/admin/user/add', ['as' => 'admin.user.add', 'uses' => 'StaffsController@store']);

Route::get('/admin/user/profile/{id}', ['as' => 'admin.user.profile', 'uses' => 'StaffsController@userprofile']);

Route::post('/user/profile/editpersonal/{id}', ['as' => 'user.profile.edit.personal', 'uses' => 'StaffsController@editStaffInfo']);

Route::post('/user/profile/edit/employment', ['as' => 'user.profile.edit.employment', 'uses' => 'StaffsController@editEmployment']);

Route::post('/user/profile/edit/compensation', ['as' => 'user.profile.edit.compensation', 'uses' => 'StaffsController@editCompensation']);

Route::get('/user/getName/{id}', 'StaffsController@getUserId');

//Route for ClaimController
Route::post('/admin/claim', ['as' => 'claim.create', 'uses' => 'ClaimController@createClaim']);

Route::get('/admin/claim_data', 'ClaimController@claimChart');

Route::get('/admin/claim/{id}{user_id}', ['as' => 'claim.approve', 'uses' => 'ClaimController@approveClaim']);

Route::post('/admin/claim/reject', ['as' => 'claim.reject', 'uses' => 'ClaimController@rejectClaim']);

//Route for SettingController
Route::get('admin/setting', ['as' => 'admin.setting', 'uses' => 'SettingController@index']);

Route::post('admin/setting/leave', ['as' => 'setting.leave', 'uses' => 'SettingController@leave']);

Route::get('admin/setting/leave/edit/{id}', ['as' => 'setting.leave.edit', 'uses' => 'SettingController@editleave']);

Route::post('admin/setting/leave/update', ['as' => 'setting.leave.update', 'uses' => 'SettingController@updateleave']);

Route::post('admin/setting/branch', ['as' => 'setting.branch', 'uses' => 'SettingController@branch']);

Route::get('admin/setting/branch/edit/{id}', ['as' => 'setting.branch.edit', 'uses' => 'SettingController@editbranch']);

Route::post('admin/setting/branch/update', ['as' => 'setting.branch.update', 'uses' => 'SettingController@updatebranch']);

Route::post('admin/setting/position', ['as' => 'setting.position', 'uses' => 'SettingController@position']);

Route::get('admin/setting/position/edit/{id}', ['as' => 'setting.position.edit', 'uses' => 'SettingController@editposition']);

Route::post('admin/setting/position/update', ['as' => 'setting.position.update', 'uses' => 'SettingController@updateposition']);

Route::post('admin/setting/claim', ['as' => 'setting.claim', 'uses' => 'SettingController@claim']);

Route::get('admin/setting/claim/edit/{id}', ['as' => 'setting.claim.edit', 'uses' => 'SettingController@editclaim']);

Route::post('admin/setting/claim/update', ['as' => 'setting.claim.update', 'uses' => 'SettingController@updateclaim']);

//routes for SuperController
Route::get('admin/add', ['as' => 'admin.add', 'uses' => 'SuperController@add']);

Route::post('admin/add/hr', ['as' => 'admin.add.hr', 'uses' => 'SuperController@create']);