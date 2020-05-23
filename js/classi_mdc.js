import {MDCTopAppBar} from '@material/top-app-bar';
import {MDCSelect} from '@material/select';
import {MDCRipple} from '@material/ripple';
import {MDCFloatingLabel} from '@material/floating-label';

const topAppBarElement = document.querySelector('.mdc-top-app-bar');
const topAppBar = new MDCTopAppBar(topAppBarElement);

const iconButtonRipple = new MDCRipple(document.querySelector('.mdc-icon-button'));
iconButtonRipple.unbounded = true;
const floatingLabels = [].map.call(document.querySelectorAll('.mdc-floating-label'), function(el) {
  return new MDCFloatingLabel(el);
});
const buttonRipples = [].map.call(document.querySelectorAll('.mdc-button'), function(el) {
    return new MDCRipple(el);
});

const select = new MDCSelect(document.querySelector('.mdc-select'));
select.listen('MDCSelect:change', () => {
  
});

// Instantiation
