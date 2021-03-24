@extends('header')

@section('content')

    <section class="main">

        <div class="panel tcenter" style="margin-top: 5%; background:#e0e0e0;">

            <h1>Account Settings</h1>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <br>
            <hr style="width: 30%;" class="center">
            <br>

            <form method="post" class="center no-bg">

                <h2>Change your password</h2>
                <br><br>

                <div class="form-row tleft">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="{{ Auth::user()->getAttributes()['email'] }}">
                </div>

                <div class="form-row">
                    <button class="btn" type="submit">
                        <span aria-hidden="true" class="btn__left"></span>
                        <span class="btn__text">Change password</span>
                        <span aria-hidden="true" class="btn__right"></span>
                    </button>
                </div>

            </form>

        </div>

    </section>

@endsection
