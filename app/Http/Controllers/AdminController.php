<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function displayUser()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'admin-name' => ['required', 'string'],
            'admin-email' => ['required', 'email'],
            'admin-password' => ['required', 'string'],
            'phone-number' => ['required', 'string'],
            'admin-address' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $validated['admin-name'],
            'email' => $validated['admin-email'],
            'password' => Hash::make($validated['admin-password']),
            'phone' => $validated['phone-number'],
            'address' => $validated['admin-address'],
            'user_role' => 'admin',
        ]);

        return redirect()->route('admin-user');
    }
}
