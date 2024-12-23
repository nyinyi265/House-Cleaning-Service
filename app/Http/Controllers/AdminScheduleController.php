<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\employee;
use App\Models\position;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminScheduleController extends Controller
{
    //
    public function index()
    {
        $employees = employee::all();
        $bookings = booking::with('employees')->get();
        $positions = position::all();
        $schedules = booking::has('employees')->get();
        $scheduleEdit = null;
        return view('admin.schedule', compact('employees', 'bookings', 'positions', 'schedules', 'scheduleEdit'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required', 'date'],
            'bookings' => ['required', 'exists:bookings,id'],
            'employees' => ['required', 'array'],
            'employees.*' => ['exists:employees,id'],
        ]);

        foreach ($validated['employees'] as $employeeId) {
            Schedule::create([
                'date' => $validated['date'],
                'booking_id' => $validated['bookings'],
                'employee_id' => $employeeId,
            ]);
        }

        $book_id = booking::find($validated['bookings']);

        if ($book_id) {
            $book_id->status = 'scheduled';
            $book_id->save();
        }

        return redirect()->route('admin-schedule');
    }

    public function destroy($id)
    {
        $booking = booking::findOrFail($id);

        if ($booking->id) {
            $booking->status = 'pending';
            $booking->save();
        }

        $booking->employees()->detach();

        Schedule::where('booking_id', $id)->delete();

        return redirect()->route('admin-schedule');
    }

    public function edit(Request $request, $id)
    {

        $scheduleEdit = booking::with('employees')->findOrFail($id);
        if (!$scheduleEdit) {
            return redirect()->route('admin-schedule')->with('failed', 'Schedule edit not found');
        }

        $employees = employee::all();
        $bookings = booking::with('employees')->get();
        $positions = position::all();
        $schedules = booking::has('employees')->get();

        $scheduleDate = $scheduleEdit->employees->first()->pivot->date;

        return view('admin.schedule', compact('employees', 'bookings', 'positions', 'schedules', 'scheduleEdit', 'scheduleDate'));
    }

    public function update(Request $request, $id)
    {
        $scheduleUpd = booking::findOrFail($id);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'book' => ['required', 'exists:bookings,id'],
            'employees' => ['required', 'array'],
            'employees.*' => ['exists:employees,id'],
        ]);

        $empPivotData = [];

        foreach ($validated['employees'] as $employeeId) {
            $empPivotData[$employeeId] = [
                'date' => $validated['date'],
                'booking_id' => $validated['book'],
            ];
        }

        $scheduleUpd->employees()->sync($empPivotData);

        return redirect()->route('admin-schedule')->with('success', 'schedule has been updated');
    }
}
