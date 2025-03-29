<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'type', 'price', 'quantity', 'available_tickets'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
