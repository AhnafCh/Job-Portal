<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    public function show()
    {
        return view('contacts.show');
    }
    public function submit(ContactRequest $request)
    {
        Mail::to('jobportal@gmail.com')->send(new ContactMail($request->name, $request->email, $request->uSubject, $request->content));
        return redirect()->route('contact.show');
    }
}
