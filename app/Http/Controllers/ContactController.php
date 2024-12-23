<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        return view('user.contactus');
    }

    public function store(Request $request){

        $customer_id = auth()->user()->id;
        $validated = $request->validate([
            'message' => ['required', 'string'],
            'questions' => ['required', 'string']
        ]);

        $feedback = Feedback::create([
            'customer_id' =>$customer_id,
            'message' => $validated['message'],
            'inquery_type' => $validated['questions']
        ]);

        return redirect()->route('contactus');
    }

    public function displayFeedback(){
        $feedbacks = Feedback::all();
        return view('admin.feedback', compact('feedbacks'));
    }
}
