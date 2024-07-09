@extends('template')
@section('content')

<div class="cardx">
    <h3>Tambah Data Transaksi</h3>
</div>
<br>

<div class="kembali">
    <div>
        <a class="btn btn-primary" href="/peminjaman"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
    </div>
</div>
<br>
<div>
    <form action="/peminjaman/store" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td><strong>Id Peminjaman</strong></td>
                <td>:</td>
                <td><input type="text" name="id_peminjaman" required="required" placeholder="ID (otomatis)" value="{{$newId}}" readonly></td>
            </tr>
            <tr>
                <td><strong>NISN</strong></td>
                <td>:</td>
                <td> 
                    <select name="nisn" class="form-control" required>
                    <option value=""></option>
                    @foreach ($anggota as $bk)
                    <option value="{{ $bk->nisn }}">{{ $bk->nisn }}</option>
                    @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Judul Buku</strong></td>
                <td>:</td>
                <td> 
                    <select name="judul_buku" class="form-control" required>
                    <option value=""></option>
                    @foreach ($buku as $item)
                    <option value="{{ $item->judul_buku  }}">{{ $item->judul_buku }}</option>
                    @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Tanggal Pinjam</strong></td>
                <td>:</td>
                <td><input class="tgltrs" type="date" name="tanggal_pinjam" required="required" placeholder="Masukkan Tanggal Pinjam"></td>
            </tr>

            <tr>
                <td><strong>Tanggal Jatuh Tempo</strong></td>
                <td>:</td>
                <td><input class="tgltrs" type="date" name="tanggal_jatuhtempo" required="required" placeholder="Masukkan Tanggal Jatuh Tempo"></td>
            </tr>

            <!-- <tr>
                <td><strong>Tanggal Kembali</strong></td>
                <td>:</td>
                <td><input class="tgltrs" type="date" name="tanggal_kembali" placeholder="Masukkan Tanggal Kembali"></td>
            </tr> -->

            <tr>
                <td><strong>Status Peminjaman</strong></td>
                <td>:</td>
                <td id="statuspinjam">
                    <input type="radio" name="status_peminjaman" value="Dipinjam">&nbsp;Dipinjam
                    <input type="radio" name="status_peminjaman" value="Dikembalikan">&nbsp;Dikembalikan
                </td>
            </tr>




        </table>

        <input class="btn btn-success submit" type="submit" value="Simpan Data">
        <img src="{{ asset('admin/dist/img/transaksi.png') }}" alt="transaksi" class="transaksi1">
    </form>
    
    @endsection
    <!-- </body>
</html> -->