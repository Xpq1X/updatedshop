@extends('layouts.app')

@section('content')

<!-- Hero Section with White Background -->
<div class="bg-white text-gray-800 py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4 font-sans">Giga Science Corp</h1>
        <p class="text-lg mb-6 font-light">Innovative Lab Accessories for Modern Laboratories</p>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="py-16 bg-gray-50 text-center">
    <h2 class="font-gambetta text-4xl font-semibold text-gray-800">Proč nakupovat u nás?</h2>
    <p class="mt-4 text-lg text-gray-600">Nabízíme nejlepší produkty za nejlepší ceny!</p>
    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
        <!-- Rychlá Doprava -->
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300 relative">
            <div class="flex flex-col items-center justify-center space-y-4">
                <h3 class="text-xl font-semibold text-gray-800">Rychlá Doprava</h3>
                <x-heroicon-o-truck height="80px" class="truck-icon my-4"/>
                <p class="text-gray-600">Zaručujeme rychlé dodání vašich objednávek.</p>
            </div>
        </div>
        <!-- Kvalitní Produkty -->
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300">
            <div class="flex flex-col items-center justify-center space-y-4">
                <h3 class="text-xl font-semibold text-gray-800">Kvalitní Produkty</h3>
                <x-iconsax-bro-sidebar-right height="80px" class="my-4"/>
                <p class="text-gray-600">Naše produkty procházejí důkladným výběrem kvality.</p>
            </div>
        </div>
        <!-- Zákaznická Podpora -->
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300">
            <div class="flex flex-col items-center justify-center space-y-4">
                <h3 class="text-xl font-semibold text-gray-800">Zákaznická Podpora</h3>
                <x-gmdi-support-agent-o height="80px" class="my-4"/>
                <p class="text-gray-600">Jsme tu pro vás, abychom zodpověděli všechny vaše dotazy.</p>
            </div>
        </div>
    </div>
</div>

<!-- Products Horizontal Scroll Section -->
@include('components.product-slider');

@include('components.reviews')

<!-- Contact Form Section -->
{{-- @include('components.contact-form') --}}

@endsection

@push('scripts')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@latest/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
        },
        loop: true, // Enable loop effect
    });
</script>
@endpush