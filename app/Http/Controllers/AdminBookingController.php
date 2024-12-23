<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    //
    public function displayBooking(){
        $bookings = booking::with('service', 'user')->get();

        $status = $bookings->where('status', 'finished');

        if($status === 'finished'){
            return view('admin.finishedbooking', compact('bookings'));
        }
        return view('admin.booking', compact('bookings'));
    }

    public function destroy($id){
        $del = booking::findOrFail($id);
        $del->delete();
        return redirect()->route('admin-booking');
    }

    public function changeStatus($id){
        $booking = booking::findOrFail($id);
        $booking->status = 'finished';
        $booking->save();
        return redirect()->route('admin-booking');
    }
}