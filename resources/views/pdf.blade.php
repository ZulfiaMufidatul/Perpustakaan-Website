<!-- resources/views/riwayat.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
</head>
<body>
    <h1>Laporan Transaksi</h1>

    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>NISN Anggota</th>
                <th>ID Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Status Peminjaman</th>

                
                <!-- Tambahkan kolom lain yang diperlukan -->
            </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
                @foreach($trs as $peminjaman)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $peminjaman->id_peminjaman }}</td>
                    <td>{{ $peminjaman->nisn }}</td>
                    <td>{{ $peminjaman->id_buku }}</td>
                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                    <td>{{ $peminjaman->tanggal_jatuhtempo }}</td>
                    <td>{{ $peminjaman->tanggal_kembali }}</td>
                    <td>{{ $peminjaman->status_peminjaman }}</td>

                    <!-- Tambahkan kolom lain yang diperlukan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
