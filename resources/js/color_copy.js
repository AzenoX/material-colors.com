const copiers = document.querySelectorAll('.selected__body__table__text__copy');
copiers.forEach((el) => {
    el.addEventListener('click', () => {
        const col = el.previousElementSibling.innerHTML;
        navigator.clipboard.writeText(col);

        Toastify({
            text: `<p></p><span>${col} copied !</span>`,
            duration: 3000,
            gravity: "bottom",
            position: "right",
            backgroundColor: col,
        }).showToast();
    });
});


const exportBtns = document.querySelectorAll('.copyBtnExport');
exportBtns.forEach((el) => {
    el.addEventListener('click', () => {
        const code = document.querySelector('.export__code_wrapper pre code').innerHTML.replace( /(<([^>]+)>)/ig, '');
        navigator.clipboard.writeText(code);

        Toastify({
            text: `<p></p><span>Code has been copied !</span>`,
            duration: 3000,
            gravity: "bottom",
            position: "right",
            backgroundColor: '#4CAF50',
        }).showToast();
    });
});
