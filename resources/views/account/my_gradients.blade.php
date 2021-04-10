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

    ?>


    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">Gradients</h1>

        <div class="flex flex-wrap flex-even">

            @foreach($data as $index => $gradient)

                <?php

                $colorsDecoded = json_decode($gradient->colors);

                $gradStr = buildGradientStr($gradient->colors, $gradient->angle);
                $firstColor = reset($colorsDecoded);
                $lastColor = end($colorsDecoded);

                ?>


                <div class="gradient" style="background: <?= $gradStr ?>;">
                    <div class="gradient_content">
                        <div class="gradient_content_header">
                            <div>
                                <p class="gradient_content_header__title"><?= ucfirst($gradient->gradient_name) ?></p>
                                <p class="gradient_content_header__author">Tags ???</p>
                            </div>
                            <div class="flex flex-middle">
                                <a class="btn btn-red" href="{{ route('account.my_gradients__delete', ['id' => $gradient->gid]) }}">
                                    <span aria-hidden="true" class="btn__left" style="background: #{{ $firstColor }};"></span>
                                    <span class="btn__text montserrat">Delete</span>
                                    <span aria-hidden="true" class="btn__right" style="background: #{{ $lastColor }};"></span>
                                </a>
                            </div>
                        </div>
                        <div class="gradient_content_body" style="background: <?= $gradStr ?>;"></div>
                    </div>
                </div>

            @endforeach
        </div>

    </section>

@endsection

