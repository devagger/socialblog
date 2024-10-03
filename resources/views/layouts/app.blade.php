<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('scripts')
    <title>@yield('titulo')</title>
    @livewireStyles
</head>


<body class="bg-white w-screen">
    <header class="p-5 border-b bg-white shadow">

        <div class="container mx-auto flex flex-col items-center"><a href="{{ route('home') }}">
                <h1 class="text-3xl font-mono font-bold">Social Blog</h1>
            </a>
            @auth
                <nav class="flex gap-2 items-center">
                    <a href="{{ route('post.create') }}"
                        class="flex items-center bg-white p-2 text-gray-600 rounded text-sm uppercase font-bold  cursor-pointer">
                        <svg width="50" height="50" viewBox="0 0 512 512" style="color:currentColor"
                            xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
                            <rect width="50" height="50" x="0" y="0" rx="30" fill="transparent"
                                stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg
                                width="256px" height="256px" viewBox="0 0 16 16" fill="currentColor" x="128" y="128"
                                role="img" xmlns="http://www.w3.org/2000/svg">
                                <g fill="currentColor">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5">
                                        <path d="M1.75 2.75h12.5v10.5H1.75z" />
                                        <path d="m3.75 13.2l6.5-5.5l4 3" />
                                        <circle cx="5.25" cy="6.25" r=".5" fill="currentColor" />
                                    </g>
                                </g>
                            </svg>
                        </svg>
                        Crear
                    </a>
                    <a href="{{ route('post.index', auth()->user()->username) }}">
                        <h5>{{ auth()->user()->username }}|</h5>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" class="font-bold uppercase text-gray-600 text-sm" value="Cerrar Session">
                    </form>
                </nav>
            @endauth
            @guest
                <nav>
                    <a href="{{ route('login') }}" class="font-mono uppercase text-gray-600 text-sm">Login</a>
                    <a href="{{ route('crear.cuenta') }}" class="font-mono uppercase text-gray-600 text-sm">Crear Cuenta</a>
                </nav>
            @endguest


        </div>
    </header>
    <hr>
    <main class="container mx-auto mt-10">
        <h2 class="font-mono text-center text-3xl mb-12">
            @yield('titulo')
        </h2>
        {{-- <div> --}}
        @yield('contenido')
        {{-- </div> --}}
    </main>



@livewireScripts
</body>
<footer class="text-center p-5 text-gray-500 font-bold uppercase mt-48">
    devstagram - todos los derechos reservados {{ now()->year }}
</footer>

</html>
