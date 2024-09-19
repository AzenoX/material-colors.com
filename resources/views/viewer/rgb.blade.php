@extends('header')

@section('content')

    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">RGB Viewer</h1>

        <div class="flex" style="gap: 4rem; margin: 4rem;">

            <div class="w50">
                <div class="flex flex-wrap flex-even">
                    <div class="form-row w80 flex" style="gap: 2rem;">
                        <input id="inputColor-r" type="number" name="name" placeholder="Red" class="p-1 w100" style="border-bottom: 10px solid #ff0000;">
                        <input id="inputColor-g" type="number" name="name" placeholder="Green" class="p-1 w100" style="border-bottom: 10px solid #00ff00;">
                        <input id="inputColor-b" type="number" name="name" placeholder="Blue" class="p-1 w100" style="border-bottom: 10px solid #0000ff;">
                    </div>
                </div>

                <div class="flex flex-wrap flex-even center w100 preview-color" style="margin-top: 10vh; height: 30vh; background: #000000;">

                </div>
            </div>

            <div class="w50">
                <p class="preview_title fs20 text-white montserrat bold mb-1">Live Preview</p>
                <div class="preview shadowed">
                    <div class="preview__header shadowed preview-color" style="background: #000000;">
                        <p class="preview__header__title fs20 bold">Your Website</p>
                    </div>
                    <div class="preview__body">
                        <p class="preview__body__title fs20 text-center text-white bold roboto">Hello world</p>
                        <div class="preview__body__panels flex flex-sparound">
                            @for($i = 0 ; $i < 9 ; $i++)
                                <div class="preview__body__panel shadowed preview-color" style="background: #000000;"></div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>


    <style>
    </style>


    <script>
        const input_r = document.querySelector('#inputColor-r');
        const input_g = document.querySelector('#inputColor-g');
        const input_b = document.querySelector('#inputColor-b');
        const hexPattern = /^(?:#)?[0-9]{1,3}$/;
        const elements = document.querySelectorAll('.preview-color')

        input_r.addEventListener('keyup', (e) => {
            runCalculations()
        });
        input_g.addEventListener('keyup', (e) => {
            runCalculations()
        });
        input_b.addEventListener('keyup', (e) => {
            runCalculations()
        });

        function runCalculations() {
            const value_r = input_r.value || '0'
            const value_g = input_g.value || '0'
            const value_b = input_b.value || '0'

            if (hexPattern.test(value_r) && hexPattern.test(value_g) && hexPattern.test(value_b)) {
                let rgbColor = `rgb(${value_r},${value_g},${value_b})`;

                elements.forEach(el => {
                    el.style.backgroundColor = rgbColor
                })
            }
        }
    </script>

@endsection

