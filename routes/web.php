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

Route::get('/', 'IndexController@parent_login_show');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('student','IndexController@student_info')->name('student.info');

Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    Route::resource('mark','MarkController');
    Route::resource('student','StudentController');
    Route::resource('subject','SubjectController');
    Route::resource('class','ClassnameController');
    Route::get('timetable','SubjectController@timetable')->name('timetable.show');
    Route::post('timetable','SubjectController@store_timetable')->name('timetable.store');
    Route::get('mark-number','SubjectController@mark_number')->name('mark_number.show');
    Route::post('mark-number','SubjectController@store_mark_number')->name('mark_number.store');
    Route::post('save-student-info','ClassnameController@save_student_info');
    Route::get('list-class','ClassnameController@class_list')->name('class.list');

    Route::get('export-exel/{id}','SubjectController@exportSubjectReport');
});


