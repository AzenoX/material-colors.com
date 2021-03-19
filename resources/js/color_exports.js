function getSelectedColors(){
    const colors = [];
    const color_pickers_items = document.querySelectorAll('.picker__table__header__color_item');
    color_pickers_items.forEach((el) => {
        if(el.parentElement.classList.contains('color_exporting')){
            const col = el.style.backgroundColor;
            colors.push(col);
        }
    });
    return colors;
}
function getSelectedColorsAsAssociative(){
    const colors = [];
    const color_pickers_items = document.querySelectorAll('.picker__table__header__color_item');
    color_pickers_items.forEach((el) => {
        if(el.parentElement.classList.contains('color_exporting')){
            const col = el.style.backgroundColor;
            const c_name = el.getAttribute('data-name');
            const c_tint = el.getAttribute('data-tint');
            colors[c_name + "_" + c_tint] = col;
        }
    });
    return colors;
}


function getCode_CSS(){
    let code = ':root{\n';
    getSelectedColors().forEach((col, i) => {
        const rgb = extractRgbArray(col);
        code += `   --color${i + 1}: ${rgbToHex(rgb[0], rgb[1], rgb[2])};\n`;
    });
    code += '}';

    return code;
}
function getCode_Tailwind(){
    let code = 'module.exports = {\n  theme: {\n    extend: {\n      colors: {\n';

    let colors = getSelectedColorsAsAssociative();

    for (const property in colors) {
        const rgb = extractRgbArray(colors[property]);
        code += `        '${property}': '${rgbToHex(rgb[0], rgb[1], rgb[2])}',\n`;
    }
    code += '      }\n    }\n  }\n}';

    return code;
}




const exportBtn = document.querySelector('.exportBtn');
exportBtn.addEventListener('click', () => {
    MicroModal.show('modal_exports');
});

const backBtn = document.querySelectorAll('.modal__btn_back');
backBtn.forEach((el) => {
    el.addEventListener('click', () => {
        MicroModal.close('modal_code');
        MicroModal.show('modal_exports');
    });
})



const export__code = document.querySelector('.export__code');
const export__title = document.querySelector('.modal__title');


const exportsMainMenuItem = document.querySelectorAll('.modal_menu__item');
exportsMainMenuItem.forEach((el) => {
    el.addEventListener('click', () => {

        //Build Code
        let code = [];
        let lang = 'plain';

        if(el.classList.contains('modal_export__color__cssvars')){
            //Add correct class to code wrapper
            export__code.classList.add('language-css');
            lang = 'css';

            //Generate code
            code = getCode_CSS();
        }
        else if(el.classList.contains('modal_export__color__tailwind')){
            //Add correct class to code wrapper
            export__code.classList.add('language-javascript');
            lang = 'javascript';

            //Generate code
            code = getCode_Tailwind();
        }


        if(code.length === 0)
            return;

        //Change parts in modal
        export__code.innerHTML = Prism.highlight(code, Prism.languages.css, lang);
        export__title.innerHTML = 'Export ' + el.innerHTML;


        //Switch modals
        MicroModal.close('modal_exports');
        MicroModal.show('modal_code');
    });
});
