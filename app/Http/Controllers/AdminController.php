<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function displayUser(){
        $users = User::all();
        return view('admin.user', compact('users'));
    }
}
