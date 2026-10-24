<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landingpage')->name('landingpage');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')
    ->middleware('auth')
    ->name('dashboard');
