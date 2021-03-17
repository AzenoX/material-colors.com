function getElementIndex(element) {
    return [].indexOf.call(element.parentNode.children, element);
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}




const editors = {
    '.preview__header': 'backgroundColor',
    '.preview__header__title': 'backgroundColor',

    '.selected__wrapper__header__square': 'backgroundColor',
    '.selected__svg_top path': 'fill',
    '.selected__svg_bot path': 'fill',

    '.preview__body__panel': 'backgroundColor',
}

function editColor(newColor, el){
    //Toggle classes
    color_pickers_items.forEach((el) => el.classList.remove('active'));
    el.classList.add('active');

    for (const property in editors) {
        const els = document.querySelectorAll(property);
        els.forEach((el) => {
            el.style[editors[property]] = newColor;
        });
    }


    //Change text values
    const selected_text = document.querySelector('.selected__wrapper__header__color');
    /*const colName = el.parentElement.parentElement.firstElementChild.innerHTML;
    const colTint = el.parentElement.parentElement.parentElement.firstElementChild.children[getElementIndex(el.parentElement)].innerHTML;*/
    const colName = el.getAttribute('data-name').replaceAll('_', ' ');
    const colTint = el.getAttribute('data-tint');

    selected_text.innerHTML = `${capitalizeFirstLetter(colName)} ${colTint}`;


    //Change Color values
    let rgb = newColor.substring(4, newColor.length-1)
        .replace(/ /g, '')
        .split(',');

    console.log(rgb);

    document.querySelector('.selected__body__table__text_hex')
        .innerHTML = rgbToHex(rgb[0], rgb[1], rgb[2]);
    document.querySelector('.selected__body__table__text_hexa')
        .innerHTML = rgbToHex(rgb[0], rgb[1], rgb[2], true);
    document.querySelector('.selected__body__table__text_rgb')
        .innerHTML = rgbToRgb(rgb[0], rgb[1], rgb[2]);
    document.querySelector('.selected__body__table__text_rgba')
        .innerHTML = rgbToRgb(rgb[0], rgb[1], rgb[2], true);
    document.querySelector('.selected__body__table__text_hsl')
        .innerHTML = rgbToHsl(rgb[0], rgb[1], rgb[2]);
    document.querySelector('.selected__body__table__text_hsla')
        .innerHTML = rgbToHsl(rgb[0], rgb[1], rgb[2], true);
}




/*Color convertors*/
function hexToRgb(currColor, isAlpha = false) {
    let red = parseInt(currColor.substring(1, 3), 16);
    let green = parseInt(currColor.substring(3, 5), 16);
    let blue = parseInt(currColor.substring(5, 7), 16);

    if(isAlpha)
        return `rgb(${red},${green},${blue},1.0)`;
    else
        return `rgb(${red},${green},${blue})`;
}
function rgbToHex(r, g, b, isAlpha = false) {

    r = parseInt(r).toString(16);
    g = parseInt(g).toString(16);
    b = parseInt(b).toString(16);

    if (r.length === 1)
        r = "0" + r;
    if (g.length === 1)
        g = "0" + g;
    if (b.length === 1)
        b = "0" + b;

    if(isAlpha)
        return "#" + r + g + b + 'ff';
    else
        return "#" + r + g + b;
}
function rgbToHsl(r, g, b, isAlpha = false) {

    // Make r, g, and b fractions of 1
    r /= 255;
    g /= 255;
    b /= 255;

    // Find greatest and smallest channel values
    let c_min = Math.min(r,g,b),
        c_max = Math.max(r,g,b),
        delta = c_max - c_min,
        h,
        s,
        l;

    // Calculate hue
    // No difference
    if (delta === 0)
        h = 0;
    // Red is max
    else if (c_max === r)
        h = ((g - b) / delta) % 6;
    // Green is max
    else if (c_max === g)
        h = (b - r) / delta + 2;
    // Blue is max
    else
        h = (r - g) / delta + 4;

    h = Math.round(h * 60);

    // Make negative hues positive behind 360°
    if (h < 0)
        h += 360;

    // Calculate lightness
    l = (c_max + c_min) / 2;

    // Calculate saturation
    s = delta === 0 ? 0 : delta / (1 - Math.abs(2 * l - 1));

    // Multiply l and s by 100
    s = +(s * 100).toFixed(1);
    l = +(l * 100).toFixed(1);

    if(isAlpha)
        return "hsla(" + h + "," + s + "%," + l + "%, 1.0)";
    else
        return "hsl(" + h + "," + s + "%," + l + "%)";
}
function rgbToRgb(r, g, b, isAlpha = false){
    if(isAlpha)
        return `rgba(${Math.round(r)},${Math.round(g)},${Math.round(b)},1.0)`;
    else
        return `rgb(${Math.round(r)},${Math.round(g)},${Math.round(b)})`;
}



/*Change color on color click*/
const color_pickers_items = document.querySelectorAll('.picker__table__header__color_item');
color_pickers_items.forEach((el) => {
    el.addEventListener('click', () => {
        const bg = el.style.backgroundColor;
        editColor(bg, el);
    });
});


//Init
window.addEventListener('DOMContentLoaded', () => {
    const el = color_pickers_items[4];
    el.classList.add('active');
    editColor(el.style.backgroundColor, el);
});
