{{-- @extends('component.main') --}}
{{-- @section('content') --}}
{{--    --}}{{-- Banner --}}
{{--    <div class="w-full h-[300px] md:h-[400px] relative"> --}}
{{--        <img src="{{ asset('asset/img/banner.jpg') }}" alt="Property Banner" class="w-full h-full object-cover"> --}}
{{--        <div class="absolute inset-0 top-0 left-0 right-0 bg-black/50 items-center text-center pt-32"> --}}
{{--            <h1 class="text-black text-3xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg"> --}}
{{--                Find Your Dream Property --}}
{{--            </h1> --}}
{{--            <div class="flex justify-center space-x-2 py-2"> --}}
{{--                <p class="text-black hover:underline"> <a href="/">Home</p></a> --}}
{{--                <p class="text-white">/</p> --}}
{{--                <p class="text-white hover:underline"><a href="{{ route('villa') }}">Villa</p></a> --}}
{{--            </div> --}}
{{--        </div> --}}
{{--    </div> --}}


{{--    <section class="max-w-full lg:mx-24 p-4 md:py-12 bg-sky-50"> --}}

{{--        <!-- Show All Validation Errors --> --}}
{{--        @if ($errors->any()) --}}
{{--            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md"> --}}
{{--                <ul class="list-disc list-inside text-sm"> --}}
{{--                    @foreach ($errors->all() as $error) --}}
{{--                        <li>{{ $error }}</li> --}}
{{--                    @endforeach --}}
{{--                </ul> --}}
{{--            </div> --}}
{{--        @endif --}}

{{--        <section class="max-w-9xl md:mx-24 p-4 md:py-12 bg-gray-50"> --}}

{{--            <!-- Title --> --}}
{{--            <div class="mb-12 text-center"> --}}
{{--                <h1 --}}
{{--                    class="text-3xl md:text-5xl font-extrabold bg-gradient-to-r from-red-500 to-gray-900 text-transparent bg-clip-text"> --}}
{{--                    Property Exploration - Villa --}}
{{--                </h1> --}}
{{--            </div> --}}

{{--            <!-- Grid Layout --> --}}
{{--            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"> --}}
{{--                <!-- Villa Cards --> --}}
{{--                <!-- Repeat this block for each image --> --}}
{{--                <!-- You can put this inside a if using Laravel Blade --> --}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out"> --}}
{{--                    <img src="https://cdn.pixabay.com/photo/2020/06/25/10/21/architecture-5339245_1280.jpg" --}}
{{--                        alt="Luxury Villa" --}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" /> --}}
{{--                    <!-- Initial label --> --}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10"> --}}
{{--                        Villa --}}
{{--                    </div> --}}
{{--                    <!-- Hover overlay --> --}}
{{--                    <div --}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20"> --}}
{{--                        <div class="text-center px-4"> --}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2> --}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}
{{--                --}}{{-- !-- Duplicate for other villas --> --}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out"> --}}
{{--                    <img src="https://cdn.pixabay.com/photo/2020/09/01/15/03/building-5535464_1280.jpg" alt="Luxury Villa" --}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" /> --}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10"> --}}
{{--                        Villa --}}
{{--                    </div> --}}
{{--                    <div --}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20"> --}}
{{--                        <div class="text-center px-4"> --}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2> --}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}
{{--                <div class="relative group w-full h-[400px] overflow-hidden shadow-xl transition duration-300 ease-in-out"> --}}
{{--                    <img src="https://cdn.pixabay.com/photo/2016/11/18/17/20/living-room-1835923_1280.jpg" --}}
{{--                        alt="Luxury Villa" --}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" /> --}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10"> --}}
{{--                        Villa --}}
{{--                    </div> --}}
{{--                    <div --}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20"> --}}
{{--                        <div class="text-center px-4"> --}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2> --}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out"> --}}
{{--                    <img src="https://cdn.pixabay.com/photo/2018/01/26/08/15/dining-room-3108037_1280.jpg" --}}
{{--                        alt="Luxury Villa" --}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" /> --}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10"> --}}
{{--                        Villa --}}
{{--                    </div> --}}
{{--                    <div --}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20"> --}}
{{--                        <div class="text-center px-4"> --}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2> --}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out"> --}}
{{--                    <img src="https://cdn.pixabay.com/photo/2017/03/27/15/17/apartment-2179337_1280.jpg" alt="Luxury Villa" --}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" /> --}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10"> --}}
{{--                        Villa --}}
{{--                    </div> --}}
{{--                    <div --}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20"> --}}
{{--                        <div class="text-center px-4"> --}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2> --}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}
{{--                <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out"> --}}
{{--                    <img src="https://cdn.pixabay.com/photo/2021/09/13/06/27/apartment-6620410_1280.jpg" alt="Luxury Villa" --}}
{{--                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" /> --}}
{{--                    <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10"> --}}
{{--                        Villa --}}
{{--                    </div> --}}
{{--                    <div --}}
{{--                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20"> --}}
{{--                        <div class="text-center px-4"> --}}
{{--                            <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2> --}}
{{--                            <p class="text-gray-300 text-base md:text-lg">Dream Villa</p> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}
{{--            </div> --}}
{{--        </section> --}}

{{--        --}}{{-- let's connect form  --}}
{{--        @include('frontend.contact-form') --}}

{{--    </section> --}}
{{--    @endsection --}}

<script src="https://cdn.tailwindcss.com"></script>

<nav class="bg-gray-200/70 backdrop-blur-lg border-b border-black/10 w-full z-50 top-0 pt-2">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-20">

      <!-- Desktop Menu -->
      <div class="hidden xl:flex items-center space-x-6">
        <form class="flex items-center gap-3">

          <!-- Location -->
          <div class="relative">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-black/70" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <select
              class="bg-white/40 border border-black/20 rounded-2xl text-sm text-black pl-12 pr-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
              <option>Location</option>
              <option>Koh Samui</option>
              <option>Bang Makham</option>
              <option>Band Por</option>
              <option>Bang Rak</option>
              <option>Bophut</option>
              <option>Bantai</option>
              <option>Chaweng</option>
              <option>Chaweng Noi</option>
              <option>Choeng Man</option>
              <option>Lamai</option>
              <option>Lipa Noi</option>
              <option>Maenam</option>
              <option>Nathon</option>
              <option>Na Muaeng</option>
              <option>Plai Laem</option>
              <option>Thong Krut</option>
            </select>
          </div>

          <!-- Property Type -->
          <div class="relative">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-black/70" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10h3m10-11l2 2v9h-3m-6 0h6" />
            </svg>
            <select
              class="bg-white/40 border border-black/20 rounded-2xl text-sm text-black pl-12 pr-8 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
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
            </select>
            <select
              class="bg-white/40 border border-black/20 rounded-2xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
              <option>Max</option>
              <option>฿10,000,000</option>
              <option>฿50,000,000</option>
            </select>
          </div>

          <!-- Bed & Bath -->
          <div class="relative">
            <button
              type="button"
              id="bb-toggle"
              class="w-full bg-white/40 border border-black/20 text-black text-sm rounded-2xl px-4 py-3 flex items-center justify-between focus:ring-2 focus:ring-blue-400 hover:bg-white/60 transition"
            >
              <span class="font-medium">Bed & Bath</span>
              <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>

            <div id="bb-dropdown" class="absolute left-0 mt-2 w-full sm:w-80 bg-white text-black rounded-2xl shadow-2xl p-6 hidden transition-transform duration-200 scale-95 opacity-0 origin-top">
              <div class="flex flex-col gap-6">
                <div>
                  <p class="uppercase text-xs font-semibold mb-3 tracking-wide">Bedrooms</p>
                  <div class="flex gap-2 flex-wrap">
                    <button class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white">Any</button>
                    <button class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">1+</button>
                    <button class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">2+</button>
                    <button class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">3+</button>
                  </div>
                </div>
                <div>
                  <p class="uppercase text-xs font-semibold mb-3 tracking-wide">Bathrooms</p>
                  <div class="flex gap-2 flex-wrap">
                    <button class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white">Any</button>
                    <button class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">1+</button>
                    <button class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">2+</button>
                    <button class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">3+</button>
                  </div>
                </div>
              </div>
            </div>
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
  <div id="mobileMenu" class="hidden xl:hidden bg-gray-100 border-t border-gray-300 backdrop-blur-lg shadow-md">
    <div class="p-4 space-y-4">
      <a href="{{ route('property') }}" class="flex items-center space-x-2 text-black hover:text-blue-500">
        <i class="fas fa-shopping-cart"></i><span>Buy</span>
      </a>
      {{-- <a href="{{ route('property') }}" class="flex items-center space-x-2 text-black hover:text-blue-500">
        <i class="fas fa-key"></i><span>Rent</span>
      </a> --}}
      <form class="flex flex-col gap-3">
        <select class="bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 cursor-pointer">
          <option>Location</option>
          <option>Koh Samui</option>
        </select>
        <select class="bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 cursor-pointer">
          <option>Property Type</option>
          <option>Villa</option>
          <option>Beachfront</option>
        </select>
        <div class="flex gap-2">
          <select class="flex-1 bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 cursor-pointer">
            <option>Min</option>
          </select>
          <select class="flex-1 bg-white border border-gray-300 rounded-xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 cursor-pointer">
            <option>Max</option>
          </select>
        </div>
        <button type="reset" class="bg-blue-500 text-white py-3 rounded-xl font-semibold hover:bg-blue-600 transition">
          Reset
        </button>
      </form>
    </div>
  </div>
</nav>

<script>
  // Mobile Menu Toggle
  const toggleBtn = document.getElementById('mobileMenuToggle');
  const mobileMenu = document.getElementById('mobileMenu');

  toggleBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    toggleBtn.innerHTML = mobileMenu.classList.contains('hidden') ?
      '<i class="fas fa-bars"></i>' :
      '<i class="fas fa-times"></i>';
  });

  // Bed & Bath Toggle
  const bbToggle = document.getElementById('bb-toggle');
  const bbDropdown = document.getElementById('bb-dropdown');

  bbToggle.addEventListener('click', () => {
    bbDropdown.classList.toggle('hidden');
    bbDropdown.classList.toggle('scale-95');
    bbDropdown.classList.toggle('opacity-0');
    bbDropdown.classList.toggle('scale-100');
    bbDropdown.classList.toggle('opacity-100');
  });
</script>


