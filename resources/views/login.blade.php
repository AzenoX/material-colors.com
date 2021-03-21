@extends('header')

@section('content')

    <section class="main">

        <div class="content_wrapper flex flex-sparound flex-middle" style="margin-top: 5%;">

            <form method="post" class="shadowed">
                @csrf

                <div class="form-row">
                    <h2>Login</h2>
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
                    <button class="btn" type="submit">
                        <span aria-hidden="true" class="btn__left"></span>
                        <span class="btn__text">Login</span>
                        <span aria-hidden="true" class="btn__right"></span>
                    </button>
                </div>
            </form>

        </div>

    </section>

@endsection
