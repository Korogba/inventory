<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::get('/', ['middleware' => 'guest', function () {
        return view('welcome');
    }]);

    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/rate', 'HomeController@rate');
    Route::get('/upload', 'HomeController@upload');
    Route::get('/analysis', 'HomeController@analysis');
    Route::get('/profile', 'HomeController@profile');
    Route::post('/upload', 'HomeController@postupload');
    Route::post('/rate', 'HomeController@postrate');
    Route::post('/analysis', 'HomeController@postanalysis');
    Route::post('/profile', 'HomeController@postprofile');
    Route::post('/query', 'HomeController@ajaxquery');
    Route::post('/chartdata', 'HomeController@chartdata');
});
