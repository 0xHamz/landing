<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PenumpangController;
use App\Models\User;
use App\Http\Middleware;

// Halaman landing
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Halaman sign-in
Route::get('/sign', function () {
    return view('sign');
})->name('sign');

// Proses login
Route::post('/sign', [AuthController::class, 'login'])->name('sign.post');

// Route dashboard (redirect berdasarkan role)
Route::get('/dashboard', function () {
    $role = session('user_role');

    if ($role === 'admin') {
        return redirect()->route('admin');
    } elseif ($role === 'penumpang') {
        return redirect()->route('penumpang');
    } else {
        return redirect()->route('sign');
    }
})->name('dashboard');

// Halaman admin (hanya admin)
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin');

Route::get('/admin/jadwal', [JadwalController::class, 'index'])->name('admin.jadwal');
// Tambah jadwal
Route::get('/admin/jadwal/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
Route::post('/admin/jadwal', [JadwalController::class, 'store'])->name('admin.jadwal.store');

// Edit jadwal
Route::get('/admin/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
Route::put('/admin/jadwal/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');

// Hapus jadwal
Route::delete('/admin/jadwal/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');

// Lihat riwayat/detail jadwal
Route::get('/admin/jadwal/{id}', [JadwalController::class, 'show'])->name('admin.jadwal.show');

// ====================
// Penumpang Routes
// ====================
Route::prefix('penumpang')->name('penumpang.')->group(function () {
    // Halaman utama jadwal
    Route::get('/', [PenumpangController::class, 'index'])->name('index');

    // Pesan tiket
    Route::post('pesan/{jadwal}', [PenumpangController::class, 'pesanTiket'])->name('pesan');

    // Riwayat pemesanan
    Route::get('riwayat', [PenumpangController::class, 'riwayatIndex'])->name('riwayat.index');
    Route::get('riwayat-pemesanan', [PenumpangController::class, 'riwayat'])->name('riwayat-pemesanan');

    // Konfirmasi pembayaran & invoice
    Route::post('riwayat/{pemesanan}/konfirmasi-bayar', [PenumpangController::class, 'konfirmasiBayar'])
        ->name('pembayaran.konfirmasi');
    Route::get('riwayat/{pemesanan}/invoice', [PenumpangController::class, 'cetakInvoice'])
        ->name('pembayaran.invoice');

    // Menu tambahan
    Route::get('jadwal', [PenumpangController::class, 'jadwal'])->name('jadwal');
    Route::get('promo', [PenumpangController::class, 'promo'])->name('promo');

    // Profile
    Route::get('profil', [PenumpangController::class, 'profil'])->name('profil'); // halaman profil/edit
    Route::post('profil/update', [PenumpangController::class, 'updateProfil'])->name('profil.update');
    Route::post('profil/update-password', [PenumpangController::class, 'updatePassword'])->name('profil.updatePassword');
});


Route::get('/register', function () {
    return view('register'); // Sesuaikan dengan lokasi blade
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Logout
Route::post('/logout', function () {
    session()->flush(); // Hapus semua session
    return redirect()->route('landing'); // Kembali ke login
})->name('logout');

