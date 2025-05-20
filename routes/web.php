<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')
    ->name('home');

Route::view('/occasions/{occasion}', 'occasion-single')
    ->name('occasions.show');

Route::view('/contact', 'contact')
    ->name('contact');
