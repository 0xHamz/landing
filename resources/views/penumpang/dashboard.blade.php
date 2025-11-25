@extends('penumpang.layouts.app')

@section('title', 'Jadwal Travel Penumpang')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold mb-6">Jadwal Travel</h2>

    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full bg-white">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Travel</th>
                    <th class="px-4 py-2 text-left">Asal</th>
                    <th class="px-4 py-2 text-left">Tujuan</th>
                    <th class="px-4 py-2 text-left">Jam Berangkat</th>
                    <th class="px-4 py-2 text-left">Kapasitas</th>
                    <th class="px-4 py-2 text-left">Kursi Tersedia</th>
                    <th class="px-4 py-2 text-left">Harga Tiket</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($jadwal as $j)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2">{{ $j->nama_travel }}</td>
                    <td class="px-4 py-2">{{ $j->asal }}</td>
                    <td class="px-4 py-2">{{ $j->tujuan }}</td>
                    <td class="px-4 py-2">{{ $j->jam_berangkat }}</td>
                    <td class="px-4 py-2">{{ $j->kapasitas }}</td>
                    <td class="px-4 py-2">{{ $j->kapasitas - $j->terisi }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($j->harga_tiket,0,',','.') }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('penumpang.pesan', $j->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition">
                            Pesan
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
