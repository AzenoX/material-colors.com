function getElementIndex(element) {
    return [].indexOf.call(element.parentNode.children, element);
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function setCharAt(str,index,chr) {
    if(index > str.length-1) return str;
    return str.substring(0,index) + chr + str.substring(index+1);
}
function padLeadingZeros(num, size) {
    let s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}
function animateColorAtChange(el, fromTxt, toTxt){

    [...fromTxt].forEach((c, i) => {

        let txt_from = fromTxt.charCodeAt(i);
        const txt_to = toTxt.charCodeAt(i);

        let interval = setInterval(() => {

            //If we have to go down
            if(txt_from > txt_to) txt_from--;
            //If we have to go up
            else if(txt_from < txt_to) txt_from++;
            //else, stop
            else clearInterval(interval);

            //Skip unwanted chars like < > ! etc...
            if(!(unwantedChars.includes(txt_from))) el.innerHTML = setCharAt(el.innerHTML, i, String.fromCharCode(txt_from));

        }, 10);

    });
}
function editColor(newColor, el){
    //Toggle classes
    Array.prototype.slice.call(color_pickers_items)
        .filter((el) => !el.parentElement.classList.contains('color_exporting'))
        .forEach((el) => el.classList.remove('active'));
    el.classList.add('active');

    for (const property in editors) {
        const els = document.querySelectorAll(property);
        els.forEach((el) => {
            el.style[editors[property]] = newColor;
        });
    }


    //Change text values
    const selected_text = document.querySelector('.selected__wrapper__header__color');
    const colName = el.getAttribute('data-name').replaceAll('_', ' ');
    const colTint = el.getAttribute('data-tint');

    selected_text.innerHTML = `${capitalizeFirstLetter(colName)} ${colTint}`;


    //Change Color values - ARRAY
    let rgb = newColor.substring(4, newColor.length-1)
        .replace(/ /g, '')
        .split(',');




    const c_hex = document.querySelector('.selected__body__table__text_hex');
    animateColorAtChange(c_hex, c_hex.innerHTML, rgbToHex(rgb[0], rgb[1], rgb[2]));


    const c_hexa = document.querySelector('.selected__body__table__text_hexa');
    animateColorAtChange(c_hexa, c_hexa.innerHTML, rgbToHex(rgb[0], rgb[1], rgb[2], true));


    const c_rgb = document.querySelector('.selected__body__table__text_rgb');
    animateColorAtChange(c_rgb, c_rgb.innerHTML, rgbToRgb(rgb[0], rgb[1], rgb[2]));


    const c_rgba = document.querySelector('.selected__body__table__text_rgba');
    animateColorAtChange(c_rgba, c_rgba.innerHTML, rgbToRgb(rgb[0], rgb[1], rgb[2], true));


    const c_hsl = document.querySelector('.selected__body__table__text_hsl');
    animateColorAtChange(c_hsl, c_hsl.innerHTML, rgbToHsl(rgb[0], rgb[1], rgb[2]));


    const c_hsla = document.querySelector('.selected__body__table__text_hsla');
    animateColorAtChange(c_hsla, c_hsla.innerHTML, rgbToHsl(rgb[0], rgb[1], rgb[2], true));

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
    s = +(s * 100);
    l = +(l * 100);

    if(isAlpha)
        return "hsla(" + padLeadingZeros(h, 3) + "," + padLeadingZeros(Math.ceil(s), 3) + "%," + padLeadingZeros(Math.ceil(l), 3) + "%,1.0)";
    else
        return "hsl(" + padLeadingZeros(h, 3) + "," + padLeadingZeros(Math.ceil(s), 3) + "%," + padLeadingZeros(Math.ceil(l), 3) + "%)";
}
function rgbToRgb(r, g, b, isAlpha = false){
    if(isAlpha)
        return `rgba(${padLeadingZeros(Math.round(r), 3)},${padLeadingZeros(Math.round(g), 3)},${padLeadingZeros(Math.round(b), 3)},1.0)`;
    else
        return `rgb(${padLeadingZeros(Math.round(r), 3)},${padLeadingZeros(Math.round(g), 3)},${padLeadingZeros(Math.round(b), 3)})`;
}




const editors = {
    '.preview__header': 'backgroundColor',
    '.preview__header__title': 'backgroundColor',

    '.selected__wrapper__header__square': 'backgroundColor',
    '.selected__svg_top path': 'fill',
    '.selected__svg_bot path': 'fill',

    '.preview__body__panel': 'backgroundColor',

    '.btn__left': 'backgroundColor',
    '.btn__right': 'backgroundColor',
}
const unwantedChars = [31,32,33,34,35,36,37,38,39,40,41,42,43,45,46,47,91,92,93,94,95,96,123,124,125,126,127,58,59,60,61,62,63,64];



/*Handle MAJ key*/
let shiftPressed = false;
console.log('declared');

window.addEventListener('keydown', (e) => {
    if(e.key === 'Shift'){
        shiftPressed = true;
    }
});
window.addEventListener('keyup', (e) => {
    if(e.key === 'Shift'){
        shiftPressed = false;
    }
});



const exportColors = [];





/*Change color on color click*/
const color_pickers_items = document.querySelectorAll('.picker__table__header__color_item');
color_pickers_items.forEach((el) => {
    el.addEventListener('click', () => {
        const bg = el.style.backgroundColor;
        if(!shiftPressed){
            editColor(bg, el);
        }
        else{
            if(el.parentElement.classList.contains('color_exporting')){

                const index = exportColors.indexOf(bg);
                if (index > -1) {
                    exportColors.splice(index, 1);
                }

                el.parentElement.classList.remove('color_exporting');
                el.classList.remove('active');

                Toastify({
                    text: `<p></p><span>${bg} removed !</span>`,
                    duration: 3000,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: bg,
                }).showToast();
            }
            else{
                exportColors.push(bg);
                el.parentElement.classList.add('color_exporting');
                el.classList.add('active');

                Toastify({
                    text: `<p></p><span>${bg} added !</span>`,
                    duration: 3000,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: bg,
                }).showToast();
            }
        }
    });
});


//Init
window.addEventListener('DOMContentLoaded', () => {
    const el = color_pickers_items[4];
    el.classList.add('active');
    editColor(el.style.backgroundColor, el);
});
