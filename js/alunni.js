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
        console.log(stringa);
        //$("#prova").attr("src", caricaFoto(classe, data[1]['studente']));
        for(var i=0; i<data.length; i++){
            var idStud = data[i]['studente'];
            var cognomeNomeStud = data[i]['cognome'] +" "+data[i]['nome'];
            stringa = stringa + "<div class='gallery'> <div class='desc'>"+cognomeNomeStud+"</div><a target='_blank'><img id ='f"+idStud+"' class = 'foto'></a> <div id = 'd"+idStud+"'class='desc'>Frase</div></div>";
            caricaFoto(classe, idStud); 
        }
        $("#container").append(stringa);


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
        ,dataType: "json"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){
        if(data[0] === "norows"){
            $("#f"+studente).attr("src", "../img/Cicciobello.png");
            $("#d"+studente).text("Foto non inserita");
        }else{
            $("#f"+studente).attr("src", data[0]);
            $("#d"+studente).text(data[1]);
        }
        
    })
    .fail(function () {
        console.log("errore");
    })
}