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
});
