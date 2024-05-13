<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Models\EventService;
use App\Models\EventServiceSupplierQuote;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class EventServiceQuoteController extends Controller
{
    public function index($eventServiceId)
    {
        $data['event_service_quotes'] = EventServiceSupplierQuote::where('event_service_id', $eventServiceId)->get();
        $data['event_service'] = EventService::find($eventServiceId);
        $data['awarded'] = EventServiceSupplierQuote::where('event_service_id', $eventServiceId)->where('awarded', 1)->count();

        return view('publisher.event_service_quotes.index', $data);
    }

    public function award($id)
    {
        // Find the EventServiceSupplierQuote by ID
        $eventServiceQuote = EventServiceSupplierQuote::find($id);

        // Check if the quote exists
        if ($eventServiceQuote) {
            // Update the awarded field to 1
            $eventServiceQuote->update(['awarded' => 1]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Quote has been awarded successfully.');
        } else {
            // Redirect back with an error message if the quote is not found
            return redirect()->back()->with('error', 'Quote not found.');
        }
    }

    public function cancel($id)
    {
        // Find the EventServiceSupplierQuote by ID
        $eventServiceQuote = EventServiceSupplierQuote::find($id);

        // Check if the quote exists
        if ($eventServiceQuote) {
            // Update the awarded field to 1
            $eventServiceQuote->update(['awarded' => 2]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Quote has been canceled successfully.');
        } else {
            // Redirect back with an error message if the quote is not found
            return redirect()->back()->with('error', 'Quote not found.');
        }
    }

    public function completed($id)
    {
        // Find the EventServiceSupplierQuote by ID
        $eventServiceQuote = EventServiceSupplierQuote::find($id);

        // Check if the quote exists
        if ($eventServiceQuote) {
            // Update the awarded field to 1
            $eventServiceQuote->update(['awarded' => 3]);
            $eventServiceQuote->eventService->update(['status' => 'completed']);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Quote has been completed successfully.');
        } else {
            // Redirect back with an error message if the quote is not found
            return redirect()->back()->with('error', 'Quote not found.');
        }
    }

    public function supplier($id)
    {
        $supplier = Supplier::find($id);

        $countries = Countries::all();
        $data['countries'] = $countries;
        $data['supplier'] = $supplier;

        return view('publisher.event_service_quotes.supplier_info', $data);
    }
}
