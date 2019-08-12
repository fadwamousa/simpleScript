<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('apiContact/index','ApiController@index');
Route::get('apiContact/{contact}','ApiController@show');
Route::post('apiContact/store','ApiController@store');
Route::put('apiContact/update/{contact}','ApiController@update');
Route::delete('apiContact/delete/{contact}','ApiController@destroy');
