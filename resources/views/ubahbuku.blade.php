<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Buku</title>
</head>
<body> -->
@extends('template')
@section('content')
<div class="kembali">
        <div>
            <a class= "btn btn-primary" href="/dashboard"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
        </div>
    </div>
    <br>
    <div>
    @foreach($data as $buku)
    <form action="/buku/editbuku" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table>
            <tr>
                <td><strong>Sampul Buku</strong></td>
                <td>:</td>
                <td><input  type="file" name="sampul" required="required"  value="{{ $buku->sampul }}"></td>
            </tr>
            <tr>
                <td><strong>ID Buku</strong></td>
                <td>:</td>
                <td><input type="text" name="id_buku" required="required" value="{{ $buku->id_buku}}"></td>
            </tr>
            <tr>
                <td><strong>Judul</strong></td>
                <td>:</td>
                <td><input type="text" name="judul_buku" required="required" value="{{ $buku->judul_buku}}"></td>
            </tr>
            <tr>
                <td><strong>Penulis</strong></td>
                <td>:</td>
                <td><input class="penulis" type="text" name="penulis" required="required" value="{{ $buku->penulis}}"></td>
            </tr>
            <tr>
                <td><strong>Penerbit</strong></td>
                <td>:</td>
                <td><input type="text" name="penerbit" required="required" value="{{ $buku->penerbit}}"></td>
            </tr>
            <tr>
                <td><strong>Tahun Terbit</strong></td>
                <td>:</td>
                <td><input type="number" min="1945" name="tahun_terbit" required="required" value="{{ $buku->tahun_terbit}}"></td>
            </tr>
            <tr>
                <td><strong>Stok Buku</strong></td>
                <td>:</td>
                <td><input type="text" name="stok_buku" required="required" value="{{ $buku->stok_buku}}"></td>
            </tr>
            <tr>
                <td><strong>Tersedia</strong></td>
                <td>:</td>
                <td><input type="textr" name="buku_tersedia" required="required" value="{{ $buku->buku_tersedia}}"></td>
            </tr>
            <tr>
                <td><strong>Sinopsis</strong></td>
                <td>:</td>
                <td><input type="text" name="deskripsi" required="required" value="{{ $buku->deskripsi}}"></td>
            </tr>

        </table>

        <input class= "btn btn-success submit" type="submit" value="Simpan Data">
        
    </form>
    @endforeach
    @endsection
</body>
</html>