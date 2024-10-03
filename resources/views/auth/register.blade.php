@extends('layouts.app')

@section('titulo')
    Registrate en devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10">
        <div class="md:w-6/12 drop-shadow-md">
            <img src="{{ asset('img/registerForm.jpg') }}" alt="Imagen ilustrativa">
        </div>

        <div class="md:w-4/12 bg-gradient-to-r from-indigo-500 p-6 rounded-lg shadow-xl">
            <form action="/crear-cuenta" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-900 font-bold">Nombre</label>
                    <input type="text" name="name" id=""
                        placeholder="Nombre..."class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">

                    @error('name')
                        <p class="bg-red-500 texet-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-900 font-bold">Nombre de Usuario</label>
                    <input type="text" name="username" id=""
                        placeholder="Nombre de usuario..."class="border p-3 w-full rounded-lg" value="{{ old('surname') }}">
                        @error('username')
                        <p class="bg-red-500 texet-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-900 font-bold">Direccion Email</label>
                    <input type="email" name="email" id=""
                        placeholder="Email.."class="border p-3 w-full rounded-lg" value="{{ old('email') }}">
                        @error('email')
                        <p class="bg-red-500 texet-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-900 font-bold">Contraseña</label>
                    <input type="password" name="password" id=""
                        placeholder="Contraseña.."class="border p-3 w-full rounded-lg">
                        @error('password')
                        <p class="bg-red-500 texet-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation"
                        class="mb-2 block uppercase text-gray-900 font-bold">Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Repite la contraseña.."class="border p-3 w-full rounded-lg">
                        @error('password_confirmation')
                        <p class="bg-red-500 texet-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Crear Cuenta"
                    class="bg-neutral-900 hover:bg-neutral-950
                transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
