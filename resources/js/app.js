// import Dropzone from "dropzone";

// Dropzone.autoDiscover = true;
// const dropz = new Dropzone();
// const dropzone = new Dropzone("#dropzone", {
//     dictDefaultMessage: "Suelta tu imagen aqui",
//     acceptedFiles: ".png,.jpg,.jpeg,.gif",
//     addRemoveLinks: true,
//     dictRemoveFile: "Borrar Archivo",
//     maxFiles: 1,
//     uploadMultiple: false,
// });

// var dropzone = new Dropzone("#image-upload", {
//     dictDefaultMessage: "Suelta tu imagen aqui",
//     acceptedFiles: ".png,.jpg,.jpeg,.gif",
//     addRemoveLinks: true,
//     dictRemoveFile: "Borrar Archivo",
//     maxFiles: 1,
//     uploadMultiple: false,
//     // thumbnailWidth: 200,
//     maxFilesize: 1,
//     init: function () {
//         if (document.querySelector('[name="imagen"]').value.trim()) {
//             const imagenPublicada = {};
//             imagenPublicada.size = 1234;
//             imagenPublicada.name =
//                 document.querySelector('[name="imagen"]').value;

//             this.options.addedfile.call(this, imagenPublicada);
//             this.options.thumbnail.call(
//                 this,
//                 imagenPublicada,
//                 `/uploads/${imagenPublicada.name}`
//             );

//             imagenPublicada.previewElement.classList.add(
//                 "dz-success",
//                 "dz-complete"
//             );
//         }
//     },
// });

// dropzone.on("success", function (file, response) {
//     console.log(response.imagen);
//     document.querySelector('[name="imagen"]').value = response.imagen;
// });

// dropzone.on("removedfile", function () {
//     document.querySelector('[name="imagen"]').value = "";
// });

console.log("mixlaravel");
