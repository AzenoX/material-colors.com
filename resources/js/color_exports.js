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


const export_css = document.querySelector('.modal_export__color__cssvars');
export_css.addEventListener('click', () => {
    MicroModal.close('modal_exports');
    MicroModal.show('modal_code');
});
