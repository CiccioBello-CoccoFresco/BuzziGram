import "../css/areaPersonale.scss";
//JS
window.$ = require('../node_modules/jquery/dist/jquery');
import _ from 'lodash';
import "./areaPersonale_mdc";
import areaPersonale from "./areaPersonaleLib";

$(document).ready(() => {

    var h = $('header').height();
    $('#main').css('margin-top', h+'px');

    areaPersonale.caricaDati();
});
$('#back').on("click", ()=>{
    window.location = "./Classi.html"
})
