@extends('header')

@section('content')

    <section class="main">

        <div class="flex flex-sparound flex-middle">

            <div class="w40 home_wrappers flex flex-col flex-cent">

                <div>
                    <p class="preview_title fs20 twhite montserrat bold mb-1">Live Preview</p>

                    <div class="preview shadowed">
                        <div class="preview__header shadowed" style="background: #EF5350;">
                            <p class="preview__header__title fs20 bold">Your Website</p>
                        </div>
                        <div class="preview__body">
                            <p class="preview__body__title fs20 tcenter twhite bold roboto">Hello world</p>
                            <div class="preview__body__panels flex flex-sparound">
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                                <div class="preview__body__panel shadowed" style="background: #EF5350;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w40 home_wrappers flex flex-col flex-beet">
                <h1 class="main__title fs30 twhite bold m-1 montserrat">Palette: Material</h1>
{{--                <p class="fs20 twhite montserrat bold m-1"></p>--}}
                <div class="picker shadowed">
                    <table class="picker__table">
                        <tr class="picker__table__header">
                            <td class="bold">Pick a color</td>
                            <th>50</th>
                            <th>100</th>
                            <th>200</th>
                            <th>300</th>
                            <th>400</th>
                            <th>500</th>
                            <th>600</th>
                            <th>700</th>
                            <th>800</th>
                            <th>900</th>
                        </tr>
                        <!--Générer les lignes-->
                        @foreach($data as $dat)
                            <tr>
                                <th>{{ str_replace('_', ' ', ucfirst($dat['name'])) }}</th>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c50'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c100'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c200'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c300'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c400'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c500'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c600'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c700'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c800'] }};"></span></td>
                                <td><span class="picker__table__header__color_item" style="background:#{{ $dat['c900'] }};"></span></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="selected shadowed">
                    <svg class="selected__svg_top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 346 85">
                        <path fill="#EF5350" fill-opacity="1" d="M0 0l13 14c9.5 10 21.895-7.51 30.07-4.264 8.447 3.245 16.895 16.225 25.342 24.338 8.175 8.113 16.623 11.358 25.07 14.604 8.448 3.245 16.623 6.49 25.071-1.623 8.447-8.113 16.895-27.584 25.342-22.716 8.175 4.868 16.623 34.074 25.07 37.32 8.448 3.245 16.623-19.472 25.07-32.452 8.447-12.981 16.895-16.226 25.07-8.113 8.448 8.113 16.895 27.584 25.343 42.187 8.447 14.603 16.622 24.339 25.07 21.094 8.447-3.246 16.895-19.471 25.069-21.094 8.448-1.623 16.896 11.358 25.343 14.603 8.175 3.245 16.623-3.245 20.983-6.49L346 67.5V0H0z">
                        </path>
                    </svg>
                    <svg class="selected__svg_bot" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 345 85">
                        <path fill="#EF5350" fill-opacity="1" d="M345 85l-13-14c-9.5-10-21.895 7.51-30.07 4.264-8.448-3.245-16.895-16.225-25.343-24.338-8.175-8.113-16.622-11.358-25.07-14.604-8.447-3.245-16.622-6.49-25.07 1.623-8.447 8.113-16.895 27.584-25.342 22.716-8.175-4.868-16.623-34.074-25.07-37.32-8.448-3.245-16.623 19.472-25.07 32.452-8.447 12.981-16.895 16.226-25.07 8.113-8.448-8.113-16.895-27.584-25.343-42.187C92.105 7.116 83.93-2.62 75.482.625 67.035 3.87 58.588 20.096 50.413 21.72 41.966 23.342 33.517 10.361 25.07 7.116 16.895 3.87 8.447 10.36 4.087 13.606L0 16.851V85h345z"></path>
                    </svg>

                    <div class="selected__wrapper">
                        <div class="selected__wrapper__header">
                            <p class="flex flex-middle fs14 bold">Color: <span style="background:#EF5350;" class="selected__wrapper__header__square m-05"></span><span class="selected__wrapper__header__color bold montserrat">Red 400</span></p>
                        </div>
                        <div class="selected__wrapper__body">
                            <div class="selected__wrapper__body__table">
                                <table>
                                    <tr>
                                        <td>
                                            <p><span class="selected__body__table__text_hex">#EF5350</span><span class="selected__body__table__text_hex_copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>

                                        </td>
                                        <td>
                                            <p><span class="selected__body__table__text_hexa">#EF5350FF</span><span class="selected__body__table__text_hexa_copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><span class="selected__body__table__text_rgb">rgb(255,205,210)</span><span class="selected__body__table__text_rgb_copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                        <td>
                                            <p><span class="selected__body__table__text_rgba">rgba(255,205,210,1)</span><span class="selected__body__table__text_rgba_copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><span class="selected__body__table__text_hsl">hsl(354,100%,90.2%)</span><span class="selected__body__table__text_hsl_copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                        <td>
                                            <p class="selected__body__table__text_hsla"><span>hsla(354,100%,90.2%,100%)</span><span class="selected__body__table__text_hsla_copy selected__body__table__text__copy"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4h-20v20h20v-20zm-24 17v-21h21v2h-19v19h-2z"/></svg></span></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
{{--                            <div class="selected__wrapper__body__variations">--}}
{{--                                <div class="selected__wrapper__body__variations__lighter" style="background:#F47D7B;">--}}
{{--                                    <p class="selected__wrapper__body__variations__lighter__title bold fs12 m-1 montserrat tcenter">Lighter</p>--}}
{{--                                    <p class="selected__wrapper__body__variations__lighter__text tcenter">#F47D7B</p>--}}
{{--                                </div>--}}
{{--                                <div class="selected__wrapper__body__variations__darker" style="background:#CA3E3C;">--}}
{{--                                    <p class="selected__wrapper__body__variations__darker__title bold fs12 m-1 montserrat tcenter">Darker</p>--}}
{{--                                    <p class="selected__wrapper__body__variations__darker__text tcenter">#CA3E3C</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>

@endsection
