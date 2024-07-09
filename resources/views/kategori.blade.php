
@extends('template')
@section('content')

<header>
<div class=title>
    <center>
    <h2><strong>Data Kategori Buku</strong></h2>
    <h4><strong>Perpustakaan</strong></h4> 
    </center>
</div>

</header>
<br>
    
    <table border='2' class="table table-bordered table-hover table-stripped"  >
        <thead style="background-color:  rgb(68, 76, 85)">
        <tr class="text-center" style= "color:white">
            <th>No</th>
            <th>Id Kategori</th>
            <th>Kategori</th>
            <th>Judul Buku</th>
            <th>Opsi</th>
        </tr>
        </thead>
        @php $i=1 @endphp
        @foreach ($data as $kategori)
        <tr class="text-center">
            <td>{{ $i++ }}</td>
            <td>{{ $kategori->id_kategori }}</td>
            <td>{{ $kategori->kategori_buku }}</td>
            <td>{{ $kategori->judul_buku }}</td>

            <td>
                <div class="option">
                <a class="btn btn-warning btn-sm" href='/kategori/ubahkategori/{{ $kategori->id_kategori }}'><i class="fas fa-eye-dropper"></i>&nbsp;Edit</a>
            
                 @method('delete')
                 {{ csrf_field() }}
                <a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" href="/hapus_kategori/{{ $kategori->id_kategori}}"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                </div>
            </td>
        </tr>
        @endforeach
    </table>      
@endsection
<!-- </body>
</html> -->