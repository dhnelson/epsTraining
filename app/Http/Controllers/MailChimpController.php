<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EmailSubscribersFormRequest;
use App\Http\Requests\SubscribeFormRequest;
use App\Subscribe;

class MailChimpController extends Controller
{
    protected $mailchimp;

    protected $listId = '6a55d5c8d6';

    public function __construct(\Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    public function emailSubscribers() 
    {
        return view('contact.emailSubscribers');
    }

    public function subscribe(SubscribeFormRequest $request)
    {
    	Subscribe::create($request->all());

        try {
            $this->mailchimp
            ->lists
            ->subscribe(
                $this->listId,
                ['email' => $request->input('email')] );

        } 
        	catch (\Mailchimp_List_AlreadySubscribed $e) {

        	flash()->overlay('Error!', 'Email is Already Subscribed', $level = 'error');

            return redirect()->back();
        } 
        	catch (\Mailchimp_Error $e) {

        	flash()->overlay('Error!', 'Error from MailChimp', $level = 'error');

            return redirect()->back();
        }

        flash()->overlay('Thanks for Subscribing!', 'You have been sent a confirmation email');

        return redirect()->route('blog.index');
    }

    public function emailSubscribersForm(EmailSubscribersFormRequest $request)
    {
        try {
	        $options = [

	        'list_id'   => $this->listId,

	        'subject' => $request->input('subject'),

	        'from_email' => 'ray@traineps.com',

	        'from_name' => $request->input('from_name'),
	        
	        ];

	        $content = [

	        'html' => $request->input('message'),

	        'text' => strip_tags($request->input('message')),

	        ];

	        $campaign = $this->mailchimp->campaigns->create('regular', $options, $content);

	        $this->mailchimp->campaigns->send($campaign['id']);

        	flash()->success('Thanks!', 'Your Message Was Sent Successfully');

        	return redirect()->route('posts.index');

        } catch (Exception $e) {

        	flash()->overlay('Error!', 'Error from MailChimp', $level = 'error');

            return redirect()->back();
        }
    }
}
