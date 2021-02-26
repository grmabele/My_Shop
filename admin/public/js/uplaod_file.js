/*
filedrag.js - HTML5 File Drag & Drop
*/

         // Check for the various File API support.

            function showFile() {
                var demoImage = document.querySelector('#card_thumbnail');

                var file = document.querySelector('input[type=file]').files[0];
                var reader = new FileReader();
                reader.onload = function (event) {
                    demoImage.src = reader.result;
                }
                reader.readAsDataURL(file);
                console.log(file)
                var postPicture = document.querySelector('#post_picture');
                postPicture.value = file.name;
            }


    // call initialization file
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        showFile();
    } else {
        alert("Your browser is too old to support HTML5 File API");
    }
