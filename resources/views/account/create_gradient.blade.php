@extends('header')

@section('content')

    <style>
        body{
            background: #fff;
            background-attachment: fixed;
        }
    </style>


    <section class="main" style="margin-top: 3.4rem;">

        <h1 class="text-white text-center fs30 mb-0" style="margin-bottom: 2em;">Create a new Gradient</h1>


        <div class="flex flex-end mt-2 w90" style="margin-left: auto; margin-right: auto;">

            <div class="panel shadowed gradient_panel height-fit w50" style="width: 40%; margin: 0;">
                <form id="gradientForm" class="no-bg" style="margin-top: -1em !important; width: 100%;">
                    @csrf
                    <h2 class="mb-2">Create a new Gradient</h2>
                    <div class="gradient_panel__header">
                        <div class="gradient_panel__header__titles">
                            <div class="form-row">
                                <div class="flex">
                                    <input type="text" placeholder="Gradient Name" name="gname" id="gname">
                                    <div class="degree_picker">
                                        <span class="degree_picker__title">0°</span>
                                        <span class="degree_picker__cursor"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gradient_panel__body">
                        <div class="gradient_panel__body_color" style="background: #aaa;">
                            <span class="gradientColorAdd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="gradient_panel__footer">

                        <button class="btn">
                            <span aria-hidden="true" class="btn__left" style="background: #111;"></span>
                            <span class="btn__text">
                                Create&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/>
                                </svg>
                            </span>
                            <span aria-hidden="true" class="btn__right" style="background: #111;"></span>
                        </button>

                    </div>
                </form>
            </div>

        </div>

    </section>


    <!--Exports Modals - Menu-->
    <div class="modal micromodal-slide" id="modal_color" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Enter a color (Any format)
                    </h2>
                </header>
                <main class="modal__content flex flex-col" id="modal-1-content">
                    <form class="no-submit" style="width: 100%;">
                        <input type="hidden" value="" id="color_index">
                        <input type="hidden" value="" id="color_reason">

                        <div id="pickr"></div>
                        <input type="hidden" name="color_value" id="color_value" value="">

                        <br>

                        <button id="color_button" class="btn text-center mt-1" style="margin-left: auto; margin-right: auto; display: inherit;">
                            <span aria-hidden="true" class="btn__left" style="background: #fff;"></span>
                            <span class="btn__text">
                            Ok&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479 6.908l-4-4h3v-4h2v4h3l-4 4z"/>
                            </svg>
                        </span>
                            <span aria-hidden="true" class="btn__right" style="background: #fff;"></span>
                        </button>
                    </form>
                </main>
                <footer class="modal__footer">
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                </footer>
            </div>
        </div>
    </div>

    <script>
        function buildGradientStr(colors, angle){
            let str = 'linear-gradient('+angle+'deg, ';

            Object.keys(colors).forEach(function(key) {
                str += '#' + colors[key] + ' ' + key + '%, ';
            })

            str = str.slice(0, -2);

            str += ')';

            return str;
        }

        let colors = {};
        let angle = 90;
        let gradient = buildGradientStr(colors, angle);

        //Get color divs
        const gradientBody = document.querySelector('.gradient_panel__body');
        let gradientColors = document.querySelectorAll('.gradient_panel__body_color');
        const btnsLeft = document.querySelectorAll('.btn__left:not(.btn_notcolor)');
        const btnsRight = document.querySelectorAll('.btn__right:not(.btn_notcolor)');


        //Functions
        function changeColor(col, index){
            index = parseInt(index);
            const newColors = {};
            let i = 0;
            for (const property in colors) {
                let color = colors[property];
                if(i === index){
                    color = col;
                }
                const percent = property;

                newColors[percent] = color;

                i++;
            }
            colors = newColors;



            //Update gradient color div bg
            gradientColors = document.querySelectorAll('.gradient_panel__body_color');
            gradientColors[index].style.background = '#' + col;


            //Update Btns spans
            btnsLeft.forEach((el) => {
                el.style.background = '#' + newColors[0];
            });
            btnsRight.forEach((el) => {
                el.style.background = '#' + newColors[Object.keys(newColors)[Object.keys(newColors).length - 1]];
            });


            //Update gradient
            updateGradient();
            applyGradientToItems(gradient);
        }
        function updateGradient(){
            gradient = buildGradientStr(colors, angle);
        }
        function applyGradientToItems(){
            //Change bg
            document.body.style.background = gradient;
        }



        //Modal Listeners
        const colorEditBtn = document.querySelector('#color_button');
        const colorEditInput = document.querySelector('#color_value');
        const colorEditIndex = document.querySelector('#color_index');
        const colorEditReason = document.querySelector('#color_reason');
        colorEditBtn.addEventListener('click', () => {
            let newColor = colorEditInput.value.toString().substring(1, colorEditInput.value.toString().length);
            MicroModal.close('modal_color');

            if(newColor === '') return; //Return if color is empty

            colorEditInput.value = ''; //Empty the color


            switch(colorEditReason.value){
                case 'add':
                    if(newColor.toString().length === 3 || newColor.toString().length === 6){
                        newColor = '#' + newColor;
                    }

                    const div = document.createElement('div');
                    div.classList.add('gradient_panel__body_color');
                    div.style.background = newColor;
                    div.innerHTML = '<span class="gradientColorEdit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5' +
                        '.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"/></svg></span><span class="gradientColorRemove"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 10h24v4h-24z"/></svg></span><input type="number" class="input-percent mt-1" placeholder="%" style="width: 50%;">';
                    const lastNode = gradientBody.lastElementChild;
                    gradientBody.insertBefore(div, lastNode);

                    changeColor(newColor, colorEditIndex.value);

                    break;
                case 'edit':
                    changeColor(newColor, parseInt(colorEditIndex.value));

                    break;
            }


            // changeColor(newColor, colorEditIndex.value);
            // applyGradientToItems(gradient);
        });


        //Listeners
        const gradientAddBtns = document.querySelectorAll('.gradientColorAdd');
        const gradientRemoveBtns = document.querySelectorAll('.gradientColorRemove');
        const gradientEditBtns = document.querySelectorAll('.gradientColorEdit');

        gradientAddBtns.forEach((el, index) => {
            el.addEventListener('click', () => {
                colorEditIndex.value = index;
                colorEditReason.value = 'add';
                MicroModal.show('modal_color');
            });
        });
        gradientRemoveBtns.forEach((el) => {
            el.addEventListener('click', () => {
                el.parentElement.remove();
            });
        });
        gradientEditBtns.forEach((el, index) => {
            el.addEventListener('click', () => {
                colorEditIndex.value = index;
                colorEditReason.value = 'edit';
                MicroModal.show('modal_color');
            });
        });

        document.addEventListener('click',function(e){
            if(e.target && e.target.classList.contains('gradientColorEdit')){
                colorEditIndex.value = [...e.target.parentElement.parentElement.children].indexOf(e.target.parentElement);
                colorEditReason.value = 'edit';
                MicroModal.show('modal_color');
            }
        });



        function calculatePercent(el, index, arrayLen){
            const value = el.querySelector('.input-percent').value;

            if(value === ''){
                return ((100 / parseInt(arrayLen)) * (index + 1));
            }
            else{
                return value;
            }
        }


        const gradientForm = document.querySelector('#gradientForm');
        gradientForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const gname = gradientForm.querySelector('#gname').value;
            const angle = gradientForm.querySelector('#angle') ? gradientForm.querySelector('#angle').value : '0';
            const colorsDivs = gradientForm.querySelectorAll('.gradient_panel__body_color');
            let colors = {};
            colorsDivs.forEach((el, index) => {
                if (index !== colorsDivs.length - 1){
                    const percent = calculatePercent(el, index, colorsDivs.length);
                    const color = el.style.backgroundColor;

                    const cols = splitRgb(color);
                    const col = rgbToHex(cols[0], cols[1], cols[2]);
                    colors[percent] = col.substring(1, col.length);
                }
            });

            const data = {
                'gname': gname,
                'angle': angle,
                'colors': colors,
            }

            console.log(JSON.stringify(data))

            fetch('{{ route('account.create_gradient_post') }}', {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value
                },
                credentials: "same-origin",
                method: 'POST',
                body: JSON.stringify(data),
            })
            .then(data => data.text())
            .then(data => {
                Toastify({
                    text: "<p></p><span>"+data+"</span>",
                    duration: 3000000,
                    gravity: "bottom",
                    position: "right",
                    backgroundColor: '#f44336',
                    escapeMarkup: false,
                }).showToast();
            });

        });




        /*=======================================
        *       Picker
        =======================================*/
        const picker = document.querySelectorAll('.degree_picker');
        picker.forEach((el) => {
            //Variables definition
            const title = el.querySelector('.degree_picker__title');
            const cursor = el.querySelector('.degree_picker__cursor');
            const diameter_x = el.clientWidth;
            const diameter_y = el.clientHeight;
            const radius_x = diameter_x / 2;
            const radius_y = diameter_y / 2;
            const center_x = el.getBoundingClientRect().left + radius_x;
            const center_y = el.getBoundingClientRect().top + radius_y;


            //Handler
            function updateCursorPosition(e){
                const x = e.clientX;
                const y = e.clientY;

                const angle = Math.atan2(center_y - y, center_x - x);

                const top = radius_y - (Math.sin(angle) * radius_y);
                const left = radius_x - (Math.cos(angle) * radius_x);
                cursor.style.top = ``;
                cursor.style.left = left + 'px';


                const degreePre = (((angle > 0 ? angle : (2 * Math.PI + angle)) * 360) / (2 * Math.PI)) - 90;
                const degree = Math.round((degreePre < 0) ? 360 - Math.abs(degreePre) : degreePre);

                title.innerHTML = degree + '°';
            }


            //Event mouse down and up
            cursor.addEventListener('mousedown', (e) => {
                e.preventDefault();
                if(e.which === 1){ //Left click
                    window.addEventListener('mousemove', updateCursorPosition);
                }
            });
            window.addEventListener('mouseup', (e) => {
                window.removeEventListener('mousemove', updateCursorPosition);
            });
        });



    </script>

@endsection
