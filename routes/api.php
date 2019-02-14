<?php

use Illuminate\Http\Request;

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


Route::group(['prefix'=>'user','namespace'=>'Api'],function(){

	Route::post('/login','LoginController@store');
	Route::get('/speakers','SpeakerController@index');
	Route::get('/sponsors','SponsorController@index');
	Route::get('/{id}/speaker','SpeakerController@show');
	Route::get('/events/dayOne','EventController@eventDay1');
	Route::get('/events/dayTwo','EventController@eventDay2');
	Route::get('/events/dayThree','EventController@eventDay3');
	

});

Route::get('/test',function(){
	dd("testing..");
});