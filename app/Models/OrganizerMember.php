<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizerMember extends Model
{
    use HasFactory;
    protected $table = 'organizer_members';
    protected $fillable = [
        'user_id',
        'role',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
    public function createdEvents()
    {
        return $this->hasMany(Event::class, 'creator_member_id');
    }
}
