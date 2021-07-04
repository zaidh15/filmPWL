@extends('layouts.index')
@section('content')
    <h3>Form Edit Produksi Film</h3>
    @foreach ($data as $rs)

    <form action="{{ route('produksi.update', $rs->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Nama Produksi</label>
            <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Email Produksi</label>
            <input type="text" name="email" value="{{ $rs->email }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Alamat Produksi</label>
            <input type="text" name="alamat" value="{{ $rs->alamat }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">HP Produksi</label>
            <input type="text" name="hp" value="{{ $rs->hp }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Foto Produksi</label>
            <input type="file" name="foto" value="{{ $rs->foto }}" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>

    @endforeach
@endsection
