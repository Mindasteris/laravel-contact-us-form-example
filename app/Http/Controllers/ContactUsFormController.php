<?php

namespace App\Http\Controllers;
// Import Model Contact
use App\Models\Contact;
use Illuminate\Http\Request;
// Use Mail
use Illuminate\Support\Facades\Mail;

class ContactUsFormController extends Controller
{
    // Sukurti kontaktų formos vaizdą
    public function createForm(Request $request) {
        return view('contact');
    }

    // Įrašyti duomenis į duomenų bazę
    public function contactUsForm(Request $request) {
        // Formos tikrinimas (validacija)
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Įrašyti duomenis į duomenų bazę
        Contact::create($request->all());

        // Siųsti el. paštą
        Mail::send('mail_template', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), 
        function($message) use ($request){
            $message->from($request->email);
            $message->to('mminde41@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        // Išsiuntimo pranešimas, kai forma užpildyta teisingai
        return back()->with('success', 'We have received your message and would like to thank you for contacting us.');
    }
}