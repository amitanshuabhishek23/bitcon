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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
/*Route::group(['namespace' => 'Backend','prefix' => '/backend'], function () {
	
	//App Install routes
	 
    Route::get('install',   'AppAuthController@index');

});*/
Route::group(['prefix' => '/auth'], function () {
	Route::get('/install', 'AppAuthController@index');
	Route::get('/login', 'AppAuthController@login');
	Route::get('/unInstall', 'AppAuthController@unInstall');
	Route::get('/load', 'AppAuthController@load');
});

/*
Routs for front end api start
*/
Route::get('privacy-policy', 'CommonController@privacyPolicy');

/*
Routs for front end api start
*/
Route::get('faq', 'CommonController@faq');

Route::get('{path}', 'SPAController@index')->where('path', '(.*)'); 


	
