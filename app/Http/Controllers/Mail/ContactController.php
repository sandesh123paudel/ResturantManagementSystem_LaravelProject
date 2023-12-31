<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:10|min:10',
            'message' => 'required|string',
        ]);
        // Collect the data
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];
        
        Mail::to('sandypoudel24@gmail.com')->send(new ContactFormMail($data));
        
    
        return back()->with('message_sent','Your Message Has Been Sent Successfully');


    }
    
}
