<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function lihatbuku()
    {
        $data=Buku::All();
        return view('buku_user',['data'=>$data]);
    }
}
