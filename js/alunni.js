function caricaAlunni(id){
    var obj = {
        id    : id
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

        var stringa = "<option selected disabled value=''>Scegli...</option>";

        for(var i=0; i<data.length; i++){
            var anno = data[i]["anno_scolastico"];
            var stringa = stringa + "<option value=" + anno + ">"+ anno +"</option>";
        }

        $("#as").find('option').remove().end().append(stringa);
        var temp=calcolaAnnoScolastico();
        $("#as").val(temp);

    })
    .fail(function () {
        console.log("errore");
    })
}

function caricaFoto(id){

}