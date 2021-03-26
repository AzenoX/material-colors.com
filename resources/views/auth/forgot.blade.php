@extends('header')

@section('content')

    <section class="main">

        <div class="content_wrapper" style="margin-top: 5%;">

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

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    A new email verification link has been emailed to you!
                </div>
            @endif

            <form class="shadowed center" method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="form-row text-center">
                    <p class="text-important">Use the following form to reset your password.</p>
                </div>
                <div class="form-row">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email') }}">
                </div>
                <br>
                <div class="form-row">
                    <button class="btn center" type="submit">
                        <span aria-hidden="true" class="btn__left"></span>
                        <span class="btn__text">Resend Password</span>
                        <span aria-hidden="true" class="btn__right"></span>
                    </button>
                </div>
            </form>

        </div>

    </section>

@endsection
