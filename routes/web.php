<?php

Route::get('/', 'PledgeController@index')->name('welcome');
Route::post('pledge', 'PledgeController@store')->name('pledge.store');
// Route::middleware('guest:api', 'throttle:1,10')->group(function () {
//     Route::post('pledge', 'PledgeController@store')->name('pledge.store');
// });

// Route::post('pledge', 'PledgeController@store')->name('pledge.store');

// Route::resource('pledge', 'PledgeController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
