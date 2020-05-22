import "../css/registrazione.sass";
//JS
window.$ = require('../node_modules/jquery/dist/jquery');
import _ from 'lodash';
require('./mdc_register');
import classi from "./classiLib";
import img  from "../img/polaroid.jpg";

$("#sfondo").append('<img src="../assets/'+img+'">').addClass('img').height('auto').width('auto');
console.log(img);
$(document).ready(() => { 
    classi.caricaAnni();
});
$(document).ready(() => {
    $("#as").on("change", function(){
        var annoSelezionato = $(this).children("option:selected").val();
        classi.caricaClassi(annoSelezionato);
    })
});
