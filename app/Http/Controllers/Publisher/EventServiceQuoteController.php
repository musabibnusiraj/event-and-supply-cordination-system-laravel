<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\EventService;
use App\Models\EventServiceSupplierQuote;
use Illuminate\Http\Request;

class EventServiceQuoteController extends Controller
{
    public function index($eventServiceId)
    {
        $data['event_service_quotes'] = EventServiceSupplierQuote::where('event_service_id', $eventServiceId)->get();
        $data['event_service'] = EventService::find($eventServiceId);

        return view('publisher.event_service_quotes.index', $data);
    }
}
