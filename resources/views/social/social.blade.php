@extends('header')

@section('content')

    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">Social Colors</h1>

        <div class="flex flex-wrap flex-even w100">
            <div class="form-row w40">
                <input id="searchBar" type="text" name="name" value="{{ old('name') }}" placeholder="Search 🔍" class="p-1 w100">
            </div>
        </div>


        <div id="socialWrapper" class="flex flex-wrap flex-even mt-4"></div>

    </section>


    <script>
        const searchBar = document.querySelector('#searchBar');
        const wrapper = document.querySelector('#socialWrapper');


        window.addEventListener('DOMContentLoaded', () => {
            fetchApi('');
        });

        searchBar.addEventListener('keyup', (e) => {
            const name = searchBar.value;
            fetchApi(name);
        });

        function fetchApi(name){
            fetch(`https://beta.material-colors.com/api/social/${name}`)
            .then(data => data.text())
            .then(data => {
                wrapper.innerHTML = data;
            });
        }


        /*============================

            Copy handler

        ============================*/
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
        // const btnsCopy = document.querySelectorAll('.btnCopy');
        // btnsCopy.forEach((el) => {
        //     el.addEventListener('click', () => {
        //         const color = el.getAttribute('data-copy');
        //
        //         navigator.clipboard.writeText(color);
        //
        //         Toastify({
        //             text: `<p></p><span>${color} copied !</span>`,
        //             duration: 3000,
        //             gravity: "bottom",
        //             position: "right",
        //             backgroundColor: color,
        //             escapeMarkup: false,
        //         }).showToast();
        //     });
        // });
    </script>

@endsection

