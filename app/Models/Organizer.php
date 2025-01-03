<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $table = 'organizers';
    protected $fillable = [
        'name',
        'phone_no',
        'email',
        'description',
        'avatar_url',
        'cover_url',
    ];
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function members()
    {
        return $this->hasMany(OrganizerMember::class);
    }
}
