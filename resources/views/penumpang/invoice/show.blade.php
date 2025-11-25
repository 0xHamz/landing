@extends('penumpang.layouts.app')

@section('title', 'Invoice Pemesanan Tiket Travel')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="bg-white shadow rounded-lg p-6">

        <!-- Header Invoice -->
        <div class="mb-6 border-b pb-2">
            <h2 class="text-xl font-bold text-gray-800">Invoice Pemesanan Tiket Travel</h2>
        </div>

        <!-- Info Penumpang & Tanggal -->
        <div class="flex flex-col md:flex-row justify-between mb-6">
            <div class="mb-4 md:mb-0">
                <h3 class="font-semibold text-gray-700">Penumpang:</h3>
                <p class="text-gray-800">{{ $pemesanan->user->name }}</p>
                <p class="text-gray-800">No. HP: {{ $pemesanan->user->phone }}</p>
                <p class="text-gray-800">Email: {{ $pemesanan->user->email }}</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-700">Tanggal Pesan:</h3>
                <p class="text-gray-800">{{ $pemesanan->created_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>

        <!-- Tabel Invoice -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-center border border-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-2">Nama Travel</th>
                        <th class="px-4 py-2">Rute</th>
                        <th class="px-4 py-2">Tanggal Keberangkatan</th>
                        <th class="px-4 py-2">Jam Berangkat</th>
                        <th class="px-4 py-2">Harga Tiket</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-2">{{ $pemesanan->jadwal->nama_travel }}</td>
                        <td class="px-4 py-2">{{ $pemesanan->jadwal->asal }} → {{ $pemesanan->jadwal->tujuan }}</td>
                        <td class="px-4 py-2">{{ $pemesanan->jadwal->tanggal_berangkat }}</td>
                        <td class="px-4 py-2">{{ $pemesanan->jadwal->jam_berangkat }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($pemesanan->jadwal->harga_tiket, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="text-right mt-4">
            <h3 class="font-semibold text-gray-800 text-lg">
                Total: Rp {{ number_format($pemesanan->jadwal->harga_tiket, 0, ',', '.') }}
            </h3>
        </div>

        <!-- Tombol -->
        <div class="flex flex-wrap justify-between mt-6 gap-2">
            <button onclick="window.print()" 
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                Cetak Invoice
            </button>
            <a href="{{ route('penumpang.riwayat.index') }}" 
               class="px-4 py-2 border border-gray-400 rounded hover:bg-gray-100 transition">
               Kembali
            </a>
        </div>
    </div>
</div>
@endsection
