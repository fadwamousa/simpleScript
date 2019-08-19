<?php

Route::view('/demo','demo');



Route::get('/' , 'JobsController@index');
Route::get('jobs/create','JobsController@create')->name('jobs.create');
Route::post('jobs/create','JobsController@store')->name('jobs.store');
Route::get('jobs/{id}/edit','JobsController@edit')->name('jobs.edit');
Route::get('jobs/myjob','JobsController@myjob');
Route::PUT('jobs/{id}','JobsController@update')->name('jobs.update');





Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
//Jobs
Route::get('jobs/{id}/{job}','JobsController@show')->name('jobs.show');

Route::get('jobs','JobsController@allJobs')->name('alljobs');



//Company
Route::get('companies/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('companies/create','CompanyController@create')->name('company.view');
Route::post('companies/create','CompanyController@store')->name('company.store');
Route::post('companies/coverphoto','CompanyController@coverphoto')->name('cover.photo');

Route::post('company/logo','CompanyController@logo')->name('logo');
Route::get('/user/profile','UserProfileController@index')->name('profile.view');
Route::post('/user/profile/create','UserProfileController@store')->name('profile.create');
Route::post('/user/coverLetter','UserProfileController@coverletter')->name('cover.letter');
Route::post('/user/resume','UserProfileController@resume')->name('resume');
Route::post('/user/avatar','UserProfileController@avatar')->name('avatar');


Route::view('/employer/register','auth.employer_register');
Route::post('/employer/register','EmployerRegisterController@registerEmp')->name('employer.register');
Route::post('/application/{id}','JobsController@apply')->name('apply');
Route::get('/jobs/applications','JobsController@applicant');


Route::post('save/{id}','FavouriteController@saveJob');
Route::post('unsave/{id}','FavouriteController@unsaveJob');

Route::get('jobs/search','JobsController@searchJobs');