import cicciobello from "../img/Cicciobello.jpg";
import classi from "./classiLib";

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
    var url = "../php/getInfo.php";
    $.ajax({
        url: url
        ,dataType: "json"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(errorThrown);
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
        if(data[0]== "redirect") window.location.replace("../dist/login.html");
        else{
            if(data[0]=="norows") var stringa  = "Non sono state trovate informazioni";
            else{
                console.log(cicciobello);
                var stringa = '<div class="mdc-layout-grid__cell--span-12"><span class="mdc-typography--headline4">INFORMAZIONI PERSONALI</span></div>'+
                '<div class="mdc-layout-grid__cell--span-12"><span class="mdc-typography--headline5">Email: </span><span>'+ data[0]+ '</span></div>'+ 
                '<div class="mdc-layout-grid__cell--span-12"><span class="mdc-typography--headline5">Cognome: </span><span>'+ data[2]+ '</span></div>'+ 
                '<div class="mdc-layout-grid__cell--span-12"><span class="mdc-typography--headline5">Nome: </span><span>'+ data[1] + '</span></div>';

                $("#info").html(stringa);
                //stringa = "";
                if(data[3]==="foto")  {
                    console.log("Carico le foto");
                    getFoto();
                }else{
                    console.log('Admin');
                    zonaAdmin();
                }
                
                
            }
        }
        
        
    })
    .fail(function () {
        console.log("errore");
    })
}

function getFoto(){
    var url = "../php/getFoto.php";
    $.ajax({
        url: url
        ,dataType: "json"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("ERRORE");
        }
    })
    .done(function (data){
        console.log(data.length);
        var stringa = "";
        stringa += "<br><div>";
        for(var i=0; i<data.length; i++){
            var as = data[i]['anno_scolastico'];
            var anno = data[i]['anno'];
            var sezione = data[i]['sezione'];
            var pathImg = data[i]['file'];
            var stringa = stringa + "<div class='gallery'><div class='desc'>"+as+"<br>"+anno+" "+sezione+"</div>";
            if(pathImg != "nofoto"){
                var frase = data[i]['frase'];
                var stringa = stringa + "<img width=180px height=220px src='"+pathImg+"'class ='foto'>";
            }else{
                var stringa = stringa + "<img width=180px height=220px src='./assets/"+ cicciobello +"' class ='foto'>";
                if(as === calcolaAnnoScolastico()){
                    var frase = "<a href='../php/caricaFoto.php?id="+data[i]['id']+"'>Inserisci foto</a>";
                }else var frase = "foto non inserita";   
            }
            var stringa = stringa + "<div class='desc'>"+frase+"</div></div></div>";
            
        }
        checkAnno();
        $("#foto").append(stringa);
    })
    .fail(function () {
        console.log("errore");
    })
}

function zonaAdmin(as = calcolaAnnoScolastico()){
    var obj = {
        as    : as,
    };
    var url = "../php/adminZone.php?"+$.param(obj);
    $.ajax({
        url: url
        ,dataType: "text"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){
        console.log(data);
        if(data == "redirect") window.location.replace("../dist/login.html");
        else{
            if(data !== "1"){
                var stringa = "INSERISCI LE CLASSI DELL'ANNO SCOLASTICO "+as+"<br>(Esempio 1A,2B,3CD,4E....)<br>"+
                "<form action='../php/insClassi.php?as="+as+"' method='POST'><input type='text' name='classi' id='classi' required><input type='submit' id='bottone' value='Invia'></form>";    
            }else var stringa = "Classi inserite per l'anno scolastico "+as;
            $("#insClasse").append(stringa);
        }
    })
    .fail(function () {
        console.log("errore");
    })
}

function inputClassi(classi){
    console.log(classi);
}

function checkAnno(as = calcolaAnnoScolastico()){
    var obj = {
        as    : as,
    };
    var url = "../php/checkAnno.php?"+$.param(obj);
    $.ajax({
        url: url
        ,dataType: "text"
        ,error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    })
    .done(function (data){
        console.log(data);
        if(data === '0'){
            var stringa = "<div class='mdc-layout-grid__cell mdc-layout-grid__cell--span-8'>"+
            '<div class="mdc-select">'+
                '<div class="mdc-select__anchor demo-width-class">'+
                    '<span class="mdc-select__ripple"></span>'+
                    '<input id="hid" type="hidden" name="classe" value="" />'+
                    '<input type="text" disabled readonly class="mdc-select__selected-text">'+
                    '<i class="mdc-select__dropdown-icon"></i>'+
                    '<span class="mdc-floating-label">Seleziona la classe</span>'+
                    '<span class="mdc-line-ripple"></span>'+
                '</div>'+
                '<div class="mdc-select__menu mdc-menu mdc-menu-surface demo-width-class">'+
                    '<ul id="lista" class="mdc-list">'+
                        '<li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true"></li>'+
                        '<span id="here"></span>'+
                    '</ul>'+
                '</div>'+
            '</div>'+
        '</div>';
        $('#insClasse').append(stringa);
        classi.caricaClassi();
        }
    })
    .fail(function () {
        console.log("errore");
    })
}
export default {caricaDati,checkAnno,inputClassi};