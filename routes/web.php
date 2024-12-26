<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

if (env('APP_ENV') == "production") { URL::forceScheme('https'); }