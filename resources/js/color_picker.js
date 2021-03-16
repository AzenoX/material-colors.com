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
    const colName = el.parentElement.parentElement.firstElementChild.innerHTML;
    const colTint = el.parentElement.parentElement.parentElement.firstElementChild.children[getElementIndex(el.parentElement)].innerHTML;

    selected_text.innerHTML = `${capitalizeFirstLetter(colName)} ${colTint}`;
}




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
