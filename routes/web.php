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
Route::get('contacts','ContactController@index')->name('Home.Conatcs');
Route::get('contacts/create','ContactController@create');
Route::post('contacts','ContactController@store')->name('contacts.store');

Route::get('contacts/{contact}/edit','ContactController@edit')->name('update');
Route::put('contacts/{contact}','ContactController@update')->name('contacts.update');
Route::delete('contacts/{contact}','ContactController@destroy')->name('contacts.destroy');



Route::resource('ajax-crud', 'AjaxController');
*/





Route::get('/' , 'JobsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Jobs
Route::get('jobs/{id}/{job}','JobsController@show')->name('jobs.show');



//Company
Route::get('companies/{id}/{company}','CompanyController@index')->name('company.index');


//Profile
Route::get('/user/profile','UserProfileController@index');
Route::post('/user/profile/create','UserProfileController@store')->name('profile.create');
Route::post('/user/coverLetter','UserProfileController@coverletter')->name('cover.letter');
Route::post('/user/resume','UserProfileController@resume')->name('resume');
Route::post('/user/avatar','UserProfileController@avatar')->name('avatar');


Route::view('/employer/register','auth.employer_register');
Route::post('/employer/register','EmployerRegisterController@registerEmp')->name('employer.register');

