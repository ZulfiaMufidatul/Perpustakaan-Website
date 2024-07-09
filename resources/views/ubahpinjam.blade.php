<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
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
    @foreach($data as $peminjaman)
    <form action="/peminjaman/editpinjam" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td><strong>Id Peminjaman</strong></td>
                <td>:</td>
                <td><input type="text" name="id_peminjaman" required="required" value="{{ $peminjaman->id_peminjaman}}"></td>
            </tr>
            <tr>
                <td><strong>NISN</strong></td>
                <td>:</td>
                <td> 
                    <select name="nisn" class="form-control" required>
                    <!-- <option value=""></option> -->
                    @foreach ($anggota as $bk)
                    <option value="{{ $bk->nisn }}">{{ $bk->nisn }}</option>
                    @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Judul Buku</strong></td>
                <td>:</td>
                <td> 
                    <select name="judul_buku" class="form-control" required>
                    <!-- <option value=""></option> -->
                    @foreach ($buku as $item)
                    <option value="{{ $item->judul_buku  }}">{{ $item->judul_buku }}</option>
                    @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Tanggal Pinjam</strong></td>
                <td>:</td>
                <td><input type="date" name="tanggal_pinjam" required="required" value="{{ $peminjaman->tanggal_pinjam}}"></td>
            </tr>

            <tr>
                <td><strong>Tanggal Jatuh Tempo</strong></td>
                <td>:</td>
                <td><input type="date" name="tanggal_jatuhtempo" required="required" value="{{ $peminjaman->tanggal_jatuhtempo}}"></td>
            </tr>

            <tr>
                <td><strong>Tanggal Kembali</strong></td>
                <td>:</td>
                <td><input type="date" name="tanggal_kembali" required="required" value="{{ $peminjaman->tanggal_kembali}}"></td>
            </tr>

            <tr>
                <td><strong>Status Peminjaman</strong></td>
                <td>:</td>
                <td id="statuspinjam">
                    <input type="radio" name="status_peminjaman" value="Dipinjam">&nbsp;Dipinjam
                    <input type="radio" name="status_peminjaman" value="Dikembalikan">&nbsp;Dikembalikan
                </td>
            </tr>


        </table>

        <input class= "btn btn-success submit" type="submit" value="Simpan Data">
       
    </form>
    @endforeach
    @endsection
</body>
</html>