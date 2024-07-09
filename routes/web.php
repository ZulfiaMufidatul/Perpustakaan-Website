<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'tampilanggota'])->name('anggota');
Route::get('/tambah_anggota', [App\Http\Controllers\AnggotaController::class, 'tambahanggota'])->name('tambah_anggota');
Route::post('/anggota/store', [App\Http\Controllers\AnggotaController::class, 'simpananggota'])->name('anggota');
Route::get('/anggota/ubahanggota/{nisn}', [App\Http\Controllers\AnggotaController::class, 'ubahanggota'])->name('ubahanggota');
Route::post('/anggota/editanggota', [App\Http\Controllers\AnggotaController::class, 'editanggota'])->name('editanggota');
Route::get('/hapus/{nisn}', [App\Http\Controllers\AnggotaController::class, 'hapusanggota'])->name('hapusanggota');
Route::get('/detail_anggota/{nisn}', [App\Http\Controllers\AnggotaController::class, 'detail_anggota'])->name('detail_anggota');
Route::get('/buku/cetak_pdf_anggota', 'App\Http\Controllers\AnggotaController@cetak_pdf_anggota');


Route::get('getNISN', 'App\Http\Controllers\PeminjamanController@getNISN');

//
Route::get('/peminjaman', [App\Http\Controllers\PeminjamanController::class, 'tampilpinjam'])->name('peminjaman');
Route::get('/tambah_pinjam', [App\Http\Controllers\PeminjamanController::class, 'tambahpinjam'])->name('tambah_pinjam');
Route::post('/peminjaman/store', [App\Http\Controllers\PeminjamanController::class, 'simpanpinjam'])->name('peminjaman');
Route::get('/peminjaman/ubahpinjam/{id_peminjaman}', [App\Http\Controllers\PeminjamanController::class, 'ubahpinjam'])->name('ubahpinjam');
Route::post('/peminjaman/editpinjam', [App\Http\Controllers\PeminjamanController::class, 'editpinjam'])->name('editpinjam');
Route::get('/hapus/{id_peminjaman}', [App\Http\Controllers\PeminjamanController::class, 'hapuspinjam'])->name('hapuspinjam');
Route::get('/hapus_peminjaman/{id_peminjaman}', 'App\Http\Controllers\PeminjamanController@hapus_pinjam');
Route::get('/peminjaman/cetak_pdf', 'App\Http\Controllers\PeminjamanController@cetak_pdf');
Route::post('/peminjaman', 'PeminjamanController@store')->name('peminjaman.store');
Route::get('/grafik-peminjaman', 'PeminjamanController@grafikPeminjaman');


//
Route::get('/dashboard','App\Http\Controllers\DashboardController@dashboard');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dash_buku');
Route::get('/about','App\Http\Controllers\DashboardController@about');
// Route::get('/home1','App\Http\Controllers\DashboardController@home1');
Route::get('/kategori/getKategoriInfo', 'App\Http\Controllers\DashboardController@getKategoriInfo');


//
Route::get('/kategori', 'App\Http\Controllers\KategoriController@tampilkategori');
Route::get('/tambah_kategori','App\Http\Controllers\KategoriController@tambah_kategori');
Route::post('/kategori/store','App\Http\Controllers\KategoriController@simpankategori');
Route::get('/kategori/ubahkategori/{id_kategori}', [App\Http\Controllers\KategoriController::class, 'ubahkategori'])->name('ubahkategori');
Route::post('/kategori/editkategori','App\Http\Controllers\KategoriController@editkategori');
Route::get('/hapus_kategori/{id_kategori}','App\Http\Controllers\KategoriController@hapuskategori');
Route::get('/kategori/pdf_kategori','App\Http\Controllers\KategoriController@pdf_kategori');
//
Route::get('/buku_user','App\Http\Controllers\UserController@lihatbuku');
Route::get('/dashboard1','App\Http\Controllers\DashboardController@dashboard1');
//

Route::get('/buku', [App\Http\Controllers\BukuController::class, 'tampilbuku'])->name('buku');
Route::get('/tambah_buku', [App\Http\Controllers\BukuController::class, 'tambahbuku'])->name('tambah_buku');
Route::post('/buku/store', [App\Http\Controllers\BukuController::class, 'simpanbuku'])->name('buku');
Route::get('/buku/ubahbuku/{id_buku}', [App\Http\Controllers\BukuController::class, 'ubahbuku'])->name('ubahbuku');
Route::post('/buku/editbuku', [App\Http\Controllers\BukuController::class, 'editbuku'])->name('editbuku');
Route::get('/hapus_buku/{id_buku}', [App\Http\Controllers\BukuController::class, 'hapusbuku'])->name('hapusbuku');
Route::get('/buku/cetak_pdf_buku', 'App\Http\Controllers\BukuController@cetak_pdf_buku');
Route::get('/detail_buku/{id_buku}', [App\Http\Controllers\BukuController::class, 'detail_buku'])->name('detail_buku');

//

Route::get('/pengadaan', [App\Http\Controllers\PengadaanController::class, 'tampilpengadaan'])->name('pengadaan');
Route::get('/tambah_pengadaan', [App\Http\Controllers\PengadaanController::class, 'tambahpengadaan'])->name('tambah_pengadaan');
Route::post('/pengadaan/store', [App\Http\Controllers\PengadaanController::class, 'simpanpengadaan'])->name('pengadaan');
Route::get('/pengadaan/ubahpengadaan/{noTr}', [App\Http\Controllers\PengadaanController::class, 'ubahpengadaan'])->name('ubahpengadaan');
Route::post('/pengadaan/editpengadaan', [App\Http\Controllers\PengadaanController::class, 'editpengadaan'])->name('editpengadaan');
Route::get('/hapus_pengadaan/{noTr}', [App\Http\Controllers\PengadaanController::class, 'hapuspengadaan'])->name('hapuspengadaan');


// 
// Route::get('/pengembalian', [App\Http\Controllers\PengembalianController::class, 'tampilpengembalian'])->name('pengembalian');
// Route::get('/tambah_pengembalian', [App\Http\Controllers\PengembalianController::class, 'tambahpengembalian'])->name('tambah_pengembalian');
// Route::post('/pengembalian/store', [App\Http\Controllers\PengembalianController::class, 'simpanpengembalian'])->name('pengembalian');
// Route::get('/pengembalian/ubahpengembalian/{id_pengembalian}', [App\Http\Controllers\PengembalianController::class, 'ubahpengembalian'])->name('ubahpengembalian');
// Route::post('/pengembalian/editpengembalian', [App\Http\Controllers\PengembalianController::class, 'editpengembalian'])->name('editpengembalian');
// Route::get('/hapus_pengembalian/{id_pengembalian}', [App\Http\Controllers\PengembalianController::class, 'hapuspengembalian'])->name('hapuspengembalian');

//

// Route::get('/stok', [App\Http\Controllers\StokController::class, 'tampilstok'])->name('stok');
// Route::get('/tambah_stok', [App\Http\Controllers\StokController::class, 'tambah_stok'])->name('tambah_stok');
// Route::post('/stok/store', [App\Http\Controllers\StokController::class, 'simpanstok'])->name('stok');
// Route::get('/stok/ubahstok/{id_stok}', [App\Http\Controllers\StokController::class, 'ubahstok'])->name('ubahstok');
// Route::post('/stok/editstok', [App\Http\Controllers\StokController::class, 'editstok'])->name('editstok');
// Route::get('/hapus_stok/{id_stok}', [App\Http\Controllers\StokController::class, 'hapusstok'])->name('hapusstok');


