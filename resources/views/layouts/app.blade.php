<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Voyage Travel')</title>
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
            <a href="{{ route('sign') }}"
                class="px-5 py-2 border border-purple-600 rounded-lg text-purple-600 hover:bg-purple-600 hover:text-white transition">
                Sign in
            </a>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="pt-24">
        @yield('content')
    </main>

    <!-- FOOTER -->
    @yield('footer')

    @stack('scripts')
</body>

</html>
