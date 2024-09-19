@extends('header')

@section('content')

    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">HEX Viewer</h1>

        <div class="flex" style="gap: 4rem; margin: 4rem;">

            <div class="w50">
                <div class="flex flex-wrap flex-even">
                    <div class="form-row w40">
                        <input id="inputColor" type="text" name="name" placeholder="Hex Color (e.g. #ff0000 or ff0000)" class="p-1 w100">
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
        const input = document.querySelector('#inputColor');
        const hexPattern = /^(?:#)?[A-Fa-f0-9]{6}$/;
        const elements = document.querySelectorAll('.preview-color')

        input.addEventListener('keyup', (e) => {
            if (hexPattern.test(input.value)) {
                let hexColor = input.value;
                console.log('hexColor')
                console.log(hexColor)

                if (!hexColor.startsWith('#')) {
                    hexColor = '#' + hexColor
                }

                elements.forEach(el => {
                    el.style.backgroundColor = hexColor
                    console.log('hexColor')
                    console.log(hexColor)
                })
            }
        });
    </script>

@endsection

