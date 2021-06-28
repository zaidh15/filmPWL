@extends('layouts.index')
@section('content')

    <div class="jumbotron">
    <h1 class="display-3">Selamat Datang di Film Here</h1>
    <p class="lead">Kami menyediakan list banyak film untuk yang akan anda tonton juga siapa produksinya dan sutradara loh</p>
    <hr class="my-4">
    <p>Tunggu apalagi yuk</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="{{ url('/produksi') }}" role="button">Pelajari lebih lanjut</a>
    </p>
    </div>

@endsection