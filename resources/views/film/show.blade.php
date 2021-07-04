@extends('layouts.index')
@section('content')

    <br/>
    @foreach ($ar_film as $f)
    <div class="card" style="width: 18rem;">
        @php
            if (!empty($f->gambar)) {
        @endphp
            <img src="{{ asset('images')}}/{{ $f->gambar }}" width="80%" class="card-img-top"/>
        @php
            }
            else {
        @endphp
            <img src="{{ asset('images')}}/nophoto.png" width="80%" class="card-img-top"/>
        @php
            }
        @endphp
        <div class="card-body">
        <h5 class="card-title">{{ $f->title }}</h5>
        <p class="card-text">
        Sinopsis : {{ $f->sinopsis }}
                <br/>Rating : {{ $f->rating }} 
                <br/>Durasi : {{ $f->durasi }}
                <br/>Tahun : {{ $f->tahun }}
                <br/>Produksi : {{ $f->pro }}
                <br/>Pengarang :{{ $f->nama }}
                <br/>Genre : {{ $f->gen }}

        </p>
        <a href="{{ url('/film') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
    @endforeach
    
@endsection