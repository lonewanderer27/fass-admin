<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('home');
});

Route::view('/welcome', 'welcome');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');      // form page
    Route::post('/login', 'store');     // form action
    Route::post('/logout', 'destroy');  // form action
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/signup', 'index'); // form page
    Route::post('/signup', 'store');// form action
});

Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index');
    Route::get('/events/create', 'create')->middleware('auth');
    Route::post('/events', 'store')->middleware('auth');
    Route::get('/events/{event}', 'show');
    Route::patch('/events/{event}', 'update')
        ->middleware('auth')
        ->can('edit-event', 'event');
    Route::delete('/events/{event}', 'destroy')
        ->middleware('auth')
        ->can('edit-event', 'event');
    Route::get('/events/{event}/edit', 'edit')
        ->middleware('auth')
        ->can('edit-event', 'event');
});

Route::controller(OrganizerController::class)->group(function () {
    // TODO: Use Route::resource, but we'll specify the action keywords for now since we don't remember it yet.
    Route::get('/organizers', 'index');             // page
    Route::get('/organizers/create', 'create');     // form
    Route::post('/organizers', 'store');            // form action
    Route::delete('/organizers/{org}', 'destroy');  // form action
    Route::patch('/organizers/{org}', 'update');    // form
    Route::get('/organizers/{org}', 'show');        // page
    Route::get('/organizers/{org}/edit', 'edit');   // form action
});

if (env('APP_ENV') == "production") {
    URL::forceScheme('https');
}
