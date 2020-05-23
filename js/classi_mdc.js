import {MDCTopAppBar} from '@material/top-app-bar';
import {MDCSelect} from '@material/select';
import {MDCRipple} from '@material/ripple';


const buttonRipples = [].map.call(document.querySelectorAll('.mdc-button'), function(el) {
    return new MDCRipple(el);
});

const select = new MDCSelect(document.querySelector('.mdc-select'));

select.listen('MDCSelect:change', () => {
  alert(`Selected option at index ${select.selectedIndex} with value "${select.value}"`);
});

// Instantiation
const topAppBarElement = document.querySelector('.mdc-top-app-bar');
const topAppBar = new MDCTopAppBar(topAppBarElement);