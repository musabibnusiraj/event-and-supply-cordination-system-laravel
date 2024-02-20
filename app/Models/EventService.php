<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventService extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'service_id',
        'budget_range_start',
        'budget_range_end',
        'quantity',
        'note',
        'document',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function quotations()
    {
        return $this->hasMany(EventServiceSupplierQuote::class);
    }
}
