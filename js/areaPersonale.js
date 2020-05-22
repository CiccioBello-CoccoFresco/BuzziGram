function calcolaAnnoScolastico() {
    var d = new Date();
    var y = d.getFullYear() - 2000;
    var m = d.getMonth() + 1;
    if (m >= 9) {
        var y2 = y+1;
        var as = y + "/" + y2;
    }else{
        var y2 = y-1;
        var as = y2 + "/" + y;
    }
    return as;
}

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
        4->data.lenght: anno_scolastico, anno, sezione, foto, frase per ogni classe frequentata, foto = null ->inserire link a inserimento
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
                    var stringa = stringa + "<br><div class='gallery'><div class='desc'>"+as+"<br>"+anno+" "+sezione+"</div>";
                    if(pathImg != "nofoto"){
                        var frase = data[i]['frase'];
                        var stringa = stringa + "<img width=180px height=220px src='"+pathImg+"'class ='foto'>";
                    }else{
                        var stringa = stringa + "<img width=180px height=220px src='../../img/Cicciobello.png' class ='foto'>";
                        if(as === calcolaAnnoScolastico()){
                            var frase = "<a href='../../php/caricaFoto.php?id="+data[4]['id']+"'>Inserisci foto</a>";
                        }else var frase = "foto non inserita";
                        
                        
                    }
                    var stringa = stringa + "<div class='desc'>"+frase+"</div></div>"
                    //stringa = stringa + "<div class='gallery'> <div class='desc'>"+cognomeNomeStud+"</div><img src='"+pathImg+"'class ='foto'><div class='desc'>"+frase+"</div></div>";
                }
            }else var stringa = stringa + "<br>IO SONO L'ADMIN";
            var stringa = stringa + "</div>";
            
        }
        $("#info").append(stringa);
    })
    .fail(function () {
        console.log("errore");
    })
}

/*function controlloFotoAnnuale(){
    var annoCorrente = calcolaAnnoScolastico();
    console.log(annoCorrente);
    var obj = {
        as    : annoCorrente,
    };
    var url = "../../php/checkFotoAnnuale.php?"+$.param(obj);
    $.ajax({
        url: url
        ,dataType: "text"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){
        console.log(data);
    })
    .fail(function () {
        console.log("errore");
    })
}*/