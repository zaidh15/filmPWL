@extends('layouts.index')
@section('content')
@php
$rs1 = App\Models\Sutradara::all();
$rs2 = App\Models\Produksi::all();
$rs3 = App\Models\Genre::all();
@endphp
    <h3>Form Edit Buku</h3>
    @foreach ($data as $rs)

    <form action="{{ route('film.update', $rs->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ $rs->title }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Sinopsis</label>
            <input type="text" name="sinopsis" value="{{ $rs->sinopsis }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Rating</label>
            <input type="text" name="rating" value="{{ $rs->rating }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label>Durasi</label>
            <input type="text" name="durasi" value="{{ $rs->durasi }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="tahun" value="{{ $rs->tahun }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar" value="{{ $rs->gambar }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Sutradara</label>
            <select class="form-control" name="sutradara_id">
                <option value="">-- Pilih Sutradara --</option>
                @foreach($rs1 as $s)
                {{-- ganti Sutradara --}}
                @php
                    $sel1 = ($s->id == $rs->sutradara_id) ? 'selected' : '';
                @endphp
                    <option value="{{ $s->id }}" {{ $sel1 }}>{{ $s->nama }}</option>
                @endforeach

            </select>
        </div>
         <div class="form-group">
            <label>Produksi</label>
            <select class="form-control" name="produksi_id">
                <option value="">-- Pilih Produksi --</option>
                @foreach($rs2 as $pro)
                {{-- ganti Produksi --}}
                @php
                    $sel2 = ($pro->id == $rs->produksi_id) ? 'selected' : '';
                @endphp
                    <option value="{{ $pro->id }}" {{ $sel2 }}>{{ $pro->nama }}</option>
                @endforeach

            </select>
        </div>
         <div class="form-group">
            <label>Genre</label><br/>
            @foreach($rs3 as $gen)
                 {{-- ganti Genre --}}
                @php
                    $cek = ($gen->id == $rs->genre_id) ? 'checked' : '';
                @endphp
                <input type="radio" name="genre_id"
                value="{{ $gen->id }}" {{ $cek }}/>{{ $gen->nama }} &nbsp;
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>

    @endforeach
@endsection
