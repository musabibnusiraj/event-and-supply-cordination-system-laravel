<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Mail\SimpleMail;
use App\Models\EventService;
use App\Models\EventServiceSupplierQuote;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PragmaRX\Countries\Package\Countries;

class EventServiceQuoteController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'event_service_id' => 'required|exists:event_services,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'budget_range_start' => 'nullable|numeric',
            'budget_range_end' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'note' => 'nullable|string'
        ]);

        // Create a new EventServiceSupplierQuote instance
        $quote = new EventServiceSupplierQuote();
        $quote->fill($validatedData);
        $quote->save();

        $title = $quote->eventService->title;
        $id = $quote->eventService->id;

        $quote->eventService->title;
        $supplier = $quote->supplier;

        $messageContent = 'Event Service Id:' . $id . '<br>Event Service Title: ' . $title . ' <br><br>  Event service quote has been created! <br><br> Supplier ID: ' . $supplier->id . ' <br> Supplier Name: ' . $supplier->name;

        $publisherEmail = $quote->eventService->event->eventPublisher->email;
        Mail::to($publisherEmail)->send(new SimpleMail($messageContent));

        // Redirect back with a success message
        return redirect()->route('supplier.event.service.quotes.index', $request->event_service_id)->with('success', 'Quote created successfully');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'budget_range_start' => 'nullable|numeric',
            'budget_range_end' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'note' => 'nullable|string'
        ]);

        // Find the quote by ID
        $quote = EventServiceSupplierQuote::findOrFail($id);

        // Update the quote with validated data
        $quote->fill($validatedData);
        $quote->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Quote updated successfully');
    }

    public function index($eventServiceId)
    {
        $auth_user_id = auth()->user()->id;
        $data['event_service_quotes'] = EventServiceSupplierQuote::where('event_service_id', $eventServiceId)->get();
        $data['event_service'] = EventService::find($eventServiceId);
        $data['awarded'] = EventServiceSupplierQuote::where('event_service_id', $eventServiceId)->where('awarded', 1)->count();
        $data['event_service_quote'] = EventServiceSupplierQuote::where('event_service_id', $eventServiceId)->where('user_id', $auth_user_id)->first();


        return view('supplier.event_service_quotes.index', $data);
    }

    public function supplier($id)
    {
        $supplier = Supplier::find($id);

        $countries = Countries::all();
        $data['countries'] = $countries;
        $data['supplier'] = $supplier;

        return view('supplier.event_service_quotes.supplier_info', $data);
    }

    public function create($eventServiceId)
    {
        $authUser = auth()->user();
        $userId = $authUser->id;
        $supplierId = $authUser->supplier->id;

        $data['event_service'] = EventService::find($eventServiceId);
        if (!isset($data['event_service']))  abort(404);

        $data['supplier_id']  = $supplierId;
        $data['user_id']  = $userId;
        $data['event_service_id']  = $eventServiceId;
        $data['event_-id'] = $data['event_service']->event->id;

        return view('supplier.event_service_quotes.create', $data);
    }

    public function edit($id)
    {
        $eventServiceSupplierQuote = EventServiceSupplierQuote::find($id);
        $data['event_service_quote'] = $eventServiceSupplierQuote;
        if (!isset($data['event_service_quote']))  abort(404);

        $data['event_service'] = $eventServiceSupplierQuote->eventService;
        if (!isset($data['event_service']))  abort(404);

        return view('supplier.event_service_quotes.edit', $data);
    }
}
