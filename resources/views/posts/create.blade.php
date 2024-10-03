@extends('layouts.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
@endpush



@section('titulo')
    Crea una nueva Publicacion
@endsection



@section('contenido')
    <div class="md:flex md:justify-center md:gap-10">
        <div class="md:w-1/2 px-10 w-1/2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data"
                            id="image-upload"
                            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="md:w-1/2 px-10 w-1/2">
            <form action="{{ route('imagen.store') }}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-900 font-bold">Publicacion</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Titulo"
                        class="border p-3 w-full rounded-lg 
                        @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}">

                    @error('titulo')
                        <p class="bg-red-500 texet-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-900 font-bold">Publicacion</label>
                    <textarea name="descripcion" id="descripcion"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"></textarea>

                    @error('descripcion')
                        <p class="bg-red-500 texet-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old('imagen') }}">

                    @error('imagen')
                        <p class="bg-red-500 texet-white my-2 rounded-lg text-sm -p2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input type="submit" value="Publicar"
                    class="bg-white hover:bg-gray-400 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-black rounded-lg">
            </form>
        </div>


    </div>

    <script type="text/javascript">
        var dropzone = new Dropzone('#image-upload', {
            dictDefaultMessage: "Suelta tu imagen aqui",
            acceptedFiles: ".png,.jpg,.jpeg,.gif",
            addRemoveLinks: true,
            dictRemoveFile: "Borrar Archivo",
            maxFiles: 1,
            uploadMultiple: false,
            // thumbnailWidth: 200,
            maxFilesize: 3,
            init: function() {
                if (document.querySelector('[name="imagen"]').value.trim()) {
                    const imagenPublicada = {};
                    imagenPublicada.size = 1234;
                    imagenPublicada.name = document.querySelector('[name="imagen"]').value;

                    this.options.addedfile.call(this, imagenPublicada);
                    this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

                    imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');

                }
            }
        });

        dropzone.on('success', function(file, response) {
            document.querySelector('[name="imagen"]').value = response.imagen;
        });

        dropzone.on('removedfile', function() {
            document.querySelector('[name="imagen"]').value = "";
        });
    </script>
@endsection
