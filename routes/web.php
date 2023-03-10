<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('users','UserController');
    Route::get('loads','TeacherController@load')->name('load');
    Route::resource('users.teachers', 'TeacherController')->shallow();
    Route::resource('departments','DepartmentController');
    Route::resource('departments.courses', 'CourseController')->shallow();
    Route::resource('buildings','BuildingController');
    Route::resource('specializations','SpecializationController');
    Route::resource('buildings.rooms', 'RoomController')->shallow();
    Route::resource('sections','SectionController');
    Route::resource('sections.schedules', 'ScheduleController')->shallow();
    Route::resource('curricula','CurriculumController');
    Route::resource('curricula.subjects', 'SubjectController')->shallow();
    Route::resource('teachers.schedules', 'ScheduleController')->shallow();
    Route::get('assign/{teacher}', 'ScheduleController@assign')->name('teachers.schedules.assign');
    Route::get('viewschedules/{teacher}', 'ScheduleController@viewschedule')->name('viewschedules');
    Route::resource('academicyears','AcademiCyearController');
});