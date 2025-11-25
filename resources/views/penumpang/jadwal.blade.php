@extends('penumpang.layouts.app')

@section('title', 'Jadwal Travel Penumpang')

@section('content')

<div class="container mx-auto px-6 py-10">

    {{-- ALERT --}}
    @if(session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif


    <div class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-40 w-full max-w-6xl">
            {{-- ===========================
                FILTER SAMPING KIRI
            ============================ --}}
            <div class="bg-white shadow-xl rounded-3xl p-5 w-full h-fit md:w-72">

                <form method="GET" action="" class="space-y-4">

                    {{-- Dari / Ke --}}
                    <div class="bg-gray-100 rounded-2xl p-4 shadow-inner">

                        {{-- Dari --}}
                        <label class="text-xs text-gray-600">Dari</label>
                        <select id="asal" name="asal"
                            class="appearance-none w-full bg-transparent border-b border-gray-300 focus:outline-none text-sm py-1"
                            onchange="this.form.submit()">
                            <option value="">Pilih asal</option>
                            @foreach($asalList as $a)
                                <option value="{{ $a }}" {{ request('asal') == $a ? 'selected' : '' }}>
                                    {{ $a }}
                                </option>
                            @endforeach
                        </select>


                        {{-- Ke --}}
                        <label class="text-xs text-gray-600 mt-3 block">Ke</label>
                        <div class="relative">
                            <select id="tujuan" name="tujuan"
                                class="appearance-none w-full bg-transparent border-b border-gray-300 focus:outline-none text-sm py-1"
                                onchange="this.form.submit()">
                                <option value="">Pilih tujuan</option>
                                @foreach($tujuanList as $t)
                                    <option value="{{ $t }}" {{ request('tujuan') == $t ? 'selected' : '' }}>
                                        {{ $t }}
                                    </option>
                                @endforeach
                            </select>


                            {{-- Tombol swap --}}
                            <button type="button" id="swapBtn"
                                class="absolute right-3 -top-10 bg-white border shadow rounded-lg p-1 text-gray-500 hover:bg-gray-100">
                                ⇅
                            </button>

                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div class="bg-gray-100 rounded-2xl px-4 py-3 flex items-center justify-between shadow-inner">

                        <div class="flex items-center space-x-2">
                            <i class="bi bi-calendar-date text-xl text-gray-600"></i>

                            <input type="date"
                            name="tanggal"
                            value="{{ request('tanggal') }}"
                            class="bg-transparent focus:outline-none text-sm border-b border-gray-300 py-1"
                            onchange="this.form.submit()">
                        </div>
                    </div>


                    {{-- Jumlah Penumpang --}}
                    <div class="bg-gray-100 rounded-2xl px-4 py-3 flex items-center space-x-3 shadow-inner">
                        <i class="bi bi-people text-xl text-gray-600"></i>
                        <input type="number" name="penumpang" value="{{ request('penumpang', 1) }}" min="1"
                            class="w-full bg-transparent focus:outline-none text-sm">
                    </div>


                    {{-- Tombol Submit --}}
                    <button
                        class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold text-sm hover:bg-blue-700">
                        Cari Travel
                    </button>

                </form>
            </div>




            {{-- ===========================
                CARD JADWAL (KANAN)
            ============================ --}}
            <div class="md:col-span-3 space-y-4 max-w-xl">

                @foreach ($jadwal as $j)
                @php
                    $tersedia = $j->kapasitas - $j->pemesanans->count();
                @endphp


                <div class="border rounded-lg p-4 bg-white shadow-sm hover:shadow-md transition">

                    <div class="flex justify-between items-center">

                        {{-- Info kiri --}}
                        <div>
                            <p class="text-base font-bold">{{ $j->nama_travel }}</p>
                            <p class="text-sm text-gray-500">{{ $j->asal }} → {{ $j->tujuan }}</p>

                            <div class="flex items-center space-x-4 mt-2">
                                <div>
                                    <p class="text-lg font-semibold">{{ $j->jam_berangkat }}</p>
                                    <p class="text-xs text-gray-500">Berangkat</p>
                                </div>

                                <div class="text-gray-300">|</div>

                                <div>
                                    <p class="text-lg font-semibold">
                                        {{ \Carbon\Carbon::parse($j->tanggal_berangkat)->format('d M Y') }}
                                    </p>
                                    <p class="text-xs text-gray-500">Tanggal</p>
                                </div>
                            </div>

                            <div class="mt-2">
                                @if($tersedia > 0)
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">
                                        {{ $tersedia }} kursi tersedia
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">
                                        Habis
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Harga & tombol --}}
                        <div class="text-right">
                            <p class="text-lg font-bold text-indigo-600">
                                Rp {{ number_format($j->harga_tiket,0,',','.') }}
                            </p>
                            <p class="text-xs text-gray-500 mb-2">/orang</p>

                            @if($tersedia > 0)
                            <form action="{{ route('penumpang.pesan', $j->id) }}" method="POST">
                                @csrf
                                <div class="flex items-center justify-end space-x-2">
                                    <input type="number" name="jumlah" value="1" min="1" max="{{ $tersedia }}"
                                        class="w-14 px-2 py-1 border rounded text-center">

                                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                        Pesan
                                    </button>
                                </div>
                            </form>
                            @else
                                <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded cursor-not-allowed">
                                    Habis
                                </button>
                            @endif
                        </div>

                    </div>

                </div>
                @endforeach

            </div>

        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
document.getElementById('swapBtn').addEventListener('click', function () {
    let asal = document.getElementById('asal');
    let tujuan = document.getElementById('tujuan');

    let temp = asal.value;
    asal.value = tujuan.value;
    tujuan.value = temp;

    // Auto submit
    asal.form.submit();
});
</script>
@endpush
