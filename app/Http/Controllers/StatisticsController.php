<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobCircular;

class StatisticsController extends Controller
{
    public function index()
    {
        $totalJobSeekers = User::where('user_type', 'seeker')->count();
        $totalEmployers = User::where('user_type', 'employer')->count();
        $totalCirculars = JobCircular::count();

        return view('statistics.index', compact('totalJobSeekers', 'totalEmployers', 'totalCirculars'));
    }
}
