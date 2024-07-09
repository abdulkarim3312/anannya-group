<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CertificateController extends Controller{
    public function index() {
        $certificates = Certificate::all();
        return view('administrator.certificate.all', compact('certificates'));
    }

    public function add() {
        return view('administrator.certificate.add');
    }

    public function addPost(Request $request) {
        //dd('Hasan');
        $request->validate([
            'image' => 'required|file',
            'status' => 'required'
        ]);

        $certificate = new Certificate();
        if ($request->image){
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/certificate';
            $file->move($destinationPath, $filename);
            $path = 'uploads/certificate/' . $filename;
            $certificate->image = $path;
        }
        $certificate->status = $request->status;
        $certificate->save();

        return redirect()->route('certificate')->with('message', 'Certificate add successfully.');
    }

    public function edit(Certificate $certificate) {
        return view('administrator.certificate.edit', compact('certificate'));
    }

    public function editPost(Certificate $certificate, Request $request) {
        $request->validate([
            'image' => 'nullable|file',
            'status' => 'required'
        ]);


        if ($request->image){
            // Upload Image
            if (file_exists($certificate->image)){
                unlink($certificate->image);
            }

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/certificate';
            $file->move($destinationPath, $filename);
            $path = 'uploads/certificate/' . $filename;
            $certificate->image = $path;
        }
        $certificate->status = $request->status;
        $certificate->save();

        return redirect()->route('certificate')->with('message', 'Certificate edit successfully.');
    }
}
