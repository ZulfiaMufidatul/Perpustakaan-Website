<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Anggota</title>
</head>
<body> -->
@extends('template')
@section('content')
<div class="kembali">
        <div>
            <a class= "btn btn-primary" href="/stok"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
        </div>
    </div>
    <br>
    <div>
    @foreach($data as $stok)
    <form action="/stok/editstok" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td><strong>Id Stok</strong></td>
                <td>:</td>
                <td><input type="text" name="id_stok" required="required" value="{{ $stok->id_stok }}"></td>
            </tr>
            <tr>
                <td><strong>Id Buku</strong></td>
                <td>:</td>
                <td><input type="text" name="id_buku" required="required" value="{{ $stok->id_buku }}"></td>
            </tr>
            <tr>
                <td><strong>Jumlah Stok</strong></td>
                <td>:</td>
                <td><input class="kelas" type="text" name="jml_stok" required="required" value="{{ $stok->jml_stok }}"></td>
            </tr>
            

        </table>

        <input class= "btn btn-success submit" type="submit" value="Simpan Data">
        
    </form>
    @endforeach
@endsection

</body>
</html>