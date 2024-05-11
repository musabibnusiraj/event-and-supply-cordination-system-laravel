<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'start_datetime', 'end_datetime', 'address', 'country', 'city', 'description', 'user_id', 'event_publisher_id', 'status'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the EventPublisher model
    public function eventPublisher()
    {
        return $this->belongsTo(EventPublisher::class);
    }

    public function services()
    {
        return $this->hasMany(EventService::class);
    }
}
