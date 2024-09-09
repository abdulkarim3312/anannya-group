<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Team;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TeamController extends Controller{
    public function index() {
        $teams = Team::all();
        return view('administrator.team.all', compact('teams'));
    }

    public function add() {
        return view('administrator.team.add');
    }

    public function addPost(Request $request) {
        //dd('Hasan');
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'short_bio' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'whats_app_link' => 'nullable|string|max:255',
            'we_chat_link' => 'nullable|string|max:255',
            'status' => 'required'
        ]);

        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->short_bio = $request->short_bio;
        $team->phone = $request->phone;
        $team->whats_app_link = $request->whats_app_link;
        $team->we_chat_link = $request->we_chat_link;
        if ($request->image){
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/team';
            $file->move($destinationPath, $filename);
            $path = 'uploads/team/' . $filename;
            $team->image = $path;
        }
        $team->status = $request->status;
        $team->save();

        return redirect()->route('team')->with('message', 'Team add successfully.');
    }

    public function edit(Team $team) {
        return view('administrator.team.edit', compact('team'));
    }

    public function editPost(Team $team, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'short_bio' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'whats_app_link' => 'nullable|string|max:255',
            'we_chat_link' => 'nullable|string|max:255',
            'status' => 'required'
        ]);

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->short_bio = $request->short_bio;
        $team->phone = $request->phone;
        $team->whats_app_link = $request->whats_app_link;
        $team->we_chat_link = $request->we_chat_link;
        //dd($request->file('image'));
        if ($request->image){
            // Upload Image
            if (file_exists($team->image)){
                unlink($team->image);
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/team';
            $file->move($destinationPath, $filename);
            $path = 'uploads/team/' . $filename;
            $team->image = $path;
        }
        $team->status = $request->status;
        $team->save();

        return redirect()->route('team')->with('message', 'Team edit successfully.');
    }
}
