<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\employee;
use App\Models\User;

class AdminHomeController extends Controller
{
    //
    public function index(){
        $revenue = booking::join('services', 'bookings.service_id' , '=', 'services.id')->sum('services.cost');
        $customer = User::where('user_role', 'user')->count();
        $booking = booking::all();
        $employee = employee::count();
        return view('admin.home', compact('revenue', 'customer', 'booking', 'employee'));
    }
}
