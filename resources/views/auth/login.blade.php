@extends('header')

@section('content')

    <section class="main">

        <div class="content_wrapper flex flex-sparound flex-middle" style="margin-top: 5%;">

            <form method="post" class="shadowed">
                @csrf

                <div class="form-row">
                    <h2>Login</h2>
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

                <div class="form-row tcenter">
                    <a href="{{ route('register') }}">Don't have account ?</a>
                </div>

                <div class="form-row tcenter">
                    <a href="{{ route('password.request') }}">Reset your password</a>
                </div>
            </form>

        </div>

    </section>

@endsection
