<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class SupplierController extends Controller
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
            Supplier::where('id', $request->event_publisher_id)->update($validatedData);
        } else {
            $Supplier = new Supplier();
            $Supplier->fill($validatedData);
            $Supplier->save();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Info updated successfully');
    }

    public function show()
    {
        $authuser = auth()->user();
        $supplier = Supplier::where('user_id', $authuser->id)->latest()->first();

        $countries = Countries::all();
        $data['countries'] = $countries;
        $data['supplier'] = $supplier;

        return view('supplier.profile', $data);
    }
}
