<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
* Routes for without login
*/
Route::group(['middleware' => 'api','prefix' => '/','namespace' => 'Api'], function(){
	Route::post('login', 'AuthController@login');
	
	/*Routes for shopify plan activation*/
	Route::get('planActivation', 'AppDefaultController@planActivation');
	/*Routes for store activation status*/
	Route::get('appActivation', 'AppDefaultController@appActivation');

	/*Routes for store webhook */
	Route::post('ProductCreateUpdateFromStore', 'AppDefaultController@ProductCreateUpdateFromStore');
	Route::post('ProductDeleteFromStore', 'AppDefaultController@ProductDeleteFromStore');
	Route::post('shop_data_erasure', 'AppDefaultController@shop_data_erasure');
	Route::post('customer_data_request', 'AppDefaultController@customer_data_request');
	Route::post('customer_data_erasure', 'AppDefaultController@customer_data_erasure');
	/* webhook end */
		Route::post('updateStoresnnipets','AppPublishThemeController@updateStoresnnipets');

});

/*
* Routes for with login
*/
Route::group(['middleware' => ['auth:api', 'CheckStoreId'],'namespace' => 'Api'], function(){
	/* Routs for App Code clean up */
	Route::get('appCodeCleanUp/{storeId?}', 'AppDefaultController@appCodeCleanUp');
	Route::get('appStatusReview/{storeId?}', 'AppDefaultController@appStatusReview');

	/*
	Routes for section(logout)
	*/
	Route::get('logout', 'AuthController@logout');

	/*
	Routes for section(Theme Integration)	
	*/
	Route::get('getAppPublishTheme/{storeId?}','AppPublishThemeController@index'); // store_id
	Route::post('updateAppPublishTheme','AppPublishThemeController@update');
	Route::post('updateThemeStatus','AppPublishThemeController@updateThemeStatus');
	Route::get('getPublishTheme/{storeId?}','AppPublishThemeController@show'); // store_id

	/*
	* Route for section(welcome)
	*/
	Route::post('updateStep','StepController@update');

	/*
	* Route for section(App Theme)
	*/
	Route::post('updateAppTheme','AuthController@updateAppTheme');
	
	/*
	* Route for section(Price Plan)
	*/
	Route::get('getPricePlansList/{storeId?}','PricePlanController@index'); // store_id
	Route::get('getActivePricePlan/{storeId?}','PricePlanController@show'); // store_id

	/*
	* Route for section(Store)
	*/
	Route::get('getStore/{storeId?}','StoreController@show'); // store_id

	/*
	* Routes for section(Contact Support)
	*/
	Route::post('contactSupport','ContactSupportController@store');

	/*
	* Recommended Apps
	*/
	Route::get('recommendedapps', 'AppDefaultController@recommendedApps');
});
