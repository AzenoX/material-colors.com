require('./bootstrap');

const Prism = require('./prism');
import iro from '@jaames/iro';

require('./color_functions');

require('./color_picker');
require('./color_copy');

const MicroModal = require('micromodal');
require('./color_exports');


//Gradients
require('./gradientManager');

require('./loadColorInputs');



if(document.querySelector('#pickr') != null){
    const colorPicker = new iro.ColorPicker('#pickr');

    function onColorChange(color) {
        document.querySelector('#color_value').value = color.hexString;
        document.querySelector('#color_button .btn__left').style.background = color.hexString;
        document.querySelector('#color_button .btn__right').style.background = color.hexString;
    }
    colorPicker.on('color:change', onColorChange);
}





import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
const tooltips = {
    '#exportBtn': 'Press SHIFT while LEFT CLICK on colors to add it in selection.|right',
    '.gradientColorCopy': 'Copy|right',
    '.gradientColorEdit': 'Edit this color|right',
    '.gradientColorRemove': 'Remove this color|right',
    '.gradientColorAdd': 'Add a color|right',
    '.delete-info': 'Delete|right',
}
for (const property in tooltips) {
    const values = tooltips[property].split('|');
    tippy(property, {
        content: values[0],
        placement: values[1],
    });
}



/*=======================================
*       Make Prims
=======================================*/
const samples = document.querySelectorAll('.code_sample__item');
samples.forEach((el) => {
    el.innerHTML = Prism.highlight(el.innerHTML, Prism.languages.css, 'css');
});




/*=======================================
*       Cancel Submitting
=======================================*/
const formNotSubmit = document.querySelectorAll('.no-submit');
formNotSubmit.forEach((el) => {
    el.addEventListener('submit', (e) => {
        e.preventDefault();
    });
});




/*=====================================

    Dropdown

=====================================*/
const dropdownLI = document.querySelectorAll('.dropdown-trigger');
dropdownLI.forEach((el) => {
    const target = document.querySelector('#' + el.getAttribute('data-trigger'));

    el.addEventListener('mouseover', () => {
        const x = el.getBoundingClientRect().x + el.getBoundingClientRect().width;
        const y = el.getBoundingClientRect().y + el.getBoundingClientRect().height;

        target.style.display = 'flex';

        target.style.top = `${y}px`;
        target.style.left = `${x - el.getBoundingClientRect().width - 50}px`;
        target.style.height = 'fit-content';
        target.style.width = `${el.getBoundingClientRect().width + 50}px`;
    });
    el.addEventListener('mouseleave', () => {
        target.style.display = 'none';
    });

    target.addEventListener('mouseover', () => {
        target.style.display = 'flex';
    });
    target.addEventListener('mouseleave', () => {
        target.style.display = 'none';
    });
});




/*=====================================

    Slides Functions

=====================================*/
let slideUp = (target, display = 'block', duration=500) => {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.boxSizing = 'border-box';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout( () => {
        target.style.display = 'none';
        target.style.removeProperty('height');
        target.style.removeProperty('padding-top');
        target.style.removeProperty('padding-bottom');
        target.style.removeProperty('margin-top');
        target.style.removeProperty('margin-bottom');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
        //alert("!");
    }, duration);
}
let slideDown = (target, display = 'block', duration=500) => {
    target.style.removeProperty('display');

    target.style.display = display;
    let height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.boxSizing = 'border-box';
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    window.setTimeout( () => {
        target.style.removeProperty('height');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
    }, duration);
}
let slideToggle = (target, display = 'block', duration = 500) => {
    if (window.getComputedStyle(target).display === 'none') {
        return slideDown(target, display, duration);
    } else {
        return slideUp(target, display, duration);
    }
}

