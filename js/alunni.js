function caricaAlunni(classe){
    var obj = {
        classe    : classe
    };
    console.log("../php/getAlunni.php?" + $.param(obj));
    var url = "../php/getAlunni.php?" + $.param(obj);
    $.ajax({
        url: url
        ,dataType: "json"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){

        console.log(data);

        var stringa = "";
        console.log(data.length);
        caricaFoto(classe, data[1]['studente']);
        /*for(var i=0; i<data.length; i++){
            
        }*/



    })
    .fail(function () {
        console.log("errore");
    })
}

function caricaFoto(classe, studente){//ritorna la stringa da inserire in img src di uno studente di una classe
    var obj = {
        classe    : classe,
        studente  : studente
    };
    var url = "../php/getFoto.php?" + $.param(obj);
    $.ajax({
        url: url
        ,dataType: "text"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){

        console.log("IMMAGINE : " + data);

        var stringa = data;

        return stringa;
    })
    .fail(function () {
        console.log("errore");
    })
}