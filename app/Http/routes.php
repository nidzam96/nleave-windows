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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Route for PagesController
Route::get('admin/dashboard', 'AdminController@dashboard');

Route::get('admin/users', 'AdminController@users');

Route::get('admin/leave', 'AdminController@leave');

Route::get('admin/leaves', ['as' => 'admin.leaves', 'uses' => 'AdminController@leave']);

Route::get('admin/benefits', 'AdminController@benefits');

Route::get('admin/profile', 'AdminController@showProfile');

//Route for branch
Route::resource('branches', 'BranchesController');

//Route for leavetype
Route::resource('leavetypes', 'LeavetypesController');

//Route for leavetime
Route::resource('leavetimes', 'LeavetimesController');

//Route for position
Route::resource('positions', 'PositionsController');

//Route for staff
Route::resource('staffs', 'StaffsController');

//Route for leave
Route::resource('leaves', 'LeavesController');

Route::post('leaves/applyLeave', ['as' => 'leaves.apply', 'uses' => 'LeavesController@applyLeave']);
