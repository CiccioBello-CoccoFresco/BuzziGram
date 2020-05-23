
function caricaAlunni(classe){
    console.log("fdgcxg");
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
        if(data[0] == "norows") stringa = "Nessuno studente trovato per questa classe";
        else{
            console.log("HO TROVATO DEGLI STUDENTI");
            for(var i=0; i<data.length; i++){
                var idStud = data[i]['studente'];
                var cognomeNomeStud = data[i]['cognome'] +" "+data[i]['nome'];
                var pathImg = data[i]['file'];
                var frase = data[i]['frase'];
                stringa = stringa + "<div class='gallery'> <div class='desc'>"+cognomeNomeStud+"</div><img width=180px height=220px src='"+pathImg+"' class ='foto'><div class='desc'>"+frase+"</div></div>";
            }
        }
        $("#container").append(stringa);
        $("#loading").hide();


    })
    .fail(function () {
        console.log("errore");
    })
}
export default {caricaAlunni};