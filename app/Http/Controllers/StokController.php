<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;
use App\Http\Controllers\Controller;

class StokController extends Controller
{

    public function tampilstok()
    {
        $data=Stok::All();
        return view('stok',['data'=>$data]);
    }


    public function tambah_stok()
    {
        return view('tambah_stok');
    }

    public function simpanstok(request $request)
    {
        $data=array(
            "id_stok"=>$request->id_stok,
            "id_buku"=>$request->id_buku,
            "jml_stok"=>$request->jml_stok
        );

        $data=Stok::create($data);
        if($data){
            return redirect('/stok')->with(array('status'=>true,'Berhasil Tambah Data'));
        } else {
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Tambah Data"));
        }
    }

    public function editstok(request $request)
    {
        $data=Stok::where("id_stok", $request->id_stok)->update(array(
            "id_stok"=>$request->id_stok,
            "id_buku"=>$request->id_buku,
            "jml_stok"=>$request->jml_stok
        ));

        if($data){
            return redirect('/stok')->with(array('status'=>true, 'Berhasil Ubah Data'));

        } else{
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Ubah Data"));
        }
    }

    public function ubahstok($id_stok)
    {
        $data=Stok::where('id_stok',$id_stok)->get();
        return view('ubahstok', ['data'=>$data]);
    }

    public function hapusstok($id_stok)
    {
        $data=Stok::where('id_stok',$id_stok)->delete();
        if($data){
            return redirect('/stok')->with(array('status'=>true, 'Berhasil Hapus Data'));
        
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }
}
