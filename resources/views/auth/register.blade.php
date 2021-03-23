@extends('header')

@section('content')

    <section class="main">

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
                    <label for="username">Username:</label>
                    <input id="username" type="text" name="name">
                </div>
                <div class="form-row">
                    <label for="email">Email:</label>
                    <input id="email" type="text" name="email">
                </div>
                <div class="form-row">
                    <label for="password">Password:</label>
                    <input id="password" type="password" name="password">
                </div>
                <div class="form-row">
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input id="password_confirmation" type="password" name="password_confirmation">
                </div>

                <div class="form-row">
                    <button class="btn" type="submit">
                        <span aria-hidden="true" class="btn__left"></span>
                        <span class="btn__text">Register</span>
                        <span aria-hidden="true" class="btn__right"></span>
                    </button>
                </div>

                <div class="form-row">
                    <a href="{{ route('login') }}">Already have an account ?</a>
                </div>
            </form>

        </div>

    </section>

@endsection
