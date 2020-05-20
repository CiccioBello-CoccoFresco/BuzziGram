
function caricaClassiAnnuario(as, mode) {
    var classe = document.getElementById("classe");
    var obj = {
        as    : as,
        mode : mode
    };
    console.log("../login/getClassi.php?" + $.param(obj));
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
                if(data[0] === 'norows') var stringa = "<p>Nessuna classe trovata</p>";
                else{
                    if(data[0]['anno'] < 3) var mode = "BIENNIO";
                    else var mode = "TRIENNIO";
                    var stringa = "<table border = '1px'><th colspan = 4>"+mode+"</th>";
                    var rows = parseInt(data.length/4);
                    var resto = parseInt(data.length%4);
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
                }
                $("#annuario").html(stringa);

            })
            .fail(function () {
                console.log("errore");
            })
}