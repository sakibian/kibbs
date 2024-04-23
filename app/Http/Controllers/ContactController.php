<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class ContactController extends Controller
{
    public function index() {
       return view('contact');
    }

    public function store(Request $request){
        $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|email',
                        'description' => 'required'
                ]);


        Mail::send('emails.contact', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'description' => $request->get('description') ],
                function ($message) use ($request) {
                        $message->from($request->email);
                        $message->to('kibbs.co@gmail.com', 'Kibbs')
                        ->subject('Contact email from kibbs.co.uk');
        });
        
        
        return redirect()->back()->with('status', 'Thanks for contacting Kibbs, We will get back to you soon!');

    }
}
