@extends('template')
@section('content')

<header>
<div class="cardx">
    <h3>Tambah Data Pengadaan</h3>
</div>
</header>
<br>
<div class="kembali">
    <div>
        <a class="btn btn-primary" href="/pengadaan"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
    </div>
</div>
<br>
<div>
    <form action="/pengadaan/store" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table class="penambahan">
            <tr>
                <td><strong>No Transaksi</strong></td>
                <td>:</td>
                <td><input type="text" name="noTr" required="required" placeholder="ID (otomatis)" value="{{$newId}}" readonly></td>
            </tr>
            <tr>
                <td><strong>Judul Buku</strong></td>
                <td>:</td>
                <td><input type="text" name="judul_buku" required="required" placeholder="Masukkan Judul" value="{{ old('judul_buku') }}"></td>
            </tr>
            <tr>
                <td><strong>Harga Buku</strong></td>
                <td>:</td>
                <td>
                    <input type="text" name="harga_buku" required="required" placeholder="Masukkan Harga" value="{{ old('harga_buku') }}">
                    <!-- Tampilkan pesan error jika ada -->
                    @if ($errors->has('harga_buku'))
                        <div class="alert alert-danger">{{ $errors->first('harga_buku') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><strong>Jumlah Buku</strong></td>
                <td>:</td>
                <td>
                    <input type="text" name="jumlah" required="required" placeholder="Masukkan Jumlah" value="{{ old('jumlah') }}">
                    <!-- Tampilkan pesan error jika ada -->
                    @if ($errors->has('jumlah'))
                        <div class="alert alert-danger">{{ $errors->first('jumlah') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><strong>Asal Dana</strong></td>
                <td>:</td>
                <td>
                    <select name="asal_dana" required>
                        <option value=""></option>
                        <option value="universitas" {{ old('asal_dana') == 'universitas' ? 'selected' : '' }}>Universitas</option>
                        <option value="yayasan" {{ old('asal_dana') == 'yayasan' ? 'selected' : '' }}>Yayasan</option>
                        <option value="fakultas" {{ old('asal_dana') == 'fakultas' ? 'selected' : '' }}>Fakultas</option>
                    </select>
                </td>
            </tr>
        </table>

        <input class="btn btn-success submit" type="submit" value="Simpan Data">
    </form>
</div>

@endsection
