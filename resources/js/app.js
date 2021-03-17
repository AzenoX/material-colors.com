require('./bootstrap');

require('./color_picker');
require('./color_copy');



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
        target.style.left = `${x - el.getBoundingClientRect().width}px`;
        target.style.height = 'fit-content';
        target.style.width = `${el.getBoundingClientRect().width}px`;
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

