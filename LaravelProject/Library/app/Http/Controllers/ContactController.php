<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        Mail::to('mikoyae828@gmail.com')->send(
            new ContactMail(
                $validated['name'],
                $validated['email'],
                $validated['subject'],
                $validated['message']
            )
        );

        return back()->with('success', 'Your message has been sent successfully.');
    }
}