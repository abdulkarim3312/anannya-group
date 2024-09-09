<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Gallery;
use App\Models\Team;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ClientController extends Controller{
    public function index() {
        $clients = Client::all();
        return view('administrator.client.all', compact('clients'));
    }

    public function add() {
        return view('administrator.client.add');
    }

    public function addPost(Request $request) {
        //dd('Hasan');
        $request->validate([
            'product_id' => 'required',
            'image' => 'required|file',
            'status' => 'required'
        ]);

        $client = new Client();
        $client->product_id = $request->product_id;
        if ($request->image){
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/client';
            $file->move($destinationPath, $filename);
            $path = 'uploads/client/' . $filename;
            $client->image = $path;
        }
        $client->status = $request->status;
        $client->save();

        return redirect()->route('client')->with('message', 'Client add successfully.');
    }

    public function edit(Client $client) {
        return view('administrator.client.edit', compact('client'));
    }

    public function editPost(Client $client, Request $request) {
        $request->validate([
            'product_id' => 'required',
            'image' => 'nullable|file',
            'status' => 'required'
        ]);

        $client->product_id = $request->product_id;
        //dd($request->file('image'));
        if ($request->image){
            // Upload Image
            if (file_exists($client->image)){
                unlink($client->image);
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/client';
            $file->move($destinationPath, $filename);
            $path = 'uploads/client/' . $filename;
            $client->image = $path;
        }
        $client->status = $request->status;
        $client->save();

        return redirect()->route('client')->with('message', 'Client edit successfully.');
    }
}
