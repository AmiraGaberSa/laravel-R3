<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class ContactUsController extends Controller {


    public function contact(){
        return view('contact');
    }

    
    public function postContact(Request $request){

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
            ]);

        $maildata = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            ];
        Mail::to('amira@example.com')->send(new ContactMail($maildata),
        );

       return redirect()->route('contact')->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}

