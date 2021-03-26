@extends('header')

@section('content')

    <section class="main">

        <div class="content_wrapper flex flex-sparound flex-middle flex-col shadowed w60 center" style="margin-top: 5%; background: #eee; padding: 2em 1em 1em 1em;">

            <div class="text-center">
                <h1 class="fs25 montserrat" style="margin-bottom: 1em;">Connect to your account</h1>
            </div>

            @if (session('status'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ session('status') }}</li>
                    </ul>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-sparound w100">
                <form method="post" class="no-bg" style="width: 45%;">
                    @csrf

                    <div class="form-row">
                        <label for="name">Username</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-row">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password">
                    </div>

                    <div class="form-row">
                        <button class="btn" type="submit">
                            <span aria-hidden="true" class="btn__left"></span>
                            <span class="btn__text">Login</span>
                            <span aria-hidden="true" class="btn__right"></span>
                        </button>
                    </div>

                    <br>

                    <div class="form-row text-center">
                        <a href="{{ route('register') }}">Don't have account ?</a>
                    </div>

                    <div class="form-row text-center">
                        <a href="{{ route('password.request') }}">Reset your password</a>
                    </div>
                </form>
                <div style="width: 45%;">
                    <a href="{{ route('auth_google__redirect') }}" class="btn_login_social btn_login_social__red shadowed-animate">
                        <svg id="google-svg" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Google icon</title>
                            <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"></path>
                        </svg>
                        <span>Connect with Google</span>
                    </a>
                    <a href="{{ route('auth_github__redirect') }}" class="btn_login_social btn_login_social__black shadowed-animate">
                        <svg id="github-svg" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>GitHub icon</title>
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
                        </svg>
                        <span>Connect with Github</span>
                    </a>
                    <a href="{{ route('auth_facebook__redirect') }}" class="btn_login_social btn_login_social__blue shadowed-animate">
                        <svg id="facebook-svg" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Facebook icon</title>
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                        </svg>
                        <span>Connect with Facebook</span>
                    </a>
                </div>
            </div>


        </div>

    </section>

@endsection
