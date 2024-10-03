@extends('layouts.app')

@section('titulo')
    Inicio
@endsection

@section('contenido')
    {{-- @if ($posts->count())
        <h1>{{ $post->titulo }}</h1>
    @endforeach
@else
    <p>No hay Posts</p>
    @endif --}}

    {{-- @forelse ($posts as $post)
        <h1>{{$post->titulo}}</h1>
    @empty
        <p>No hay Posts</p>
    @endforelse --}}

    <x-listar-post :posts="$posts"/>

     
@endsection
