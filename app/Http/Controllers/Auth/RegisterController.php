<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }


    public function register(Request $request){
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => 'required|min:5|max:30',
            'username' => 'required|unique:users',
            'email' => 'required|email|min:10|max:30|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Autentificacion de usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        auth()->attempt($request->only('username', 'password'));

        
        return redirect()->route('post.index', auth()->user()->username);
    }
}
