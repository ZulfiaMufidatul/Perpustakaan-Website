
@extends('template')
@section('content')

<header>
<div class=title>
    <center>
    <h2><strong>Data Pengadaan</strong></h2>
    <h4><strong>Perpustakaan</strong></h4> 
    </center>
</div>
</header>
<br>
    
    <table border='2' class="table table-bordered table-hover table-stripped"  >
        <thead style="background-color:  rgb(68, 76, 85)">
        <tr class="text-center" style= "color:white">
            <th>No Transaksi</th>
            <th>Judul Buku</th>
            <th>Harga Buku</th>
            <th>Jumlah pengadaan</th>
            <th>Asal Dana</th>
            <th>Opsi</th>
        </tr>
        </thead>
        @php $i=1 @endphp
        @foreach ($data as $pengadaan)
        <tr class="text-center">
        <td>{{ $pengadaan->noTr }}</td>
            <td>{{ $pengadaan->judul_buku }}</td>
            <td>{{ $pengadaan->harga_buku }}</td>
            <td>{{ $pengadaan->jumlah }}</td>
            <td>{{ $pengadaan->asal_dana }}</td>
            <td>
                <div class="option">
                <a class="btn btn-warning btn-sm" href='/pengadaan/ubahpengadaan/{{ $pengadaan->noTr }}'><i class="fas fa-eye-dropper"></i>&nbsp;Edit</a>
            
                 @method('delete')
                 {{ csrf_field() }}
                <a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" href="/hapus_pengadaan/{{ $pengadaan->noTr}}"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                </div>
            </td>
        </tr>
        @endforeach
    </table>      
@endsection
<!-- </body>
</html> -->