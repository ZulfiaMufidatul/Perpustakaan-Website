 <!-- resources/views/riwayat.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Anggota</title>
</head>
<body>
    <h1>Laporan Data Anggota</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Anggota</th>
                <th>Kelas</th>
                <th>No HP</th>
            </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
                @foreach($agt as $anggota)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $anggota->nisn }}</td>
                    <td>{{ $anggota->nama_anggota }}</td>
                    <td>{{ $anggota->kelas }}</td>
                    <td>{{ $anggota->no_hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
