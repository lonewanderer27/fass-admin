<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/events/{id}', function ($id) {
    $event = Event::find($id);

    return view('event', [
        'event' => $event
    ]);
});

Route::get('/events', function () {
    return view('events', [
        'events' => Event::all()
    ]);
});

if (env('APP_ENV') == "production") {
    URL::forceScheme('https');
}
