@extends('penumpang.layouts.app')

@section('title', 'Jadwal Travel Penumpang')

@section('content')
    <div class="container mx-auto px-6 py-10">
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="min-w-full bg-white text-center border border-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3">Nama Travel</th>
                        <th class="px-6 py-3">Rute</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Jam Berangkat</th>
                        <th class="px-6 py-3">Kapasitas</th>
                        <th class="px-6 py-3">Terisi</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($riwayats as $riwayat)
                        <tr>
                            <td class="border px-6 py-3">{{ $riwayat->jadwal->nama_travel }}</td>
                            <td class="border px-6 py-3">{{ $riwayat->jadwal->asal }} → {{ $riwayat->jadwal->tujuan }}</td>
                            <td class="border px-6 py-3">
                                {{ \Carbon\Carbon::parse($riwayat->jadwal->tanggal_berangkat)->format('d M Y') }}</td>
                            <td class="border px-6 py-3">
                                {{ \Carbon\Carbon::parse($riwayat->jadwal->jam_berangkat)->format('H:i') }}</td>
                            <td class="border px-6 py-3">{{ $riwayat->jadwal->kapasitas }}</td>
                            <td class="border px-6 py-3">{{ $riwayat->jadwal->pemesanans->count() }}</td>
                            <td class="border px-6 py-3">
                                @if ($riwayat->status_bayar)
                                    <span
                                        class="inline-block px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded-full">Sudah
                                        Bayar</span>
                                @else
                                    <span
                                        class="inline-block px-3 py-1 text-sm font-semibold text-yellow-700 bg-yellow-100 rounded-full">Belum
                                        Bayar</span>
                                @endif
                            </td>
                            <td class="border px-6 py-3 space-x-2">
                                @if (!$riwayat->status_bayar)
                                    <form action="{{ route('penumpang.pembayaran.konfirmasi', $riwayat->id) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-1 bg-green-500 text-white text-sm rounded hover:bg-green-600">Konfirmasi</button>
                                    </form>
                                @else
                                    <a href="{{ route('penumpang.pembayaran.invoice', $riwayat->id) }}"
                                        class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 no-underline">
                                        Cetak Invoice
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center px-6 py-3">Belum ada pemesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
