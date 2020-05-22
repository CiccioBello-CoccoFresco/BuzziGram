function caricaDati(){
    var url = "../../php/getInfo.php";
    $.ajax({
        url: url
        ,dataType: "json"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){

        /*
        DATA pos :
        0:norows se mancano dati, email se ci sono
        1:nome
        2:cognome
        3:"admin" se utente = 1, "foto" se studente
        4->data.lenght: anno_scolastico, anno, sezione, foto, frase per ogni classe frequentata, foto = null 
        */
        console.log(data);
        if(data[0]=="norows") var stringa  = "Non sono state trovate informazioni";
        else{
            var stringa = "<div>INFORMAZIONI PERSONALI"+
            "<br>Email :"+ data[0]+
            "<br>Cognome :"+ data[2]+
            "<br>Nome :"+ data[1];
            if(data[3]==="foto"){
                for(var i=4; i<data.length; i++){
                    var as = data[i]['anno_scolastico'];
                    var anno = data[i]['anno'];
                    var sezione = data[i]['sezione'];
                    var pathImg = data[i]['file'];
                    if(pathImg != "nofoto"){
                        var frase = data[i]['frase'];
                        stringa = stringa + "<br><div class='gallery'><div class='desc'>"+as+"<br>"+anno+" "+sezione+"</div><img src='"+pathImg+"'class ='foto'><div class='desc'>"+frase+"</div></div>";
                    }
                    //stringa = stringa + "<div class='gallery'> <div class='desc'>"+cognomeNomeStud+"</div><img src='"+pathImg+"'class ='foto'><div class='desc'>"+frase+"</div></div>";
                }
            }else var stringa = stringa + "<br>IO SONO L'ADMIN";
            var stringa = stringa + "</div>";
            
        }
        $("#info").append(stringa);
        /*for(var i=0; i<data.length; i++){
            var idStud = data[i]['studente'];
            var cognomeNomeStud = data[i]['cognome'] +" "+data[i]['nome'];
            var pathImg = data[i]['file'];
            var frase = data[i]['frase'];
            stringa = stringa + "<div class='gallery'> <div class='desc'>"+cognomeNomeStud+"</div><a target='_blank'><img src='"+pathImg+"'class ='foto'></a> <div class='desc'>"+frase+"</div></div>";
        }
        $("#container").append(stringa);
        $("#loading").hide();*/


    })
    .fail(function () {
        console.log("errore");
    })
}