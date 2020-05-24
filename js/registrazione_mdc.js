import {MDCTextField} from '@material/textfield';
import {MDCNotchedOutline} from '@material/notched-outline';
import {MDCFloatingLabel} from '@material/floating-label';
import {MDCRipple} from '@material/ripple';
import {MDCSelect} from '@material/select';

const select = new MDCSelect(document.querySelector('.mdc-select'));

select.listen('MDCSelect:change', () => {
  $('#hid').val(select.value);
});

const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
const floatingLabels = [].map.call(document.querySelectorAll('.mdc-floating-label'), function(el) {
    return new MDCFloatingLabel(el);
  });
const notchedOutlines = [].map.call(document.querySelectorAll('.mdc-notched-outline'), function(el) {
    return new MDCNotchedOutline(el);
  });
const textFields = [].map.call(document.querySelectorAll('.mdc-text-field'), function(el) {
    return new MDCTextField(el);
  });