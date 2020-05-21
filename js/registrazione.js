import "../css/registrazione.scss";
//JS
window.$ = require('../node_modules/jquery/dist/jquery')
require('./mdc_register');
import classi from "./classi";

$(document).ready(() => {
    $("#as").on("click", function(){
        classi.caricaAnni();
    } )
});
$(document).ready(() => {
    $("#as").on("change", function(){
        var annoSelezionato = $(this).children("option:selected").val();
        classi.caricaClassi(annoSelezionato);
    })
});