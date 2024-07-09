<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::latest()->get();
        return view('administrator.message.all', compact('messages'));
    }

    public function add() {
        return view('administrator.message.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:25',
            'message' => 'nullable|string|max:1000',
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->number = $request->number;
        $message->message = $request->message;
        $message->save();

        return redirect()->back()->with('message', 'Message sent successfully.');
    }
}
