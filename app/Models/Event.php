<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['organizer_id', 'title', 'description', 'event_date', 'location'];

    // app/Models/Event.php
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }


    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }
}
