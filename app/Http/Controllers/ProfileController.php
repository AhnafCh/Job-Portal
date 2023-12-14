<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show($email){
        $profile = Profile::where('email', $email)->first();

        if (!$profile) {
            
            abort(404);
        }

        return view('products.home', ['profile' => $profile]);
    }

    public function change(Profile $profile){
        
        return view('products.change',['profile' => $profile]);
    }

    public function update(Profile $profile, Request $request)
{
    $data = $request->validate([
        'email' => 'required|email|unique:profiles,email,' . $profile->id,
        'name' => 'nullable|string',
        'phone' => 'nullable|integer',
        'mobile' => 'nullable|integer',
        'address' => 'nullable|string',
        'web' => 'nullable|string',
        'git' => 'nullable|string',
        'fab' => 'nullable|string',
    ]);

    $profile->update($data);

    return redirect(route('profiles.show', ['email' => $data['email']]))->with('success', 'Profile Updated Successfully');

}

public function dpshow($email)
    {
        $profile = Profile::where('email', $email)->first();

        if (!$profile) {
            abort(404);
        }

        return view('profiles.show', ['profile' => $profile]);
    }

    public function uploadImage(Request $request, $email)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $profile = Profile::updateOrCreate(
            ['email' => $email],
            ['dp' => $imagePath]
        );

        return redirect(route('profiles.show', ['email' => $profile->email]))
            ->with('success', 'Image Uploaded Successfully');
    }

        // app/Http/Controllers/ProfileController.php
    public function updateSkills(Profile $profile, Request $request)
    {
        $data = $request->validate([
            'skills' => 'nullable|string',
        ]);

        $skillsArray = explode(', ', $data['skills']);
        $profile->update(['skills' => $skillsArray]);

        return redirect(route('profiles.show', ['email' => $profile->email]))
            ->with('success', 'Skills Updated Successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Profile::where('skills', 'LIKE', '%' . $query . '%')->get();
    
        return view('search.results', compact('results', 'query'));
    }


    

    
    public function index(Request $request)
{
    $filter = $request->input('filter');
    $records = Profile::query(); // Use query() instead of all()

    if ($filter) {
        $records->where('skills', 'LIKE', '%' . $filter . '%');
    }

    $records = $records->get();

    $allSkills = Profile::distinct()->pluck('skills')->filter()->flatten();

    return view('search.index', compact('records', 'allSkills')); // Pass 'allSkills' to the view
}

}
