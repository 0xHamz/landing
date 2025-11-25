@extends('admin.layouts.app')

@section('title', 'Data Jadwal Travel')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.jadwal.create') }}"
           class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
           Tambah Jadwal
        </a>
    </div>

    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="text-center min-w-full bg-white">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-4 py-2 ">Nama Travel</th>
                    <th class="px-4 py-2 ">Rute</th> <!-- Gabungan Asal-Tujuan -->
                    <th class="px-4 py-2 ">Tanggal</th>
                    <th class="px-4 py-2 ">Jam</th>
                    <th class="px-4 py-2 ">Kapasitas</th>
                    <th class="px-4 py-2 ">Harga</th>
                    <th class="px-4 py-2 ">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($jadwals as $jadwal)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2">{{ $jadwal->nama_travel }}</td>
                    <td class="px-4 py-2">{{ $jadwal->asal }} → {{ $jadwal->tujuan }}</td> <!-- Gabungan -->
                    <td class="px-4 py-2">{{ $jadwal->tanggal_berangkat }}</td>
                    <td class="px-4 py-2">{{ $jadwal->jam_berangkat }}</td>
                    <td class="px-4 py-2">{{ $jadwal->kapasitas }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($jadwal->harga_tiket, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" 
                        class="bg-yellow-400 text-white px-3 py-1 rounded-lg hover:bg-yellow-500 transition">Edit</a>

                        <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">Hapus</button>
                        </form>

                        <a href="{{ route('admin.jadwal.show', $jadwal->id) }}" 
                        class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition">Riwayat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
