window.$ = require('../node_modules/jquery/dist/jquery');
import _ from 'lodash';
import uploadFoto from "./uploadFotoLib";

$(document).ready(() => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.has("id")) var classe = urlParams.get("id");
    else window.location.replace("Classi.html");
    $('#insert').click(function(){
        var image_name = $('#image').val();
        
        console.log(image_name);
        if(image_name === null){
            alert("SELEZIONA FOTO");
            $('#alert').html('SELEZIONA UNA FOTO');
            return false;
        }else{
            
            var extension = $("#image").val().split('.').pop().toLowerCase();
            $('#alert').html(extension);
            if(jQuery.inArray(extension, ['png', 'jpg', 'jpeg']) == -1) {
                $('#alert').val('invalid image file');
                $('#image').val('');
                return false;
            } else {
                
                var frase = $('#frase').html();
                console.log("CARICO FOTO");
                uploadFoto.uploadFoto(image_name, frase, classe);
            }
        }
    })
});