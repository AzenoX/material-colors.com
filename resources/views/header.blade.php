@extends('template')

@section('header')

    <header>
        <div id="header_svgs">
            <!--Top-->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#273689" fill-opacity="1" d="M0,256L48,261.3C96,267,192,277,288,261.3C384,245,480,203,576,181.3C672,160,768,160,864,170.7C960,181,1056,203,1152,176C1248,149,1344,75,1392,37.3L1440,0L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg>

            <!--Box extended-->
            <div class="box_extended box_middle"></div>

            <!--Middle-->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#3042A1" fill-opacity="1" d="M0,256L48,261.3C96,267,192,277,288,261.3C384,245,480,203,576,181.3C672,160,768,160,864,170.7C960,181,1056,203,1152,176C1248,149,1344,75,1392,37.3L1440,0L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg>

            <!--Box extended-->
            <div class="box_extended box_bottom"></div>

            <!--Bottom-->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#3F51B5" fill-opacity="1" d="M0,256L48,261.3C96,267,192,277,288,261.3C384,245,480,203,576,181.3C672,160,768,160,864,170.7C960,181,1056,203,1152,176C1248,149,1344,75,1392,37.3L1440,0L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg>
        </div>

        <nav class="roboto">
            <ul>
                <li><a class="bold fs14">Material-Colors.com</a></li>
                <li><a class="fs11 dropdown-trigger" data-trigger="dropdown-palette">Color Picker <span class="fs09">▼</span></a></li>
                <li><a class="fs11">Gradient Picker</a></li>
                <li><a class="fs11">Custom Palette</a></li>
            </ul>
            <ul>

                @if (Auth::user() && Auth::user() !== null)
                    <li><a class="fs11 dropdown-trigger" data-trigger="dropdown-account">Account <span class="fs09">▼</span></a></li>
                @else
                    <li><a href="{{ route('login') }}" class="fs11">Login</a></li>
                @endif

            </ul>
        </nav>
    </header>
    <ul class="dropdown-content" id="dropdown-palette">
        <li><a href="{{ route('home') }}" class="roboto fs09">Material</a></li>
        <li><a href="{{ route('p_tailwind') }}" class="roboto fs09">Tailwind</a></li>
        <li><a href="{{ route('p_flat') }}" class="roboto fs09">Flat</a></li>
    </ul>

    <ul class="dropdown-content" id="dropdown-account">
        <li><a href="" class="roboto fs09">Settings</a></li>
        <li><a href="" class="roboto fs09">Submit</a></li>
        <li><a href="" class="roboto fs09">Logout</a></li>
    </ul>

@endsection
