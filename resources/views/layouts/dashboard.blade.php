@extends('layouts.app')

@section('titulo')
    Dashboard | {{ '@' . $user->username }}
@endsection

@section('contenido')
    {{-- <div class="flex justify-center"> --}}
    <div class="md:flex justify-center text-center">
        <div class="px-5 flex justify-center">
            <div class="cont1">
                <img src="{{ $user->imagen ? asset('profiles') . '/' . $user->imagen : asset('img/user.png') }}"
                    alt="imagen usuario" style="width: 150px; border-radius:7px; box-shadow:2px 10px 10px;"
                    class="rounded-sm border-2 border-dotted border-x-blue-800">
            </div>
            <div class="cont2">
                <div class="flex gap-3 h-fit p-2">
                    <p>
                        {{ $user->name }}
                    </p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}" style="width:20px; display: inline-block;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <div class="mt-2">
                    <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                        {{ $user->followers->count() }}
                        <span class="font-normal"> @choice('Seguidor|Seguidores', $user->followers->count())</span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                        <span class="font-normal">{{$user->followings->count()}} Siguiendo</span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                        <span class="font-normal">{{ $user->posts->count() }} Posts</span>
                    </p>
                    @auth
                        @if ($user->id !== auth()->user()->id)
                            @if (!$user->siguiendo(auth()->user()))
                                <form action="{{route('users.follow', $user)}}" 
                                    method="post"
                                    class="mt-2">
                                    @csrf
                                    <input type="submit" 
                                        value="Follow"
                                        class="text-white uppercase rounded-lg px-2 py-1 text-xs font-bold cursos-pointe"
                                        style="background-color: darkblue">
                                </form>
                            @else   
                                <form action="{{route('users.unfollow', $user)}}" 
                                    method="post" 
                                    class="mt-2">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" 
                                        value="Unfollow"
                                        class="text-white uppercase rounded-lg px-2 py-1 text-xs font-bold cursos-pointe"
                                        style="background-color: darkblue">
                                </form>
                            @endif
                            
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <section class="container mx-auto mt-10">
        <h2 class="text-center text-3xl font-mono font-bold">Publicaciones</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 justify-center">
                @foreach ($posts as $post)
                    <div class="flex justify-center align-middle">
                        <a href="{{ route('posts.show', ['user' => $user, 'post' => $post]) }}"
                            class="font-mono font-bold">{{ $post->titulo }}
                            <img class="w-3" src="{{ asset('uploads') . '/' . $post->imagen }}"
                                alt="Imagen del post {{ $post->titulo }}" />
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $posts->links() }}
        @else
            <p class="text-gray-600 uppercase text-center font-bold">NO HAY POSTS AUN</p>
        @endif

    </section>
    {{-- </div> --}}
@endsection
