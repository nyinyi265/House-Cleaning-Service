<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\position;
use Illuminate\Http\Request;

class AdminEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $positions = position::all();
        $employees = employee::with('position')->get();
        return view('admin.employee', compact('positions', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'employee-name' => ['required', 'string'],
            'employee-email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'employee-phone' => ['required', 'numeric'],
            'employee-address' => ['required', 'string'],
            'employee-position' => ['required', 'exists:positions,id'],
        ]);

        $employee = employee::create([
            'name' => $request->input('employee-name'),
            'phone' => $request->input('employee-phone'),
            'email' => $request->input('employee-email'),
            'address' => $request->input('employee-address'),
            'position_id' => $request->input('employee-position')
        ]);

        return redirect()->route('admin-employee');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $positions = position::all();
        $employees = employee::with('position')->get();
        $empEdit = employee::find($id);
        return view('admin.employee', compact('positions', 'employees', 'empEdit')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employeeUpd = employee::findOrFail($id);

        $validated = $request->validate([
            'employee-name' => ['required', 'string'],
            'employee-email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'employee-phone' => ['required', 'numeric'],
            'employee-address' => ['required', 'string'],
            'employee-position' => ['required', 'exists:positions,id'],
        ]);

        $employeeUpd->update([
            'name' => $validated['employee-name'],
            'email' => $validated['employee-email'],
            'phone' => $validated['employee-phone'],
            'address' => $validated['employee-address'],
            'position_id' => $validated['employee-position']
        ]);

        return redirect()->route('admin-employee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $del = employee::findOrFail($id);
        if($del){
            $del->delete();
            return redirect()->route('admin-employee');
        }
    }
}
