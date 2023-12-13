<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function employerProfile()
    
    {
        return view('employer.profile');
    } 
    
    public function editShow()
    {
        return view('employer.edit');
    }
}
