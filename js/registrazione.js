import "../css/registrazione.scss";
//JS
window.$ = require('../node_modules/jquery/dist/jquery')
require('./mdc_register');
import classi from "./classi";

console.log("reg-charged");

$(document).ready(() => {
    $("#as").on("click", function(){
        classi.caricaAnni();
    } )
});
$(document).ready(() => {
    $("#as").on("change", function(){
        var annoSelezionato = $(this).children("option:selected").val();
        caricaClassi(annoSelezionato);
    })
});