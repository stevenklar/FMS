<?php

Route::get('/', 'SessionController@index');
Route::post('/create', 'SessionController@store');
Route::post('/get', 'SessionController@get');
Route::get('/show/{id}', 'SessionController@show');
Route::post('/update', 'SessionController@update');
