<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\position;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class JobController extends Controller
{
    //
    public function jobPost()
    {
        $jobs = employee::all();
        $positions = position::all();
        if (auth()->user()->user_role === 'admin') {
            return view('admin.jobapplication', compact('positions', 'jobs'));
        } else {
            return view('user.jobposition', compact('positions'));
        }
    }

    public function jobRequirement(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'id' => 'required|exists:positions,id',
            'job-requirement' => 'required|integer|min:1',
        ]);

        // Find the position and update the job requirements
        $position = position::findOrFail($validated['id']);
        $position->update([
            'job_requirements' => $validated['job-requirement'],
        ]);

        // Redirect to the admin page with a success message
        return redirect()->route('admin-job')->with('success', 'Job requirements updated successfully!');
    }

    public function jobApplication(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'position' => 'required|exists:positions,id',
        ]);

        if($request->hasFile('resume')){
            $resume = $request->file('resume');
            $resumeName = time() . '_' . $resume->getClientOriginalName();
            $resume->move(public_path('resumes'), $resumeName);

            employee::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'application_form' => 'resumes/'. $resumeName,
                'position_id' => $validated['position'],
            ]);
        }

        position::where('id', $validated['position'])->decrement('job_requirements');        

        return redirect()->route('position')->with('success', 'Job application submitted successfully!');
    }

    public function jobPromote($id){
        $promote = employee::findOrFail($id);

        $promote->status = 'promoted';
        $promote->save();

        return redirect()->route('admin-job');
    }

    public function jobReject($id){
        $reject = employee::findOrFail($id);

        $reject->status = 'rejected';
        $reject->save();

        return redirect()->route('admin-job');
    }
}
