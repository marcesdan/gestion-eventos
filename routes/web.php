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
Route::post('events/delete/{event}', 'EventoController@destroy')->name('events.delete');

Route::get('asistentes', 'AsistenteController@index')->name('asistentes.index');
Route::post('asistentes', 'AsistenteController@store')->name('asistentes.store');
Route::get('asistentes/create', 'AsistenteController@create')->name('asistentes.create');
Route::get('asistentes/{asistente}', 'AsistenteController@show')->name('asistentes.show');
Route::post('asistentes/{asistente}', 'AsistenteController@update')->name('asistentes.update');
Route::get('asistentes/edit/{asistente}', 'AsistenteController@edit')->name('asistentes.edit');
Route::post('asistentes/delete/{asistente}', 'AsistenteController@destroy')->name('asistentes.delete');

Route::get('asistencias/{event}', 'AsistenciaController@indexEvento')->name('asistencias.indexEvento');
//Route::get('asistencias/{asistente}', 'AsistenciaController@indexPorAsistente')->name('asistencias.indexPorAsistente');
Route::post('asistencias/{event}', 'AsistenciaController@store')->name('asistencias.store');
Route::get('asistencias/create/{event}', 'AsistenciaController@create')->name('asistencias.create');
Route::post('asistencias/delete/{asistente}+{evento}', 'AsistenciaController@destroy')->name('asistencias.delete');

