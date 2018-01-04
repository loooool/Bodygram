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

use App\Attendance;
use App\Category;
use App\Fitness;
use App\FitnessUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('test', function (){
    $fitness = Fitness::find(session()->get('reception_fitness_id'));
    return $results = $fitness->members->search('Mira')->paginate(4);


});

Route::group(['middleware'=>'admin'], function(){
    Route::get('/admin/', ['as'=>'admin','uses' => 'AdminDashboardController@showDashboard']);
    Route::get('/data/', ['as'=>'admin.data','uses' => 'AdminDashboardController@data']);
    Route::get('/fitness/{id}', ['as'=>'fitness', 'uses'=>'AdminDashboardController@fitnessSession']);
    Route::resource('/admin/users', 'AdminUserController');
    Route::resource('/admin/category', 'AdminCategoryController');
    Route::resource('/admin/pack', 'AdminPackController');
    Route::resource('/admin/members', 'AdminMemberController');
    Route::post('/admin/createregistered', 'AdminUserController@storeRegistered');
    Route::get('/admin/attendance', ['as'=>'admin.attendance.index','uses' => 'AdminAttendanceController@index']);
    Route::get('/admin/attendance/date', 'AdminAttendanceController@date');

});
Route::group(['middleware'=>'reception'], function(){
    Route::get('/reception/', ['as'=>'reception','uses' => 'ReceptionDashboardController@showDashboard']);
    Route::get('/reception/attend', ['as'=>'attendance_date','uses' => 'ReceptionAttendanceController@date']);
    Route::get('/reception/search', ['as'=>'reception.search','uses' => 'ReceptionDashboardController@search']);
    Route::resource('/reception/members', 'ReceptionMemberController');
    Route::resource('/reception/attendance', 'ReceptionAttendanceController');
    Route::resource('/reception/transition', 'ReceptionTransitionController');
    Route::post('/reception/createregistered', 'ReceptionMemberController@storeRegistered');
    Route::post('/reception/transition/expense', 'ReceptionTransitionController@expense');
    Route::post('/reception/member/date', 'ReceptionMemberController@date');
    Route::post('/reception/member/debt', 'ReceptionMemberController@debt');
    Route::post('/reception/member/pay', 'ReceptionMemberController@pay');
});
Route::group(['middleware'=>'trainer'], function(){

});