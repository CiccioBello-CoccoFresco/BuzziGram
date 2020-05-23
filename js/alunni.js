//import "../css/alunni.sass";
//JS
window.$ = require('../node_modules/jquery/dist/jquery');
import _ from 'lodash';
import alunni from "./alunniLib";

console.log("CIAO");
$(document).ready(() => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.has("id")) {
        var id = urlParams.get("id");
        //document.getElementById("loading").classList.remove("hidden");
        alunni.caricaAlunni(id);
    }else window.location.replace("../dist/Classi.html");
});