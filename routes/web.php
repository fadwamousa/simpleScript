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

Route::get('contacts','ContactController@index')->name('Home.Conatcs');
Route::get('contacts/create','ContactController@create');
Route::post('contacts','ContactController@store')->name('contacts.store');

Route::get('contacts/{contact}/edit','ContactController@edit')->name('update');
Route::put('contacts/{contact}','ContactController@update')->name('contacts.update');
Route::delete('contacts/{contact}','ContactController@destroy')->name('contacts.destroy');



Route::resource('ajax-crud', 'AjaxController');