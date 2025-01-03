<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'description',
        'location',
        'start_datetime',
        'end_datetime',
        'max_attendees',
        'avatar_url',
        'cover_url',
        'organizer_id',
        'creator_member_id'
    ];
    public function organizer() {
        return $this->belongsTo(Organizer::class);
    }
    public function creatorMember() {
        return $this->belongsTo(OrganizerMember::class, 'creator_member_id');
    }
}
