{{--@extends('component.main')--}}
{{--@section('content')--}}
{{--    --}}{{-- Banner --}}
{{--    <div class="w-full h-[300px] md:h-[400px] relative">--}}
{{--        <img src="{{ asset('asset/img/banner.jpg') }}" alt="Property Banner" class="w-full h-full object-cover">--}}
{{--        <div class="absolute inset-0 top-0 left-0 right-0 bg-black/50 items-center text-center pt-32">--}}
{{--            <h1 class="text-black text-3xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">--}}
{{--                Find Your Dream Property--}}
{{--            </h1>--}}
{{--            <div class="flex justify-center space-x-2 py-2">--}}
{{--                <p class="text-black hover:underline"> <a href="/">Home</p></a>--}}
{{--                <p class="text-white">/</p>--}}
{{--                <p class="text-white hover:underline"><a href="{{ route('villa') }}">Villa</p></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <section class="max-w-full lg:mx-24 p-4 md:py-12 bg-sky-50">--}}

{{--        <!-- Show All Validation Errors -->--}}
{{--        @if ($errors->any())--}}
{{--            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md">--}}
{{--                <ul class="list-disc list-inside text-sm">--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <section class="max-w-9xl md:mx-24 p-4 md:py-12 bg-gray-50">--}}

{{--            <!-- Title -->--}}
{{--            <div class="mb-12 text-center">--}}
{{--                <h1--}}
{{--                    class="text-3xl md:text-5xl font-extrabold bg-gradient-to-r from-red-500 to-gray-900 text-transparent bg-clip-text">--}}
{{--                    Property Exploration - Villa--}}
{{--                </h1>--}}
{{--            </div>--}}

{{--            <!-- Grid Layout -->--}}
{{--            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">--}}
{{--                <!-- Villa Cards -->--}}
{{--                <!-- Repeat this block for each image -->--}}
{{--                <!-- You can put this inside a if using Laravel Blade -->--}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">--}}
{{--                    <img src="https://cdn.pixabay.com/photo/2020/06/25/10/21/architecture-5339245_1280.jpg"--}}
{{--                        alt="Luxury Villa"--}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />--}}
{{--                    <!-- Initial label -->--}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">--}}
{{--                        Villa--}}
{{--                    </div>--}}
{{--                    <!-- Hover overlay -->--}}
{{--                    <div--}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">--}}
{{--                        <div class="text-center px-4">--}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>--}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{-- !-- Duplicate for other villas --> --}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">--}}
{{--                    <img src="https://cdn.pixabay.com/photo/2020/09/01/15/03/building-5535464_1280.jpg" alt="Luxury Villa"--}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />--}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">--}}
{{--                        Villa--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">--}}
{{--                        <div class="text-center px-4">--}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>--}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="relative group w-full h-[400px] overflow-hidden shadow-xl transition duration-300 ease-in-out">--}}
{{--                    <img src="https://cdn.pixabay.com/photo/2016/11/18/17/20/living-room-1835923_1280.jpg"--}}
{{--                        alt="Luxury Villa"--}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />--}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">--}}
{{--                        Villa--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">--}}
{{--                        <div class="text-center px-4">--}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>--}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">--}}
{{--                    <img src="https://cdn.pixabay.com/photo/2018/01/26/08/15/dining-room-3108037_1280.jpg"--}}
{{--                        alt="Luxury Villa"--}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />--}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">--}}
{{--                        Villa--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">--}}
{{--                        <div class="text-center px-4">--}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>--}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">--}}
{{--                    <img src="https://cdn.pixabay.com/photo/2017/03/27/15/17/apartment-2179337_1280.jpg" alt="Luxury Villa"--}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />--}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">--}}
{{--                        Villa--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">--}}
{{--                        <div class="text-center px-4">--}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>--}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">--}}
{{--                    <img src="https://cdn.pixabay.com/photo/2021/09/13/06/27/apartment-6620410_1280.jpg" alt="Luxury Villa"--}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />--}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">--}}
{{--                        Villa--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">--}}
{{--                        <div class="text-center px-4">--}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>--}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

{{--        --}}{{-- let's connect form  --}}
{{--        @include('frontend.contact-form')--}}

{{--    </section>--}}
{{--    @endsection--}}



  <!-- ✅ Navbar -->
  <nav class="bg-gray-200/70 backdrop-blur-lg border-b border-black/10 w-full z-50 top-0 md:pt-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-20">

        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
          <img src="{{ asset('asset/img/logo2.png') }}" alt="Logo" class="h-10 w-auto" />
        </a>

        <!-- Desktop Menu -->
        <div class="hidden xl:flex items-center space-x-6">

          <!-- Buy / Rent -->
          <a href="{{ route('property') }}" class="text-black hover:text-blue-500 transition flex items-center">
            <i class="fas fa-shopping-cart mr-1"></i> Buy
          </a>
          <a href="{{ route('property') }}" class="text-black hover:text-blue-500 transition flex items-center">
            <i class="fas fa-key mr-1"></i> Rent
          </a>

          <!-- Filters -->
          <form class="flex items-center gap-3">

            <!-- Location -->
            <div class="relative">
              <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-black/70" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <select
                class="bg-white/40 border border-black/20 rounded-2xl text-sm text-black pl-12 pr-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 transition cursor-pointer">
                <option>Location</option>
                <option>Koh Samui</option>
                <option>Bophut</option>
                <option>Lamai</option>
                <option>Maenam</option>
              </select>
            </div>

            <!-- Property Type -->
            <div class="relative">
              <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-black/70" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10h3m10-11l2 2v9h-3m-6 0h6" />
              </svg>
              <select
                class="bg-white/40 border border-black/20 rounded-2xl text-sm text-black pl-12 pr-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 transition cursor-pointer">
                <option>Property Type</option>
                <option>Villa/House</option>
                <option>Beachfront</option>
                <option>Sea View</option>
                <option>Land</option>
              </select>
            </div>

            <!-- Price Range -->
            <div class="flex gap-2">
              <select
                class="bg-white/40 border border-black/20 rounded-2xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
                <option>Min</option>
                <option>฿1,000,000</option>
                <option>฿5,000,000</option>
                <option>฿10,000,000</option>
              </select>
              <select
                class="bg-white/40 border border-black/20 rounded-2xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
                <option>Max</option>
                <option>฿10,000,000</option>
                <option>฿20,000,000</option>
                <option>฿50,000,000</option>
              </select>
            </div>

            <!-- Bed & Bath -->
            <div class="relative">
              <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-black/70" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 22V12h6v10" />
              </svg>
              <select
                class="bg-white/40 border border-black/20 rounded-2xl text-sm text-black pl-12 pr-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
                <option>Bed & Bath</option>
                <option>1 Bed / 1 Bath</option>
                <option>2 Bed / 2 Bath</option>
                <option>3 Bed / 3 Bath</option>
              </select>
            </div>

            <!-- Reset Button -->
            <button type="reset"
              class="text-black bg-white/60 border border-black/10 px-6 py-3 rounded-2xl font-semibold hover:bg-blue-400 hover:text-white transition flex items-center gap-2">
              <i class="fas fa-redo-alt"></i> Reset
            </button>
          </form>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuToggle" class="xl:hidden text-black focus:outline-none text-2xl">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobileMenu"
      class="hidden xl:hidden bg-gray-100 border-t border-gray-300 backdrop-blur-lg shadow-md">
      <div class="p-4 space-y-4">
        <a href="{{ route('property') }}" class="flex items-center space-x-2 text-black hover:text-blue-500">
          <i class="fas fa-shopping-cart"></i><span>Buy</span>
        </a>
        <a href="{{ route('property') }}" class="flex items-center space-x-2 text-black hover:text-blue-500">
          <i class="fas fa-key"></i><span>Rent</span>
        </a>

        <form class="flex flex-col gap-3">
          <select
            class="bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400">
            <option>Location</option>
            <option>Koh Samui</option>
            <option>Bophut</option>
          </select>

          <select
            class="bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400">
            <option>Property Type</option>
            <option>Villa</option>
            <option>Beachfront</option>
          </select>

          <div class="flex gap-2">
            <select
              class="flex-1 bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400">
              <option>Min</option>
            </select>
            <select
              class="flex-1 bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400">
              <option>Max</option>
            </select>
          </div>

          <select
            class="bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400">
            <option>Bed & Bath</option>
          </select>

          <button type="reset"
            class="bg-blue-500 text-white py-3 rounded-xl font-semibold hover:bg-blue-600 transition">
            Reset
          </button>
        </form>
      </div>
    </div>
  </nav>

  <!-- ✅ Mobile Menu Toggle Script -->
  <script>
    const toggleBtn = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    toggleBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      toggleBtn.innerHTML = mobileMenu.classList.contains('hidden')
        ? '<i class="fas fa-bars"></i>'
        : '<i class="fas fa-times"></i>';
    });
  </script>

