<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Fitness;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('test', function () {
    echo 6/2*(1+2);
});

Route::get('/home', 'HomeController@index');


Route::group(['middleware'=>'auth'], function(){

    //ADMIN ROUTES //ADMIN ROUTES//ADMIN ROUTES//ADMIN ROUTES//ADMIN ROUTES//ADMIN ROUTES//ADMIN ROUTES//ADMIN ROUTES//ADMIN ROUTES//ADMIN ROUTES//ADMIN ROUTES
    Route::group(['middleware'=>'admin'], function(){
        Route::get('/admin/', ['as'=>'admin','uses' => 'AdminDashboardController@showDashboard']);
        Route::get('/fitness/{id}', ['as'=>'fitness', 'uses'=>'AdminDashboardController@fitnessSession']);
        Route::resource('/admin/users', 'AdminUserController', ['names'=>[
            'index'=>'admin.users.index',
            'create'=>'admin.users.create',
            'store'=>'admin.users.store',
            'show'=>'admin.users.show',
            'update'=>'admin.users.update',
            'edit'=>'admin.users.edit',
            'destroy'=>'admin.users.destroy'
        ]]);
        Route::resource('/admin/category', 'AdminCategoryController', ['names'=>[
            'index'=>'admin.category.index',
            'create'=>'admin.category.create',
            'store'=>'admin.category.store',
            'show'=>'admin.category.show',
            'update'=>'admin.category.update',
            'edit'=>'admin.category.edit',
            'destroy'=>'admin.category.destroy'
        ]]);
        Route::resource('/admin/pack', 'AdminPackController', ['names'=>[
            'index'=>'admin.pack.index',
            'create'=>'admin.pack.create',
            'store'=>'admin.pack.store',
            'show'=>'admin.pack.show',
            'update'=>'admin.pack.update',
            'edit'=>'admin.pack.edit',
            'destroy'=>'admin.pack.destroy'
        ]]);
        Route::resource('/admin/members', 'AdminMemberController', ['names'=>[
            'index'=>'admin.members.index',
            'create'=>'admin.members.create',
            'store'=>'admin.members.store',
            'show'=>'admin.members.show',
            'update'=>'admin.members.update',
            'edit'=>'admin.members.edit',
            'destroy'=>'admin.members.destroy'
        ]]);
        Route::resource('/admin/class', 'AdminClassController', ['names'=>[
            'index'=>'admin.classes.index',
            'create'=>'admin.classes.create',
            'store'=>'admin.classes.store',
            'show'=>'admin.classes.show',
            'update'=>'admin.classes.update',
            'edit'=>'admin.classes.edit',
            'destroy'=>'admin.classes.destroy'
        ]]);
        Route::post('/admin/createregistered', 'AdminUserController@storeRegistered');
        Route::get('/admin/attendance', ['as'=>'admin.attendance.index','uses' => 'AdminAttendanceController@index']);
        Route::get('/admin/attendance/date', 'AdminAttendanceController@date');

    });


    //RECEPTION ROUTES //RECEPTION ROUTES //RECEPTION ROUTES//RECEPTION ROUTES//RECEPTION ROUTES//RECEPTION ROUTES//RECEPTION ROUTES//RECEPTION ROUTES
    Route::group(['middleware'=>'reception'], function(){

        Route::get('/reception/', ['as'=>'reception','uses' => 'ReceptionDashboardController@showDashboard']);
        Route::get('/reception/attend', ['as'=>'attendance_date','uses' => 'ReceptionAttendanceController@date']);
        Route::get('/reception/search', ['as'=>'reception.search','uses' => 'ReceptionDashboardController@search']);
        Route::get('/reception/classes', ['as'=>'reception.classes','uses' => 'ReceptionDashboardController@sessions']);
        Route::resource('/reception/members', 'ReceptionMemberController', ['names'=>[
            'index'=>'reception.members.index',
            'create'=>'reception.members.create',
            'store'=>'reception.members.store',
            'show'=>'reception.members.show',
            'update'=>'reception.members.update',
            'edit'=>'reception.members.edit',
            'destroy'=>'reception.members.destroy'
        ]]);
        Route::resource('/reception/attendance', 'ReceptionAttendanceController', ['names'=>[
            'index'=>'reception.attendance.index',
            'create'=>'reception.attendance.create',
            'store'=>'reception.attendance.store',
            'show'=>'reception.attendance.show',
            'update'=>'reception.attendance.update',
            'edit'=>'reception.attendance.edit',
            'destroy'=>'reception.attendance.destroy'
        ]]);
        Route::resource('/reception/transition', 'ReceptionTransitionController', ['names'=>[
            'index'=>'reception.transition.index',
            'create'=>'reception.transition.create',
            'store'=>'reception.transition.store',
            'show'=>'reception.transition.show',
            'update'=>'reception.transition.update',
            'edit'=>'reception.transition.edit',
            'destroy'=>'reception.transition.destroy'
        ]]);
        Route::resource('/reception/class', 'ReceptionSessionController', ['names'=>[
            'index'=>'reception.classes.index',
            'create'=>'reception.classes.create',
            'store'=>'reception.classes.store',
            'show'=>'reception.classes.show',
            'update'=>'reception.classes.update',
            'edit'=>'reception.classes.edit',
        ]]);
        Route::post('/reception/createregistered', 'ReceptionMemberController@storeRegistered');
        Route::post('/reception/transition/expense', 'ReceptionTransitionController@expense');
        Route::post('/reception/member/date', 'ReceptionMemberController@date');
        Route::post('/reception/member/debt', 'ReceptionMemberController@debt');
        Route::post('/reception/member/pay', 'ReceptionMemberController@pay');
    });


    //TRAINER ROUTES//TRAINER ROUTES//TRAINER ROUTES//TRAINER ROUTES//TRAINER ROUTES//TRAINER ROUTES//TRAINER ROUTES//TRAINER ROUTES//TRAINER ROUTES
    Route::group(['middleware'=>'trainer'], function(){
        Route::get('/trainer/', ['as'=>'trainer','uses' => 'TrainerDashboardController@index']);
        Route::get('/trainer/search', ['as'=>'trainer.search','uses' => 'TrainerDashboardController@search']);
        Route::resource('/trainer/classes', 'TrainerSessionController', ['names'=>[
            'index'=>'trainer.classes.index',
            'show'=>'trainer.classes.show',
        ]]);
        Route::resource('/trainer/members', 'TrainerMemberController', ['names'=>[
            'index'=>'trainer.members.index',
            'store'=>'trainer.members.store',
            'show'=>'trainer.members.show',
        ]]);
    });
//MEMBER ROUTES//MEMBER ROUTES//MEMBER ROUTES//MEMBER ROUTES//MEMBER ROUTES//MEMBER ROUTES//MEMBER ROUTES//MEMBER ROUTES//MEMBER ROUTES//MEMBER ROUTES
    Route::resource('/member/classes', 'MemberSessionController', ['names'=>[
        'index'=>'member.classes.index',
        'create'=>'member.classes.create',
        'store'=>'member.classes.store',
        'show'=>'member.classes.show',
        'update'=>'member.classes.update',
        'edit'=>'member.classes.edit',
    ]]);
    Route::resource('/member/health', 'MemberHealthController', ['names'=>[
        'index'=>'member.health.index',
        'create'=>'member.health.create',
        'store'=>'member.health.store',
        'show'=>'member.health.show',
        'update'=>'member.health.update',
        'edit'=>'member.health.edit',
    ]]);

});