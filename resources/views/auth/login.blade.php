@extends('layouts.app')


@section('Login')
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10">
        <div class="md:w-6/12 drop-shadow-md">
            <img src="{{ asset('img/registerForm.jpg') }}" alt="Imagen ilustrativa">
        </div>

        <div class="md:w-4/12 bg-gradient-to-r from-indigo-500 p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="post" novalidate>
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm -p2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-900 font-bold">Nombre de Usuario</label>
                    <input type="text" name="username" id=""
                        placeholder="Nombre de usuario..."class="border p-3 w-full rounded-lg" value="{{ old('surname') }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-900 font-bold">Contraseña</label>
                    <input type="password" name="password" id=""
                        placeholder="Contraseña.."class="border p-3 w-full rounded-lg">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id=""><label for=""
                        class="text-black text-sm">Mantener sesion abierta
                    </label>
                </div>
                <input type="submit" value="Iniciar Sesión"
                    class="bg-neutral-900 hover:bg-neutral-950
                transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
