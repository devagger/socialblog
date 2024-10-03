<div>
    @if ($posts->count())
        <div class="grid grid-cols-1 justify-center">
            @foreach ($posts as $post)
                <div class="flex justify-center align-middle mb-4 font-center">
                    <a href="{{route('posts.show', ['post'=>$post, 'user'=>$post->user])}}" class="font-mono font-bold">{{ $post->titulo }}
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
</div>