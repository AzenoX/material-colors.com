const copiers = document.querySelectorAll('.selected__body__table__text__copy');
copiers.forEach((el) => {
    el.addEventListener('click', () => {
        const col = el.previousElementSibling.innerHTML;
        navigator.clipboard.writeText(col);
    });
})
