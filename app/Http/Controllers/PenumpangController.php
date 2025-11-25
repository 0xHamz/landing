<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Pemesanan;
use App\Models\Promo;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PenumpangController extends Controller
{
    // Menampilkan daftar jadwal travel
    public function index(Request $request)
    {
        $promos = Promo::orderBy('created_at', 'desc')->get();
        // dropdown ambil dari database (distinct)
        $asalList = Jadwal::select('asal')->distinct()->pluck('asal');
        $tujuanList = Jadwal::select('tujuan')->distinct()->pluck('tujuan');
        $tanggalList = Jadwal::select('tanggal_berangkat')->distinct()->pluck('tanggal_berangkat');

        // query data
        $jadwal = Jadwal::query();

        if ($request->asal) {
            $jadwal->where('asal', $request->asal);
        }

        if ($request->tujuan) {
            $jadwal->where('tujuan', $request->tujuan);
        }

        return view('penumpang.jadwal', [
            'jadwal'     => $jadwal->get(),
            'asalList'   => $asalList,
            'tujuanList' => $tujuanList,
            'tanggalList' => $tanggalList,
            'promos' => $promos,
        ]);
    }

    public function jadwal(Request $request)
    {
        // Ambil semua filter dari DB
        $asalList = \App\Models\Jadwal::select('asal')->distinct()->pluck('asal');
        $tujuanList = \App\Models\Jadwal::select('tujuan')->distinct()->pluck('tujuan');
        $tanggalList = \App\Models\Jadwal::select('tanggal_berangkat')->distinct()->pluck('tanggal_berangkat');

        // Query utama
        $jadwal = \App\Models\Jadwal::with('pemesanans'); // ambil relasi

        if ($request->asal) {
            $jadwal->where('asal', $request->asal);
        }

        if ($request->tujuan) {
            $jadwal->where('tujuan', $request->tujuan);
        }

        if ($request->tanggal) {
            $jadwal->where('tanggal_berangkat', $request->tanggal);
        }

        // JALANKAN QUERY
        $jadwal = $jadwal->get();

        // KIRIM SEMUA KE VIEW
        return view('penumpang.jadwal', compact(
            'jadwal',
            'asalList',
            'tujuanList',
            'tanggalList'
        ));
    }




    // Aksi pesan tiket
    public function pesanTiket(Request $request, Jadwal $jadwal)
    {
        $user = \App\Models\User::find(session('user_id'));

        if (!$user) {
            return redirect()->route('sign')->with('error', 'Silakan login dulu.');
        }

        // Ambil jumlah tiket dari form
        $jumlah = $request->input('jumlah', 1); // default 1

        // Cek sisa kursi
        $tersedia = $jadwal->kapasitas - $jadwal->pemesanans()->count();
        if ($jumlah > $tersedia) {
            return back()->with('error', "Hanya tersedia $tersedia kursi.");
        }

        // Simpan pemesanan sesuai jumlah tiket
        for ($i = 0; $i < $jumlah; $i++) {
            $jadwal->pemesanans()->create([
                'user_id' => $user->id,   // <--- hanya ID
                'status_bayar' => 0       // otomatis belum bayar
            ]);
        }

        return redirect()->route('penumpang.riwayat.index')
            ->with('success', "Berhasil memesan $jumlah tiket!");
    }



    // Riwayat pemesanan penumpang
    public function riwayatIndex()
    {
        $riwayats = Pemesanan::with('jadwal')
            ->where('user_id', session('user_id'))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('penumpang.riwayat.index', compact('riwayats'));
    }
    public function konfirmasiBayar($id)
    {
        $pemesanan = \App\Models\Pemesanan::where('user_id', session('user_id'))
            ->findOrFail($id);

        // Update status_bayar menjadi 1 (Sudah Bayar)
        $pemesanan->status_bayar = 1;
        $pemesanan->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }

    public function cetakInvoice($pemesananId)
    {
        $pemesanan = Pemesanan::with('jadwal')
            ->where('user_id', session('user_id')) // ambil user dari session
            ->findOrFail($pemesananId);
        return view('penumpang.invoice.show', compact('pemesanan'));
    }
    public function promo()
    {
        // Contoh data promo, bisa diganti ambil dari database
        $promos = [
            [
                'judul' => 'Diskon 20% Tiket Solo-Jakarta',
                'deskripsi' => 'Promo berlaku untuk pembelian sebelum 31 Desember 2025',
                'gambar' => 'https://via.placeholder.com/300x150?text=Promo+1'
            ],
            [
                'judul' => 'Gratis Minuman untuk Semua Penumpang',
                'deskripsi' => 'Setiap pembelian tiket mendapatkan 1 minuman gratis',
                'gambar' => 'https://via.placeholder.com/300x150?text=Promo+2'
            ]
        ];

        return view('penumpang.promo', compact('promos'));
    }

    public function profil()
    {
        $user = \App\Models\User::find(session('user_id'));

        return view('penumpang.profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = \App\Models\User::find(session('user_id'));

        // Validasi nama & email
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update nama dan email
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update password jika diisi
        if ($request->current_password && $request->new_password) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Password lama tidak sesuai.');
            }

            $user->password = Hash::make($request->new_password);
            $user->save();
        }

        return redirect()->route('penumpang.profil')->with('success', 'Profil berhasil diperbarui!');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = \App\Models\User::find(session('user_id'));

        // Cek password lama
        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        // Update password
        $user->password = \Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
