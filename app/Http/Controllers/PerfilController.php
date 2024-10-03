<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');
            $nombre_img = Str::uuid(). "." .$imagen->extension();
            $saved_img = Image::make($imagen);
            $saved_img->fit(500,500);
            $path_img = public_path('profiles') . '/' . $nombre_img;
            $saved_img->save($path_img);
        }

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombre_img ?? auth()->user()->imagen ?? null;
        $usuario->save();
        
        return redirect()->route('post.index', $usuario->username);
    }
}
