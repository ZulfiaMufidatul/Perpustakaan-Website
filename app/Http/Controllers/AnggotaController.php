<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Http\Controllers\Controller;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    

    public function tampilanggota()
    {
        $data=Anggota::All();
        return view('anggota',['data'=>$data]);
    }


    public function tambahanggota()
    {
        $angt = Anggota::orderBy('nisn', 'desc')->first();

        if ($angt){
            $lastId = substr($angt->nisn, 3);
            $newId = '001' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        }
        else{
            $newId = '001111';
        }
        return view('tambah_anggota', ['newId'=>$newId]);
    
    }

    public function simpananggota(request $request)
    {
        $request->validate([
            'foto' => 'required|file|mimes:jpeg,png,jpg|max:2048', // max 2048 KB atau 2 MB
            'nisn' => 'required',
            'nama_anggota' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required'
        ], [
            'foto.max' => 'Ukuran file foto maksimal adalah 2 MB.', // Pesan kustom
            'foto.required' => 'Foto harus diunggah.', // Pesan kustom untuk required
            'foto.mimes' => 'Format file foto harus berupa: jpeg, png, atau jpg.',
            // Tambahkan pesan kustom lainnya jika diperlukan
        ]);
        $foto = $request->file('foto');
        $fotoNama = $foto->getClientOriginalName();
        $foto->move(public_path('images'), $fotoNama);


        $data=array(
            "nisn"=>$request->nisn,
            "nama_anggota"=>$request->nama_anggota,
            "kelas"=>$request->kelas,
            "no_hp"=>$request->no_hp,
            "foto"=>$fotoNama,

        );

        $data=Anggota::create($data);
        if($data){
            return redirect('/anggota')->with(array('status'=>true,'Berhasil Tambah Data'));
        } else {
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Tambah Data"));
        }
    }

    public function editanggota(request $request)
    {
        $request->validate([
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // max 2048 KB atau 2 MB
            'nisn' => 'required',
            'nama_anggota' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required'
        ], [
            'foto.max' => 'Ukuran file foto maksimal adalah 2 MB.', // Pesan kustom
            // Tambahkan pesan kustom lainnya jika diperlukan
        ]);

        $foto = $request->file('foto');
        $fotoNama = $foto->getClientOriginalName();
        $foto->move(public_path('images'), $fotoNama);

        $data=Anggota::where("nisn", $request->nisn)->update(array(
            "nisn"=>$request->nisn,
            "nama_anggota"=>$request->nama_anggota,
            "kelas"=>$request->kelas,
            "no_hp"=>$request->no_hp,
            "foto"=> $fotoNama,
        ));

        if($data){
            return redirect('/anggota')->with(array('status'=>true, 'Berhasil Ubah Data'));

        } else{
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Ubah Data"));
        }
    }

    public function ubahanggota($nisn)
    {
        $data=Anggota::where('nisn',$nisn)->get();
        return view('ubahanggota', ['data'=>$data]);
    }

    public function hapusanggota($nisn)
    {
        $data=Anggota::where('nisn',$nisn)->delete();
        if($data){
            return redirect('/anggota')->with(array('status'=>true, 'Berhasil Hapus Data'));
        
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }

    public function detail_anggota($nisn)
    {
        $data=Anggota::where('nisn',$nisn)->get();
        return view('detail_anggota',['data'=>$data]);   
    }

    public function cetak_pdf_anggota()
    {
        $agt = Anggota::all();
        $pdf_anggota = PDF::loadview('pdf_anggota',['agt'=>$agt]);
        return $pdf_anggota->download('laporan-anggota.pdf');
    }

}
