@extends('template')
@section('content')

<header>
<div class="cardx">
    <h3>Edit Data Kategori Buku</h3>
</div>
</header>
<br>
<div class="kembali">
    <div>
        <a class="btn btn-primary" href="/dashboard"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
    </div>
</div>
<br>
<div>
    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan Error -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Pesan Validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @foreach($data as $kategori)
    <form action="/kategori/editkategori" method="post">
        {{ csrf_field() }}
        <table class="penambahan">
            <tr>
                <td><strong>Id Kategori</strong></td>
                <td>:</td>
                <td><input type="text" name="id_kategori" required="required" value="{{ $kategori->id_kategori }}"></td>
            </tr>
            <tr>
                <td><strong>Kategori</strong></td>
                <td>:</td>
                <td><input type="text" name="kategori_buku" required="required" value="{{ $kategori->kategori_buku }}"></td>
            </tr>
            <tr>
                <td><strong>Judul Buku</strong></td>
                <td>:</td>
                <td>
                    <input list="judul_buku_list" name="judul_buku" class="form-control" placeholder="Masukkan atau pilih judul buku" required value="{{ old('judul_buku', $kategori->judul_buku) }}">
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
    @endforeach
</div>

@endsection
