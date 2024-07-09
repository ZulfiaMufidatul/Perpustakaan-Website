@extends('template')
@section('content')

<div class="card">
<div class="card-header">
        <center>
        <h4><strong>Detail Anggota</strong></h4>
        </center>
    </div>
    <div class="card-body">
        <table>
            @foreach($data as $anggota)
            <tr>
                <th rowspan="1">
                    @if ($anggota->foto)
                    <img src="{{ asset('images/' . $anggota->foto) }}" alt="Foto Anggota" style="max-width: 100px;">
                    @endif
                </th>
            </tr>
            <tr>
                <td><strong>NISN</strong></td>
                <td>:</td>
                <td>{{ $anggota->nisn}}</td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>:</td>
                <td>{{ $anggota->nama_anggota}}</td>
            </tr>
            <tr>
                <td><strong>Kelas</strong></td>
                <td>:</td>
                <td>{{ $anggota->kelas}}</td>
            </tr>
            <tr>
                <td><strong>No Hp</strong></td>
                <td>:</td>
                <td>{{ $anggota->no_hp}}</td>
            </tr>
        </table>
        @endforeach
    </div>
</div>

@endsection