<?php

use App\Booking;
use App\Notifications\Notification;

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

$monolog = Log::getMonolog();
$syslog = new \Monolog\Handler\SyslogHandler('papertrail');
$formatter = new \Monolog\Formatter\LineFormatter('%channel%.%level_name%: %message% %extra%');
$syslog->setFormatter($formatter);

$monolog->pushHandler($syslog);

Route::get('notifications/testing', function(){
		$bookings = Booking::approved()->get()->toArray();
		$notification = new Notification();
        $returned = $notification->check($bookings);
        //dd($returned);
        $notification->save($returned);
        $notification->purge($bookings);
});

Route::get('login', ['uses' => 'SessionsController@login', 'as' => 'login']);

Route::resource('bookings', 'BookingsController');
Route::get('bookings/trashed/all', ['as' => 'bookings.trashed.index', 'uses' => 'BookingsController@trashedIndex']);
Route::get('bookings/{id}/trashed', ['as' => 'bookings.trashed', 'uses' => 'BookingsController@trashed']);
Route::get('bookings/{id}/restore', ['as' => 'bookings.restore', 'uses' => 'BookingsController@restore']);
Route::resource('camper.booking', 'CamperBookingController');

Route::get('/booking-enquiry', ['uses' => 'BookingsController@page']);

Route::get('/', ['uses' => 'PagesController@home']);

Route::resource('camper', 'CamperController');
Route::post('contact', ['uses' => 'PagesController@sendContact', 'as' => 'contact']);

Route::resource('booking.note', 'NotesController');

Route::resource('sessions', 'SessionsController');
Route::resource('user', 'UsersController');

Route::resource('holidays', 'HolidaysController');

Route::resource('notifications', 'NotificationsController');

Route::resource('blog', 'BlogController');

Route::resource('blog.media', 'MediaController');

Route::get('/specials', function(){
	return view('pages.specials');
});

Route::get('/{id}', ['uses' => 'PagesController@show']);

Route::get('calendar/show', ['uses' => 'CalendarController@show']);