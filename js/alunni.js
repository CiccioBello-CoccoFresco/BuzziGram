function caricaAlunni(classe){
    var obj = {
        classe    : classe
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

        for(var i=0; i<data.length; i++){
            
        }

        $("#id");//

        $("#as").val(temp);

    })
    .fail(function () {
        console.log("errore");
    })
}

function caricaFoto(classe, studente){
    
}