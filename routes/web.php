<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'Admin\UserController@index')->name('users.index');
Route::get('/users/view', 'Admin\UserController@show')->name('users.show');

Route::get('/events', 'Admin\EventController@index')->name('events.index');
Route::get('/events/view', 'Admin\EventController@show')->name('events.show');
Route::post('/events/store', 'Admin\EventController@store')->name('events.store');
Route::get('/event/{id}/delete', 'Admin\EventController@destroy')->name('events.destroy');

Route::get('/speakers', 'Admin\SpeakerController@index')->name('speakers.index');
Route::get('/speakers/view', 'Admin\SpeakerController@show')->name('speakers.show');
Route::post('/speakers/store', 'Admin\SpeakerController@store')->name('speakers.store');
Route::post('/speakers/imgStore', 'Admin\SpeakerController@imgStore')->name('speakers.imgStore');
Route::get('/speaker/{id}/delete', 'Admin\SpeakerController@destroy')->name('speakers.destroy');

Route::get('/sponsors', 'Admin\SponsorController@index')->name('sponsors.index');
Route::get('/sponsors/view', 'Admin\SponsorController@show')->name('sponsors.show');
Route::post('/sponsors/store', 'Admin\SponsorController@store')->name('sponsors.store');
Route::post('/sponsors/imgStore', 'Admin\SponsorController@imgStore')->name('sponsors.imgStore');
Route::get('/sponsor/{id}/delete', 'Admin\SponsorController@destroy')->name('sponsors.destroy');

Route::get('/prizes', 'Admin\PrizeController@index')->name('prizes.index');
Route::get('/prizes/view', 'Admin\PrizeController@show')->name('prizes.show');
Route::post('/prizes/store', 'Admin\PrizeController@store')->name('prizes.store');
Route::get('/prize/{id}/delete', 'Admin\PrizeController@destroy')->name('prizes.destroy');

Route::get('/about', 'Admin\AboutController@index')->name('about.index');
Route::get('/about/view', 'Admin\AboutController@show')->name('about.show');

Route::get('/organizers', 'Admin\OrganizerController@index')->name('organizers.index');

Route::post('/image/store', 'Admin\UserController@imageStore')->name('user.imageStore');
