<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function show()
    {
        // dd("here at job seeker controller");
        return view('job_seeker.show');
    }

    public function updateCV(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = $request->file('cv')->store('cv');

        Auth::user()->update(['cv_path' => $cvPath]);

        return redirect()->route('job_seeker')->with('success', 'CV updated successfully.');
    }
}
