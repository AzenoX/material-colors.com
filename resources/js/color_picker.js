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
function extractRgbArray(rgb){
    return rgb.substring(4, rgb.length-1)
        .replace(/ /g, '')
        .split(',');
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
    let rgb = extractRgbArray(newColor);




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


//Make them accessible everywhere
window.padLeadingZeros = padLeadingZeros;
window.extractRgbArray = extractRgbArray;



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
const counter = document.querySelector('#export_selected_count');
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
                    text: `<p></p><span><span style="color: #F44336;">✘</span>${bg} removed !</span>`,
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
                    text: '<p></p><span><span style="color: #4CAF50;">✔</span>${bg} added !</span>',
                    duration: 3000,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: bg,
                }).showToast();
            }

            counter.innerHTML = exportColors.length + '';
        }
    });
});


//Init
window.addEventListener('DOMContentLoaded', () => {
    if(color_pickers_items.length > 0){
        const el = color_pickers_items[4];
        el.classList.add('active');
        editColor(el.style.backgroundColor, el);
    }
});
