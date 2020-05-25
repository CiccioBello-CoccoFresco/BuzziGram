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

    $('#logout').on('click', ()=>{
        document.cookie = 'PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
        console.log(document.cookie);
        window.location = "./login.html";
    });

});
$('#back').on("click", ()=>{
    window.location = "./Classi.html"
})
