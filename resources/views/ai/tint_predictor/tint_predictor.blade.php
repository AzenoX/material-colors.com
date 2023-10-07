@extends('header')

@section('content')

    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30 mb-1">Tint Predictor</h1>
        <h3 class="text-white text-center fs12 mb-5">Check if a color is bright or dark</h3>

        <div class="flex flex-wrap flex-even w100">
            <div class="form-row w40">
                <input id="inputColor" type="text" name="name" placeholder="Input Color (HEX or RGB Format, e.g. #ff0000 or ff0000 or RRR,GGG,BBB)" class="p-1 w100">

                <div class="flex flex-beet align-items-center">
                    <div class="flex flex-middle">
                        <p class="fs14 text-white">This color is <span id="tint-result" class="">...</span></p>
                    </div>

                    <div class="flex justify-content-end pr-2">
                        <button id="testButton" class="btn center mb-3 mt-2" style="display: block; margin-right: auto !important; margin-left: auto !important; width: -moz-fit-content; width: fit-content;">
                            <span aria-hidden="true" class="btn__left btn_notcolor-dark" style="background: #fff;"></span>
                            <span class="btn__text">
                        Make Prediction
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.131 24c-.124-.621-.273-1.258-.447-1.841-1.019-3.401-2.688-3.461-2.684-6.494.007-3.556.008-6.055 0-8.455-.003-.824.566-1.26 1.127-1.26.489 0 .973.332 1.067 1.026.38 2.792.877 6.04 1.083 6.715.294.964 1.664.452 1.105-.461-.39-.636-.926-2.198-1.146-3.555 3.756 2.461 4.35 2.074 3.859 5.911-.244 1.912-.426 4.173.904 6.775l-4.868 1.639zm-16.131-21v5h11v-5h-11zm8 15h3v-5h-3v5zm4.499 2.186c-.246-.363-.502-.747-.733-1.186h-12.766v-17h13v2.807c.541-.512 1.257-.812 2-.844v-3.963h-17v21h16.017c-.167-.285-.34-.551-.518-.814zm-5.499-7.186h-3v2h3v-2zm1-1h3v-2h-3v2zm-5-2h-3v2h3v-2zm-3 8h3v-2h-3v2zm3-5h-3v2h3v-2zm1 5h3v-2h-3v2zm3-8h-3v2h3v-2z"/>
                        </svg>
                    </span>
                            <span aria-hidden="true" class="btn__right btn_notcolor" style="background: #fff;"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <style>
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
            font-size: 1.4rem;
        }
        .color-pane div.pane-texts {
            background: rgba(255, 255, 255, 0.5);
            width: fit-content;
            padding: 0.2rem 3rem;
            text-align: center;
        }
        .color-pane p.pane-title {
            font-weight: bold;
        }
    </style>


    <script>
        const input = document.querySelector('#inputColor')
        const button = document.querySelector('#testButton')
        const tintResult = document.querySelector('#tint-result')

        /**
         * Validate a color
         * @param inputValue
         * @returns {boolean}
         */
        function validateColor(inputValue) {
            const hexPattern = /^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{8})$/;
            const rgbPattern = /^(\d{1,3}),(\d{1,3}),(\d{1,3})(,(\d{1,3}))?$/;

            if (hexPattern.test(inputValue)) {
                return true;
            }

            if (rgbPattern.test(inputValue)) {
                const matches = inputValue.match(rgbPattern);
                if (!matches) return false; // This shouldn't happen due to the previous check, but it's safer to have it.

                const isValidNumber = num => num >= 0 && num <= 255;
                if (isValidNumber(Number(matches[1])) &&
                    isValidNumber(Number(matches[2])) &&
                    isValidNumber(Number(matches[3])) &&
                    (!matches[5] || isValidNumber(Number(matches[5])))) {
                    return true;
                }
            }

            return false;
        }

        /**
         * Ask the backend
         * @param inputValue
         * @returns {Promise<any>}
         */
        async function postTintTest(inputValue) {
            const endpoint = "{{ route('ai.tintpredictor.post') }}"
            try {
                const response = await fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        data: inputValue,
                        _token: '{{ csrf_token() }}'
                    })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                return await response.json();
            } catch (error) {
                console.error('Error making the POST request:', error);
                throw error;
            }
        }

        button.addEventListener('click', () => {
            const inputValue = input.value
            if (validateColor(inputValue)) {
                postTintTest(inputValue)
                    .then(data => {
                        const response = data

                        tintResult.classList.remove('chip')
                        tintResult.classList.remove('chip-light')
                        tintResult.classList.remove('chip-dark')
                        tintResult.textContent = '...'

                        tintResult.classList.add('chip')
                        tintResult.textContent = response.prediction
                        if (response.prediction === 'Dark') {
                            tintResult.classList.add('chip-dark')
                        } else {
                            tintResult.classList.add('chip-light')
                        }

                        console.log(response)
                        document.body.style.backgroundColor = response.bg
                    })
                    .catch(err => {
                        console.error('Failed to fetch:', err);
                    })
            }
        })
    </script>

@endsection

