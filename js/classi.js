function caricaClassi(as) {
    var classe = document.getElementById("classe");
    var obj = {
        as    : as
    };
    var url = "../login/getClassi.php?" + $.param(obj);
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
function caricaClassi(as, mode) {
    var classe = document.getElementById("classe");
    var obj = {
        as    : as,
        mode : mode
    };
    var url = "../login/getClassi.php?" + $.param(obj);
        $.ajax({
            url: url
            ,dataType: "json"
            ,error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        })
            .done(function (data){

                console.log(data);

                var stringa = "<table>";
                var rows = data.length/4;
                var resto = data.lenght%4;
                var i = 0;
                for(var k=0; k<rows; k++){
                    var stringa = stringa + "<tr>";
                    for(var j=0; j<4; j++){
                        var classeOttenuta = data[i]["anno"] + data[i]["sezione"];
                        var stringa = stringa + "<td>"+classeOttenuta+"</td> ";
                        var i = i+1;
                    }
                    var stringa = stringa + "</tr>";
                }
                var stringa = stringa + "<tr>";
                for(var j=0; j < resto; j++){
                    var classeOttenuta = data[i]["anno"] + data[i]["sezione"];
                    var stringa = stringa + "<td>"+classeOttenuta+"</td> ";
                    var i=i+1;
                }
                var stringa = stringa + "</tr>";
                var stringa = stringa + "</table>";
                $("#annuario").find('option').remove().end().append(stringa);

            })
            .fail(function () {
                console.log("errore");
            })
}