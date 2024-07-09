@extends('template')
@section('content')

<div class="card">
    <div class="card-header">
        <center>
        <h4><strong>Detail Buku</strong></h4>
        </center>
    </div>
    <div class="card-body">
        <table >
            @foreach($data as $buku)
            <tr>
                <th rowspan="1">
                    @if ($buku->sampul)
                    <img src="{{ asset('images/' . $buku->sampul) }}" alt="Foto Buku" style="max-width: 100px;">
                    @endif
                </th>
            </tr>
            <tr>
                <td><strong>ID Buku</strong></td>
                <td>:</td>
                <td>{{ $buku->id_buku}}</td>
            </tr>
            <tr>
                <td><strong>Judul</strong></td>
                <td>:</td>
                <td>{{ $buku->judul_buku}}</td>
            </tr>
            <tr>
                <td><strong>Penulis</strong></td>
                <td>:</td>
                <td>{{ $buku->penulis}}</td>
            <tr>
                <td><strong>Penerbit</strong></td>
                <td>:</td>
                <td>{{ $buku->penerbit}}</td>
            </tr>
            <tr>
                <td><strong>Tahun Terbit</strong></td>
                <td>:</td>
                <td>{{ $buku->tahun_terbit}}</td>
            </tr>
            <tr>
                <td><strong>Stok Buku</strong></td>
                <td>:</td>
                <td>{{ $buku->stok_buku}}</td>
            </tr>
            <tr>
                <td><strong>Tersedia</strong></td>
                <td>:</td>
                <td>{{ $buku->buku_tersedia}}</td>
            </tr>
            <tr>
                <td><strong>Sinopsis</strong></td>
                <td>:</td>
                <td>{{ $buku->deskripsi}}</td>
            </tr>
        </table>
        @endforeach
    </div>
</div>

@endsection