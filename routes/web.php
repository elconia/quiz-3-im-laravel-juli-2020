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

Route::get('/items/create', 'ItemController@create'); // menampilkan halaman form
Route::post('/items', 'ItemController@store'); // menyimpan data
Route::get('/items', 'ItemController@index'); // menampilkan semua
Route::get('/items/{id}', 'ItemController@show'); // menampilkan detail item dengan id 
Route::get('/items/{id}/edit', 'ItemController@edit'); // menampilkan form untuk edit item
Route::put('/items/{id}', 'ItemController@update'); // menyimpan perubahan dari form edit
Route::delete('/items/{id}', 'ItemController@destroy'); // menghapus data dengan id

Route::get('/proyek', 'ProjectController@index');
Route::get('/proyek/create', 'ProjectController@create');
Route::post('/proyek', 'ProjectController@store');

Route::get('/proyek/{id}/daftarkan-staff', 'ProjectController@show');
Route::post('/proyek/{id}/daftarkan-staff', 'ProjectController@show');

Route::get('/proyek/{proyek_id}/edit', 'ProjectController@edit');
Route::put('/proyek/{proyek_id}', 'ProjectController@update');
Route::delete('/proyek/{proyek_id}', 'ProjectController@destroy');