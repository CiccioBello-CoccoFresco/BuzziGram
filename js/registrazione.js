import "../css/registrazione.scss";
//JS
window.$ = require('../node_modules/jquery/dist/jquery')
require('./mdc_register');
import classi from "./classi";
// import img  from "../img/Web 1920 – 1.jpg";

$(document).ready(() => { 
    $('<img src="'+ '../img/Web 1920 – 1.jpg' +'">').load(function() {
        $(this).width(200).height(200).appendTo('#sfondo');
    });
    classi.caricaAnni();
});
$(document).ready(() => {
    $("#as").on("change", function(){
        var annoSelezionato = $(this).children("option:selected").val();
        classi.caricaClassi(annoSelezionato);
    })
});
