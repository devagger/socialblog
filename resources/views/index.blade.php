<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dropzone</title>
    
    
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Upload Multiple Images</h4>
                <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data"
                    id="image-upload" class="dropzone">
                    @csrf
                </form>
            </div>
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
            thumbnailWidth: 200,
            maxFilesize: 1,
        });
    </script>
</body>

</html>
