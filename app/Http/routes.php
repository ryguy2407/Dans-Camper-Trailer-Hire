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

Route::resource('bookings', 'BookingsController');
Route::resource('camper.booking', 'CamperBookingController');
Route::get('/booking-enquiry', ['uses' => 'BookingsController@page']);
Route::get('/', ['uses' => 'PagesController@home']);
Route::get('/{id}', ['uses' => 'PagesController@show']);
Route::resource('camper', 'CamperController');