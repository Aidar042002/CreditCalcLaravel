<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', 'App\Http\Controllers\UserController@main');

Route::get('/annuitet','App\Http\Controllers\UserController@annuitet');

Route::get('/diff','App\Http\Controllers\UserController@diff');

Route::post('/calculate', 'App\Http\Controllers\UserController@calculate')->name('calculate');

Route::post('/calculate_differentiated', 'App\Http\Controllers\UserController@calculateDifferentiated')->name('calculate_differentiated');

