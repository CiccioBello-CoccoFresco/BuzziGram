import {MDCTextField} from '@material/textfield';
import {MDCFormField} from '@material/form-field';
import {MDCCheckbox} from '@material/checkbox';
import {MDCNotchedOutline} from '@material/notched-outline';
import {MDCFloatingLabel} from '@material/floating-label';
import {MDCRipple} from '@material/ripple';

const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
const floatingLabels = [].map.call(document.querySelectorAll('.mdc-floating-label'), function(el) {
    return new MDCFloatingLabel(el);
  });
const formFields = [].map.call(document.querySelectorAll('.mdc-form-field'), function(el) {
    return new MDCFormField(el);
  });
const notchedOutlines = [].map.call(document.querySelectorAll('.mdc-notched-outline'), function(el) {
    return new MDCNotchedOutline(el);
  });
const textFields = [].map.call(document.querySelectorAll('.mdc-text-field'), function(el) {
    return new MDCTextField(el);
  });
const checkbox = new MDCCheckbox(document.querySelector('.mdc-checkbox'));

formFields[0].input = checkbox;

console.log("mcd-charged");