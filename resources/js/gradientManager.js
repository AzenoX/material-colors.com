const gradientCopyBtns = document.querySelectorAll('.gradientColorCopy');
gradientCopyBtns.forEach((el) => {
    el.addEventListener('click', () => {
        const bg = el.parentElement.style.backgroundColor;

        navigator.clipboard.writeText(bg);

        Toastify({
            text: "<p></p><span>"+bg+" copied !</span>",
            duration: 3000,
            gravity: "bottom",
            position: "right",
            backgroundColor: bg,
            escapeMarkup: false,
        }).showToast();
    });
});


