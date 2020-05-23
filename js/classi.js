import '../css/classi.scss'

window.$ = require('../node_modules/jquery/dist/jquery');
import classi from "./classiLib";
import './classi_mdc';

let mode = 'biennio'; 

$(document).ready(() => {
    $(function() {
        console.log('WE');
        classi.caricaAnni();  
    });
    $("#as").on("change", function(){
        var annoSelezionato = $(this).children("option:selected").val();
        //$("#annoSelezionato").innerHTML = annoSelezionato;
        classi.caricaClassiAnnuario(mode, annoSelezionato);
    });
    $("#biennio").on("click", function(){
        var annoSelezionato = $("#as").children("option:selected").val();
        mode = "biennio";
        classi.caricaClassiAnnuario(mode, annoSelezionato);
    });
    $("#triennio").on("click", function(){
        var annoSelezionato = $("#as").children("option:selected").val();
        mode = "triennio";
        classi.caricaClassiAnnuario(mode, annoSelezionato);
    });
});


