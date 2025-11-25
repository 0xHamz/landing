@extends('penumpang.layouts.app')

@section('title', 'Promo Travel')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h2 class="text-2xl font-bold mb-6">Promo Terbaru</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($promos as $promo)
        <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
            <img src="/images/travel.jpg" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">{{ $promo['judul'] }}</h3>
                <p class="text-gray-700">{{ $promo['deskripsi'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
