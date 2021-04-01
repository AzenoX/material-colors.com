@extends('header')

@section('content')

    <?php

    $colors = json_decode($data->colors);
    $angle = $data->angle;
    $gradStr = buildGradientStr($colors, $angle);



    $firstColor = $colors->{0};
    $lastColor = end($colors);


    function buildGradientStr($colors, $angle){
        $str = 'linear-gradient('.$angle.'deg, ';

        foreach($colors as $percent => $color){
            $str .= '#' . $color . ' ' . $percent . '%, ';
        }

        $str = substr($str, 0, -2);

        $str .= ')';

        return $str;
    }
    function generateCss($colors, $angle, $gname){
        $code = "/*".ucfirst($gname)." gradient*/" . "\n";
        $code .= "background: #" . $colors->{0} . ";" . "\n";
        $code .= 'background: ' . buildGradientStr($colors, $angle) . ';';

        return $code;
    }


    $marginPanels = '4';


    ?>

    <style>
        body{
            background: <?= $gradStr ?>;
            background-attachment: fixed;
        }
    </style>


    <section class="main" style="margin-top: 4rem;">

        <h1 class="text-white text-center fs30" style="margin-bottom: 2em;">Gradient: <?= ucfirst($data->gname) ?></h1>

        <div class="flex flex-wrap flex-even">

            <div class="panel shadowed height-fit" style="flex: 1; margin-left: <?= $marginPanels ?>em; margin-right: <?= $marginPanels ?>em;">
                <p class="gradient_panel__title" style="margin-left: 1em;">CSS Code</p>

                <div class="code_sample">
<pre><code id="gradientCss" class="code_sample__item language-css"><?= generateCss($colors, $angle, $data->gname) ?></code></pre>
                </div>

                <p id="originalCode" style="display: none;"><?= generateCss($colors, $angle, $data->gname) ?></p>

                <div style="width: 100%; text-align: center; margin-top: 2em;">
                    <button class="btn copyBtnGradient">
                        <span aria-hidden="true" class="btn__left" style="background: {{ '#' . $firstColor }};"></span>
                        <span class="btn__text">
                            Copy&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M22 2v22h-20v-22h3c1.23 0 2.181-1.084 3-2h8c.82.916 1.771 2 3 2h3zm-11 1c0 .552.448 1 1 1 .553 0 1-.448 1-1s-.447-1-1-1c-.552 0-1 .448-1 1zm9 1h-4l-2 2h-3.897l-2.103-2h-4v18h16v-18zm-13 9.729l.855-.791c1 .484 1.635.852 2.76 1.654 2.113-2.399 3.511-3.616 6.106-5.231l.279.64c-2.141 1.869-3.709 3.949-5.967 7.999-1.393-1.64-2.322-2.686-4.033-4.271z"/>
                            </svg>
                        </span>
                        <span aria-hidden="true" class="btn__right" style="background: {{ '#' . $lastColor }};"></span>
                    </button>
                </div>
            </div>



            <div class="panel shadowed gradient_panel height-fit w40" style="flex: 1; margin-left: <?= $marginPanels ?>em; margin-right: <?= $marginPanels ?>em;">
                <div class="gradient_panel__header">
                    <div class="gradient_panel__header__titles">
                        <p class="gradient_panel__header__titles__title gradient_panel__title"><?= ucfirst($data->gname) ?></p>
                        <p class="gradient_panel__header__titles__author"><?= $data->name ?></p>
                    </div>
                    <div class="gradient_panel__header__favs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 6.76l1.379 4.246h4.465l-3.612 2.625 1.379 4.246-3.611-2.625-3.612 2.625 1.379-4.246-3.612-2.625h4.465l1.38-4.246zm0-6.472l-2.833 8.718h-9.167l7.416 5.389-2.833 8.718 7.417-5.388 7.416 5.388-2.833-8.718 7.417-5.389h-9.167l-2.833-8.718z"/>
                        </svg>
                        <p><?= $data->favs ?></p>
                    </div>
                </div>

                <div class="gradient_panel__body">
                    <?php foreach($colors as $percent => $color): ?>
                        <div class="gradient_panel__body_color" style="background: <?= '#' . $color ?>">
                            <span class="gradientColorCopy">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M22 2v22h-20v-22h3c1.23 0 2.181-1.084 3-2h8c.82.916 1.771 2 3 2h3zm-11 1c0 .552.448 1 1 1 .553 0 1-.448 1-1s-.447-1-1-1c-.552 0-1 .448-1 1zm9 1h-4l-2 2h-3.897l-2.103-2h-4v18h16v-18zm-13 9.729l.855-.791c1 .484 1.635.852 2.76 1.654 2.113-2.399 3.511-3.616 6.106-5.231l.279.64c-2.141 1.869-3.709 3.949-5.967 7.999-1.393-1.64-2.322-2.686-4.033-4.271z"/>
                                </svg>
                            </span>
                            <span class="gradientColorEdit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"/>
                                </svg>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="gradient_panel__footer">

                    <button class="btn">
                        <span aria-hidden="true" class="btn__left" style="background: {{ '#' . $firstColor }};"></span>
                        <span class="btn__text">
                            Share&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M5 7c2.761 0 5 2.239 5 5s-2.239 5-5 5-5-2.239-5-5 2.239-5 5-5zm11.122 12.065c-.073.301-.122.611-.122.935 0 2.209 1.791 4 4 4s4-1.791 4-4-1.791-4-4-4c-1.165 0-2.204.506-2.935 1.301l-5.488-2.927c-.23.636-.549 1.229-.943 1.764l5.488 2.927zm7.878-15.065c0-2.209-1.791-4-4-4s-4 1.791-4 4c0 .324.049.634.122.935l-5.488 2.927c.395.535.713 1.127.943 1.764l5.488-2.927c.731.795 1.77 1.301 2.935 1.301 2.209 0 4-1.791 4-4z"/>
                            </svg>
                        </span>
                        <span aria-hidden="true" class="btn__right" style="background: {{ '#' . $lastColor }};"></span>
                    </button>

                    <button class="btn">
                        <span aria-hidden="true" class="btn__left" style="background: {{ '#' . $firstColor }};"></span>
                        <span class="btn__text">
                            Save&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479 6.908l-4-4h3v-4h2v4h3l-4 4z"/>
                            </svg>
                        </span>
                        <span aria-hidden="true" class="btn__right" style="background: {{ '#' . $lastColor }};"></span>
                    </button>

                </div>
            </div>

        </div>

    </section>


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


        //Basic variables
        const gname = '<?= ucfirst($data->gname) ?>';
        let colors = JSON.parse('<?= json_encode($colors) ?>');
        const angle = '<?= $angle ?>';
        let gradient = buildGradientStr(colors, angle);


        //Get code sample
        const codeCss = document.querySelector('#gradientCss');
        const originalCode = document.querySelector('#originalCode');

        //Get color divs
        const gradientColors = document.querySelectorAll('.gradient_panel__body_color');
        const btnsLeft = document.querySelectorAll('.btn__left');
        const btnsRight = document.querySelectorAll('.btn__right');


        //Functions
        function changeColor(col, index){
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



            //Update CSS Code
            let code = "/*"+gname+" gradient*/" + "\n";
            code += "background: #" + newColors[0] + ";" + "\n";
            code += 'background: ' + buildGradientStr(colors, angle) + ';';
            codeCss.innerHTML = code;
            codeCss.innerHTML = Prism.highlight(codeCss.innerHTML, Prism.languages.css, 'css');
            originalCode.innerHTML = code;


            //Update gradient color div bg
            gradientColors[index].style.background = '#' + col;


            //Update Btns spans
            btnsLeft.forEach((el) => {
                el.style.background = '#' + newColors[0];
            });
            btnsRight.forEach((el) => {
                el.style.background = '#' + newColors[Object.keys(newColors)[Object.keys(newColors).length - 1]];
            });
            console.log(newColors);


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

        applyGradientToItems(gradient);


        //Listeners
        const gradientEditBtns = document.querySelectorAll('.gradientColorEdit');
        gradientEditBtns.forEach((el, index) => {
            el.addEventListener('click', () => {
                const newColor = prompt('Color Hex:');
                changeColor(newColor, index);
                applyGradientToItems(gradient);
            });
        });

        const copyBtnGradient = document.querySelector('.copyBtnGradient');
        copyBtnGradient.addEventListener('click', () => {
            const text = originalCode.innerHTML;

            navigator.clipboard.writeText(text);

            Toastify({
                text: "<p></p><span>CSS Code has been copied !</span>",
                duration: 5000,
                gravity: "bottom",
                position: "right",
                backgroundColor: gradient,
                escapeMarkup: false,
            }).showToast();
        });


    </script>

@endsection
