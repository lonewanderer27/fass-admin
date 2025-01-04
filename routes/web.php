<?php

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

Route::get('/events/{event}', function (Event $event) {
    $organizer = $event->organizer;

    return view('events.show', [
        'event' => $event,
        'organizer' => $organizer
    ]);
});

Route::get('/events', function () {
    $events = Event::with('organizer')->paginate(9);

    return view('events.index', [
        'events' => $events
    ]);
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
