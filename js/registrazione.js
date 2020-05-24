import "../css/registrazione.scss";
//JS
window.$ = require('../node_modules/jquery/dist/jquery');
import _ from 'lodash';
require('./registrazione_mdc');
import classi from "./classiLib";
import img  from "../img/polaroid.jpg";

// $("#imgbox").append('<img class="center-fit" src="./assets/'+img+'">');
classi.caricaClassi();

$('#sub').on('click', ()=>{
    $('#as').val(classi.calcolaAnnoScolastico());
    console.log($('as').val());
    //$('#submittami').submit();
})
