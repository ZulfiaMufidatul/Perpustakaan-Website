@extends('template')
@section('content')

<header>
    <div class="cardx">
        <h3>Tambah Data Buku</h3>
    </div>
</header>
<br>
<div class="kembali">
    <div>
        <a class="btn btn-primary" href="/buku"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
    </div>
</div>
<br>
<div>
    <form action="/buku/store" method="post" enctype="multipart/form-data">
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
                <td><input type="file" name="sampul" required="required"></td>
            </tr>
            <tr>
                <td><strong>ID Buku</strong></td>
                <td>:</td>
                <td><input type="text" name="id_buku" required="required" placeholder="ID (otomatis)" value="{{$newId}}" readonly></td>
            </tr>
            <tr>
                <td><strong>Judul</strong></td>
                <td>:</td>
                <td><input type="text" name="judul_buku" required="required" placeholder="Masukkan judul" value="{{ old('judul_buku') }}"></td>
            </tr>
            <tr>
                <td><strong>Penulis</strong></td>
                <td>:</td>
                <td><input type="text" name="penulis" required="required" placeholder="Masukkan Penulis" value="{{ old('penulis') }}"></td>
            </tr>
            <tr>
                <td><strong>Penerbit</strong></td>
                <td>:</td>
                <td><input type="text" name="penerbit" required="required" placeholder="Masukkan Penerbit" value="{{ old('penerbit') }}"></td>
            </tr>
            <tr>
                <td><strong>Tahun Terbit</strong></td>
                <td>:</td>
                <td><input type="number"  name="tahun_terbit" required="required" placeholder="Masukkan Tahun Terbit" value="{{ old('tahun_terbit') }}"></td>
            </tr>
            <tr>
                <td><strong>Stok Buku</strong></td>
                <td>:</td>
                <td><input type="text" name="stok_buku" required="required" placeholder="Masukkan Stok Buku" value="{{ old('stok_buku') }}"></td>
            </tr>
            <tr>
                <td><strong>Tersedia</strong></td>
                <td>:</td>
                <td><input type="text" name="buku_tersedia" required="required" placeholder="Masukkan Sedia Buku" value="{{ old('buku_tersedia') }}"></td>
            </tr>
            <tr>
                <td><strong>Deskripsi</strong></td>
                <td>:</td>
                <td><input type="text" name="deskripsi" required="required" placeholder="Masukkan Deskripsi Buku" value="{{ old('deskripsi') }}"></td>
            </tr>
        </table>

        <input class="btn btn-success submit" type="submit" value="Simpan Data">
        <br>
    </form>
    <img src="{{ asset('admin/dist/img/book.png') }}" alt="book" class="buku1">
@endsection
