<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\OrganizerMember;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Event $event): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Event $event): bool
    {
        // fetch the member model of the user
        $member = OrganizerMember::where('user_id', $user->id)
            ->where('organizer_id', $event->organizer_id)
            ->where('role', 'admin')->first();

        if ($member) return true;
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Event $event): bool
    {
        // fetch the member model of the user
        $member = OrganizerMember::where('user_id', $user->id)
            ->where('organizer_id', $event->organizer_id)
            ->where('role', 'admin')->first();

        if ($member) return true;
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Event $event): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Event $event): bool
    {
        return false;
    }
}
