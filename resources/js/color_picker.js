function getElementIndex(element) {
    return [].indexOf.call(element.parentNode.children, element);
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}


const color_pickers_items = document.querySelectorAll('.picker__table__header__color_item');
color_pickers_items.forEach((el) => {
    el.addEventListener('click', () => {
        /*============================
            Get bg
        =============================*/
        const bg = el.style.backgroundColor;


        /*============================
            Remove active class to all and add it to selected
        =============================*/
        color_pickers_items.forEach((el) => el.classList.remove('active'));
        el.classList.add('active');



        /*============================
            Apply bg to each items
        =============================*/
        //Preview
        const preview_title = document.querySelector('.preview__header__title');
        const preview_bar = document.querySelector('.preview__header');
        const preview_panels = document.querySelectorAll('.preview__body__panel');

        preview_title.style.color = bg;
        preview_bar.style.borderColor = bg;
        preview_panels.forEach((el) => {
            el.style.borderColor = bg
        });

        //Selected Color
        const selected_square = document.querySelector('.selected__wrapper__header__square');
        const selected_svgTop = document.querySelector('.selected__svg_top path');
        const selected_svgBot = document.querySelector('.selected__svg_bot path');

        selected_square.style.backgroundColor = bg;
        selected_svgTop.style.fill = bg;
        selected_svgBot.style.fill = bg;


        const selected_text = document.querySelector('.selected__wrapper__header__color');
        const colName = el.parentElement.parentElement.firstElementChild.innerHTML;
        const colTint = el.parentElement.parentElement.parentElement.firstElementChild.children[getElementIndex(el.parentElement)].innerHTML;

        selected_text.innerHTML = `${capitalizeFirstLetter(colName)} ${colTint}`
    });
});
