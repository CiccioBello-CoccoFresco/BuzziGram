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

        for(var i=0; i<data.length; i++){
            
        }

        $("#id");//


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
    var url = "../php/getAlunni.php" + $.param(obj);
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

        return stringa;
    })
    .fail(function () {
        console.log("errore");
    })
}