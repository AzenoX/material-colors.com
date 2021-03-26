@extends('header')

@section('content')

    <section class="main">

        <div class="panel text-center" style="margin-top: 5%;">

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

            <p class="text-important">You must activate your account, please check your emails for a verification link.</p>

            <br>

            <form class="no-bg text-center" method="post" action="{{ route('verification.send') }}">
                @csrf
                <button class="btn" type="submit">
                    <span aria-hidden="true" class="btn__left"></span>
                    <span class="btn__text">Resend Email</span>
                    <span aria-hidden="true" class="btn__right"></span>
                </button>
            </form>

        </div>

    </section>

@endsection
