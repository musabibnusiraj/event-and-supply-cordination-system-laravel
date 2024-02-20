<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPublisher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'organization', 'phone', 'phone_2', 'address', 'country', 'city', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
