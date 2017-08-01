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

Route::post('/logout', function(){
	 return redirect('logout');
});

Route::get('/',[
	'middleware' => 'auth', function (){
	return view('dashboard');
}]);

Route::get('dashboard',function(){
	return view('dashboard');
});

Route::resource('/tiretype','TireTypeController');
Route::get('tiretype','TireTypeController@index');

Route::resource('/tiresize','TireSizeController');
Route::get('tiresize','TireSizeController@index');

Route::resource('/tiremaster','TireMasterController');
Route::get('tiremaster','TireMasterController@index');