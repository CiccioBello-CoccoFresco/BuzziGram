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

function caricaAnni(){
    var url = "../php/getAnni.php";
    $.ajax({
        url: url,
        dataType: "json",
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    }).done(function (data){

        console.log(data);
        var stringa = '';

        for(var i = 0; i<data.length; i++){
            var anno = data[i]["anno_scolastico"];
            stringa = stringa + '<li class="mdc-list-item mdc-list-item" data-value="'+ anno +'">';
            stringa += '<span class="mdc-list-item__text">'+ anno +  "</span></li>";
        }

        console.log(stringa);
        $("#anni").append(stringa);
        var temp=calcolaAnnoScolastico();
        $("#dropdown").val(temp);

    }).fail(function () {
        console.log("errore");
    })
}  

function caricaClassiAnnuario(anno, as = calcolaAnnoScolastico()) {
    var classe = document.getElementById("classe");
    var obj = {
        as    : as,
        anno : anno
    };
    console.log("../login/getClassi.php?" + $.param(obj));
    var url = "../php/getClassi.php?" + $.param(obj);
        $.ajax({
            url: url
            ,dataType: "json"
            ,error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        })
            .done(function (data){

                console.log(data);
                if(data[0] === 'norows') var stringa = "<p>Nessuna classe trovata</p>";
                else{
                    /* 
                    data[index][attributo]
                    index = penso tu sappia cos'è un indice per scorrere un array
                    attributo:
                        id : id della classe, usalo come parametro nel link ad Alunni.php?id=
                        anno : anno della classe(prima, seconda, terza, quarta, quinta)
                        sezione : chissà cos'è la sezione
                    */
                    var stringa = "<table id='tabella' border = '1px'><th colspan = 4>"+mode+"</th>";
                    var rows = parseInt(data.length/4);
                    var resto = parseInt(data.length%4);
                    var i = 0;
                    for(var k=0; k<rows; k++){
                        var stringa = stringa + "<tr>";
                        for(var j=0; j<4; j++){
                            var classeOttenuta = data[i]["anno"] + data[i]["sezione"];
                            var stringa = stringa + "<td id='classe'><a href=Alunni.php?id="+data[i]['id']+">"+classeOttenuta+"</a></td> ";
                            var i = i+1;
                        }
                        var stringa = stringa + "</tr>";
                    }
                    var stringa = stringa + "<tr>";
                    for(var j=0; j < resto; j++){
                        var classeOttenuta = data[i]["anno"] + data[i]["sezione"];
                        var stringa = stringa + "<td id='classe'><a href=Alunni.html?id="+data[i]['id']+">"+classeOttenuta+"</a></td> ";
                        var i=i+1;
                    }
                    var stringa = stringa + "</tr>";
                    var stringa = stringa + "</table>";
                }
                $("#annuario").html(stringa);

            })
            .fail(function () {
                console.log("errore");
            })
}

function caricaClassi(as = calcolaAnnoScolastico()) {
    var classe = document.getElementById("classe");
    var url = "../php/getClassi.php?as=" + as;
    $.ajax({
        url: url,
        dataType: "json",
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    }).done(function (data){

        console.log(data);

        var stringa = '';

        for(var i=0; i<data.length; i++){
            var classeOttenuta = data[i]["anno"] + data[i]["sezione"];
            var stringa = stringa 
                            + '<li class="mdc-list-item" data-value="'+ classeOttenuta +'"><span class="mdc-list-item__text">'
                            + classeOttenuta 
                            +"</span></li>";
        }
        console.log(stringa);
        $("#here").append(stringa);

    }).fail(function () {
        console.log("errore");
    })
}

export default {calcolaAnnoScolastico, caricaClassiAnnuario, caricaAnni, caricaClassi}