<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\awalController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuSatuanController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\peminjamController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\SesiController;
use App\Models\BukuModel;
use App\Models\BukuSatuanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $data = [
        'bukuAll' => BukuModel::latest()->paginate(8)
    ];
    if (Auth::check()) {
        // Jika pengguna sudah login, redirect ke halaman sebelumnya 
        if (Auth::user()->level == 'admin') {
            return redirect()->back();
        } elseif (Auth::user()->level == 'borrowers') {
            return redirect()->back();
        } elseif (Auth::user()->level == 'officer') {
            return redirect()->back();
        }
    } else {
        // Jika pengguna belum login, tampilkan halaman login
        return view('peminjam/perpusAwal')->with($data);
    }
})->name('perpusAwal');

Route::get('/login', function () {
    $data = [
        'bukuAll' => BukuModel::latest()->paginate(8)
    ];
    if (Auth::check()) {
        // Jika pengguna sudah login, redirect ke halaman sebelumnya
        if (Auth::user()->level == 'admin') {
            return redirect('/admin');
        } elseif (Auth::user()->level == 'borrowers') {
            return redirect('/index');
        } elseif (Auth::user()->level == 'officer') {
            return redirect('/petugas');
        }
    } else {
        // Jika pengguna belum login, tampilkan halaman login
        return view('login')->with($data);
    }
})->name('login');
Route::post('/login', [SesiController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    // Untuk Admin
    Route::get('/admin', [adminController::class, 'index'])->middleware('AdminMiddleware:admin');
    Route::get('/report', [adminController::class, 'report'])->middleware('AdminMiddleware:admin');
    // Route::get('/report', [adminController::class, 'report'])->middleware('AdminMiddleware:admin');
    // Genre
    Route::post('/admin/genre', [GenreController::class, 'store'])->middleware('AdminMiddleware:admin');
    // End Genre
    // Penulis
    Route::post('/admin/penulis', [PenulisController::class, 'store'])->middleware('AdminMiddleware:admin');
    // End Penulis
    // Penerbit
    Route::post('/admin/penerbit', [PenerbitController::class, 'store'])->middleware('AdminMiddleware:admin');
    // End Penerbit
    // Officer
    Route::post('/admin/addOfficer', [adminController::class, 'tambahPetugas'])->middleware('AdminMiddleware:admin');
    // End Officer
    // Buku
    Route::get('/bukuAll', [BukuController::class, 'index'])->middleware('AdminMiddleware:admin');
    Route::get('/details/{id_buku}', [BukuController::class, 'detailBuku'])->middleware('AdminMiddleware:admin');
    Route::get('/penulisAll', [PenulisController::class, 'index'])->middleware('AdminMiddleware:admin');
    Route::get('/penerbitAll', [PenerbitController::class, 'index'])->middleware('AdminMiddleware:admin');
    Route::get('/genreAll', [GenreController::class, 'index'])->middleware('AdminMiddleware:admin');
    Route::get('/buku', [BukuController::class, 'create'])->middleware('AdminMiddleware:admin');
    Route::post('/admin/buku', [BukuController::class, 'store'])->middleware('AdminMiddleware:admin');
    Route::post('/admin/bukuSatuan', [BukuSatuanController::class, 'store'])->middleware('AdminMiddleware:admin');
    // End Buku
    // Circulation
    Route::get('/pilihUser', [PeminjamanController::class, 'index'])->middleware('AdminMiddleware:admin');
    Route::get('/transaksiUser/{id}', [PeminjamanController::class, 'indexTransaksi'])->middleware('AdminMiddleware:admin')->name('transaksiUser');
    Route::post('/transaksiUser/{id}', [PeminjamanController::class, 'indexTransaksiCreate'])->middleware('AdminMiddleware:admin');
    Route::get('/indexTransaksiBuku/{id}/{id_peminjaman}', [PeminjamanController::class, 'indexTransaksiBuku'])->name('indexTransaksiBuku');
    Route::post('/transaksiUser/create/{id}', [PeminjamanController::class, 'prosesTransaksiBuku'])->middleware('AdminMiddleware:admin');

    Route::get('/pilihUserPeengembalian', [PengembalianController::class, 'index'])->middleware('AdminMiddleware:admin');
    Route::get('/transaksiUserPengembalian/{id}', [PengembalianController::class, 'indexTransaksiPengembalian'])
        ->middleware('AdminMiddleware:admin')
        ->name('transaksiUserPengembalian');
    Route::get('/indexTransaksiPengembalianBukuUnit/{id}/{id_detail_peminjaman}', [PengembalianController::class, 'indexTransaksiPengembalianBukuUnit'])->name('indexTransaksiPengembalianBuku');
    Route::post('/indexTransaksiPengembalianBukuUnitCreate/{id}/{id_buku_satuan}', [PengembalianController::class, 'indexTransaksiPengembalianBukuUnitCreate']);
    // End Circulation
    // End Untuk Admin

    // Untuk Petugas
    Route::get('/petugas', [adminController::class, 'indexPetugas'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/report', [adminController::class, 'report'])->middleware('OfficerMiddleware:officer');

    // Buku
    Route::get('/officer/bukuAll', [BukuController::class, 'indexBuku'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/details/{id_buku}', [BukuController::class, 'detailBuku'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/penulisAll', [PenulisController::class, 'index'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/penerbitAll', [PenerbitController::class, 'index'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/genreAll', [GenreController::class, 'index'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/buku', [BukuController::class, 'create'])->middleware('OfficerMiddleware:officer');
    Route::post('/officerTmbh/buku', [BukuController::class, 'store'])->middleware('OfficerMiddleware:officer');
    Route::post('/officerTmbh/bukuSatuan', [BukuSatuanController::class, 'store'])->middleware('OfficerMiddleware:officer');
    // End Buku
    // Genre
    Route::post('/officer/genre', [GenreController::class, 'store'])->middleware('OfficerMiddleware:officer');
    // End Genre
    // Penulis
    Route::post('/officer/penulis', [PenulisController::class, 'store'])->middleware('OfficerMiddleware:officer');
    // End Penulis
    // Penerbit
    Route::post('/officer/penerbit', [PenerbitController::class, 'store'])->middleware('OfficerMiddleware:officer');
    // End Penerbit
    // Circulation
    Route::get('/officer/pilihUser', [PeminjamanController::class, 'index'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/transaksiUser/{id}', [PeminjamanController::class, 'indexTransaksi'])->middleware('OfficerMiddleware:officer')->name('transaksiUser.officer');
    Route::post('/officer/transaksiUser/{id}', [PeminjamanController::class, 'indexTransaksiCreate'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/indexTransaksiBuku/{id}/{id_peminjaman}', [PeminjamanController::class, 'indexTransaksiBuku'])->name('indexTransaksiBuku.officer');
    Route::post('/officer/transaksiUser/create/{id}', [PeminjamanController::class, 'prosesTransaksiBuku'])->middleware('OfficerMiddleware:officer');

    Route::get('/officer/pilihUserPeengembalian', [PengembalianController::class, 'index'])->middleware('OfficerMiddleware:officer');
    Route::get('/officer/transaksiUserPengembalian/{id}', [PengembalianController::class, 'indexTransaksiPengembalian'])
        ->middleware('OfficerMiddleware:officer')
        ->name('transaksiUserPengembalian.officer');
    Route::get('/officer/indexTransaksiPengembalianBukuUnit/{id}/{id_detail_peminjaman', [PengembalianController::class, 'indexTransaksiPengembalianBukuUnit'])->name('indexTransaksiPengembalianBuku');
    Route::post('/officer/indexTransaksiPengembalianBukuUnitCreate/{id}/{id_buku_satuan}', [PengembalianController::class, 'indexTransaksiPengembalianBukuUnitCreate']);
    // End Circulation
    Route::post('/officer/addBorrower', [adminController::class, 'tambahPeminjam'])->middleware('OfficerMiddleware:officer');
    // End Untuk Petugas
    // Untuk Peminjam
    Route::get('/index', [peminjamController::class, 'index'])->middleware('BorrowersMiddleware:borrowers');
    // End Untuk Peminjam
    Route::get('/logout', [SesiController::class, 'logout']);
    Route::get('/officer/logout', [SesiController::class, 'logout']);
});
