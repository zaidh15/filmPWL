@php
    $ar_judul = ['No','Title','Sinopsis','Rating', 'Durasi','Tahun','Produksi','Sutradara','Genre'];
    $no = 1;
@endphp
<h3 align="center">Daftar Film</h3>
<table border="1" align="center" cellpadding="5">
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
            </tr>
        @endforeach
    </tbody>
</table>
