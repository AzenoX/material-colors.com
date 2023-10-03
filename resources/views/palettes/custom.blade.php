@extends('header')

@section('content')

    <?php

        $colors = json_decode($palette['colors'])->colors;
        $i = true;

    ?>

    <style>
        td > span{
            box-shadow: 0 0 0 #fff inset, 0 0 0 #fff inset;
            transition: box-shadow 0.4s ease !important;
        }
        td > span.active{
            box-shadow: 10px 10px 0 #fff inset, -10px -10px 0 #fff inset !important;
            transition: box-shadow 0.4s ease !important;
        }
        td.color_exporting > span{
            box-shadow: 10px 10px 0 #673ab7 inset, -10px -10px 0 #673ab7 inset !important;
        }
    </style>

    <section class="main">

        <div class="content_wrapper flex flex-sparound flex-middle">

            <div class="w40 home_wrappers flex flex-col flex-even preview_wrapper">

                <div class="flex flex-beet flex-middle">
                    <h1 class="main__title fs30 text-white bold m-1 montserrat">Custom Palettes</h1>

                    <a href="{{ route('customs.customs') }}" class="btn" style="height: min-content; border: 1px solid #666;">
                        <span aria-hidden="true" class="btn__left" style="background: {{ $colors[0]->color }};"></span>
                        <span class="btn__text" style="font-weight: bold;">Back to List</span>
                        <span aria-hidden="true" class="btn__right" style="background: {{ $colors[0]->color }};"></span>
                    </a>
                </div>

                <div class="picker shadowed">
                    <table class="picker__table">
                        <tr class="picker__table__header">
                            <td class="bold montserrat">Pick a color</td>
                            <th style="width: 60%;">Color</th>
                        </tr>
                        <!--Générer les lignes-->
                        @foreach($colors as $color)
                            <tr>
                                <th>{{ ucfirst($color->name) }}</th>
                                <td style="height: max-content; position: relative;">
                                    <span data-test="<?= $i ?>" class="picker__table__header__color_item <?= $i ? 'active' : '' ?>" style="background: {{ $color->color }}; position: absolute; top: 0; left: 0; height: 100%; width: 100%;" data-name="{{ ucfirst($color->name) }}"></span>
                                </td>
                            </tr>
                            <?php $i = false; ?>
                        @endforeach
                    </table>
                </div>

                <div class="hide_on_mobile">
                    <button class="btn exportBtn" id="exportBtn">
                        <span aria-hidden="true" class="btn__left" style="background: {{ $colors[0]->color }};"></span>
                        <span class="btn__text">Export Colors (<span id="export_selected_count">0</span>&nbsp;selected)</span>
                        <span aria-hidden="true" class="btn__right" style="background: {{ $colors[0]->color }};"></span>
                    </button>
                </div>

            </div>

            <div class="w40 home_wrappers flex flex-col flex-beet">

                <div class="hide_on_mobile">
                    <p class="preview_title fs20 text-white montserrat bold mb-1">Live Preview</p>
                    <div class="preview shadowed">
                        <div class="preview__header shadowed" style="background: {{ $colors[0]->color }};">
                            <p class="preview__header__title fs20 bold">Your Website</p>
                        </div>
                        <div class="preview__body">
                            <p class="preview__body__title fs20 text-center text-white bold roboto">Hello world</p>
                            <div class="preview__body__panels flex flex-sparound">
                                @for($i = 0 ; $i < 9 ; $i++)
                                    <div class="preview__body__panel shadowed" style="background: {{ $colors[0]->color }};"></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <div class="selected shadowed">
                    <svg class="selected__svg_top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 346 85">
                        <path fill="{{ $colors[0]->color }}" fill-opacity="1" d="M0 0l13 14c9.5 10 21.895-7.51 30.07-4.264 8.447 3.245 16.895 16.225 25.342 24.338 8.175 8.113 16.623 11.358 25.07 14.604 8.448 3.245 16.623 6.49 25.071-1.623 8.447-8.113 16.895-27.584 25.342-22.716 8.175 4.868 16.623 34.074 25.07 37.32 8.448 3.245 16.623-19.472 25.07-32.452 8.447-12.981 16.895-16.226 25.07-8.113 8.448 8.113 16.895 27.584 25.343 42.187 8.447 14.603 16.622 24.339 25.07 21.094 8.447-3.246 16.895-19.471 25.069-21.094 8.448-1.623 16.896 11.358 25.343 14.603 8.175 3.245 16.623-3.245 20.983-6.49L346 67.5V0H0z">
                        </path>
                    </svg>
                    <svg class="selected__svg_bot" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 345 85">
                        <path fill="{{ $colors[0]->color }}" fill-opacity="1" d="M345 85l-13-14c-9.5-10-21.895 7.51-30.07 4.264-8.448-3.245-16.895-16.225-25.343-24.338-8.175-8.113-16.622-11.358-25.07-14.604-8.447-3.245-16.622-6.49-25.07 1.623-8.447 8.113-16.895 27.584-25.342 22.716-8.175-4.868-16.623-34.074-25.07-37.32-8.448-3.245-16.623 19.472-25.07 32.452-8.447 12.981-16.895 16.226-25.07 8.113-8.448-8.113-16.895-27.584-25.343-42.187C92.105 7.116 83.93-2.62 75.482.625 67.035 3.87 58.588 20.096 50.413 21.72 41.966 23.342 33.517 10.361 25.07 7.116 16.895 3.87 8.447 10.36 4.087 13.606L0 16.851V85h345z"></path>
                    </svg>

                    <div class="selected__wrapper">
                        <div class="selected__wrapper__header">
                            <p class="flex flex-middle fs14 bold">Color: <span style="background:{{ $colors[0]->color }};" class="selected__wrapper__header__square m-05"></span><span class="selected__wrapper__header__color bold montserrat"><?= ucfirst($colors[0]->name) ?></span></p>
                        </div>
                        <div class="selected__wrapper__body">
                            <div class="selected__wrapper__body__table shadowed">
                                <table>
                                    <tr>
                                        <td>
                                            <p><span class="selected__body__table__text_hex">#000000</span><span class="selected__body__table__text__copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>

                                        </td>
                                        <td>
                                            <p><span class="selected__body__table__text_hexa">#00000000</span><span class="selected__body__table__text__copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><span class="selected__body__table__text_rgb">rgb(000,000,000)</span><span class="selected__body__table__text__copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                        <td>
                                            <p><span class="selected__body__table__text_rgba">rgba(000,000,000,1.0)</span><span class="selected__body__table__text__copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><span class="selected__body__table__text_hsl">hsl(000,000%,000%)</span><span class="selected__body__table__text__copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                        <td>
                                            <p><span class="selected__body__table__text_hsla">hsla(000,000%,000%,1.0)</span><span class="selected__body__table__text__copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>



    <!--Exports Modals - Menu-->
    <div class="modal micromodal-slide" id="modal_exports" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Export Color Theme
                    </h2>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <ul class="modal_menu">
                        <li><a class="modal_menu__item modal_export__color__cssvars">CSS Variables</a></li>
                        <li><a class="modal_menu__item modal_export__color__tailwind">Tailwind Config</a></li>
                    </ul>
                </main>
                <footer class="modal__footer">
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                </footer>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="modal_code" aria-hidden="true">

        <div class="modal__overlay" tabindex="-1" data-micromodal-close>

            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">

                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">Export CSS Variables</h2>
                </header>

                <main class="modal__content" id="modal-1-content">

                    <div class="export__code_wrapper">
                        <pre><code class="export__code language-markup"></code></pre>
                    </div>

                    <div style="width: 100%; text-align: center; margin-top: 2em;">
                        <button class="btn copyBtnExport">
                            <span aria-hidden="true" class="btn__left" style="background: {{ $colors[0]->color }};"></span>
                            <span class="btn__text">Copy</span>
                            <span aria-hidden="true" class="btn__right" style="background: {{ $colors[0]->color }};"></span>
                        </button>
                    </div>

                </main>

                <footer class="modal__footer">
                    <button class="modal__btn modal__btn_back" data-micromodal-close aria-label="Back to main menu">Back</button>
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                </footer>

            </div>
        </div>
    </div>


    <script>

    </script>

@endsection

