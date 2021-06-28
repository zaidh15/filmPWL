@extends('layouts.index')
@section('content')
    <h3>Form Produksi Film</h3>
    <form action="{{ route('produksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Produksi</label>
            <input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Email Produksi</label>
            <input type="text" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Alamat Produksi</label>
            <input type="text" name="alamat" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">HP Produksi</label>
            <input type="text" name="hp" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Foto Produksi</label>
            <input type="file" name="foto" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
@endsection