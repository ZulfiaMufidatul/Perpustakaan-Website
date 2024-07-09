@extends('template')
@section('content')
<div class="kembali">
    <div>
        <a class="btn btn-primary" href="/dashboard"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
    </div>
</div>
<br>
<div>
@foreach($data as $pengadaan)
<form action="/pengadaan/editpengadaan" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table>
        <tr>
            <td><strong>No Transaksi</strong></td>
            <td>:</td>
            <td><input type="text" name="noTr" required="required" value="{{ old('noTr', $pengadaan->noTr) }}"></td>
        </tr>
        <tr>
            <td><strong>Judul Buku</strong></td>
            <td>:</td>
            <td><input type="text" name="judul_buku" required="required" value="{{ old('judul_buku', $pengadaan->judul_buku) }}"></td>
        </tr>
        <tr>
            <td><strong>Harga Buku</strong></td>
            <td>:</td>
            <td>
                <input type="text" name="harga_buku" required="required" value="{{ old('harga_buku', $pengadaan->harga_buku) }}">
                <!-- Tampilkan pesan error jika ada -->
                @if ($errors->has('harga_buku'))
                    <div class="alert alert-danger">{{ $errors->first('harga_buku') }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>Jumlah</strong></td>
            <td>:</td>
            <td>
                <input class="kelas" type="text" name="jumlah" required="required" value="{{ old('jumlah', $pengadaan->jumlah) }}">
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
                    <option value="universitas" {{ old('asal_dana', $pengadaan->asal_dana) == 'universitas' ? 'selected' : '' }}>Universitas</option>
                    <option value="yayasan" {{ old('asal_dana', $pengadaan->asal_dana) == 'yayasan' ? 'selected' : '' }}>Yayasan</option>
                    <option value="fakultas" {{ old('asal_dana', $pengadaan->asal_dana) == 'fakultas' ? 'selected' : '' }}>Fakultas</option>
                </select>
            </td>
        </tr>
    </table>
    <input class="btn btn-success submit" type="submit" value="Simpan Data">
</form>
@endforeach
@endsection
