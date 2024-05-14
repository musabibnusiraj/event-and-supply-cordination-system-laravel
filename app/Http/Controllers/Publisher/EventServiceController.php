<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventService;
use App\Models\Service;
use Illuminate\Http\Request;

class EventServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($eventId)
    {
        $data['event_services'] = EventService::where('event_id', $eventId)->get();
        $data['event'] = Event::find($eventId);

        return view('publisher.event_services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $eventId)
    {
        $data['event_id'] = $eventId;
        $data['services'] = Service::all();

        return view('publisher.event_services.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data including file
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'service_id' => 'required|exists:services,id',
            'budget_range_start' => 'required|numeric',
            'budget_range_end' => 'required|numeric|gte:budget_range_start',
            'quantity' => 'required|integer',
            'note' => 'nullable|string|max:256',
            'title' => 'required',
            'status' => 'nullable'
            // 'document' => 'nullable|file|max:2048', // Assuming max file size is 2MB
        ], [
            'budget_range_end.gte' => 'The end budget must be equal to or greater than the start budget.',
        ]);

        $event_id = $request->event_id;

        // // Check if file is uploaded
        // if ($request->hasFile('document')) {
        //     // Store the file
        //     $file = $request->file('document');
        //     $path = $file->store('documents'); // 'documents' is the directory where files will be stored
        //     $validatedData['document'] = $path;
        // }

        // Create a new EventService instance and assign the validated data
        $eventService = new EventService();
        $eventService->fill($validatedData);

        // Save the EventService instance to the database
        $eventService->save();

        // Redirect back with a success message
        return redirect()->route('publisher.event.services.index', $event_id)->with('success', 'Event service created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['services'] = Service::all();
        $data['event_service'] = EventService::find($id);

        return view('publisher.event_services.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'service_id' => 'required|exists:services,id',
            'budget_range_start' => 'required|numeric',
            'budget_range_end' => 'required|numeric|gte:budget_range_start',
            'quantity' => 'required|integer',
            'note' => 'nullable|string|max:256',
            'status' => 'nullable',
            'title' => 'required'
            // 'document' => 'nullable|file|max:2048', // Assuming max file size is 2MB
        ], [
            'budget_range_end.gte' => 'The end budget must be equal to or greater than the start budget.',
        ]);

        // Find the EventService instance by ID
        $eventService = EventService::findOrFail($id);

        // Update the properties of the EventService instance
        $eventService->fill($validatedData);

        // Save the changes to the database
        $eventService->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Event service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the event by ID or throw a 404 error if not found
        $eventService = EventService::findOrFail($id);

        // Delete the event
        $eventService->delete();

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('success', 'Event service deleted successfully');
    }
}
