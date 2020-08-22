<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use App\Models\Admin\Message;
use App\Models\Admin\Social;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving a model
        $contact = Contact::first();
        $socials = Social::where('status', 1)->get();

        return view('frontend.contact.index', compact('contact', 'socials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name'   =>  'required|max:255',
            'email'   =>  'required|max:255',
            'subject'   =>  'required|max:255',
            'message'   =>  'required|max:500',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Message::firstOrCreate([
            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ]);

        return redirect()->route('contact.index')
            ->with('success','frontend.your_message_has_been_delivered');
    }

}
