@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads' . '/' . $post->imagen) }}" alt="Imagen de Posteo">
            <div class="p-3">
                @auth 
                <livewire:like-post/>      
                    @if ($post->checkLike(auth()->user()))
                        <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">
                                <div style="width: 25px; height: 25px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </div>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('posts.likes.store', $post) }}" method="POST">
                            @csrf
                            <button type="submit">
                                <div style="width: 25px; height: 25px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </div>
                            </button>
                        </form>
                    @endif
                @endauth
                <p>{{ $post->likes->count() }} Like </p>
            </div>
            <div class="">
                <p class="mt-1  mb- 5 font-bold">{{ $post->descripcion }}</p>
                <a href="{{ route('post.index', $post->user->username) }}">
                    <p class="font-bold">{{ '@' . $post->user->name }}</p>
                </a>
                <p class="font-sm">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('post.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar Publicacion"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold cursor-pointer mt-2">
                    </form>
                @endif
            @endauth

        </div>

        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth

                    @if (session('mensaje'))
                        <div class="">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <p class="text-xl font-bold text-center mb-5">Agrega un comentario</p>

                    <div>
                        <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post]) }}" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="comentario" class="mb-2 blocktext-gray-900 font-light to-stone-900">Deja tu
                                    comentario..</label>
                                <textarea name="comentario" id="comentario"
                                    class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"></textarea>

                                @error('comentario')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm -p2 text-center">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <input type="submit" value="Comentar"
                                class="bg-gray-600 hover:bg-gray-400 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-black rounded-lg">
                        </form>
                    @endauth

                    <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                        @if ($post->comentarios->count())
                            @foreach ($post->comentarios as $comentario)
                                <div class="p-5 border-gray-300 border-b">
                                    <a class="font-bold" href="{{ route('post.index', $comentario->user->username) }}">
                                        {{ $comentario->user->username }}</a>
                                    <p>{{ $comentario->comentario }}</p>
                                    <p class="font-light">{{ $comentario->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        @else
                            <p>No hay comentarios</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
