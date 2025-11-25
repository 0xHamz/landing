<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - TravelApp</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100 flex flex-col justify-center items-center min-h-screen">

    <!-- APP LOGO / TITLE -->
    <div class="flex items-center space-x-2 mb-8">
        <div class="w-3 h-3 bg-purple-600 rounded-full"></div>
        <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
        <h1 class="text-3xl font-bold">Travel App</h1>
    </div>

    <!-- SIGN UP BOX -->
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Daftar Akun</h2>

        <!-- Tampilkan error jika ada -->
        @if(session('error'))
            <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg py-2 px-3" required>
            </div>
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg py-2 px-3" required>
            </div>
            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg py-2 px-3" required>
            </div>
            <div>
                <label class="block text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded-lg py-2 px-3" required>
            </div>
            <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded-lg font-semibold hover:bg-purple-700">
                Daftar
            </button>
        </form>

        <p class="mt-4 text-center text-gray-500 text-sm">
            Sudah punya akun? <a href="{{ route('sign') }}" class="text-purple-600 hover:underline">Sign In</a>
        </p>
    </div>

</body>
</html>
