<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class PeminjamanController extends Controller
{

    public function hitungDenda($tanggalKembali, $tanggalJatuhTempo)
{
    if ($tanggalKembali === null && $tanggalJatuhTempo !== null) {
        $denda = 0;
    } else {
        $tanggalKembali = Carbon::parse($tanggalKembali);
        $tanggalJatuhTempo = Carbon::parse($tanggalJatuhTempo);
        $selisihHari = $tanggalKembali->diffInDays($tanggalJatuhTempo);

        // Jika selisih hari negatif (kembali sebelum jatuh tempo), set denda menjadi 0
        if ($selisihHari < 0 || $tanggalKembali->isSameDay($tanggalJatuhTempo)) {
            $denda = 0;
        } else {
            $denda = $selisihHari * 1000;
        }
    }

    return $denda;
}


    public function tampilpinjam()
    {
        $data=Peminjaman::All();
        foreach ($data as $peminjaman) {
            $denda = $this->hitungDenda($peminjaman->tanggal_kembali, $peminjaman->tanggal_jatuhtempo);
            $peminjaman->denda = $denda; // Menambahkan atribut denda ke objek peminjaman
        }

        return view('peminjaman',['data'=>$data]);
    }


    public function tambahpinjam()
    {
        $pjm = Peminjaman::orderBy('id_peminjaman', 'desc')->first();

        if ($pjm){
            $lastId = substr($pjm->id_peminjaman, 3);
            $newId = 'PJM' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        }
        else{
            $newId = 'PJM001';
        }
        return view('tambah_pinjam', ['newId'=>$newId])->with([
            'buku' => Buku::all(),
            'anggota' => Anggota::all(),
        ]);
    }

    public function simpanpinjam(request $request)
    {
           
        $data=array(
            "id_peminjaman"=>$request->id_peminjaman,
            "nisn"=>$request->nisn,
            "judul_buku"=>$request->judul_buku,
            "tanggal_pinjam"=>$request->tanggal_pinjam,
            "tanggal_jatuhtempo"=>$request->tanggal_jatuhtempo,
            "tanggal_kembali"=>$request->tanggal_kembali,
            "status_peminjaman"=>$request->status_peminjaman

        );

        
        $data=Peminjaman::create($data);
        if ($data) {
        
           
            return redirect('/peminjaman')->with(array('status'=>true,'Berhasil Tambah Data'));
        } else {
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Tambah Data"));
        }
    }



    public function editpinjam(request $request)
    {
        $data=Peminjaman::where("id_peminjaman", $request->id_peminjaman)->update(array(
            "id_peminjaman"=>$request->id_peminjaman,
            "nisn"=>$request->nisn,
            "judul_buku"=>$request->judul_buku,
            "tanggal_pinjam"=>$request->tanggal_pinjam,
            "tanggal_jatuhtempo"=>$request->tanggal_jatuhtempo,
            "tanggal_kembali"=>$request->tanggal_kembali,
            "status_peminjaman"=>$request->status_peminjaman
        ));

        // $update = Peminjaman::where("id_peminjaman", $request->id_peminjaman)->update($data);


       if ($data) {
            // $peminjaman = Peminjaman::find($request->id_peminjaman);
           
            return redirect('/peminjaman')->with(array('status'=>true, 'Berhasil Ubah Data'));

        } else{
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Ubah Data"));
        }
    }

    public function cetak_pdf()
    {
        $trs = Peminjaman::all();

        $pdf = PDF::loadview('pdf',['trs'=>$trs]);
        return $pdf->download('laporan-transaksi.pdf');
    }

    public function ubahpinjam($id_peminjaman)
    {
        $data=Peminjaman::where('id_peminjaman',$id_peminjaman)->get();
        return view('ubahpinjam', ['data'=>$data])->with([
            'buku' => Buku::all(),
            'anggota' => Anggota::all(),
        ]);
    }

    public function hapus_pinjam($id_peminjaman)
    {
        $data=Peminjaman::where('id_peminjaman',$id_peminjaman)->delete();
        if($data){
            return redirect('/peminjaman')->with(array('status'=>true, 'Berhasil Hapus Data'));
        
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }
    
    
   
   
    
}
