@extends('header')

@section('content')

    <section class="main">

        <div class="content_wrapper" style="margin-top: 5%;">


            <form class="shadowed center" method="post" action="{{ route('password.update') }}">
                <input type="hidden" name="email" value="{{ urldecode(explode('?email=', request()->getRequestUri())[1]) }}">
                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <div class="form-row text-center">
                    <p class="text-important">Fill the following form with your new password</p>
                </div>
                <br>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br>
                @endif

                @if (session('status'))
                    <div class="alert alert-success">
                        Your password has been reset !
                    </div>
                @endif

                @csrf
                <div class="form-row">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password">
                </div>
                <div class="form-row">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input id="password_confirmation" type="password" name="password_confirmation">
                </div>
                <br>
                <div class="form-row">
                    <button class="btn center" type="submit">
                        <span aria-hidden="true" class="btn__left"></span>
                        <span class="btn__text">Reset Password</span>
                        <span aria-hidden="true" class="btn__right"></span>
                    </button>
                </div>
            </form>

        </div>

    </section>

@endsection
