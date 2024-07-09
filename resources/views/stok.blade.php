<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
@extends('template')
@section('content')
    <h3>Stok</h3>
    <a href="/tambah_stok">+Tambah Stok</a>
    <table border='2' class="table table-bordered table-hover table-stripped"  >
        <thead style="background-color:  rgb(68, 76, 85)">
        <tr class="text-center" style= "color:white">
            <th>Id Stok</th>
            <th>Id Buku</th>
            <th>Stok</th>
            <th>Opsi</th>
        </tr>
        </thead>
        @foreach ($data as $stok)
        <tr class="text-center">
            <td>{{ $stok->id_stok }}</td>
            <td>{{ $stok->id_buku }}</td>
            <td>{{ $stok->jml_stok }}</td>
            <td>
                <div class="option">
                <a class="btn btn-warning btn-sm" href='/stok/ubahstok/{{ $stok->id_stok }}'><i class="fas fa-eye-dropper"></i>&nbsp;Edit</a>
            
                 @method('delete')
                 {{ csrf_field() }}
                <a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" href="/hapus_stok/{{ $stok->id_stok }}"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                </div>
            </td>
        </tr>
        @endforeach
    </table> 
@endsection     
<!-- </body>
</html> -->