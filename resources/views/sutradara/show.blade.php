@extends('layouts.index')
@section('content')

    <br/>
    @foreach ($ar_sutradara as $p)
    <div class="card" style="width: 18rem;">
        @php
            if (!empty($p->foto)) {
        @endphp
            <img src="{{ asset('images')}}/{{ $p->foto }}" width="80%" class="card-img-top"/>
        @php
            }
            else {
        @endphp
            <img src="{{ asset('images')}}/nophoto.png" width="80%" class="card-img-top"/>
        @php
            }
        @endphp
        <div class="card-body">
          <h5 class="card-title"><b>{{ $p->nama }}</b></h5>
          <p class="card-text">
            <b>Jenis Kelamin :</b> {{ $p->jenis_kelamin}} 
            <br/><b>Umur :</b> {{ $p->umur }}
          </p>
          <a href="{{ url('/sutradara') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
    @endforeach
    
@endsection