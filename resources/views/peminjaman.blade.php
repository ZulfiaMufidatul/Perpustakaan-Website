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
<header>
<div class=title>
    <center>
    <h2><strong>Data Transaksi</strong></h2>
    <h4><strong>Perpustakaan</strong></h4> 
    </center>
</div>
</header>
<br>
    <!-- <form action="{{ route('peminjaman.store') }}" method="POST"> -->
    <table border='2'class="table table-bordered table-hover table-stripped">
        <thead style="background-color:  rgb(68, 76, 85)">
        <tr class="text-center" style= "color:white">
            <th>No</th>
            <th>Id Peminjaman</th>
            <th>NISN</th>
            <th>Id Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Jatuh Tempo</th>
            <th>Tanggal Kembali</th>
            <th>Status Peminjaman</th>
            <th>Denda</th>
            <th>Opsi</th>
        </tr>
        </thead>
        @php $i=1 @endphp
        @foreach ($data as $peminjaman)
        <tr class="text-center">
            <td>{{ $i++ }}</td>
            <td>{{ $peminjaman->id_peminjaman }}</td>
            <td>{{ $peminjaman->nisn }}</td>
            <td>{{ $peminjaman->judul_buku }}</td>
            <td>{{ $peminjaman->tanggal_pinjam }}</td>
            <td>{{ $peminjaman->tanggal_jatuhtempo }}</td>
            <td>{{ $peminjaman->tanggal_kembali }}</td>
            <td>{{ $peminjaman->status_peminjaman }}</td>
            <td>{{ $peminjaman->denda }}</td>
            <td>
                <div class="option">
                <a class="btn btn-warning btn-sm" href='/peminjaman/ubahpinjam/{{ $peminjaman->id_peminjaman }}'><i class="fas fa-eye-dropper"></i>&nbsp;Edit</a>
            
                @method('delete')
                 {{ csrf_field() }}
                <a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" href="/hapus_peminjaman/{{ $peminjaman->id_peminjaman}}"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                </div>  
            </td>
        </tr>
        @endforeach
    </table>
 
@endsection  
<!-- </body>
</html> -->