<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventPublisher;
use App\Models\EventService;
use App\Models\EventServiceSupplierQuote;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['events'] = Event::where('status', 'published')->whereHas('eventServices')->orderBy('id', 'desc')->get();

        return view('supplier.events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function publisherInfo($id)
    {
        $event_publisher = EventPublisher::find($id);

        $countries = Countries::all();
        $data['countries'] = $countries;
        $data['event_publisher'] = $event_publisher;

        return view('supplier.events.publisher_info', $data);
    }
}
