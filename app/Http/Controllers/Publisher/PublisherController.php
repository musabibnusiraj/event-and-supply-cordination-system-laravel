<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\EventPublisher;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class PublisherController extends Controller
{
    public function save(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'organization' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'user_id' => 'required'
        ];

        // Validate the request
        $validatedData = $request->validate($rules);

        if (isset($request->event_publisher_id)) {
            // Update the event
            EventPublisher::where('id', $request->event_publisher_id)->update($validatedData);
        } else {
            $eventPublisher = new EventPublisher();
            $eventPublisher->fill($validatedData);
            $eventPublisher->save();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Info updated successfully');
    }

    public function show()
    {
        $authuser = auth()->user();
        $event_publisher = EventPublisher::where('user_id', $authuser->id)->latest()->first();

        $countries = Countries::all();
        $data['countries'] = $countries;
        $data['event_publisher'] = $event_publisher;

        return view('publisher.profile', $data);
    }
}
