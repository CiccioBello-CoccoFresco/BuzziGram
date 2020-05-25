import "../css/alunni.scss";
//JS
window.$ = require('../node_modules/jquery/dist/jquery');
import _ from 'lodash';
import './alunni_mdc';
import alunni from "./alunniLib";

$(document).ready(() => {

    var h = $('header').height();
    $('.divpos').css('margin-top', h+'px');

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.has("id")) {
        var id = urlParams.get("id");
        //document.getElementById("loading").classList.remove("hidden");
        alunni.caricaAlunni(id);
    }else window.location.replace("../dist/Classi.html");

    $('#ap').on("click", ()=>{
        window.location = "./AreaPersonale.html"
    });
    $('#back').on("click", ()=>{
        window.location = "./Classi.html"
    });

});