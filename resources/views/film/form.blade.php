@extends('layouts.index')
@section('content')
@php
$rs1 = App\Models\Sutradara::all();
$rs2 = App\Models\Produksi::all();
$rs3 = App\Models\Genre::all();
@endphp
    <h3>Form Film</h3>
    <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Sinopsis</label>
            <input type="text" name="sinopsis" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Rating</label>
            <input type="text" name="rating" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Durasi</label>
            <input type="text" name="durasi" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="tahun" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Sutradara</label>
            <select class="form-control" name="sutradara_id">
                <option value="">-- Pilih Sutradara --</option>
                @foreach($rs1 as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach

            </select>
        </div>
         <div class="form-group">
            <label>Produksi</label>
            <select class="form-control" name="produksi_id">
                <option value="">-- Pilih Produksi --</option>
                @foreach($rs2 as $pro)
                    <option value="{{ $pro->id }}">{{ $pro->nama }}</option>
                @endforeach

            </select>
        </div>
         <div class="form-group">
            <label>Genre</label><br/>
            @foreach($rs3 as $gen)
                <input type="radio" name="genre_id"
                value="{{ $gen->id }}"/>{{ $gen->nama }} &nbsp;
            @endforeach


        </div>

        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
@endsection
