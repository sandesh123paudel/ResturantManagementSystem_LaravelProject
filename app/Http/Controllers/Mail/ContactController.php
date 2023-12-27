<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'e-mail' => 'required|email',
            'phone' => 'required|string',
            'text' => 'required|string',
        ]);
    
        // Collect the data
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('e-mail'),
            'phone' => $request->input('phone'),
            'message' => $request->input('text'),
        ];
        
        Mail::to('sandypoudel24@gmail.com')->send(new ContactFormMail($data));
        
    
        // You can add a success message or redirect to a thank you page
        return response()->json(['success' => true]);


    }
    
}
