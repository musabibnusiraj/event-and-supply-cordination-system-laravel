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
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
        ];

        // Custom validation messages
        $messages = [
            'end_datetime.after' => 'End datetime must be after start datetime.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        $user_id  = auth()->user()->id;
        $event_publisher_id = auth()->user()->eventPublisher->id;

        $validatedData['user_id'] = $user_id;
        $validatedData['event_publisher_id'] = $event_publisher_id;

        $event = new Event();
        $event->fill($validatedData);
        $event->save();

        // Redirect back with a success message
        return redirect()->route('publisher.events.index')->with('success', 'Event created successfully');
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
        $event = Event::findOrFail($id);
        return view('publisher.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
            'status' => 'nullable',
        ];

        // Custom validation messages
        $messages = [
            'end_datetime.after' => 'End datetime must be after start datetime.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        // Update the event
        Event::where('id', $id)->update($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the event by ID or throw a 404 error if not found
        $event = Event::findOrFail($id);

        // Delete the event
        $event->delete();

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('success', 'Event deleted successfully');
    }
}
