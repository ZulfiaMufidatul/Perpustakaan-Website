@extends('template')
@section('content')

<header>
<div class=title>
    <center>
    <h2><strong>Data Anggota</strong></h2>
    <h4><strong>Perpustakaan</strong></h4> 
    </center>
</div>

</header>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<br>
    <table border='2' class="table table-bordered table-hover table-stripped">
        <thead style="background-color:  rgb(68, 76, 85)">
        <tr class="text-center" style= "color:white">
            <th>No</th>
            <th>Foto Profil</th>
            <th>NISN</th>
            <th>Nama anggota</th>
            <th>Kelas</th>
            <th>No HP</th>
            <th>Opsi</th>
        </tr>
        </thead>
        @php $i=1 @endphp
        @foreach ($data as $anggota)
        <tr class="text-center">
        <td>{{ $i++ }}</td>
            <td> @if ($anggota->foto)
                <img src="{{ asset('images/' . $anggota->foto) }}" alt="Foto Anggota" style="max-width: 100px;">
                @endif</td>
            <td><a href="/detail_anggota/{{ $anggota->nisn }}">{{ $anggota->nisn }}</a></td>
            <td>{{ $anggota->nama_anggota }}</td>
            <td>{{ $anggota->kelas }}</td>
            <td>{{ $anggota->no_hp }}</td>
            <td>
                <div class="option">
                <a class="btn btn-warning btn-sm" href='/anggota/ubahanggota/{{ $anggota->nisn }}'><i class="fas fa-eye-dropper"></i>&nbsp;Edit</a>
            
                 @method('delete')
                 {{ csrf_field() }}
                <a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" href="/hapus/{{ $anggota->nisn}}"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                </div>
            </td>
        </tr>
        @endforeach
    </table> 
@endsection     
