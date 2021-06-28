@extends('layouts.index')
@section('content')
    <h3>Form Sutradara Film</h3>
    <form action="{{ route('sutradara.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Sutradara</label>
            <input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin Sutradara</label>
            <input type="text" name="jenis_kelamin" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Umur Sutradara</label>
            <input type="text" name="umur" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Foto Sutradara</label>
            <input type="file" name="foto" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
@endsection