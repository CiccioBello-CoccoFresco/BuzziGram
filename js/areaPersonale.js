//import "../css/registrazione.scss";
//JS
window.$ = require('../node_modules/jquery/dist/jquery');
import _ from 'lodash';

import areaPersonale from "./areaPersonaleLib";

$(document).ready(() => {
    areaPersonale.caricaDati();
    
});
