<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.index');
    }


    // Store message
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Save to DB
        $message = ContactMessage::create($request->all());

        // Send Email to Admin
        Mail::raw(
            "Name: {$request->name}\nEmail: {$request->email}\nPhone: {$request->phone}\n\nMessage:\n{$request->message}",
            function ($mail) use ($request) {
                $mail->to('venture.purushottam@gmail.com')
                    ->subject('New Contact Message');
            }
        );

        return back()->with('success', 'Message sent successfully!');
    }

    // Admin inbox
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    // View single message
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['status' => 'Read']);

        return view('admin.messages.view', compact('message'));
    }
}
