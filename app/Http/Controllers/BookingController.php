<?php

namespace App\Http\Controllers;
use App\Models\booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //
    public function store(Request $request){
        $validated = $request->validate([
            'serviceid' => ['required'],
            'book_date' => ['required', 'date'],
        ]);

        $user_id = Auth::id();

        $booking = booking::create([
            'date' => $validated['book_date'],
            'u_id' => $user_id,
            'service_id' => $validated['serviceid'],
        ]);

        // $booking->load('service');

        return redirect()->route('service')->with(['success' => 'Thank You for Booking Our Service', 'booking' => ['date' => $booking->date, 'service' => $booking->service->service_name, 'price' => $booking->service->cost]]); 
    }
}
