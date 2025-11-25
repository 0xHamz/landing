@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto px-6 py-10">
    <!-- Card Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-2">Jumlah Penumpang</h2>
            <p class="text-3xl font-bold text-indigo-700">125</p>
        </div>
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-2">Total Pemesanan</h2>
            <p class="text-3xl font-bold text-indigo-700">58</p>
        </div>
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-2">Pendapatan</h2>
            <p class="text-3xl font-bold text-indigo-700">$3,250</p>
        </div>
    </div>

    <!-- Tabel Pemesanan Terbaru -->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <h2 class="text-2xl font-semibold px-6 py-4 border-b">Pemesanan Terbaru</h2>
        <table class="min-w-full text-left table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 font-medium text-gray-600">Nama Penumpang</th>
                    <th class="px-6 py-3 font-medium text-gray-600">Rute</th>
                    <th class="px-6 py-3 font-medium text-gray-600">Tanggal</th>
                    <th class="px-6 py-3 font-medium text-gray-600">Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3">Budi Santoso</td>
                    <td class="px-6 py-3">Jakarta - Surabaya</td>
                    <td class="px-6 py-3">2025-12-25</td>
                    <td class="px-6 py-3">$50</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3">Siti Aminah</td>
                    <td class="px-6 py-3">Jakarta - Jogja</td>
                    <td class="px-6 py-3">2025-12-26</td>
                    <td class="px-6 py-3">$45</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3">Andi Wijaya</td>
                    <td class="px-6 py-3">Jakarta - Bandung</td>
                    <td class="px-6 py-3">2025-12-27</td>
                    <td class="px-6 py-3">$30</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
