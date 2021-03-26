@extends('header')

@section('content')

    <?php

        function buildGradientStr($array){
            $array = json_decode($array);

            $angle = $array->angle;

            $str = 'linear-gradient('.$angle.'deg, ';

            foreach($array->colors as $col){
                $str .= '#' . $col->color . ' ' . $col->percent . '%,';
            }

            $str = substr($str, 0, -1);

            $str .= ')';

            return $str;
        }

    ?>


    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">Gradients</h1>

        <div class="flex flex-wrap flex-even">

            @foreach($data as $gradient)

                <?php

                $gradStr = buildGradientStr($gradient['colors']);
                $firstColor = json_decode($gradient['colors'])->colors[0]->color;

                ?>


                <div class="gradient" style="background: <?= $gradStr ?>;">
                    <div class="gradient_content">
                        <div class="gradient_content_header">
                            <p>NAME</p>
                            <div class="flex flex-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 6.76l1.379 4.246h4.465l-3.612 2.625 1.379 4.246-3.611-2.625-3.612 2.625 1.379-4.246-3.612-2.625h4.465l1.38-4.246zm0-6.472l-2.833 8.718h-9.167l7.416 5.389-2.833 8.718 7.417-5.388 7.416 5.388-2.833-8.718 7.417-5.389h-9.167l-2.833-8.718z"/>
                                </svg>
                                &nbsp;<span>0</span></div>
                            <button>View</button>
                        </div>
                        <div class="gradient_content_body" style="background: <?= $firstColor ?>;"></div>
                    </div>
                </div>

            @endforeach

            @foreach($data as $gradient)

                <div class="gradient">
                    <?php var_dump($gradient); ?>
                </div>

            @endforeach

            @foreach($data as $gradient)

                <div class="gradient">
                    <?php var_dump($gradient); ?>
                </div>

            @endforeach

            @foreach($data as $gradient)

                <div class="gradient">
                    <?php var_dump($gradient); ?>
                </div>

            @endforeach

            @foreach($data as $gradient)

                <div class="gradient">
                    <?php var_dump($gradient); ?>
                </div>

            @endforeach

            @foreach($data as $gradient)

                <div class="gradient">
                    <?php var_dump($gradient); ?>
                </div>

            @endforeach
        </div>

    </section>

@endsection
