@extends('header')

@section('content')

    <?php

    $favorites = [];
    foreach($favs as $i => $f){
        array_push($favorites, $f->pid);
    }

    $hasColor = '#2196f3';

    ?>

    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">Custom Palettes</h1>

        <div class="flex flex-wrap flex-even w100 mb-6">
            <div class="form-row w40">
                <input id="searchBar" type="text" name="name" placeholder="Search 🔍" class="p-1 w100">
            </div>
        </div>


        <div id="mainWrapper" class="flex flex-wrap flex-even mt-4"></div>

    </section>


    <script>
        const searchBar = document.querySelector('#searchBar');
        const wrapper = document.querySelector('#mainWrapper');

        window.addEventListener('DOMContentLoaded', () => {
            fetchApi('');
        });

        searchBar.addEventListener('keyup', (e) => {
            const name = searchBar.value;
            fetchApi(name);
        });

        function fetchApi(name){
            fetch(`https://material-colors.com/api/customs/${name}`)
                .then(data => data.text())
                .then(html => {
                    wrapper.innerHTML = html;
                });
        }

        <?php if(!Auth::guest()): ?>
            window.addEventListener('click', (e) => {
                if(e.target.classList.contains('favs_add__btn')){
                    const el = e.target;

                    const pid = el.getAttribute('data-id');
                    console.log(pid);
                    fetch(`<?= route('favs_add_customs', ['uid' => Auth::user()->id]) ?>/${pid}`)
                        .then(data => data.text())
                        .then(data => {
                            if(data === 'added'){
                                el.style.fill = '<?= $hasColor ?>';
                                el.nextElementSibling.innerHTML = (parseInt(el.nextElementSibling.innerHTML) + 1) + '';
                            }
                            else if(data === 'removed'){
                                el.style.fill = '#000';
                                el.nextElementSibling.innerHTML = (parseInt(el.nextElementSibling.innerHTML) - 1) + '';
                            }
                        });
                }
            });
        <?php endif; ?>
    </script>

@endsection

