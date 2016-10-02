<?php
use ESCOJ\Country;
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

Route::get('/', function () {
    return view('welcome');
});

//The authenticaction Routes
Auth::routes();


Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'contestant'], function (){
	Route::get('profile', 'Auth\RegisterController@profile');
	Route::get('edit','Auth\RegisterController@edit');
	Route::put('update','Auth\RegisterController@update');
	Route::get('institutions/{id}','Auth\RegisterController@getInstitutions');
	Route::get('contestant/institutions/{id}','Auth\RegisterController@getInstitutions');
});


Route::resource('problem','ProblemController');
Route::resource('submit','JudgementController');

//Testing Route

Route::get('test',function(){
	dd(Country::pluck('name','id'));
	return view('testing.test');
});