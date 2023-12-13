<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Circular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $circulars = DB::select('select * from circular');
        $circulars = Circular::with('company')->get();
        return view('dashboard', ['circulars' => $circulars]);
    }

    public function verify()
    {
        return view('user.verify');
    }

    public function apply()
    {
        $cid = request('circularid');
        $comid = request('companyid');
        // $compEmail = DB::select('select companyid from circulars where id = ?', [request('circularid')]);
        Applicant::create([
            'circularID' => $cid,
            'seekerID' => auth()->user()->email,
            'employerEmail' => $comid,
        ]);
        return redirect()->route('dashboard');
    }

}
