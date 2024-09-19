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
                <li class="notHover"><a href="{{ route('home') }}" class="bold fs14">Material-Colors.com</a></li>
                <li class="notHover"><a class="fs11 dropdown-trigger" data-trigger="dropdown-palette">Color Palettes <span class="fs09">▼</span></a></li>
                <li><a href="{{ route('gradients') }}" class="fs11">Gradients</a></li>
                <li><a href="{{ route('social') }}" class="fs11">Social Colors</a></li>
                <li><a href="{{ route('customs.customs') }}" class="fs11">Custom Palettes</a></li>
                <li><a href="{{ route('variants') }}" class="fs11">Variants</a></li>
                <li class="notHover"><a class="fs11 dropdown-trigger" data-trigger="dropdown-viewer"><span style="position: relative;">Color Viewer <span class="chip chip--little">NEW</span></span><span class="fs09">▼</span></a></li>
{{--                <li class="notHover"><a class="fs11 dropdown-trigger" data-trigger="dropdown-ai"><span style="position: relative;">AI <span class="chip chip--little">NEW</span></span><span class="fs09">▼</span></a></li>--}}
                <li><a href="{{ route('blacky') }}" target="_blank" class="fs11">Blacky</a></li>
            </ul>
        </nav>
    </header>
    <ul class="dropdown-content" id="dropdown-palette">
        <li><a href="{{ route('home') }}" class="roboto fs09">Material</a></li>
        <li><a href="{{ route('p_tailwind') }}" class="roboto fs09">Tailwind</a></li>
        <li><a href="{{ route('p_flat') }}" class="roboto fs09">Flat</a></li>
        <li><a href="{{ route('p_bootstrap') }}" class="roboto fs09">Bootstrap</a></li>
    </ul>

{{--    <ul class="dropdown-content" id="dropdown-ai">--}}
{{--        <li><a href="{{ route('ai.tintpredictor') }}" class="roboto fs09">Tint Predictor</a></li>--}}
{{--    </ul>--}}

    <ul class="dropdown-content" id="dropdown-viewer">
        <li><a href="{{ route('color_viewer.hex') }}" class="roboto fs09">HEX Viewer</a></li>
        <li><a href="{{ route('color_viewer.rgb') }}" class="roboto fs09">RGB Viewer</a></li>
        <li><a href="{{ route('color_viewer.hsl') }}" class="roboto fs09">HSL Viewer</a></li>
    </ul>

    <ul class="dropdown-content" id="dropdown-account">
        <li class="divider">
            <span>&nbsp;</span>
            <p>Your submissions</p>
            <span>&nbsp;</span>
        </li>
        <li><a href="{{ route('account.my_gradients') }}" class="roboto fs09">My Gradients</a></li>

        <li class="divider">
            <span>&nbsp;</span>
            <p>Create</p>
            <span>&nbsp;</span>
        </li>
        <li><a href="{{ route('account.create_gradient') }}" class="roboto fs09">Create Gradient</a></li>
        <li><a href="{{ route('account.create_custom') }}" class="roboto fs09">Create Palette</a></li>

        <li class="divider">
            <span>&nbsp;</span>
            <p>Extras</p>
            <span>&nbsp;</span>
        </li>
        <li><a href="{{ route('account.favs') }}" class="roboto fs09">My Favorites</a></li>
        <li><a href="{{ route('account.settings') }}" class="roboto fs09">Settings</a></li>
        <li class="red mb-1">
            <form method="post" action="{{ route('logout') }}" class="ns_form">
                @csrf
                <button type="submit" class="roboto fs09 ns_btn red">Logout</button>
            </form>
        </li>
    </ul>

    <a class="github-banner" href="https://github.com/AzenoX/material-colors.com" target="_blank">
        <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <title>GitHub</title>
            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
        </svg>
    </a>

@endsection
