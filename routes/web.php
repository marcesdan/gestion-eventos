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
use App\Event;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('events', 'EventsController');

Route::get('events', 'EventsController@index')->name('events.index');
Route::post('events', 'EventsController@store')->name('events.store');
Route::get('events/create', 'EventsController@create')->name('events.create');
Route::get('events/{event}', 'EventsController@show')->name('events.show');
Route::post('events/{event}', 'EventsController@update')->name('events.update');
Route::get('events/edit/{event}', 'EventsController@edit')->name('events.edit');
Route::get('events/delete/{event}', 'EventsController@destroy')->name('events.delete');