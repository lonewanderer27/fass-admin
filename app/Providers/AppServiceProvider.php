<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\OrganizerMember;
use App\Models\User;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('edit-event', function (User $user, Event $event) {
            // a user can only edit if they are an admin
            // of that specific organizer

            // fetch the member model of the user
            $member = OrganizerMember::where('user_id', $user->id)
                ->where('organizer_id', $event->organizer_id)
                ->where('role', 'admin')->first();

            if ($member) return true;
            return false;
        });

        Gate::define('edit-organizer', function(User $user, Organizer $organizer) {
            // a user can only edit if they are admin of that organizer

            // fetch the member of the user
            $member = OrganizerMember::where('user_id', $user->id)
                ->where('organizer_id', $organizer->id)
                ->where('role', 'admin')->first();

            if ($member) return true;
            return false;
        });
    }
}
