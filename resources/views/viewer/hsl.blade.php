@extends('header')

@section('content')

    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">HSL Viewer</h1>

        <div class="flex" style="gap: 4rem; margin: 4rem;">

            <div class="w50">
                <div class="flex flex-wrap flex-even">
                    <div class="form-row w80 flex" style="gap: 2rem;">
                        <label for="inputColor-h" class="w100">Tint</label>
                        <label for="inputColor-s" class="w100">Saturation</label>
                        <label for="inputColor-l" class="w100">Luminosity</label>
                        <label for="inputColor-a" class="w100">Alpha</label>
                    </div>
                    <div class="form-row w80 flex" style="gap: 2rem;">
                        <input id="inputColor-h" type="text" name="name" placeholder="150deg" class="p-1 w100" style="border-bottom: 10px solid #ffff00;">
                        <input id="inputColor-s" type="text" name="name" placeholder="50%" class="p-1 w100" style="border-bottom: 10px solid #ff00ff;">
                        <input id="inputColor-l" type="text" name="name" placeholder="50%" class="p-1 w100" style="border-bottom: 10px solid #00ffff;">
                        <input id="inputColor-a" type="text" name="name" placeholder="1" value="1" class="p-1 w100" style="border-bottom: 10px solid #000000;">
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
        const input_h = document.querySelector('#inputColor-h');
        const input_s = document.querySelector('#inputColor-s');
        const input_l = document.querySelector('#inputColor-l');
        const input_a = document.querySelector('#inputColor-a');
        const elements = document.querySelectorAll('.preview-color')

        input_h.addEventListener('keyup', (e) => {
            runCalculations()
        });
        input_s.addEventListener('keyup', (e) => {
            runCalculations()
        });
        input_l.addEventListener('keyup', (e) => {
            runCalculations()
        });
        input_a.addEventListener('keyup', (e) => {
            runCalculations()
        });

        function runCalculations() {
            const value_h = input_h.value || '0'
            const value_s = input_s.value || '0'
            const value_l = input_l.value || '0'
            const value_a = input_a.value || '0'

            let hslColor = `hsl(${value_h},${value_s},${value_l},${value_a})`;

            elements.forEach(el => {
                el.style.backgroundColor = hslColor
            })
        }
    </script>

@endsection

