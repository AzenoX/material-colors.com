@extends('header')

@section('content')

    <section class="main">


        <div class="content_wrapper flex flex-sparound flex-middle flex-col shadowed w60 center" style="margin-top: 5%; background: #eee; padding: 2em 1em 1em 1em;">

            <div class="text-center">
                <h1 class="fs25 montserrat" style="margin-bottom: 1em;">Create a new account account</h1>
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

            <div class="flex flex-sparound w100 in-flex-2elements">
                <form method="post" action="{{ route('register') }}" class="no-bg">
                    @csrf

                    <div class="form-row">
                        <label for="username">Username</label>
                        <input id="username" type="text" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-row">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-row">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password">
                    </div>
                    <div class="form-row">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input id="password_confirmation" type="password" name="password_confirmation">
                    </div>

                    <div class="form-row">
                        <button class="btn" type="submit">
                            <span aria-hidden="true" class="btn__left"></span>
                            <span class="btn__text montserrat">Sign Up</span>
                            <span aria-hidden="true" class="btn__right"></span>
                        </button>
                    </div>

                    <br>

                    <div class="form-row text-center">
                        <a href="{{ route('login') }}">Already have an account ?</a>
                    </div>
                </form>

                <div>
                    <?php

                    $socials = [
                        'google' => [
                            'path' => 'M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z',
                        ],
                        'github' => [
                            'path' => 'M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12',
                        ],
                        'facebook' => [
                            'path' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z',
                        ],
                        'twitter' => [
                            'path' => 'M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z',
                        ],
                        'reddit' => [
                            'path' => 'M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z',
                        ],
                    ];

                    ?>


                    <?php foreach($socials as $name => $social): ?>
                    <a href="{{ route("auth_{$name}__redirect") }}" class="btn_login_social btn_login_social__<?= $name ?> shadowed-animate">
                        <svg id="google-svg" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title><?= ucfirst($name) ?> icon</title>
                            <path d="<?= $social['path'] ?>"></path>
                        </svg>
                        <span>Sign Up with <?= ucfirst($name) ?></span>
                        <svg class="btn_login_social__svg_animated" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/>
                        </svg>
                    </a>
                    <?php endforeach; ?>

                </div>
            </div>


        </div>




        <div class="content_wrapper flex flex-sparound flex-middle" style="margin-top: 5%;">

            <form method="post" action="{{ route('register') }}" class="shadowed">
                @csrf

                <div class="form-row">
                    <h2>Register</h2>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-row">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-row">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-row">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password">
                </div>
                <div class="form-row">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input id="password_confirmation" type="password" name="password_confirmation">
                </div>

                <div class="form-row">
                    <button class="btn" type="submit">
                        <span aria-hidden="true" class="btn__left"></span>
                        <span class="btn__text">Register</span>
                        <span aria-hidden="true" class="btn__right"></span>
                    </button>
                </div>

                <br>

                <div class="form-row text-center">
                    <a href="{{ route('login') }}">Already have an account ?</a>
                </div>
            </form>

        </div>

    </section>

@endsection
