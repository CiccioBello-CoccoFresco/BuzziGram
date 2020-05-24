
function caricaAlunni(classe){
    var obj = {
        classe    : classe
    };
    var url = "../php/getAlunni.php?" + $.param(obj);
    $.ajax({
        url: url
        ,dataType: "json"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){


        var stringa = "";
        if(data == "redirect") window.location.replace("../dist/login.html");
        else if(data[0] == "norows") stringa = "Nessuno studente trovato per questa classe";
        else{
            for(var i=0; i<data.length; i++){
                var idStud = data[i]['studente'];
                var cognomeNomeStud = data[i]['cognome'] +" "+data[i]['nome'];
                var pathImg = data[i]['file'];
                var frase = data[i]['frase'];
                
                stringa = stringa +
                    '<li class="mdc-image-list__item">' +
                    '<img class="mdc-image-list__image" src="'+ pathImg+'">' +
                    '<div class="mdc-image-list__supporting">' +
                    '<span class="mdc-image-list__label"><b>'+ cognomeNomeStud +'</b></span><br>' +
                    '<span class="mdc-image-list__label"><i>'+ frase +'</i></span></div></li>';
            }
        }
        console.log(stringa);
        $("#container").html(stringa);
        $("#loading").hide();


    })
    .fail(function () {
        console.log("errore");
    })
}
export default {caricaAlunni};