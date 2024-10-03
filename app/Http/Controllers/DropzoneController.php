<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DropzoneController extends Controller
{
    public function index()
    {
        return view('index');
    }
      
    // To upload file from client to server
    public function store(Request $request)
    {   
        $image = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $image->extension();

        $imagenStored = Image::make($image);
        $imagenStored->fit(500, 500);

        $imagenPath = public_path('uploads')."/". $nombreImagen;
        $imagenStored->save($imagenPath); 
        
        return response()->json(['imagen'=>$nombreImagen]);

    }
}
