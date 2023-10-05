@extends('header')

@section('content')

    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">Variants</h1>

        <div class="flex flex-wrap flex-even w100">
            <div class="form-row w40">
                <input id="inputColor" type="text" name="name" placeholder="Input Color (HEX Format, e.g. #ff0000 or ff0000)" class="p-1 w100">
            </div>
        </div>

        <div class="flex flex-wrap flex-even mt-4 color-panes">
            <div id="color-main--2" class="color-pane">
                <div class="pane-texts">
                    <p class="pane-title">-20%</p>
                    <p class="pane-color">#D3D3D3</p>
                </div>
                <div class="pane-bg"></div>
                <button class="btnCopy" data-copy="#D3D3D3">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m22 7c0-.478-.379-1-1-1h-14c-.62 0-1 .519-1 1v14c0 .621.52 1 1 1h14c.478 0 1-.379 1-1zm-20 8v2c0 .621.52 1 1 1h2v-1.5h-1.5v-1.5zm1.5-4.363v3.363h-1.5v-3.363zm0-4.637v3.637h-1.5v-3.637zm11.5-4v1.5h1.5v1.5h1.5v-2c0-.478-.379-1-1-1zm-10 0h-2c-.62 0-1 .519-1 1v2h1.5v-1.5h1.5zm4.5 1.5h-3.5v-1.5h3.5zm4.5 0h-3.5v-1.5h3.5z" fill-rule="nonzero"/>
                    </svg>
                </button>
            </div>
            <div id="color-main--1" class="color-pane">
                <div class="pane-texts">
                    <p class="pane-title">-10%</p>
                    <p class="pane-color">#D3D3D3</p>
                </div>
                <div class="pane-bg"></div>
                <button class="btnCopy" data-copy="#D3D3D3">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m22 7c0-.478-.379-1-1-1h-14c-.62 0-1 .519-1 1v14c0 .621.52 1 1 1h14c.478 0 1-.379 1-1zm-20 8v2c0 .621.52 1 1 1h2v-1.5h-1.5v-1.5zm1.5-4.363v3.363h-1.5v-3.363zm0-4.637v3.637h-1.5v-3.637zm11.5-4v1.5h1.5v1.5h1.5v-2c0-.478-.379-1-1-1zm-10 0h-2c-.62 0-1 .519-1 1v2h1.5v-1.5h1.5zm4.5 1.5h-3.5v-1.5h3.5zm4.5 0h-3.5v-1.5h3.5z" fill-rule="nonzero"/>
                    </svg>
                </button>
            </div>
            <div id="color-main" class="color-pane">
                <div class="pane-texts">
                    <p class="pane-title">Original</p>
                    <p class="pane-color">#D3D3D3</p>
                </div>
                <div class="pane-bg"></div>
                <button class="btnCopy" data-copy="#D3D3D3">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m22 7c0-.478-.379-1-1-1h-14c-.62 0-1 .519-1 1v14c0 .621.52 1 1 1h14c.478 0 1-.379 1-1zm-20 8v2c0 .621.52 1 1 1h2v-1.5h-1.5v-1.5zm1.5-4.363v3.363h-1.5v-3.363zm0-4.637v3.637h-1.5v-3.637zm11.5-4v1.5h1.5v1.5h1.5v-2c0-.478-.379-1-1-1zm-10 0h-2c-.62 0-1 .519-1 1v2h1.5v-1.5h1.5zm4.5 1.5h-3.5v-1.5h3.5zm4.5 0h-3.5v-1.5h3.5z" fill-rule="nonzero"/>
                    </svg>
                </button>
            </div>
            <div id="color-main-1" class="color-pane">
                <div class="pane-texts">
                    <p class="pane-title">+10%</p>
                    <p class="pane-color">#D3D3D3</p>
                </div>
                <div class="pane-bg"></div>
                <button class="btnCopy" data-copy="#D3D3D3">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m22 7c0-.478-.379-1-1-1h-14c-.62 0-1 .519-1 1v14c0 .621.52 1 1 1h14c.478 0 1-.379 1-1zm-20 8v2c0 .621.52 1 1 1h2v-1.5h-1.5v-1.5zm1.5-4.363v3.363h-1.5v-3.363zm0-4.637v3.637h-1.5v-3.637zm11.5-4v1.5h1.5v1.5h1.5v-2c0-.478-.379-1-1-1zm-10 0h-2c-.62 0-1 .519-1 1v2h1.5v-1.5h1.5zm4.5 1.5h-3.5v-1.5h3.5zm4.5 0h-3.5v-1.5h3.5z" fill-rule="nonzero"/>
                    </svg>
                </button>
            </div>
            <div id="color-main-2" class="color-pane">
                <div class="pane-texts">
                    <p class="pane-title">+20%</p>
                    <p class="pane-color">#D3D3D3</p>
                </div>
                <div class="pane-bg"></div>
                <button class="btnCopy" data-copy="#D3D3D3">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m22 7c0-.478-.379-1-1-1h-14c-.62 0-1 .519-1 1v14c0 .621.52 1 1 1h14c.478 0 1-.379 1-1zm-20 8v2c0 .621.52 1 1 1h2v-1.5h-1.5v-1.5zm1.5-4.363v3.363h-1.5v-3.363zm0-4.637v3.637h-1.5v-3.637zm11.5-4v1.5h1.5v1.5h1.5v-2c0-.478-.379-1-1-1zm-10 0h-2c-.62 0-1 .519-1 1v2h1.5v-1.5h1.5zm4.5 1.5h-3.5v-1.5h3.5zm4.5 0h-3.5v-1.5h3.5z" fill-rule="nonzero"/>
                    </svg>
                </button>
            </div>
        </div>

    </section>


    <style>
        .btnCopy {
            background: none;
            border: none;
            outline: none;

            position: absolute;
            bottom: 10px;
            right: 10px;

            height: 50px;
            width: 50px;
        }
        svg, path {
            pointer-events: none;
        }

        .color-panes {
            display: flex;
            justify-content: space-evenly;
        }
        .color-pane {
            position: relative;
            width: 15vw;
            height: 40vh;

            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-direction: column;
            padding: 2rem 0;

            color: #000000;
            background: #e0e0e0;
            font-size: 1.4rem;
            box-shadow: 5px 5px 5px 0 #000000;
        }
        .color-pane div.pane-texts {
            background: #000000;
            color: #ffffff;
            width: 80%;
            padding: 0.2rem 3rem;
            text-align: center;
        }
        .color-pane p.pane-title {
            font-weight: bold;
        }
        .color-pane p.pane-color {
        }
        .color-pane .pane-bg {
            margin-top: 1em;
            height: 50%;
            width: 80%;
            /*box-shadow: 5px 5px 5px 0 #000000;*/
        }

        #color-main .pane-bg {
            background: grey;
        }
        #color-main--1 .pane-bg {
            background: grey;
        }
        #color-main--2 .pane-bg {
            background: grey;
        }
        #color-main-1 .pane-bg {
            background: grey;
        }
        #color-main-2 .pane-bg {
            background: grey;
        }
    </style>


    <script>
        function customHexToRGB(hex) {
            // Remove the # symbol if it's present
            hex = hex.replace(/^#/, '');

            // Parse the hex values to obtain the RGB components
            const r = parseInt(hex.slice(0, 2), 16);
            const g = parseInt(hex.slice(2, 4), 16);
            const b = parseInt(hex.slice(4, 6), 16);

            return { r, g, b };
        }
        function adjustRGB(rgb, percent, direction) {
            // Calculate the adjustment factor
            let factor = (Math.abs(percent) * 255) / 100
            // Adjust each RGB component based on the direction
            let r = rgb.r;
            let g = rgb.g;
            let b = rgb.b;

            if (direction === 'positive') {
                r = Math.max(0, rgb.r - factor);
                g = Math.max(0, rgb.g - factor);
                b = Math.max(0, rgb.b - factor);
            } else if (direction === 'negative') {
                r = Math.min(255, rgb.r + factor);
                g = Math.min(255, rgb.g + factor);
                b = Math.min(255, rgb.b + factor);
            }

            r = parseInt(r)
            g = parseInt(g)
            b = parseInt(b)
            return { r, g, b };
        }
        function customRgbToHex(rgb) {
            // Convert RGB to hexadecimal
            const red = rgb.r.toString(16).padStart(2, '0');
            const green = rgb.g.toString(16).padStart(2, '0');
            const blue = rgb.b.toString(16).padStart(2, '0');

            return `#${red}${green}${blue}`;
        }

        const input = document.querySelector('#inputColor');

        const c_main__2 = document.querySelector('#color-main--2 .pane-bg');
        const c_main__1 = document.querySelector('#color-main--1 .pane-bg');
        const c_main = document.querySelector('#color-main .pane-bg');
        const c_main_1 = document.querySelector('#color-main-1 .pane-bg');
        const c_main_2 = document.querySelector('#color-main-2 .pane-bg');

        const c_main__2__color = document.querySelector('#color-main--2 .pane-color');
        const c_main__1__color = document.querySelector('#color-main--1 .pane-color');
        const c_main__color = document.querySelector('#color-main .pane-color');
        const c_main_1__color = document.querySelector('#color-main-1 .pane-color');
        const c_main_2__color = document.querySelector('#color-main-2 .pane-color');

        const c_main__2__cpy = document.querySelector('#color-main--2 .btnCopy');
        const c_main__1__cpy = document.querySelector('#color-main--1 .btnCopy');
        const c_main__cpy = document.querySelector('#color-main .btnCopy');
        const c_main_1__cpy = document.querySelector('#color-main-1 .btnCopy');
        const c_main_2__cpy = document.querySelector('#color-main-2 .btnCopy');

        const hexPattern = /^(?:#)?[A-Fa-f0-9]{6}$/;

        input.addEventListener('keyup', (e) => {
            if (hexPattern.test(input.value)) {
                const hexColor = input.value;

                c_main.style.background = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 0, 'positive'))
                c_main_1.style.background = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 10, 'positive'))
                c_main_2.style.background = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 20, 'positive'))
                c_main__1.style.background = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 10, 'negative'))
                c_main__2.style.background = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 20, 'negative'))

                c_main__color.textContent = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 0, 'positive'))
                c_main_1__color.textContent = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 10, 'positive'))
                c_main_2__color.textContent = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 20, 'positive'))
                c_main__1__color.textContent = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 10, 'negative'))
                c_main__2__color.textContent = customRgbToHex(adjustRGB(customHexToRGB(hexColor), 20, 'negative'))

                c_main__cpy.setAttribute('data-copy', customRgbToHex(adjustRGB(customHexToRGB(hexColor), 0, 'positive')))
                c_main_1__cpy.setAttribute('data-copy', customRgbToHex(adjustRGB(customHexToRGB(hexColor), 10, 'positive')))
                c_main_2__cpy.setAttribute('data-copy', customRgbToHex(adjustRGB(customHexToRGB(hexColor), 20, 'positive')))
                c_main__1__cpy.setAttribute('data-copy', customRgbToHex(adjustRGB(customHexToRGB(hexColor), 10, 'negative')))
                c_main__2__cpy.setAttribute('data-copy', customRgbToHex(adjustRGB(customHexToRGB(hexColor), 20, 'negative')))
            }
        });

        // Copy handler
        window.addEventListener('click', (e) => {
            if(e.target.classList.contains('btnCopy')){
                e.stopPropagation();

                const color = e.target.getAttribute('data-copy');

                navigator.clipboard.writeText(color);

                Toastify({
                    text: `<p></p><span>${color} copied !</span>`,
                    duration: 3000,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: color,
                    escapeMarkup: false,
                }).showToast();
            }
        });
    </script>

@endsection

