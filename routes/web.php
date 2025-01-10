<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\RegisterController;
use App\Mail\OrganizationCreated;
use Illuminate\Support\Facades\Mail;
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
    Route::get('/events/{event}/scan', 'scan');
    Route::get('/events/create', 'create')->middleware('auth');
    Route::post('/events', 'store')
        ->middleware(['auth', 'edit-event']);
    Route::get('/events/{event}', 'show');
    Route::patch('/events/{event}', 'update')
        ->middleware('auth')
        ->can('update', 'event');
    Route::delete('/events/{event}', 'destroy')
        ->middleware('auth')
        ->can('delete', 'event');
    Route::get('/events/{event}/edit', 'edit')
        ->middleware('auth')
        ->can('update', 'event');
});

Route::controller(OrganizerController::class)->group(function () {
    Route::get('/organizers', 'index');
    Route::get('/organizers/create', 'create')->middleware('auth');
    Route::post('/organizers', 'store')->middleware(['auth']);
    Route::get('/organizers/{organizer}', 'show');
    Route::delete('/organizers/{organizer}', 'destroy')
        ->middleware('auth')
        ->can('delete', 'organizer');
    Route::patch('/organizers/{organizer}', 'update')
        ->middleware('auth')
        ->can('update', 'organizer');
    Route::get('/organizers/{organizer}/edit', 'edit')
        ->middleware('auth')
        ->can('update', 'organizer');
});

Route::get('/mails/create/organization', function () {

    return 'Email has been sent!';
});

Route::get('/mails/organization-created', function () {
    return new OrganizationCreated();
});

if (env('APP_ENV') == "production") {
    URL::forceScheme('https');
}
