@extends('layouts.index')
@section('content')

@php
    $ar_judul = ['No','Nama','Jenis_Kelamin','Umur', 'Foto', 'Action'];
    $no = 1;
@endphp
<h3>Daftar Sutradara</h3>
<a class="btn btn-primary btn-md" href="{{ route('sutradara.create') }}" role="button">Tambah</a>
<table class = "table table-striped">
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($ar_sutradara as $p)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->umur }}</td>
                <td width="20%">
                @php
                    if (!empty($p->foto)) {
                @endphp
                    <img src="{{ asset('images')}}/{{ $p->foto }}" width="80%"/>
                @php
                }else {
                @endphp
                    <img src="{{ asset('images')}}/nophoto.png" width="80%"/>
                @php
                }
                @endphp
                </td>
                <td width="20%">
                <form method="POST" action="{{ route('sutradara.destroy', $p->id) }}">
                    @csrf
                    @method('delete')
                    <a class="btn btn-info" href="{{ route('sutradara.show', $p->id) }}"><img src="{{ asset('images')}}/eye.png" width="10%" /> Detail</a>

                    <a class="btn btn-success" href="{{ route('sutradara.edit', $p->id) }}"> <img src="{{ asset('images')}}/pencil.png" width="10%" /> Edit</a>
                    <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data dihapus?')"><img src="{{ asset('images')}}/delete.png" width="10%" />  Hapus</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection