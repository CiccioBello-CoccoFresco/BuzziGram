import "../css/registrazione.scss";
//JS
window.$ = require('../node_modules/jquery/dist/jquery');
import _ from 'lodash';
require('./registrazione_mdc');
import classi from "./classiLib";
import img  from "../img/polaroid.jpg";

$("#imgbox").append('<img src="../assets/'+img+'">').addClass('mdc-image-list__image').addClass('center-fit');
// ciao
classi.caricaClassi();

