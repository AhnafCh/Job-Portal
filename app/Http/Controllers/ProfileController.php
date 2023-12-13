<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function show($email)
    {
        $seeker = User::where('email',$email)->first();
        if (!$seeker) {

            return abort(404);
        }
        $affectedRows = User::where('email', $email)->update([
            'views' => ($seeker->views + 1),
        ]);

        return view('applicant.show', compact('seeker'));
    }
    public function list()
    {
        $emp = auth()->user();
        $applicants = Applicant::where('employerEmail', $emp->id)
        ->get();
        return view('applicant.list', compact('applicants'));
    }
}
