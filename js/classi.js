import '../css/classi.scss'

window.$ = require('../node_modules/jquery/dist/jquery');
import classi from "./classiLib";
import as from './classi_mdc';


$(document).ready(() => {
    // set tab margin to match header 
    var h = $('header').height();
    $('#annuario').css('margin-top', h+'px');

    // page initialization
    let ascol = classi.calcolaAnnoScolastico();
    let anno = as.tabBar.foundation_.adapter_.getFocusedTabIndex() + 2;
    as.select.value = ascol;
    console.log(anno+ " " +ascol);
    classi.caricaClassiAnnuario(anno, ascol);
    
    $(function() {
        classi.caricaAnni();  
    });
    $('#ap').on("click", ()=>{
        window.location = "./AreaPersonale.html"
    })
    $("#tabs").on("MDCTabBar:activated", function(){
        anno = as.tabBar.foundation_.adapter_.getFocusedTabIndex() + 1;
        console.log(anno+ " " +ascol);
        classi.caricaClassiAnnuario(anno, ascol);
    });
    $(".scelta").on("MDCSelect:change", function(){
        ascol = as.select.value;
        console.log(anno+ " " +ascol);
        classi.caricaClassiAnnuario(anno, ascol);
    });
});


