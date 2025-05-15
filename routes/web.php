<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')
    ->name('home');

Route::view('/occasions', 'occasions-archive')
    ->name('occasions.archive');
