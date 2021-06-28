@extends('layouts.index')
@section('content')
    <h3>Form Edit Sutradara Film</h3>
    @foreach ($data as $rs)
        
    <form action="{{ route('sutradara.update', $rs->id) }}" method="POST">
        
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Nama Sutradara</label>
            <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Jenis kelamin Sutradara</label>
            <input type="text" name="jenis_kelamin" value="{{ $rs->jenis_kelamin }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Umur Sutradara</label>
            <input type="text" name="umur" value="{{ $rs->umur }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Foto Sutradara</label>
            <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
    
    @endforeach
@endsection