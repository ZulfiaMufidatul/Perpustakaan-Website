<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Kategori;
use DB;



class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function dash_buku()
    {
        $bookCount = Buku::count();
        $memberCount = $this->getMemberCount();
        $transaksiCount = $this->getTransaksiCount();
        $ktCount = $this->getktCount();
        return view('dashboard', compact('bookCount', 'memberCount', 'transaksiCount','ktCount'));
    }
    private function getMemberCount()
    {
        return Anggota::count();
    }
    private function getktCount()
    {
        return Kategori::count();
    }

    private function getTransaksiCount()
    {
        return Peminjaman::count();
    }

    public function about()
    {
        return view('about');
    }

    public function home1()
    {
        return view('home1');
    }

    public function getKategoriInfo()
    {
        $data = Kategori::select(DB::raw('COUNT(id_kategori) as count, kategori.kategori_buku as name_kategori'))
    
    ->groupBy('kategori.kategori_buku')
    ->orderBy('name_kategori')
    ->get();
    
    return response()->json($data);
    }

    public function dashboard1()
    {
        return view('dashboard1');
    }

}
