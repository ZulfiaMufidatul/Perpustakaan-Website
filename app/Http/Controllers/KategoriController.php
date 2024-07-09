<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function tampilkategori()
    {
        $data=Kategori::All();
        return view('kategori',['data'=>$data]);
    }

    public function tambah_kategori()
    {
        $ktgr = Kategori::orderBy('id_kategori', 'desc')->first();

        if ($ktgr){
            $lastId = substr($ktgr->id_kategori, 3);
            $newId = 'KTR' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        }
        else{
            $newId = 'KTR001';
        }
        return view('tambah_kategori', ['newId'=>$newId])->with([
            'buku' => Buku::all(),
        ]);
    }

    public function simpankategori(request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'kategori_buku' => 'required|min:3|max:50',
            'judul_buku' => 'required|exists:buku,judul_buku',
        ], [
            'kategori_buku.required' => 'Kategori buku harus diisi.',
            'kategori_buku.min' => 'Kategori buku minimal 3 karakter.',
            'kategori_buku.max' => 'Kategori buku maksimal 50 karakter.',
            'judul_buku.required' => 'Judul buku harus diisi.',
            'judul_buku.exists' => 'Judul buku tidak valid.',
        ]);
        
        $data = Kategori::create([
            "id_kategori" => $request->id_kategori,
            "kategori_buku" => $request->kategori_buku,
            "judul_buku" => $request->judul_buku
        ]);

        if ($data) {
            return redirect('/kategori')->with(['status' => true, 'pesan' => 'Berhasil Tambah Data']);
        } else {
            return json_encode(['status' => false, 'pesan' => "Gagal Tambah Data"]);
        }
    }

    public function editkategori(request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'kategori_buku' => 'required|min:3|max:50',
            'judul_buku' => 'required|exists:buku,judul_buku',
        ], [
            'kategori_buku.required' => 'Kategori buku harus diisi.',
            'kategori_buku.min' => 'Kategori buku minimal 3 karakter.',
            'kategori_buku.max' => 'Kategori buku maksimal 50 karakter.',
            'judul_buku.required' => 'Judul buku harus diisi.',
            'judul_buku.exists' => 'Judul buku tidak valid.',
        ]);

        $data = Kategori::where("id_kategori", $request->id_kategori)->update([
            "id_kategori" => $request->id_kategori,
            "kategori_buku" => $request->kategori_buku,
            "judul_buku" => $request->judul_buku
        ]);

        if ($data) {
            return redirect('/kategori')->with(['status' => true, 'pesan' => 'Berhasil Ubah Data']);
        } else {
            return json_encode(['status' => false, 'pesan' => "Gagal Ubah Data"]);
        }
    }

    public function ubahkategori($id_kategori)
    {
        $data=Kategori::where('id_kategori',$id_kategori)->get();
         return view('ubahkategori', ['data'=>$data])->with([
            'buku' => Buku::all(),
        ]);
        
    }

    public function hapuskategori($id_kategori)
    {
        $data=Kategori::where('id_kategori',$id_kategori)->delete();
        if($data){
            return redirect('/kategori')->with(array('status'=>true, 'Berhasil Hapus Data'));
        
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }


    

   
}