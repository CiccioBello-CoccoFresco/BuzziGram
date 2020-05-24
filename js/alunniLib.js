
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
                    '<div class="mdc-layout-grid__cell"><div class="mdc-card my-card"><div class="fit-to-parent mdc-card__primary-action demo-card__primary-action" tabindex="0">' +
                    '<div class="mdc-card__media mdc-card__media--16-9 demo-card__media" style="background-image: url('+ pathImg +');"></div>' +
                    '<div class="demo-card__primary">' +
                    '<h2 class="demo-card__title mdc-typography mdc-typography--headline6"><b>'+ cognomeNomeStud +'</b></h2></div>' +
                    '<div class="demo-card__secondary mdc-typography mdc-typography--body2"><i>'+ frase +'</i></div></div></div></div>';
            }
        }
        console.log(stringa);
        $("#divpos").html(stringa);
        $("#loading").hide();


    })
    .fail(function () {
        console.log("errore");
    })
}
export default {caricaAlunni};