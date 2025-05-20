<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')
    ->name('home');

    Route::view('/contact', 'contact')
    ->name('contact');
