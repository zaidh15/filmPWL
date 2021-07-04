@extends('layouts.index')
@section('content')

@php
    $ar_judul = ['No','Title','Sinopsis','Rating', 'Durasi','Tahun','Produksi','Sutradara','Genre','Gambar','Action'];
    $no = 1;
@endphp
<h3>Daftar Film</h3>
<a class="btn btn-primary btn-md" href="{{ route('film.create') }}" role="button">Tambah</a>
<a class="btn btn-info" href="{{ url('filmpdf') }}" role="button">Export to PDF</a>
<br/>
<table class = "table table-striped">
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($ar_film as $f)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $f->title }}</td>
                <td>{{ $f->sinopsis }}</td>
                <td>{{ $f->rating }}</td>
                <td>{{ $f->durasi }}</td>
                <td>{{ $f->tahun }}</td>
                <td>{{ $f->pro }}</td>
                <td>{{ $f->sut}}</td>
                <td>{{ $f->gen }}</td>
                <td width="20%">
                @php
                    if (!empty($f->gambar)) {
                @endphp
                    <img src="{{ asset('images')}}/{{ $f->gambar }}" width="80%"/>
                @php
                }else {
                @endphp
                    <img src="{{ asset('images')}}/nophoto.png" width="80%"/>
                @php
                }
                @endphp
                </td>
                <td width="20%">
                <form method="POST" action="{{ route('film.destroy', $f->id) }}">
                    @csrf
                    @method('delete')
                    <a class="btn btn-info" href="{{ route('film.show', $f->id) }}"><img src="{{ asset('images')}}/eye.png" width="10%" /> Detail</a>

                    <a class="btn btn-success" href="{{ route('film.edit', $f->id) }}"> <img src="{{ asset('images')}}/pencil.png" width="10%" /> Edit</a>
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data dihapus?')"><img src="{{ asset('images')}}/delete.png" width="10%" />  Hapus</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
