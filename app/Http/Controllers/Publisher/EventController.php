<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['events'] = Event::all();

        return view('publisher.events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // "description" => "required",
            // "address" => "required",
            // "city" => "required",
            // "country" => "Sri Lanka",
            // "start_datetime" => "2021-06-18T12:30",
            // "end_datetime" => "2021-06-18T12:30"
        ]);

        Event::create([
            "name" => $request->name,
            "description" => $request->description,
            "address" => $request->address,
            "city" => $request->city,
            "country" => $request->country,
            "start_datetime" => $request->start_datetime,
            "end_datetime" => $request->end_datetime,
            "user_id" => 1,
            "event_publisher_id" => 1
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = [];
        return view('publisher.events.edit', compact('event'));
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
}
