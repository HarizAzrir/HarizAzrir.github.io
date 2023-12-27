<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs & Societies') }}
        </h2>
    </x-slot>
    @vite('resources/css/app.css')
    <!-- Add this to the <head> section -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
                <!-- Swiper Container -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($clubs as $club)
                            <div class="swiper-slide">
                                <div class="flex flex-col items-center p-20">
                                    <img class="inline mb-2" src="images/Upg.jpg" alt="{{ $club->clubname }}" style="max-width: 100%; height: auto;">
                                    <span>{{ $club->clubname }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
    
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
    
                    <!-- Add Pagination if needed -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            loop: true, // Enable if you want the slides to loop
        });
    </script>
    
    
</x-app-layout>
