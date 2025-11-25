@extends('layouts.app')

@section('title', 'Travel App')

@section('content')

<!-- HERO SECTION -->
<section class="grid grid-cols-1 md:grid-cols-2 h-[650px]">
    <div class="flex flex-col justify-center px-10 py-10">
        <div class="max-w-md w-full mx-20">
            <h2 class="text-5xl font-light md:text-5xl text-center">Mulai Petualangan,</h2>
            <h3 class="text-4xl md:text-5xl font-bold text-purple-700 mt-2 text-center whitespace-nowrap">Pesan tiket sekarang.</h3>

            <!-- SEARCH BOX -->
            <div class="mt-10 space-y-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="input-group flex items-center border-b border-gray-400 py-1">
                        <span class="me-2 text-gray-500"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" class="w-full bg-transparent focus:outline-none" placeholder="Kota Asal" />
                    </div>

                    <div class="input-group flex items-center border-b border-gray-400 py-1">
                        <span class="me-2 text-gray-500"><i class="bi bi-geo"></i></span>
                        <input type="text" class="w-full bg-transparent focus:outline-none" placeholder="Kota Tujuan" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm text-gray-600">Pilih Tanggal</label>
                        <input type="date" class="w-full border-b border-gray-400 py-1 mt-1 focus:outline-none bg-transparent" />
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Pilih Penumpang</label>
                        <select class="w-full border-b border-gray-400 py-1 mt-1 focus:outline-none bg-transparent">
                            <option>1 Adult</option>
                            <option>2 Adults</option>
                            <option>3 Adults</option>
                        </select>
                    </div>
                </div>

                <button class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold mt-4 hover:bg-orange-600">
                    Cari Tiket
                </button>
            </div>
        </div>
    </div>

    <!-- IMAGE SIDE -->
    <div>
        <img src="/images/travel.jpg" class="w-full h-full object-cover" />
    </div>
</section>

<!-- FEATURES SECTION -->
<section class="grid grid-cols-1 md:grid-cols-2 h-[600px]">
    <div><img src="/images/travel.jpg" class="w-full h-full object-cover" /></div>

    <div class="bg-gradient-to-br from-purple-700 to-indigo-700 text-white flex flex-col justify-center px-14 space-y-10">
        <div class="flex items-center space-x-6 mx-10">
            <i class="bi bi-airplane text-4xl"></i>
            <p class="text-xl font-semibold">Kunjungi Tempat-Tempat Terbaik</p>
        </div>
        <div class="flex items-center space-x-6 mx-10">
            <i class="bi bi-clock text-4xl"></i>
            <p class="text-xl font-semibold">Buat Rencana Perjalananmu Sendiri</p>
        </div>
        <div class="flex items-center space-x-6 mx-10">
            <i class="bi bi-tag text-4xl"></i>
            <p class="text-xl font-semibold">Hemat Hingga 50% Untuk Perjalananmu Berikutnya</p>
        </div>
    </div>
</section>

<!-- FLASH DEALS SECTION -->
<section class="py-20 px-10">
    <h2 class="text-4xl font-bold text-center mb-14">Promo Terbatas!!!</h2>
    <div class="relative px-6">
        <!-- BUTTONS -->
        <button id="btn-prev" class="absolute left-0 top-1/2 -translate-y-1/2 p-3 rounded-full z-10 bg-transparent hover:bg-white/30 transition">
            <i class="bi bi-chevron-left text-3xl text-white drop-shadow"></i>
        </button>
        <button id="btn-next" class="absolute right-0 top-1/2 -translate-y-1/2 p-3 rounded-full z-10 bg-transparent hover:bg-white/30 transition">
            <i class="bi bi-chevron-right text-3xl text-white drop-shadow"></i>
        </button>

        <!-- SLIDER -->
        <div id="slider" class="flex space-x-6 overflow-hidden scroll-smooth pb-6">
            @for ($i = 1; $i <= 5; $i++)
            <div class="min-w-full sm:min-w-[50%] lg:min-w-[33.333%] shadow-lg rounded-xl overflow-hidden bg-white">
                <img src="/images/travel.jpg" class="w-full h-60 object-cover" />
                <div class="p-5">
                    <h3 class="font-semibold text-lg mb-2">Pantai {{ ['Wedi Ombo','Parangtritis','Baron','Drini','Kukup'][$i-1] }}</h3>
                    <div class="flex items-center space-x-4 text-gray-500 text-sm mb-3">
                        <span><i class="bi bi-geo-alt"></i> {{ ['Gunung Kidul','Jogja','Jogja','Gunung Kidul','Gunung Kidul'][$i-1] }}</span>
                        <span><i class="bi bi-calendar"></i> {{ [4,4,4,3,3][$i-1] }} days</span>
                    </div>
                    <div class="text-gray-500 line-through text-sm">${{ [200,200,200,180,170][$i-1] }}</div>
                    <div class="text-3xl font-bold text-indigo-700">${{ [175,175,175,150,140][$i-1] }}<span class="text-gray-500 text-base"> /Per person</span></div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

@endsection

