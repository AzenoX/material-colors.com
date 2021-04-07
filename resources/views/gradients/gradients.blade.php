@extends('header')

@section('content')

    <?php

        function buildGradientStr($colors, $angle){
            $colors = json_decode($colors);

            $str = 'linear-gradient('.$angle.'deg, ';

            foreach($colors as $percent => $color){
                $str .= '#' . $color . ' ' . $percent . '%,';
            }

            $str = substr($str, 0, -1);

            $str .= ')';

            return $str;
        }

        $favorites = [];
        foreach($favs as $i => $f){
            array_push($favorites, $f->gid);
        }

        $hasColor = '#2196f3';

    ?>


    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">Gradients</h1>

        <div class="flex flex-wrap flex-even">

            @foreach($data as $index => $gradient)

                <?php

                $colorsDecoded = json_decode($gradient->colors);

                $gradStr = buildGradientStr($gradient->colors, $gradient->angle);
                $firstColor = json_decode($gradient->colors)->{0};
                $lastColor = end($colorsDecoded);

                ?>


                <div class="gradient" style="background: <?= $gradStr ?>;">
                    <div class="gradient_content">
                        <div class="gradient_content_header">
                            <div>
                                <p class="gradient_content_header__title"><?= ucfirst($gradient->gradient_name) ?></p>
                                <p class="gradient_content_header__author">By <?= $gradient->name ?></p>
                            </div>
                            <div class="flex flex-middle">
                                <svg class="favs_add__btn" data-id="<?= $gradient->gid ?>" style="fill: <?= (in_array($gradient->gid, $favorites)) ? $hasColor : '#000' ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z"/>
                                </svg>
                                &nbsp;<span><?= $favsCount[$gradient->gid] ?? 0 ?></span>
                            </div>
                            <a class="btn" href="{{ route('gradient', ['id' => $gradient->gid]) }}">
                                <span aria-hidden="true" class="btn__left" style="background: <?= '#' . $firstColor ?>;"></span>
                                <span class="btn__text montserrat">View</span>
                                <span aria-hidden="true" class="btn__right" style="background: <?= '#' . $lastColor ?>;"></span>
                            </a>
                        </div>
                        <div class="gradient_content_body" style="background: <?= $gradStr ?>;"></div>
                    </div>
                </div>

            @endforeach
        </div>

    </section>


    <script>
        <?php if(!Auth::guest()): ?>
            const addBtns = document.querySelectorAll('.favs_add__btn');
            addBtns.forEach((el) => {
                el.addEventListener('click', () => {
                    const gid = el.getAttribute('data-id');
                    fetch(`<?= route('favs_add', ['uid' => Auth::user()->id]) ?>/${gid}`)
                        .then(data => data.text())
                        .then(data => {
                            console.log(data);
                            if(data === 'added'){
                                el.style.fill = '<?= $hasColor ?>';
                                el.nextElementSibling.innerHTML = (parseInt(el.nextElementSibling.innerHTML) + 1) + '';
                            }
                            else if(data === 'removed'){
                                el.style.fill = '#000';
                                el.nextElementSibling.innerHTML = (parseInt(el.nextElementSibling.innerHTML) - 1) + '';
                            }
                        });


                });
            });
        <?php endif; ?>
    </script>

@endsection

