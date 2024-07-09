@extends('template')
@section('content')

<header>
<div class="cardx">
    <h3>Tambah Data Kategori Buku</h3>
</div>
</header>
<br>
<div class="kembali">
    <div>
        <a class="btn btn-primary" href="/kategori"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
    </div>
</div>
<br>
<div>
    <form action="/kategori/store" method="post">
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

        <table class="penambahan">
            <tr>
                <td><strong>Id Kategori</strong></td>
                <td>:</td>
                <td><input type="text" name="id_kategori" required="required" placeholder="ID (otomatis)" value="{{$newId}}" readonly></td>
            </tr>
            <tr>
                <td><strong>Kategori</strong></td>
                <td>:</td>
                <td><input type="text" name="kategori_buku" required="required" placeholder="Masukkan Kategori" value="{{ old('kategori_buku') }}"></td>
            </tr>
            <tr>
                <td><strong>Judul Buku</strong></td>
                <td>:</td>
                <td>
                    <input list="judul_buku_list" name="judul_buku" class="form-control" required placeholder="Pilih atau tulis judul buku">
                    <datalist id="judul_buku_list">
                        @foreach ($buku as $item)
                            <option value="{{ $item->judul_buku }}">{{ $item->judul_buku }}</option>
                        @endforeach
                    </datalist>
                </td>
            </tr>
        </table>
        
        <input class="btn btn-success submit" type="submit" value="Simpan Data">
    </form>
    
    <img src="{{ asset('admin/dist/img/kategori.png') }}" alt="kategori" class="kategori1">
</div>

@endsection
