<?php

namespace App\Http\Controllers;

use App\Models\EventPublisher;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;
use stdClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authuser = Auth::user();
        $role = $authuser->roles->first();
        $countries = Countries::all();
        $data['countries'] = $countries;

        if (isset($role)) {
            if ($role->name == 'Publisher') {
                $event_publisher = EventPublisher::where('user_id', $authuser->id)->first();
                if ($event_publisher == null)
                    return view('publisher.profile', $data);


                $suppliers = Supplier::where('status', 'public')->get();
                return view('publisher.home', compact('suppliers'));
            } elseif ($role->name == 'Supplier') {
                $supplier = Supplier::where('user_id', $authuser->id)->first();
                if ($supplier == null)
                    return view('supplier.profile', $data);

                return view('supplier.home');
            }
        }

        return view('home');
    }

    public function welcome()
    {
        if (Auth::check()) {
            // User is logged in, redirect to the home page
            return redirect()->route('home');
        } else {
            // User is not logged in, show the welcome page
            return view('welcome');
        }
    }
}
