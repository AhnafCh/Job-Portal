<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobCircular;
use Illuminate\Support\Facades\Artisan;

class JobCircularController extends Controller
{
    public function index()
    {
    
        $jobCirculars = JobCircular::where('employer_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('employer.job_circular.index', compact('jobCirculars'));
    }

    public function create()
    {
        return view('employer.job_circular.create');
    }

    public function store(Request $request)
    {   
        // Validation and saving logic

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $jobCircular = new JobCircular([
            'employer_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
        ]);

        $jobCircular->save();

        // Schedule task to delete expired job circulars
        Artisan::call('schedule:run');

        return redirect()->route('employer.job_circular.index')->with('success', 'Job circular created successfully.');
    }

    public function edit(JobCircular $jobCircular)
    {
        return view('employer.job_circular.edit', compact('jobCircular'));
    }

    public function update(Request $request, JobCircular $jobCircular)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $jobCircular->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
        ]);

        return redirect()->route('employer.job_circular.index')->with('success', 'Job circular updated successfully.');
    }

    public function download(JobCircular $jobCircular)
    {
        $file = storage_path('app\\circulars\\' . $jobCircular->id . '.pdf');

        return response()->download($file, 'JobCircular.pdf');
    }

    public function destroy(JobCircular $jobCircular)
    {
        $jobCircular->delete();

        return redirect()->route('employer.job_circular.index')->with('success', 'Job circular deleted successfully.');
    }


}