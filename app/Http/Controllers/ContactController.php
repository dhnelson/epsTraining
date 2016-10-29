<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;
use App\Contact;
use Mail;
use Purifier;


class ContactController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Blog Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the
    | 
    | 
    |
    */

	public function contact() {

    	return view('contact.contact');
    }

    public function ContactForm(ContactFormRequest $request){

        Contact::create($request->all());

        $data = [
        	'name' 	  	  => $request->name,
        	'email'   	  => $request->email,
        	'subject' 	  => $request->subject,
        	'bodyMessage' => $request->message
        ];

        mail::send('contact.contactEmail', $data, function($message) use ($data) {
        		$message->from($data['email']);
        		$message->to('dustinhnelson@gmail.com');
        		$message->subject($data['subject']);
        });

        flash()->success('Thanks!', 'Your Message Was Sent Successfully');

        return redirect()->route('home');
    }

} 
