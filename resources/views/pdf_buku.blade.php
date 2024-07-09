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
                <th>Id Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stok Buku</th>
                <th>Tersedia</th>
            </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
                @foreach($bk as $buku)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $buku->id_buku }}</td>
                    <td>{{ $buku->judul_buku }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit}}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>{{ $buku->stok_buku }}</td>
                    <td>{{ $buku->buku_tersedia }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
