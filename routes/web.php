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

Route::get('/', 'EventoController@index')->name('events.index');

//Route::resource('asistentes', 'AsistenteController');

Route::get('events', 'EventoController@index')->name('events.index');
Route::post('events', 'EventoController@store')->name('events.store');
Route::get('events/create', 'EventoController@create')->name('events.create');
Route::get('events/{event}', 'EventoController@show')->name('events.show');
Route::post('events/{event}', 'EventoController@update')->name('events.update');
Route::get('events/edit/{event}', 'EventoController@edit')->name('events.edit');
Route::get('events/delete/{event}', 'EventoController@destroy')->name('events.delete');

Route::get('asistentes', 'AsistenteController@index')->name('asistentes.index');
Route::post('asistentes', 'AsistenteController@store')->name('asistentes.store');
Route::get('asistentes/create', 'AsistenteController@create')->name('asistentes.create');
Route::get('asistentes/{asistente}', 'AsistenteController@show')->name('asistentes.show');
Route::post('asistentes/{asistente}', 'AsistenteController@update')->name('asistentes.update');
Route::get('asistentes/edit/{asistente}', 'AsistenteController@edit')->name('asistentes.edit');
Route::get('asistentes/delete/{asistente}', 'AsistenteController@destroy')->name('asistentes.delete');

Route::get('asistencias', 'AsistenciaController@index')->name('asistencias.index');
Route::post('asistencias', 'AsistenciaController@store')->name('asistencias.store');
Route::get('asistencias/create', 'AsistenciaController@create')->name('asistencias.create');
Route::get('asistencias/{asistente}', 'AsistenciaController@show')->name('asistencias.show');
Route::post('asistencias/{asistente}', 'AsistenciaController@update')->name('asistencias.update');
Route::get('asistencias/edit/{asistente}', 'AsistenciaController@edit')->name('asistencias.edit');
Route::get('asistencias/delete/{asistente}', 'AsistenciaController@destroy')->name('asistencias.delete');

