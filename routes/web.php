<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('home');
});

Route::view('/welcome', 'welcome');

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index');                  // page
    Route::get('/events/create', 'create');         // form
    Route::post('/events', 'store');                // form action
    Route::get('/events/{event}', 'show');         // page
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
