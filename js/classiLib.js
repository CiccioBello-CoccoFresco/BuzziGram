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

        //console.log(data);
        var stringa = '';
        if(data['0'] == "redirect") window.location.replace("../dist/login.html");
        else{
            for(var i = 0; i<data.length; i++){
                var anno = data[i]["anno_scolastico"];
                if(anno == calcolaAnnoScolastico()) stringa = stringa + '<li class="mdc-list-item mdc-list-item mdc-list-item" data-value="'+ anno +'" aria-selected="true">';
                else stringa = stringa + '<li class="mdc-list-item mdc-list-item" data-value="'+ anno +'">';
                stringa += '<span class="mdc-list-item__text">'+ anno +  "</span></li>";
            }

            $("#anni").append(stringa);
            var temp=calcolaAnnoScolastico();
            $("#dropdown").val(temp);
        }
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
    var url = "../php/getClassi.php?" + $.param(obj);
        $.ajax({
            url: url
            ,dataType: "json"
            ,error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        }).done(function (data){

                console.log(data);
                if(data[0] === 'norows') var stringa = "<p>Nessuna classe trovata</p>";
                else{
                    /* 
                    data[index][attributo]
                    index = penso tu sappia cos'è un indice per scorrere un array
                    attributo:
                        id : id della classe, usalo come parametro nel link ad Alunni.php?id=
                        anno : anno della classe(1, 2, 3, 4, 5)
                        sezione : chissà cos'è la sezione
                    */
                    var stringa="";
                    for(var i=0; i < data.length; i++){
                        var row = data[i];
                        //console.log(row);
                        var classe = ''+row['anno']+row['sezione'];
                        //console.log(classe);
                        stringa += 
                        '<div class="mdc-layout-grid__cell--span-2">' +
                            '<div class="my-card mdc-card">' +
                                '<div class="fit mdc-card__primary-action" tabindex="0">' +
                                '<a href="Alunni.html?id='+ row['id'] +'" <div class="card-label mdc-typography--headline1">' + classe +'</div></div></div></div>';
                    }
                    
                    //console.log(stringa);
                }
                $("#classes").html(stringa);

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