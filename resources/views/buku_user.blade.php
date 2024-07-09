
@extends('template')
@section('content')

<header>
<div class=title>
    <center>
    <h2><strong>Data Buku</strong></h2>
    <h4><strong>Perpustakaan</strong></h4> 
    </center>
</div>
</header>
<br>
    
    <table border='2' class="table table-bordered table-hover table-stripped"  >
        <thead style="background-color:  rgb(68, 76, 85)">
        <tr class="text-center" style= "color:white">
            <th>Sampul</th>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <!-- <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Stok Buku</th> -->
            <th>Tersedia</th>
        </tr>
        </thead>
        @foreach ($data as $buku)
        <tr class="text-center">
        <td> @if ($buku->sampul)
                <img src="{{ asset('images/' . $buku->sampul) }}" alt="Foto Buku" style="max-width: 100px;">
                @endif</td>
            <td>{{ $buku->id_buku }}</td>
            <td><a href="/detail_buku/{{ $buku->judul_buku }}">{{ $buku->judul_buku }}</a></td>
            <!-- <td>{{ $buku->penulis }}</td>
            <td>{{ $buku->penerbit }}</td>
            <td>{{ $buku->tahun_terbit }}</td>
            <td>{{ $buku->stok_buku }}</td> -->
            <td>{{ $buku->buku_tersedia }}</td>

            
        </tr>
        @endforeach
    </table>      
@endsection
<!-- </body>
</html> -->