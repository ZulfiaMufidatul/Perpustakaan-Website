<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Http\Controllers\Controller;
use App\Models\Pengadaan;

class PengadaanController extends Controller
{
    

    public function tampilpengadaan()
    {
        $data=Pengadaan::All();
        return view('pengadaan',['data'=>$data]);
    }


    public function tambahpengadaan()
    {
        $tbk =Pengadaan::orderBy('noTr', 'desc')->first();

        if ($tbk){
            $lastId = substr($tbk->noTr, 3);
            $newId = 'TR0' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        }
        else{
            $newId = 'TR0100';
        }
        return view('tambahpengadaan', ['newId'=>$newId]);
    }


    public function simpanpengadaan(request $request)
    {
        // Tambahkan validasi
    $request->validate([
        'noTr' => 'required',
        'judul_buku' => 'required|string',
        'harga_buku' => 'required|numeric',
        'jumlah' => 'required|integer',
        'asal_dana' => 'required|string'
    ], [
        'harga_buku.required' => 'Harga buku harus diisi.',
        'harga_buku.numeric' => 'Harga buku harus berupa angka.',
        'jumlah.required' => 'Jumlah buku harus diisi.',
        'jumlah.integer' => 'Jumlah buku harus berupa bilangan bulat.'
    ]);

        $data=array(
            "noTr"=>$request->noTr,
            "judul_buku"=>$request->judul_buku,
            "harga_buku"=>$request->harga_buku,
            "jumlah"=>$request->jumlah,
            "asal_dana"=>$request->asal_dana


        );

        $data=Pengadaan::create($data);
        if($data){
            return redirect('/pengadaan')->with(array('status'=>true,'Berhasil Tambah Data'));
        } else {
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Tambah Data"));
        }
    }

    public function editpengadaan(request $request)
    {
        $request->validate([
            'noTr' => 'required',
            'judul_buku' => 'required|string',
            'harga_buku' => 'required|numeric',
            'jumlah' => 'required|integer',
            'asal_dana' => 'required|string'
        ], [
            'harga_buku.required' => 'Harga buku harus diisi.',
            'harga_buku.numeric' => 'Harga buku harus berupa angka.',
            'jumlah.required' => 'Jumlah buku harus diisi.',
            'jumlah.integer' => 'Jumlah buku harus berupa bilangan bulat.'
        ]);

        $data=Pengadaan::where("noTr", $request->noTr)->update(array(
            "noTr"=>$request->noTr,
            "judul_buku"=>$request->judul_buku,
            "harga_buku"=>$request->harga_buku,
            "jumlah"=>$request->jumlah,
            "asal_dana"=>$request->asal_dana

        ));

        if($data){
            return redirect('/pengadaan')->with(array('status'=>true, 'Berhasil Ubah Data'));

        } else{
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Ubah Data"));
        }
    }

    public function ubahpengadaan($noTr)
    {
        $data=Pengadaan::where('noTr',$noTr)->get();
        return view('ubahPengadaan', ['data'=>$data]);
    }

    public function hapusPengadaan($noTr)
    {
        $data=Pengadaan::where('noTr',$noTr)->delete();
        if($data){
            return redirect('/pengadaan')->with(array('status'=>true, 'Berhasil Hapus Data'));
        
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }

    // public function detail_Pengadaan($nisn)
    // {
    //     $data=Pengadaan::where('ni',$nisn)->get();
    //     return view('detail_Pengadaan',['data'=>$data]);   
    // }

    // public function cetak_pdf_Pengadaan()
    // {
    //     $agt = Pengadaan::all();
    //     $pdf_Pengadaan = PDF::loadview('pdf_Pengadaan',['agt'=>$agt]);
    //     return $pdf_Pengadaan->download('laporan-Pengadaan.pdf');
    // }

}
