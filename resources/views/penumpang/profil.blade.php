@extends('penumpang.layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-lg">
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

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Profil Saya</h2>

        <!-- Form Nama & Email -->
        <form action="{{ route('penumpang.profil.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="border rounded px-3 py-2 w-full">

            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="border rounded px-3 py-2 w-full">

            </div>
            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                Simpan Profil
            </button>
        </form>

        <!-- Tombol Ubah Password -->
        <div class="mt-6">
            <button id="showPasswordForm" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Ubah Password
            </button>
        </div>

        <!-- Form Password (disembunyikan awalnya) -->
        <form id="passwordForm" action="{{ route('penumpang.profil.updatePassword') }}" method="POST" class="mt-4 hidden">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Password Lama</label>
                <input type="password" name="current_password" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Password Baru</label>
                <input type="password" name="new_password" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="w-full px-3 py-2 border rounded">
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan Password
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('showPasswordForm').addEventListener('click', function() {
        const form = document.getElementById('passwordForm');
        form.classList.toggle('hidden');
    });
</script>
@endsection
