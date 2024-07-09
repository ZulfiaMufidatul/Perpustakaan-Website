<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use PDF;

class BukuController extends Controller
{
    

    public function tampilbuku()
    {
        $data=Buku::All();
        
        return view('buku',['data'=>$data]);
    }

    public function tambahbuku()
    {
        $tbk = Buku::orderBy('id_buku', 'desc')->first();

        if ($tbk){
            $lastId = substr($tbk->id_buku, 3);
            $newId = 'BK0' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        }
        else{
            $newId = 'BK0100';
        }
        return view('tambah_buku', ['newId'=>$newId]);
    }

    public function simpanbuku(request $request)
    {
        // Validasi input termasuk ukuran file maksimum 1 MB
        $request->validate([
            'sampul' => 'required|file|mimes:jpeg,heic,png,jpg,gif|max:1024|min_size:10', // max 1024 KB atau 1 MB, min 10 KB
            'id_buku' => 'required',
            'judul_buku' => 'required|min:3|max:50',
            'penulis' => 'required|min:3|max:20',
            'penerbit' => 'required|min:3|max:20',
            'tahun_terbit' => 'required|digits:4|numeric|min:1945|max:2024' . date('Y'),
            'stok_buku' => 'required|integer|min:0|max:10',
            'buku_tersedia' => 'required|integer|min:0|max:10',
            'deskripsi' => 'required|min:10|max:100'
    ],
[
            'sampul.max' => 'Ukuran file sampul maksimal adalah 1 MB.',
            'sampul.min_size' => 'Ukuran file sampul minimal adalah 10KB.',
            'judul_buku.min' => 'Judul buku minimal 3 karakter.',
            'judul_buku.max' => 'Judul buku maksimal 50 karakter.',
            'penulis.min' => 'Penulis minimal 3 karakter.',
            'penulis.max' => 'Penulis maksimal 20 karakter.',
            'penerbit.min' => 'Penerbit minimal 3 karakter.',
            'penerbit.max' => 'Penerbit maksimal 20 karakter.',
            'tahun_terbit.digits' => 'Tahun terbit harus 4 digit.',
            'tahun_terbit.min' => 'Tahun terbit tidak boleh kurang dari 1945.',
            'tahun_terbit.max' => 'Tahun terbit tidak boleh lebih dari tahun saat ini.',
            'stok_buku.min' => 'Stok buku minimal 0.',
            'stok_buku.max' => 'Stok buku maksimal 10.',
            'buku_tersedia.min' => 'Buku tersedia minimal 0.',
            'buku_tersedia.max' => 'Buku tersedia maksimal 10.',
            'deskripsi.min' => 'Deskripsi minimal 10 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 100 karakter.'
]);

        $sampul = $request->file('sampul');
        $sampulNama = $sampul->getClientOriginalName();
        $sampul->move(public_path('images'), $sampulNama);

        $data=array(
            "id_buku"=>$request->id_buku,
            "judul_buku"=>$request->judul_buku,
            "penulis"=>$request->penulis,
            "penerbit"=>$request->penerbit,
            "tahun_terbit"=>$request->tahun_terbit,
            "stok_buku"=>$request->stok_buku,
            "buku_tersedia"=>$request->buku_tersedia,
            "sampul"=>$sampulNama,
            "deskripsi"=>$request->deskripsi


        );

        $data=Buku::create($data);
        if($data){
            return redirect('/buku')->with(array('status'=>true,'Berhasil Tambah Data'));
        } else {
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Tambah Data"));
        }
    }
    
    public function editbuku(request $request)
    {
        $request->validate([
            'sampul' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', // max 1024 KB atau 1 MB
            'id_buku' => 'required',
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok_buku' => 'required|integer',
            'buku_tersedia' => 'required|integer',
            'deskripsi' => 'required'
        ],
    [
        'sampul.max' => 'Ukuran file sampul maksimal adalah 2 MB.', // Pesan kustom
    ]);
        $sampul = $request->file('sampul');
        $sampulNama = $sampul->getClientOriginalName();
        $sampul->move(public_path('images'), $sampulNama);

        $data=Buku::where("id_buku", $request->id_buku)->update(array(
            "judul_buku"=>$request->judul_buku,
            "penulis"=>$request->penulis,
            "penerbit"=>$request->penerbit,
            "tahun_terbit"=>$request->tahun_terbit,
            "stok_buku"=>$request->stok_buku,
            "buku_tersedia"=>$request->buku_tersedia,
            "sampul"=>$sampulNama,
            "deskripsi"=>$request->deskripsi
        ));

        if($data){
            return redirect('/buku')->with(array('status'=>true, 'Berhasil Ubah Data'));

        } else{
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Ubah Data"));
        }
    }

    public function ubahbuku($id_buku)
    {
        $data=Buku::where('id_buku',$id_buku)->get();
        return view('ubahbuku', ['data'=>$data]);
    }

    public function hapusbuku($id_buku)
    {
        $data=Buku::where('id_buku',$id_buku)->delete();
        if($data){
            return redirect('/buku')->with(array('status'=>true, 'Berhasil Hapus Data'));
        
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }

    public function cetak_pdf_buku()
    {
        $bk = Buku::all();

        $pdf_buku = PDF::loadview('pdf_buku',['bk'=>$bk]);
        return $pdf_buku->download('laporan-buku.pdf');
    }

    public function detail_buku($judul_buku)
    {
        $data=Buku::where('judul_buku',$judul_buku)->get();
        return view('detail_buku',['data'=>$data]);   
    }
    
}