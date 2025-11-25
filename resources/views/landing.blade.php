<!-- resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel APP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-800">
    <!-- NAVBAR -->
    <nav class="flex items-center justify-between px-10 py-4 shadow-sm fixed top-0 left-0 w-full z-50 bg-white/70 backdrop-blur-md">

        <div class="flex items-center space-x-2">
            <div class="w-3 h-3 bg-purple-600 rounded-full"></div>
            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
            <h1 class="text-2xl font-bold ml-2">Travel App</h1>
        </div>
        <ul class="hidden md:flex items-center space-x-8 font-medium">
            <li><a href="#" class="hover:text-purple-600">Home</a></li>
            <li><a href="#" class="hover:text-purple-600">Pemesanan</a></li>
            <li><a href="#" class="hover:text-purple-600">Promo</a></li>
        </ul>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-gray-600 hidden md:block">Hubungi Kami</a>
            <a href="/dashboard"
                class="px-5 py-2 border border-purple-600 rounded-lg text-purple-600 hover:bg-purple-600 hover:text-white transition">Sign
                in</a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="grid grid-cols-1 md:grid-cols-2 h-[650px] ">
        <div class="flex flex-col justify-center px-10 py-10">
            <div class="max-w-md w-full mx-20">

                <h2 class="text-5xl font-light md:text-5xl text-center">Mulai Petualangan,</h2>
                <h3 class="text-4xl md:text-5xl font-bold text-purple-700 mt-2 text-center whitespace-nowrap">Pesan tiket sekarang.</h3>

                <!-- SEARCH BOX -->
                <div class="mt-10 space-y-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="input-group flex items-center border-b border-gray-400 py-1">
                            <span class="me-2 text-gray-500"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" class="w-full bg-transparent focus:outline-none"
                                placeholder="Kota Asal" />
                        </div>

                        <div class="input-group flex items-center border-b border-gray-400 py-1">
                            <span class="me-2 text-gray-500"><i class="bi bi-geo"></i></span>
                            <input type="text" class="w-full bg-transparent focus:outline-none"
                                placeholder="Kota Tujuan" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm text-gray-600">Pilih Tanggal</label>
                            <input type="date"
                                class="w-full border-b border-gray-400 py-1 mt-1 focus:outline-none bg-transparent" />
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

                    <button
                        class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold mt-4 hover:bg-orange-600">
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
        <!-- LEFT IMAGE -->
        <div>
            <img src="/images/travel.jpg" class="w-full h-full object-cover" />
        </div>


        <!-- RIGHT CONTENT -->
        <div
            class="bg-gradient-to-br from-purple-700 to-indigo-700 text-white flex flex-col justify-center px-14 space-y-10">
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
        <h2 class="text-4xl font-bold text-center mb-14">Flash Deals</h2>

        <div class="relative px-6">
            <!-- BUTTON LEFT -->
            <button id="btn-prev" 
                class="absolute left-0 top-1/2 -translate-y-1/2 p-3 rounded-full z-10 
                    bg-transparent hover:bg-white/30 transition">
                <i class="bi bi-chevron-left text-3xl text-white drop-shadow"></i>
            </button>

            <!-- BUTTON RIGHT -->
            <button id="btn-next" 
                class="absolute right-0 top-1/2 -translate-y-1/2 p-3 rounded-full z-10
                    bg-transparent hover:bg-white/30 transition">
                <i class="bi bi-chevron-right text-3xl text-white drop-shadow"></i>
            </button>


            <!-- SLIDER WRAPPER -->
            <div id="slider"
                class="flex space-x-6 overflow-hidden scroll-smooth pb-6">

                <!-- CARD 1 -->
                <div class="min-w-full sm:min-w-[50%] lg:min-w-[33.333%] shadow-lg rounded-xl overflow-hidden bg-white">

                    <img src="/images/travel.jpg" class="w-full h-60 object-cover" />
                    <div class="p-5">
                        <h3 class="font-semibold text-lg mb-2">Pantai Wedi Ombo</h3>
                        <div class="flex items-center space-x-4 text-gray-500 text-sm mb-3">
                            <span><i class="bi bi-geo-alt"></i> Gunung Kidul</span>
                            <span><i class="bi bi-calendar"></i> 4 days</span>
                        </div>
                        <div class="text-gray-500 line-through text-sm">$200</div>
                        <div class="text-3xl font-bold text-indigo-700">$175<span class="text-gray-500 text-base"> /Per person</span></div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="min-w-full sm:min-w-[50%] lg:min-w-[33.333%] shadow-lg rounded-xl overflow-hidden bg-white">

                    <img src="/images/travel.jpg" class="w-full h-60 object-cover" />
                    <div class="p-5">
                        <h3 class="font-semibold text-lg mb-2">Pantai Parangtritis</h3>
                        <div class="flex items-center space-x-4 text-gray-500 text-sm mb-3">
                            <span><i class="bi bi-geo-alt"></i> Jogja</span>
                            <span><i class="bi bi-calendar"></i> 4 days</span>
                        </div>
                        <div class="text-gray-500 line-through text-sm">$200</div>
                        <div class="text-3xl font-bold text-indigo-700">$175<span class="text-gray-500 text-base"> /Per person</span></div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="min-w-full sm:min-w-[50%] lg:min-w-[33.333%] shadow-lg rounded-xl overflow-hidden bg-white">

                    <img src="/images/travel.jpg" class="w-full h-60 object-cover" />
                    <div class="p-5">
                        <h3 class="font-semibold text-lg mb-2">Pantai Baron</h3>
                        <div class="flex items-center space-x-4 text-gray-500 text-sm mb-3">
                            <span><i class="bi bi-geo-alt"></i> Jogja</span>
                            <span><i class="bi bi-calendar"></i> 4 days</span>
                        </div>
                        <div class="text-gray-500 line-through text-sm">$200</div>
                        <div class="text-3xl font-bold text-indigo-700">$175<span class="text-gray-500 text-base"> /Per person</span></div>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="min-w-full sm:min-w-[50%] lg:min-w-[33.333%] shadow-lg rounded-xl overflow-hidden bg-white">

                    <img src="/images/travel.jpg" class="w-full h-60 object-cover" />
                    <div class="p-5">
                        <h3 class="font-semibold text-lg mb-2">Pantai Drini</h3>
                        <div class="flex items-center space-x-4 text-gray-500 text-sm mb-3">
                            <span><i class="bi bi-geo-alt"></i> Gunung Kidul</span>
                            <span><i class="bi bi-calendar"></i> 3 days</span>
                        </div>
                        <div class="text-gray-500 line-through text-sm">$180</div>
                        <div class="text-3xl font-bold text-indigo-700">$150<span class="text-gray-500 text-base"> /Per person</span></div>
                    </div>
                </div>

                <!-- CARD 5 -->
                <div class="min-w-full sm:min-w-[50%] lg:min-w-[33.333%] shadow-lg rounded-xl overflow-hidden bg-white">

                    <img src="/images/travel.jpg" class="w-full h-60 object-cover" />
                    <div class="p-5">
                        <h3 class="font-semibold text-lg mb-2">Pantai Kukup</h3>
                        <div class="flex items-center space-x-4 text-gray-500 text-sm mb-3">
                            <span><i class="bi bi-geo-alt"></i> Gunung Kidul</span>
                            <span><i class="bi bi-calendar"></i> 3 days</span>
                        </div>
                        <div class="text-gray-500 line-through text-sm">$170</div>
                        <div class="text-3xl font-bold text-indigo-700">$140<span class="text-gray-500 text-base"> /Per person</span></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--  FOOTER SECTION -->
    <section class="py-0 overflow-hidden bg-white">

        <div class="grid grid-cols-1 md:grid-cols-2">

            <!-- LEFT SIDE (auto center) -->
            <div class="w-full px-6 lg:px-10 py-10 flex justify-center">
                <div class="w-full max-w-md">
                    <div class="flex items-center space-x-2">
                        <img src="/images/travel.jpg" width="50" class="inline-block" />
                        <span class="font-bold text-2xl text-indigo-600">voyage</span>
                    </div>

                    <ul class="mt-6 space-y-3">
                        <li><a href="#" class="text-gray-700 font-semibold hover:text-indigo-600">News</a></li>
                        <li><a href="#" class="text-gray-700 font-semibold hover:text-indigo-600">Terms & Conditions</a></li>
                        <li><a href="#" class="text-gray-700 font-semibold hover:text-indigo-600">Privacy</a></li>
                        <li><a href="#" class="text-gray-700 font-semibold hover:text-indigo-600">About Us</a></li>
                        <li><a href="#" class="text-gray-700 font-semibold hover:text-indigo-600">FAQs</a></li>
                    </ul>
                </div>
            </div>

            <!-- RIGHT SIDE (FULL SCREEN WIDTH) -->
            <div class="bg-gradient-to-br from-indigo-600 to-purple-600 text-white p-10 w-full h-full">
                
                <p class="flex items-center mb-4">
                    <i class="bi bi-telephone-fill text-xl mr-3"></i>
                    <span>+6289524894875</span>
                </p>

                <p class="flex items-center mb-4">
                    <i class="bi bi-envelope-fill text-xl mr-3"></i>
                    <span>something@gmail.com</span>
                </p>

                <p class="flex items-start mb-6 leading-relaxed">
                    <i class="bi bi-geo-alt-fill text-xl mr-3"></i>
                    <span>
                        Surakarta, Jawa Tengah<br>
                        Indonesia
                    </span>
                </p>

                <div class="flex space-x-4 mb-6 text-white text-2xl">
                    <a href="#" class="hover:text-indigo-300">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="hover:text-indigo-300">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="hover:text-indigo-300">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>


                <p class="text-center md:text-left">
                    Made with 
                    <i class="bi bi-suit-heart-fill text-red-400"></i>
                    by 
                    <a href="https://instagram.com/akbarpratamaaaaa" class="text-white underline" target="_blank">Hamzah Akbar Pratama</a>
                </p>
            </div>

        </div>
    </section>


<script>
    const slider = document.getElementById("slider");
    const btnPrev = document.getElementById("btn-prev");
    const btnNext = document.getElementById("btn-next");

    function getCardWidth() {
        const card = slider.children[0];
        const gap = 24; // space-x-6 = 24px
        return card.getBoundingClientRect().width + gap;
    }

    // Geser manual tombol
    btnNext.onclick = () => slider.scrollLeft += getCardWidth();
    btnPrev.onclick = () => slider.scrollLeft -= getCardWidth();

    // AUTO SLIDE
    function autoSlide() {
        const cardWidth = getCardWidth();
        const maxScroll = slider.scrollWidth - slider.clientWidth;

        if (slider.scrollLeft + cardWidth >= maxScroll) {
            // Jika sudah mencapai akhir → kembali ke awal
            slider.scrollTo({ left: 0, behavior: "smooth" });
        } else {
            slider.scrollLeft += cardWidth;
        }
    }

    // Jalan otomatis tiap 3 detik
    let autoPlay = setInterval(autoSlide, 3000);

    // Pause auto-slide jika user scroll manual
    slider.addEventListener("mousedown", () => clearInterval(autoPlay));
    slider.addEventListener("touchstart", () => clearInterval(autoPlay));

    // Lanjutkan auto-slide setelah 5 detik tidak diapa-apakan
    slider.addEventListener("mouseup", () => {
        autoPlay = setInterval(autoSlide, 3000);
    });
    slider.addEventListener("touchend", () => {
        autoPlay = setInterval(autoSlide, 3000);
    });
</script>

        
</body>

</html>
