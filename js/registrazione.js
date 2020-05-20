function caricaClassi(as) {
    var classe = document.getElementById("classe");
    var url = "../php/getClassi.php?as=" + as;
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
            var classeOttenuta = data[i]["anno"] + data[i]["sezione"];
            var stringa = stringa + "<option value=" + classeOttenuta + ">"+ classeOttenuta +"</option>";
        }

        $("#classe").find('option').remove().end().append(stringa);

    })
    .fail(function () {
        console.log("errore");
    })
}