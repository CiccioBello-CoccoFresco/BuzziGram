function uploadFoto(image_name, frase, classe){
    var obj = {
        file    :   image_name,
        frase   :   frase,
        id      :   classe
    };
    var url = "../php/uploadFoto.php?"+$.param(obj);
    $.ajax({
        url: url,
        dataType: "text",
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){
        console.log(data);
    })
    .fail(function () {
        console.log("errore");
    })
};

export default {uploadFoto};

