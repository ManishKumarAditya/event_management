<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['event_name', 'event_description', 'start_date', 'end_date','organizer'];

    
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

}
