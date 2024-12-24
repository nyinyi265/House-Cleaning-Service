<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\booking;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    //
    // public function index(){
    //     return view('user.servicedetail');
    // }

    public function displayService($id){
        $services = service::findOrFail($id);
        return view('user.servicedetail', compact('services'));
    }
}
