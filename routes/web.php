<?php

use App\Models\Event;
use App\Models\Organizer;
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
    $organizer = $event->organizer;

    return view('event', [
        'event' => $event,
        'organizer' => $organizer
    ]);
});

Route::get('/organizers/{id}', function ($id) {
    $organizer = Organizer::find($id);
    $members = $organizer->members()->take(3)->get();
    $events = $organizer->events()->take(3)->get();

    return view('organizer', [
        'organizer' => $organizer,
        'members' => $members,
        'events' => $events
    ]);
});

Route::get('/events', function () {
    $events = Event::with('organizer')->get();

    return view('events', [
        'events' => $events
    ]);
});

if (env('APP_ENV') == "production") {
    URL::forceScheme('https');
}
