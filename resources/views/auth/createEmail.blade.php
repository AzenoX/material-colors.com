@extends('header')

@section('content')

    <section class="main">

        <div class="panel text-center" style="margin-top: 5%; background:#eee;">

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

            <p class="text-important">{{ $provider }} doesn't provide your email address, so please, enter the email you want to use for this account.</p>

            <br>

            <form class="no-bg center" method="post" action="{{ $action }}">
                @csrf
                <div class="form-row">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-row">
                    <button class="btn" type="submit">
                        <span aria-hidden="true" class="btn__left"></span>
                        <span class="btn__text">Valid my Email</span>
                        <span aria-hidden="true" class="btn__right"></span>
                    </button>
                </div>
            </form>

        </div>

    </section>

@endsection
