<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CatalogueController extends Controller
{
    public function add() {
        $catalogue = Catalogue::first();
        return view('administrator.catalogue.add',compact('catalogue'));
    }

    public function addPost(Request $request) {

        $catalogue = Catalogue::first();
        if($catalogue){
            $catalogue->text_color = $request->text_color;
            // dd($catalogue->catalogue_file);
            if ($request->catalogue_file){
                if (file_exists($catalogue->catalogue_file)){
                    unlink('public/'.$catalogue->catalogue_file);
                }
                $file = $request->file('catalogue_file');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/catalogue';
                $file->move($destinationPath, $filename);
                $path = 'uploads/catalogue/' . $filename;
                $catalogue->catalogue_file = $path;
            }
            $catalogue->save();
            return redirect()->back()->with('message', 'Catalogue Updated successfully.');
        }else{
            $catalogue = new Catalogue();
            $catalogue->text_color = $request->text_color;
            if ($request->catalogue_file){
                $file = $request->file('catalogue_file');
                $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'public/uploads/catalogue';
                $file->move($destinationPath, $filename);
                $path = 'uploads/catalogue/' . $filename;
                $catalogue->catalogue_file = $path;
            }
            $catalogue->save();
            return redirect()->back()->with('message', 'Catalogue Banner add successfully.');
        }
    }
}
