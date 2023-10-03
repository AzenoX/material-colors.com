@extends('header')

@section('content')

    <section class="main">

        <div class="content_wrapper flex flex-sparound flex-middle" style="margin-top: 5%;">

            <h1>Yo {{ Auth::user()->name }} !!</h1>

        </div>

    </section>

@endsection
