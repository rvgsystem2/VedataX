<style>
    /* Custom styles for better visual appearance */
    .swiper-slide {
        transition: transform 0.3s ease;
    }

    .swiper-slide:hover {
        transform: translateY(-5px);
    }

    /* Loading animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in {
        animation: fadeIn 0.5s ease forwards;
    }

    /* Enhanced navigation styles */
    .custom-pagination {
        display: flex;
        justify-content: center;
        margin-top: 1rem;
        position: relative;
    }

    .custom-pagination-bullet {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #04101d;
        margin: 0 2px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }

    .custom-pagination-bullet-active {
        background-color: #020113;
        transform: scale(1.3);
    }

    .custom-pagination-bullet::after {
        content: '';
        position: absolute;
        top: -4px;
        left: -4px;
        right: -4px;
        bottom: -4px;
        border-radius: 50%;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .custom-pagination-bullet:hover::after {
        border-color: #000000;
    }

    .custom-pagination-bullet-active::after {
        border-color: #000004;
    }

    .custom-navigation {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
        z-index: 10;
        pointer-events: none;
    }

    .custom-nav-btn {
        pointer-events: all;
        /* width: 40px;
        height: 40px; */
        border-radius: 50%;
        background: rgb(17, 0, 0);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid #e2e8f0;
        color: #eeeaea;
    }

    .custom-nav-btn:hover {
        background: #01000c;
        color: white;
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.3);
    }

    .custom-nav-btn:active {
        transform: scale(0.95);
    }

    .custom-nav-btn i {
        font-size: 0.6rem;
    }

    .slide-counter {
        position: absolute;
        bottom: -30px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(79, 70, 229, 0.1);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.875rem;
        color: #000000;
        font-weight: 600;
    }

    /* Property card styles */
    .property-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    .property-card:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Inner image slider styles */
    .inner-swiper .swiper-button-next,
    .inner-swiper .swiper-button-prev {
        background: rgba(255, 255, 255, 0.8);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        color: #000000;
    }

    .inner-swiper .swiper-button-next:after,
    .inner-swiper .swiper-button-prev:after {
        font-size: 14px;
        font-weight: bold;
    }

    /* Modal styles */
    .modal-overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        max-width: 28rem;
        width: 90%;
    }
</style>

<!-- Best Deals Section -->
{{--<section class="w-full max-w-7xl mx-auto px-4 py-6">--}}
{{--    <div class="text-center mb-12 fade-in">--}}
{{--        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Best Deals</h1>--}}
{{--        <p class="text-gray-600 max-w-2xl mx-auto">Discover our carefully curated selection of premium properties--}}
{{--            designed to enhance your lifestyle.</p>--}}
{{--    </div>--}}

{{--    <div class="swiper multiple-slide-carousel w-full relative fade-in">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            <!-- Slide 1 -->--}}
{{--            @foreach($bestDeals as $bestDeal)--}}

{{--                <div class="swiper-slide">--}}
{{--                    <a href="{{route('detail', ['property' => $bestDeal->id])}}">--}}
{{--                    <div class="property-card">--}}
{{--                        <div class="relative">--}}

{{--                            --}}{{-- INNER SWIPER (Property Images) --}}

{{--                            <div class="swiper inner-swiper h-48">--}}
{{--                                <div class="swiper-wrapper">--}}
{{--                                    @if($bestDeal->images && count($bestDeal->images))--}}
{{--                                        @foreach($bestDeal->images as $img)--}}
{{--                                            <div class="swiper-slide">--}}
{{--                                                <img src="{{ asset('storage/' . $img->url) }}"--}}
{{--                                                     class="w-full h-full object-cover"--}}
{{--                                                     alt="{{ $bestDeal->title }}">--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    @else--}}
{{--                                        --}}{{-- Default fallback image --}}
{{--                                        <div class="swiper-slide">--}}
{{--                                            <img src="https://cdn.pixabay.com/photo/2015/11/06/11/45/interior-1026447_1280.jpg"--}}
{{--                                                 class="w-full h-full object-cover"--}}
{{--                                                 alt="No Image">--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                </div>--}}

{{--                                --}}{{-- tiny arrows --}}
{{--                                <div class="swiper-button-next"></div>--}}
{{--                                <div class="swiper-button-prev"></div>--}}
{{--                            </div>--}}

{{--                            --}}{{-- BADGE --}}
{{--                            <div class="absolute top-3 left-3">--}}
{{--                                <span class="bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded">--}}
{{--                                    {{ strtoupper($bestDeal->type) }} --}}{{-- RENT / SALE --}}
{{--                                </span>--}}
{{--                            </div>--}}

{{--                            --}}{{-- FAVORITE BUTTON --}}
{{--                            <div class="absolute top-3 right-3">--}}
{{--                                <button--}}
{{--                                    class="favorite-btn bg-white/90 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center transition">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            --}}{{-- PRICE OVERLAY --}}
{{--                            <div--}}
{{--                                class="absolute bottom-0 left-0 right-0 px-4 py-3 flex justify-between items-center bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">--}}

{{--                                --}}{{-- PRICE --}}
{{--                                <span class="text-white font-semibold text-lg">--}}
{{--                                    {{ display_price($bestDeal->price) }}--}}
{{--                                </span>--}}

{{--                                --}}{{-- ACTION ICONS --}}
{{--                                <div class="flex space-x-3 text-white text-lg">--}}
{{--                                    <button class="expand-btn hover:text-gray-300 transition">--}}
{{--                                        <i class="fas fa-expand"></i>--}}
{{--                                    </button>--}}
{{--                                    <button class="favorite-btn hover:text-red-400 transition">--}}
{{--                                        <i class="far fa-heart"></i>--}}
{{--                                    </button>--}}
{{--                                    <button class="compare-btn hover:text-gray-300 transition">--}}
{{--                                        <i class="fas fa-plus"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        --}}{{-- CONTENT --}}
{{--                        <div class="p-4">--}}

{{--                            <div class="flex justify-between items-start">--}}
{{--                                <div>--}}
{{--                                    <h3 class="font-bold text-lg text-gray-800">--}}
{{--                                        {{ $bestDeal->title }}--}}
{{--                                    </h3>--}}

{{--                                    <p class="text-gray-600 text-sm flex items-center mt-1">--}}
{{--                                        <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>--}}
{{--                                        {{ $bestDeal->address ?? 'No Address' }},--}}
{{--                                        {{ optional($bestDeal->city)->name }}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{-- BEDROOMS, BATHROOMS, AREA --}}
{{--                            <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">--}}

{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-bed text-gray-400 mr-1"></i>--}}
{{--                                    <span>{{ $bestDeal->bedrooms ?? '-' }} Beds</span>--}}
{{--                                </div>--}}

{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-bath text-gray-400 mr-1"></i>--}}
{{--                                    <span>{{ $bestDeal->bathrooms ?? '-' }} Baths</span>--}}
{{--                                </div>--}}

{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-vector-square text-gray-400 mr-1"></i>--}}
{{--                                    <span>{{ $bestDeal->area ?? '-' }} sqft</span>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                            --}}{{-- LISTED BY + TIME --}}
{{--                            <div class="flex justify-between items-center mt-4">--}}

{{--                                <div class="flex items-center">--}}
{{--                                    <div--}}
{{--                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">--}}
{{--                                        {{ strtoupper(substr($bestDeal->listedBy->name, 0, 2)) }}--}}
{{--                                    </div>--}}

{{--                                    <div class="ml-3">--}}
{{--                                        <p class="text-sm font-medium text-gray-900">--}}
{{--                                            {{ $bestDeal->listedBy->name }}--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="flex items-center space-x-2">--}}
{{--                                    <button--}}
{{--                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">--}}
{{--                                        <i class="fas fa-share-alt"></i>--}}
{{--                                    </button>--}}

{{--                                    --}}{{-- Time ago --}}
{{--                                    <p class="text-xs text-gray-500">--}}
{{--                                        {{ $bestDeal->created_at->diffForHumans() }}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}


{{--        <!-- ✅ Bottom Controls (Pagination Centered with Arrows on Both Sides) -->--}}
{{--        <div class="custom-controls mt-8 flex flex-col items-center space-y-4 pb-6">--}}

{{--            <!-- Pagination + Arrows in One Row -->--}}
{{--            <div class="flex items-center justify-center">--}}

{{--              <!-- Prev Button -->--}}
{{--              <button--}}
{{--                class="custom-nav-btn custom-prev-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">--}}
{{--                <i class="fas fa-chevron-left text-white"></i>--}}
{{--              </button>--}}

{{--              <!-- Pagination Dots (Centered) -->--}}
{{--              <div class="custom-pagination flex justify-center text-black "></div>--}}

{{--              <!-- Next Button -->--}}
{{--              <button--}}
{{--                class="custom-nav-btn custom-next-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">--}}
{{--                <i class="fas fa-chevron-right text-white "></i>--}}
{{--              </button>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--</section>--}}


<section class="w-full max-w-7xl mx-auto px-4 py-6">
    <div class="text-center mb-12 fade-in">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            {{ __('index.best_deals.title') }}
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            {{ __('index.best_deals.subtitle') }}
        </p>
    </div>

    <div class="swiper multiple-slide-carousel w-full relative fade-in">
        <div class="swiper-wrapper">
            @foreach($bestDeals as $bestDeal)
                <div class="swiper-slide">
                    <a href="{{ route('detail', ['property' => $bestDeal->id]) }}">
                        <div class="property-card">
                            <div class="relative">

                                {{-- INNER SWIPER (Property Images) --}}
                                <div class="swiper inner-swiper h-48">
                                    <div class="swiper-wrapper">
                                        @if($bestDeal->images && count($bestDeal->images))
                                            @foreach($bestDeal->images as $img)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/' . $img->url) }}"
                                                         class="w-full h-full object-cover"
                                                         alt="{{ $bestDeal->title }}">
                                                </div>
                                            @endforeach
                                        @else
                                            {{-- Default fallback image --}}
                                            <div class="swiper-slide">
                                                <img src="https://cdn.pixabay.com/photo/2015/11/06/11/45/interior-1026447_1280.jpg"
                                                     class="w-full h-full object-cover"
                                                     alt="{{ __('index.best_deals.no_image') }}">
                                            </div>
                                        @endif
                                    </div>

                                    {{-- tiny arrows --}}
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>

                                {{-- BADGE --}}
                                <div class="absolute top-3 left-3">
                                    <span class="bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded">
                                        @php
                                            $type = strtoupper((string) ($bestDeal->type ?? ''));
                                        @endphp

                                        {{ $type === 'RENT'
                                            ? __('index.best_deals.rent')
                                            : ($type === 'SALE' ? __('index.best_deals.sale') : strtoupper($bestDeal->type)) }}
                                    </span>
                                </div>

                                {{-- FAVORITE BUTTON --}}
                                <div class="absolute top-3 right-3">
                                    <button
                                        class="favorite-btn bg-white/90 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center transition">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>

                                {{-- PRICE OVERLAY --}}
                                <div
                                    class="absolute bottom-0 left-0 right-0 px-4 py-3 flex justify-between items-center bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">

                                    {{-- PRICE --}}
                                    <span class="text-white font-semibold text-lg">
                                        {{ display_price($bestDeal->price) }}
                                    </span>

                                    {{-- ACTION ICONS --}}
                                    <div class="flex space-x-3 text-white text-lg">
                                        <button class="expand-btn hover:text-gray-300 transition">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="favorite-btn hover:text-red-400 transition">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="compare-btn hover:text-gray-300 transition">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            {{-- CONTENT --}}
                            <div class="p-4">

                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-800">
                                            {{ $bestDeal->title }}
                                        </h3>

                                        <p class="text-gray-600 text-sm flex items-center mt-1">
                                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                            {{ $bestDeal->address ?? __('index.best_deals.no_address') }},
                                            {{ optional($bestDeal->city)->name }}
                                        </p>
                                    </div>
                                </div>

                                {{-- BEDROOMS, BATHROOMS, AREA --}}
                                <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">

                                    <div class="flex items-center">
                                        <i class="fas fa-bed text-gray-400 mr-1"></i>
                                        <span>{{ $bestDeal->bedrooms ?? '-' }} {{ __('index.best_deals.beds') }}</span>
                                    </div>

                                    <div class="flex items-center">
                                        <i class="fas fa-bath text-gray-400 mr-1"></i>
                                        <span>{{ $bestDeal->bathrooms ?? '-' }} {{ __('index.best_deals.baths') }}</span>
                                    </div>

                                    <div class="flex items-center">
                                        <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                        <span>{{ $bestDeal->area ?? '-' }} {{ __('index.best_deals.sqft') }}</span>
                                    </div>

                                </div>

                                {{-- LISTED BY + TIME --}}
                                <div class="flex justify-between items-center mt-4">

                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                            {{ strtoupper(substr($bestDeal->listedBy->name, 0, 2)) }}
                                        </div>

                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ $bestDeal->listedBy->name }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>

                                        {{-- Time ago --}}
                                        <p class="text-xs text-gray-500">
                                            {{ $bestDeal->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- ✅ Bottom Controls (Pagination Centered with Arrows on Both Sides) -->
        <div class="custom-controls mt-8 flex flex-col items-center space-y-4 pb-6">

            <!-- Pagination + Arrows in One Row -->
            <div class="flex items-center justify-center">

                <!-- Prev Button -->
                <button
                    class="custom-nav-btn custom-prev-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">
                    <i class="fas fa-chevron-left text-white"></i>
                </button>

                <!-- Pagination Dots (Centered) -->
                <div class="custom-pagination flex justify-center text-black "></div>

                <!-- Next Button -->
                <button
                    class="custom-nav-btn custom-next-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">
                    <i class="fas fa-chevron-right text-white "></i>
                </button>
            </div>

        </div>

    </div>
</section>


<style>
    .custom-pagination .swiper-pagination-bullet {
      @apply bg-gray-900 w-3 h-3 rounded-full transition-all duration-300;
    }

    .custom-pagination .swiper-pagination-bullet-active {
      @apply bg-green-600 w-5;
    }
  </style>
<script>
    const landSwiper = new Swiper('.land-multiple-slide-carousel', {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: '.custom-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.custom-next-btn',
        prevEl: '.custom-prev-btn',
      },
      on: {
        init: function () {
          const totalSlides = this.slides.length - this.loopedSlides * 2; // exclude duplicates
          document.querySelector('.total-slides').textContent = totalSlides;
          document.querySelector('.current-slide').textContent = this.realIndex + 1;
        },
        slideChange: function () {
          document.querySelector('.current-slide').textContent = this.realIndex + 1;
        },
      },
      breakpoints: {
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
</script>



<!-- Premium Villa Deals Section -->
{{--<section class="w-full max-w-7xl mx-auto px-4 py-8">--}}
{{--    <div class="text-center mb-12 fade-in">--}}
{{--        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Villas</h1>--}}
{{--        <p class="text-gray-600 max-w-2xl mx-auto">Discover our carefully curated selection of luxury villas designed--}}
{{--            to enhance your lifestyle.</p>--}}
{{--    </div>--}}

{{--    <div class="swiper villa-multiple-slide-carousel w-full relative fade-in">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            <!-- Villa Slide 1 -->--}}
{{--            @if(!empty($villas))--}}
{{--            @foreach($villas as $villa)--}}
{{--                <div class="swiper-slide">--}}
{{--                    <a href="{{route('detail', ['property' => $villa->id])}}">--}}
{{--                    <div class="property-card">--}}
{{--                        <div class="relative">--}}

{{--                            --}}{{-- INNER SWIPER IMAGES --}}
{{--                            <div class="swiper inner-swiper h-48">--}}
{{--                                <div class="swiper-wrapper">--}}

{{--                                    @if(optional($villa->images)->count() > 0)--}}
{{--                                        @foreach($villa->images as $img)--}}
{{--                                            <div class="swiper-slide">--}}
{{--                                                <img src="{{ asset('storage/' . $img->url) }}"--}}
{{--                                                     class="w-full h-full object-cover"--}}
{{--                                                     alt="{{ $villa->title ?? 'Property' }}">--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    @else--}}
{{--                                        --}}{{-- FALLBACK IMAGE --}}
{{--                                        <div class="swiper-slide">--}}
{{--                                            <img src="https://cdn.pixabay.com/photo/2016/11/29/03/53/house-1867187_1280.jpg"--}}
{{--                                                 class="w-full h-full object-cover"--}}
{{--                                                 alt="No image available" />--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                </div>--}}

{{--                                <div class="swiper-button-next"></div>--}}
{{--                                <div class="swiper-button-prev"></div>--}}
{{--                            </div>--}}

{{--                            --}}{{-- BADGE --}}
{{--                            <div class="absolute top-3 left-3">--}}
{{--                                @php--}}
{{--                                    $badgeType  = strtoupper($villa->type ?? 'SALE');--}}
{{--                                    $badgeColor = ($villa->type ?? '') === 'rent' ? 'bg-green-600' : 'bg-purple-600';--}}
{{--                                @endphp--}}

{{--                                <span class="{{ $badgeColor }} text-white text-xs font-medium px-2 py-1 rounded">--}}
{{--                                    FOR {{ $badgeType }}--}}
{{--                                </span>--}}
{{--                            </div>--}}

{{--                            --}}{{-- FAVORITE BUTTON --}}
{{--                            <div class="absolute top-3 right-3">--}}
{{--                                <button--}}
{{--                                    class="favorite-btn bg-white/90 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center transition">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            --}}{{-- PRICE OVERLAY --}}
{{--                            <div--}}
{{--                                class="absolute bottom-0 left-0 right-0 px-4 py-3 flex justify-between items-center--}}
{{--                                bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">--}}

{{--                                <span class="text-white font-semibold text-lg">--}}
{{--                                    {{ display_price($bestDeal->price) }}--}}
{{--                                </span>--}}

{{--                                <div class="flex space-x-3 text-white text-lg">--}}
{{--                                    <button class="expand-btn hover:text-gray-300 transition">--}}
{{--                                        <i class="fas fa-expand"></i>--}}
{{--                                    </button>--}}
{{--                                    <button class="favorite-btn hover:text-red-400 transition">--}}
{{--                                        <i class="far fa-heart"></i>--}}
{{--                                    </button>--}}
{{--                                    <button class="compare-btn hover:text-gray-300 transition">--}}
{{--                                        <i class="fas fa-plus"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        --}}{{-- CONTENT --}}
{{--                        <div class="p-4">--}}
{{--                            <div class="flex justify-between items-start">--}}
{{--                                <div>--}}
{{--                                    <h3 class="font-bold text-lg text-gray-800">--}}
{{--                                        {{ $villa->title ?? 'Untitled Property' }}--}}
{{--                                    </h3>--}}

{{--                                    <p class="text-gray-600 text-sm flex items-center mt-1">--}}
{{--                                        <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>--}}
{{--                                        {{ $villa->address ?? 'No address' }}--}}
{{--                                        @if(optional($villa->city)->name)--}}
{{--                                            , {{ $villa->city->name }}--}}
{{--                                        @endif--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{-- BED / BATH / AREA --}}
{{--                            <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-bed text-gray-400 mr-1"></i>--}}
{{--                                    <span>{{ $villa->bedrooms ?? '-' }} Beds</span>--}}
{{--                                </div>--}}

{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-bath text-gray-400 mr-1"></i>--}}
{{--                                    <span>{{ $villa->bathrooms ?? '-' }} Baths</span>--}}
{{--                                </div>--}}

{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-vector-square text-gray-400 mr-1"></i>--}}
{{--                                    <span>{{ $villa->area ?? '-' }} sqft</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{-- AGENT --}}
{{--                            <div class="flex justify-between items-center mt-4">--}}

{{--                                @php--}}
{{--                                    $agent = optional($villa->listedBy);--}}
{{--                                    $agentName = $agent->name ?? 'Agent';--}}
{{--                                    $initials = collect(explode(' ', $agentName))--}}
{{--                                                    ->map(fn($n) => strtoupper(substr($n, 0, 1)))--}}
{{--                                                    ->take(2)->implode('');--}}
{{--                                @endphp--}}

{{--                                <div class="flex items-center">--}}
{{--                                    <div--}}
{{--                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-400 to-pink-500--}}
{{--                            flex items-center justify-center text-white font-bold">--}}
{{--                                        {{ $initials }}--}}
{{--                                    </div>--}}

{{--                                    <div class="ml-3">--}}
{{--                                        <p class="text-sm font-medium text-gray-900">--}}
{{--                                            {{ $agentName }}--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="flex items-center space-x-2">--}}
{{--                                    <button--}}
{{--                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center--}}
{{--                            text-gray-600 hover:bg-gray-200 transition-colors">--}}
{{--                                        <i class="fas fa-share-alt"></i>--}}
{{--                                    </button>--}}

{{--                                    <p class="text-xs text-gray-500">--}}
{{--                                        {{ $villa->created_at?->diffForHumans() ?? '' }}--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--            @endif--}}



{{--            <!-- Additional villa slides would go here -->--}}
{{--        </div>--}}

{{--        <div class="custom-controls mt-8 flex flex-col items-center ">--}}
{{--            <!-- Pagination + Arrows in One Row -->--}}
{{--            <div class="flex items-center justify-center space-x-4">--}}
{{--                <!-- Prev Button -->--}}
{{--                <button--}}
{{--                    class="custom-nav-btn villa-prev-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">--}}
{{--                    <i class="fas fa-chevron-left text-white"></i>--}}
{{--                </button>--}}

{{--                <!-- Pagination Dots (Centered) -->--}}
{{--                <div class="custom-pagination villa-pagination flex justify-center text-black"></div>--}}

{{--                <!-- Next Button -->--}}
{{--                <button--}}
{{--                    class="custom-nav-btn villa-next-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">--}}
{{--                    <i class="fas fa-chevron-right text-white"></i>--}}
{{--                </button>--}}
{{--            </div>--}}


{{--            <!-- Slide Counter (Optional, Below Pagination Row) -->--}}
{{--            <div class="slide-counter text-sm text-gray-600">--}}
{{--                <span class="villa-current-slide font-medium">1</span> / <span--}}
{{--                    class="villa-total-slides font-medium">6</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--        <style>--}}
{{--            .villa-pagination .swiper-pagination-bullet {--}}
{{--                @apply bg-gray-900 w-3 h-3 rounded-full transition-all duration-300;--}}
{{--            }--}}

{{--            .villa-pagination .swiper-pagination-bullet-active {--}}
{{--                @apply bg-green-600 w-5;--}}
{{--            }--}}
{{--        </style>--}}

{{--</section>--}}


<section class="w-full max-w-7xl mx-auto px-4 py-8">
    <div class="text-center mb-12 fade-in">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            {{ __('index.villas.section.title') }}
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            {{ __('index.villas.section.subtitle') }}
        </p>
    </div>

    <div class="swiper villa-multiple-slide-carousel w-full relative fade-in">
        <div class="swiper-wrapper">

            @if(!empty($villas))
                @foreach($villas as $villa)
                    <div class="swiper-slide">
                        <a href="{{ route('detail', ['property' => $villa->id]) }}">
                            <div class="property-card">
                                <div class="relative">

                                    {{-- INNER SWIPER --}}
                                    <div class="swiper inner-swiper h-48">
                                        <div class="swiper-wrapper">
                                            @if(optional($villa->images)->count() > 0)
                                                @foreach($villa->images as $img)
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('storage/' . $img->url) }}"
                                                             class="w-full h-full object-cover"
                                                             alt="{{ $villa->title ?? __('index.villas.fallback.property') }}">
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="swiper-slide">
                                                    <img src="https://cdn.pixabay.com/photo/2016/11/29/03/53/house-1867187_1280.jpg"
                                                         class="w-full h-full object-cover"
                                                         alt="{{ __('index.villas.fallback.no_image') }}">
                                                </div>
                                            @endif
                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>

                                    {{-- BADGE --}}
                                    @php
                                        $rawType = strtolower($villa->type ?? 'sale');
                                        $typeKey = $rawType === 'rent' ? 'rent' : 'sale';
                                        $badgeColor = $rawType === 'rent' ? 'bg-green-600' : 'bg-purple-600';
                                    @endphp

                                    <div class="absolute top-3 left-3">
                                    <span class="{{ $badgeColor }} text-white text-xs font-medium px-2 py-1 rounded">
                                        {{ __('index.villas.labels.for') }}
                                        {{ strtoupper(__('index.villas.labels.' . $typeKey)) }}
                                    </span>
                                    </div>

                                    {{-- PRICE --}}
                                    <div class="absolute bottom-0 left-0 right-0 px-4 py-3
                                    flex justify-between items-center
                                    bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">

                                    <span class="text-white font-semibold text-lg">
                                        {{ display_price($villa->price) }}
                                    </span>

                                        <div class="flex space-x-3 text-white text-lg">
                                            <i class="fas fa-expand"></i>
                                            <i class="far fa-heart"></i>
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>

                                {{-- CONTENT --}}
                                <div class="p-4">
                                    <h3 class="font-bold text-lg text-gray-800">
                                        {{ $villa->title ?? __('index.villas.fallback.untitled') }}
                                    </h3>

                                    <p class="text-gray-600 text-sm flex items-center mt-1">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        {{ $villa->address ?? __('index.villas.fallback.no_address') }}
                                        @if(optional($villa->city)->name)
                                            , {{ $villa->city->name }}
                                        @endif
                                    </p>

                                    <div class="flex gap-4 text-sm text-gray-600 mt-4">
                                        <span>{{ $villa->bedrooms ?? '-' }} {{ __('index.villas.labels.beds') }}</span>
                                        <span>{{ $villa->bathrooms ?? '-' }} {{ __('index.villas.labels.baths') }}</span>
                                        <span>{{ $villa->area ?? '-' }} {{ __('index.villas.labels.sqft') }}</span>
                                    </div>

                                    <div class="flex justify-between items-center mt-4">
                                        <div class="text-sm font-medium">
                                            {{ optional($villa->listedBy)->name ?? __('index.villas.fallback.agent') }}
                                        </div>

                                        <div class="text-xs text-gray-500">
                                            {{ $villa->created_at?->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>

<script>
    const villaSwiper = new Swiper('.villa-multiple-slide-carousel', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.villa-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.villa-next-btn',
            prevEl: '.villa-prev-btn',
        },
        on: {
            init: function() {
                const totalSlides = this.slides.length - this.loopedSlides * 2;
                document.querySelector('.villa-total-slides').textContent = totalSlides;
                document.querySelector('.villa-current-slide').textContent = this.realIndex + 1;
            },
            slideChange: function() {
                document.querySelector('.villa-current-slide').textContent = this.realIndex + 1;
            },
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            },
        },
    });
</script>

<!-- Premium Land Deals Section -->
{{--<section class="w-full max-w-7xl mx-auto px-4 py-8">--}}
{{--    <div class="text-center mb-12 fade-in">--}}
{{--        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Lands</h1>--}}
{{--        <p class="text-gray-600 max-w-2xl mx-auto">Discover our carefully curated selection of prime land parcels--}}
{{--            designed for your future development.</p>--}}
{{--    </div>--}}

{{--    <div class="swiper land-multiple-slide-carousel w-full relative fade-in">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            <!-- Land Slide 1 -->--}}
{{--            @foreach(($lands ?? collect()) as $land)--}}
{{--                <div class="swiper-slide">--}}
{{--                    <a href="{{route('detail', ['property' => $land->id])}}">--}}
{{--                    <div class="property-card">--}}
{{--                        <div class="relative">--}}
{{--                            --}}{{-- INNER SWIPER --}}
{{--                            <div class="swiper inner-swiper h-48">--}}
{{--                                <div class="swiper-wrapper">--}}

{{--                                    @if(optional($land->images)->count() > 0)--}}
{{--                                        @foreach($land->images as $img)--}}
{{--                                            <div class="swiper-slide">--}}
{{--                                                <img src="{{ asset('storage/' . $img->url) }}"--}}
{{--                                                     class="w-full h-full object-cover"--}}
{{--                                                     alt="{{ $land->title ?? 'Land' }}" />--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    @else--}}
{{--                                        --}}{{-- Fallback images --}}
{{--                                        <div class="swiper-slide">--}}
{{--                                            <img src="https://cdn.pixabay.com/photo/2023/06/13/11/45/landscape-8060760_1280.jpg"--}}
{{--                                                 class="w-full h-full object-cover" alt="Land plot" />--}}
{{--                                        </div>--}}
{{--                                        <div class="swiper-slide">--}}
{{--                                            <img src="https://cdn.pixabay.com/photo/2014/08/26/21/52/map-428639_1280.jpg"--}}
{{--                                                 class="w-full h-full object-cover" alt="Land view" />--}}
{{--                                        </div>--}}
{{--                                        <div class="swiper-slide">--}}
{{--                                            <img src="https://cdn.pixabay.com/photo/2014/10/08/20/52/cereals-480691_1280.jpg"--}}
{{--                                                 class="w-full h-full object-cover" alt="Land landscape" />--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                </div>--}}

{{--                                <div class="swiper-button-next"></div>--}}
{{--                                <div class="swiper-button-prev"></div>--}}
{{--                            </div>--}}

{{--                            --}}{{-- BADGE --}}
{{--                            <div class="absolute top-3 left-3">--}}
{{--                                @php--}}
{{--                                    $badgeType  = strtoupper($land->type ?? 'SALE'); // RENT / SALE--}}
{{--                                    $badgeColor = ($land->type ?? '') === 'rent' ? 'bg-blue-600' : 'bg-green-600';--}}
{{--                                @endphp--}}

{{--                                <span class="{{ $badgeColor }} text-white text-xs font-medium px-2 py-1 rounded">--}}
{{--                        FOR {{ $badgeType }}--}}
{{--                    </span>--}}
{{--                            </div>--}}

{{--                            --}}{{-- FAVORITE ICON --}}
{{--                            <div class="absolute top-3 right-3">--}}
{{--                                <button--}}
{{--                                    class="favorite-btn bg-white/90 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center transition">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            --}}{{-- PRICE OVERLAY --}}
{{--                            <div--}}
{{--                                class="absolute bottom-0 left-0 right-0 px-4 py-3 flex justify-between items-center--}}
{{--                           bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">--}}
{{--                    <span class="text-white font-semibold text-lg">--}}
{{--                        {{ display_price($bestDeal->price) }}--}}
{{--                    </span>--}}

{{--                                <div class="flex space-x-3 text-white text-lg">--}}
{{--                                    <button class="expand-btn hover:text-gray-300 transition">--}}
{{--                                        <i class="fas fa-expand"></i>--}}
{{--                                    </button>--}}
{{--                                    <button class="favorite-btn hover:text-red-400 transition">--}}
{{--                                        <i class="far fa-heart"></i>--}}
{{--                                    </button>--}}
{{--                                    <button class="compare-btn hover:text-gray-300 transition">--}}
{{--                                        <i class="fas fa-plus"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        --}}{{-- CONTENT --}}
{{--                        <div class="p-4">--}}
{{--                            <div class="flex justify-between items-start">--}}
{{--                                <div>--}}
{{--                                    <h3 class="font-bold text-lg text-gray-800">--}}
{{--                                        {{ $land->title ?? 'Prime Land' }}--}}
{{--                                    </h3>--}}
{{--                                    <p class="text-gray-600 text-sm flex items-center mt-1">--}}
{{--                                        <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>--}}
{{--                                        {{ $land->address ?? 'Location not specified' }}--}}
{{--                                        @if(optional($land->city)->name)--}}
{{--                                            , {{ $land->city->name }}--}}
{{--                                        @endif--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{-- META ROW: Area + Road Access + Water Supply --}}
{{--                            <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">--}}
{{--                                --}}{{-- Area --}}
{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-ruler-combined text-gray-400 mr-1"></i>--}}
{{--                                    <span>--}}
{{--                            @if($land->area)--}}
{{--                                            {{ $land->area }} sqft--}}
{{--                                        @else--}}
{{--                                            Area not specified--}}
{{--                                        @endif--}}
{{--                        </span>--}}
{{--                                </div>--}}

{{--                                --}}{{-- Road Access (amenity based) --}}
{{--                                @php--}}
{{--                                    $hasRoad = optional($land->amenities)--}}
{{--                                        ? $land->amenities->contains(fn($a) => stripos($a->name, 'road') !== false)--}}
{{--                                        : false;--}}
{{--                                @endphp--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-road text-gray-400 mr-1"></i>--}}
{{--                                    <span>{{ $hasRoad ? 'Road Access' : 'Road info N/A' }}</span>--}}
{{--                                </div>--}}

{{--                                --}}{{-- Water Supply (amenity based) --}}
{{--                                @php--}}
{{--                                    $hasWater = optional($land->amenities)--}}
{{--                                        ? $land->amenities->contains(fn($a) => stripos($a->name, 'water') !== false)--}}
{{--                                        : false;--}}
{{--                                @endphp--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <i class="fas fa-tint text-gray-400 mr-1"></i>--}}
{{--                                    <span>{{ $hasWater ? 'Water Supply' : 'Water info N/A' }}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            --}}{{-- AGENT + TIME --}}
{{--                            <div class="flex justify-between items-center mt-4">--}}
{{--                                @php--}}
{{--                                    $agent     = optional($land->listedBy);--}}
{{--                                    $agentName = $agent->name ?? 'Agent';--}}
{{--                                    $initials  = collect(explode(' ', $agentName))--}}
{{--                                                    ->map(fn($n) => strtoupper(substr($n, 0, 1)))--}}
{{--                                                    ->take(2)->implode('');--}}
{{--                                @endphp--}}

{{--                                <div class="flex items-center">--}}
{{--                                    <div--}}
{{--                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-green-400 to-blue-500--}}
{{--                                   flex items-center justify-center text-white font-bold">--}}
{{--                                        {{ $initials }}--}}
{{--                                    </div>--}}
{{--                                    <div class="ml-3">--}}
{{--                                        <p class="text-sm font-medium text-gray-900">--}}
{{--                                            {{ $agentName }}--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="flex items-center space-x-2">--}}
{{--                                    <button--}}
{{--                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center--}}
{{--                                   text-gray-600 hover:bg-gray-200 transition-colors">--}}
{{--                                        <i class="fas fa-share-alt"></i>--}}
{{--                                    </button>--}}
{{--                                    <p class="text-xs text-gray-500">--}}
{{--                                        {{ $land->created_at?->diffForHumans() ?? '' }}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}


{{--            <!-- Additional land slides would go here -->--}}
{{--        </div>--}}

{{--        <div class="custom-controls mt-8 flex flex-col items-center ">--}}
{{--            <!-- Pagination + Arrows in One Row -->--}}
{{--            <div class="flex items-center justify-center">--}}
{{--                <!-- Prev Button -->--}}
{{--                <button--}}
{{--                    class="custom-nav-btn land-prev-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">--}}
{{--                    <i class="fas fa-chevron-left text-white hover:text-white"></i>--}}
{{--                </button>--}}

{{--                <!-- Pagination Dots (Centered) -->--}}
{{--                <div class="custom-pagination land-pagination flex justify-center text-black "></div>--}}

{{--                <!-- Next Button -->--}}
{{--                <button--}}
{{--                    class="custom-nav-btn land-next-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">--}}
{{--                    <i class="fas fa-chevron-right text-white hover:text-white"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <!-- Slide Counter (Below Pagination Row) -->--}}
{{--            <div class="slide-counter text-sm text-gray-600">--}}
{{--                <span class="land-current-slide font-medium">1</span> / <span--}}
{{--                    class="land-total-slides font-medium">6</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <style>--}}
{{--            .land-pagination .swiper-pagination-bullet {--}}
{{--                @apply bg-gray-900 w-3 h-3 rounded-full transition-all duration-300;--}}
{{--            }--}}

{{--            .land-pagination .swiper-pagination-bullet-active {--}}
{{--                @apply bg-green-600 w-5;--}}
{{--            }--}}
{{--        </style>--}}

{{--    </div>--}}
{{--</section>--}}

<section class="w-full max-w-7xl mx-auto px-4 py-8">
    <div class="text-center mb-12 fade-in">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            {{ __('index.lands.section.title') }}
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            {{ __('index.lands.section.subtitle') }}
        </p>
    </div>

    <div class="swiper land-multiple-slide-carousel w-full relative fade-in">
        <div class="swiper-wrapper">
            <!-- Land Slide 1 -->
            @foreach(($lands ?? collect()) as $land)
                <div class="swiper-slide">
                    <a href="{{ route('detail', ['property' => $land->id]) }}">
                        <div class="property-card">
                            <div class="relative">
                                {{-- INNER SWIPER --}}
                                <div class="swiper inner-swiper h-48">
                                    <div class="swiper-wrapper">

                                        @if(optional($land->images)->count() > 0)
                                            @foreach($land->images as $img)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/' . $img->url) }}"
                                                         class="w-full h-full object-cover"
                                                         alt="{{ $land->title ?? __('index.lands.fallback.land') }}" />
                                                </div>
                                            @endforeach
                                        @else
                                            {{-- Fallback images --}}
                                            <div class="swiper-slide">
                                                <img src="https://cdn.pixabay.com/photo/2023/06/13/11/45/landscape-8060760_1280.jpg"
                                                     class="w-full h-full object-cover"
                                                     alt="{{ __('index.lands.fallback.land_plot') }}" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="https://cdn.pixabay.com/photo/2014/08/26/21/52/map-428639_1280.jpg"
                                                     class="w-full h-full object-cover"
                                                     alt="{{ __('index.lands.fallback.land_view') }}" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="https://cdn.pixabay.com/photo/2014/10/08/20/52/cereals-480691_1280.jpg"
                                                     class="w-full h-full object-cover"
                                                     alt="{{ __('index.lands.fallback.land_landscape') }}" />
                                            </div>
                                        @endif

                                    </div>

                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>

                                {{-- BADGE --}}
                                <div class="absolute top-3 left-3">
                                    @php
                                        $rawType = strtolower((string) ($land->type ?? 'sale'));
                                        $typeKey = $rawType === 'rent' ? 'rent' : 'sale';
                                        $badgeColor = $rawType === 'rent' ? 'bg-blue-600' : 'bg-green-600';
                                    @endphp

                                    <span class="{{ $badgeColor }} text-white text-xs font-medium px-2 py-1 rounded">
                                        {{ __('index.lands.labels.for') }}
                                        {{ strtoupper(__('index.lands.labels.' . $typeKey)) }}
                                    </span>
                                </div>

                                {{-- FAVORITE ICON --}}
                                <div class="absolute top-3 right-3">
                                    <button
                                        class="favorite-btn bg-white/90 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center transition">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>

                                {{-- PRICE OVERLAY --}}
                                <div
                                    class="absolute bottom-0 left-0 right-0 px-4 py-3 flex justify-between items-center
                           bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">

                                    <span class="text-white font-semibold text-lg">
                                        {{-- ✅ FIX: $bestDeal -> $land --}}
                                        {{ display_price($land->price) }}
                                    </span>

                                    <div class="flex space-x-3 text-white text-lg">
                                        <button class="expand-btn hover:text-gray-300 transition">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="favorite-btn hover:text-red-400 transition">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="compare-btn hover:text-gray-300 transition">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- CONTENT --}}
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-800">
                                            {{ $land->title ?? __('index.lands.fallback.prime_land') }}
                                        </h3>
                                        <p class="text-gray-600 text-sm flex items-center mt-1">
                                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                            {{ $land->address ?? __('index.lands.fallback.location_not_specified') }}
                                            @if(optional($land->city)->name)
                                                , {{ $land->city->name }}
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                {{-- META ROW: Area + Road Access + Water Supply --}}
                                <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">
                                    {{-- Area --}}
                                    <div class="flex items-center">
                                        <i class="fas fa-ruler-combined text-gray-400 mr-1"></i>
                                        <span>
                                            @if($land->area)
                                                {{ $land->area }} {{ __('index.lands.labels.sqft') }}
                                            @else
                                                {{ __('index.lands.labels.area_not_specified') }}
                                            @endif
                                        </span>
                                    </div>

                                    {{-- Road Access (amenity based) --}}
                                    @php
                                        $hasRoad = optional($land->amenities)
                                            ? $land->amenities->contains(fn($a) => stripos($a->name, 'road') !== false)
                                            : false;
                                    @endphp
                                    <div class="flex items-center">
                                        <i class="fas fa-road text-gray-400 mr-1"></i>
                                        <span>{{ $hasRoad ? __('index.lands.labels.road_access') : __('index.lands.labels.road_na') }}</span>
                                    </div>

                                    {{-- Water Supply (amenity based) --}}
                                    @php
                                        $hasWater = optional($land->amenities)
                                            ? $land->amenities->contains(fn($a) => stripos($a->name, 'water') !== false)
                                            : false;
                                    @endphp
                                    <div class="flex items-center">
                                        <i class="fas fa-tint text-gray-400 mr-1"></i>
                                        <span>{{ $hasWater ? __('index.lands.labels.water_supply') : __('index.lands.labels.water_na') }}</span>
                                    </div>
                                </div>

                                {{-- AGENT + TIME --}}
                                <div class="flex justify-between items-center mt-4">
                                    @php
                                        $agent     = optional($land->listedBy);
                                        $agentName = $agent->name ?? __('index.lands.fallback.agent');
                                        $initials  = collect(explode(' ', $agentName))
                                                        ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                                                        ->take(2)->implode('');
                                    @endphp

                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-green-400 to-blue-500
                                   flex items-center justify-center text-white font-bold">
                                            {{ $initials }}
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ $agentName }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center
                                   text-gray-600 hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                        <p class="text-xs text-gray-500">
                                            {{ $land->created_at?->diffForHumans() ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <!-- Additional land slides would go here -->
        </div>

        <div class="custom-controls mt-8 flex flex-col items-center ">
            <div class="flex items-center justify-center">
                <button
                    class="custom-nav-btn land-prev-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">
                    <i class="fas fa-chevron-left text-white hover:text-white"></i>
                </button>

                <div class="custom-pagination land-pagination flex justify-center text-black "></div>

                <button
                    class="custom-nav-btn land-next-btn w-12 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">
                    <i class="fas fa-chevron-right text-white hover:text-white"></i>
                </button>
            </div>

            <div class="slide-counter text-sm text-gray-600">
                <span class="land-current-slide font-medium">1</span> / <span
                    class="land-total-slides font-medium">6</span>
            </div>
        </div>

        <style>
            .land-pagination .swiper-pagination-bullet {
                @apply bg-gray-900 w-3 h-3 rounded-full transition-all duration-300;
            }

            .land-pagination .swiper-pagination-bullet-active {
                @apply bg-green-600 w-5;
            }
        </style>

    </div>
</section>


<script>
    const landSwiper = new Swiper('.land-multiple-slide-carousel', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.land-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.land-next-btn',
            prevEl: '.land-prev-btn',
        },
        on: {
            init: function() {
                const totalSlides = this.slides.length - this.loopedSlides *
                2; // exclude duplicated slides from loop mode
                document.querySelector('.land-total-slides').textContent = totalSlides;
                document.querySelector('.land-current-slide').textContent = this.realIndex + 1;
            },
            slideChange: function() {
                document.querySelector('.land-current-slide').textContent = this.realIndex + 1;
            },
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            },
        },
    });
</script>
<!-- Share Modal -->
<div id="shareModal" class="hidden fixed inset-0 z-50 flex items-center justify-center modal-overlay">
    <div class="bg-white rounded-xl p-6 modal-content">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Share Property</h3>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="flex space-x-4 mb-4">
            <button class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fab fa-facebook-f mr-2"></i> Facebook
            </button>
            <button class="flex-1 bg-blue-400 text-white py-2 rounded-lg hover:bg-blue-500 transition">
                <i class="fab fa-twitter mr-2"></i> Twitter
            </button>
        </div>
        <div class="flex">
            <input type="text" id="shareLink" value="https://example.com/property/123"
                class="flex-1 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button id="copyLink"
                class="bg-gray-800 text-white px-4 py-2 rounded-r-lg hover:bg-gray-900 transition">
                Copy
            </button>
        </div>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize main carousels
        const carousels = [{
                selector: '.multiple-slide-carousel',
                prevBtn: '.custom-prev-btn',
                nextBtn: '.custom-next-btn',
                pagination: '.custom-pagination',
                currentSlide: '.current-slide',
                totalSlides: '.total-slides'
            },
            {
                selector: '.villa-multiple-slide-carousel',
                prevBtn: '.villa-prev-btn',
                nextBtn: '.villa-next-btn',
                pagination: '.villa-pagination',
                currentSlide: '.villa-current-slide',
                totalSlides: '.villa-total-slides'
            },
            {
                selector: '.land-multiple-slide-carousel',
                prevBtn: '.land-prev-btn',
                nextBtn: '.land-next-btn',
                pagination: '.land-pagination',
                currentSlide: '.land-current-slide',
                totalSlides: '.land-total-slides'
            }
        ];

        carousels.forEach(config => {
            const swiper = new Swiper(config.selector, {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                centeredSlides: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: config.nextBtn,
                    prevEl: config.prevBtn,
                },
                pagination: {
                    el: config.pagination,
                    clickable: true,
                    renderBullet: function(index, className) {
                        return '<span class="' + className +
                            ' custom-pagination-bullet"></span>';
                    },
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1.5,
                        centeredSlides: true,
                    },
                    768: {
                        slidesPerView: 2,
                        centeredSlides: false,
                    },
                    1024: {
                        slidesPerView: 3,
                        centeredSlides: false,
                    },
                    1280: {
                        slidesPerView: 3,
                        centeredSlides: false,
                        spaceBetween: 30,
                    }
                },
                on: {
                    init: function() {
                        updateSlideCounter(this, config.currentSlide, config.totalSlides);
                    },
                    slideChange: function() {
                        updateSlideCounter(this, config.currentSlide, config.totalSlides);
                    }
                }
            });
        });

        // Update slide counter
        function updateSlideCounter(swiper, currentSlideSelector, totalSlidesSelector) {
            const currentSlide = document.querySelector(currentSlideSelector);
            const totalSlides = document.querySelector(totalSlidesSelector);

            if (currentSlide && totalSlides) {
                currentSlide.textContent = swiper.realIndex + 1;
                totalSlides.textContent = swiper.slides.length - (swiper.params.loop ? 2 : 0);
            }
        }

        // Initialize inner image sliders
        const innerSliders = document.querySelectorAll('.inner-swiper');
        innerSliders.forEach(slider => {
            new Swiper(slider, {
                navigation: {
                    nextEl: slider.querySelector('.swiper-button-next'),
                    prevEl: slider.querySelector('.swiper-button-prev'),
                },
                loop: true,
            });
        });

        // Favorite button functionality
        const favoriteButtons = document.querySelectorAll('.favorite-btn');
        favoriteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas', 'text-red-500');
                } else {
                    icon.classList.remove('fas', 'text-red-500');
                    icon.classList.add('far');
                }
            });
        });

        // Share modal functionality
        const shareButtons = document.querySelectorAll('.share-btn');
        const shareModal = document.getElementById('shareModal');
        const closeModal = document.getElementById('closeModal');
        const copyLink = document.getElementById('copyLink');
        const shareLink = document.getElementById('shareLink');

        shareButtons.forEach(button => {
            button.addEventListener('click', function() {
                shareModal.classList.remove('hidden');
            });
        });

        closeModal.addEventListener('click', function() {
            shareModal.classList.add('hidden');
        });

        copyLink.addEventListener('click', function() {
            shareLink.select();
            document.execCommand('copy');
            copyLink.textContent = 'Copied!';
            setTimeout(() => {
                copyLink.textContent = 'Copy';
            }, 2000);
        });

        // Close modal when clicking outside
        shareModal.addEventListener('click', function(e) {
            if (e.target === shareModal) {
                shareModal.classList.add('hidden');
            }
        });

        // Add keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                // Navigate to previous slide in active carousel
                // Implementation would depend on tracking active carousel
            } else if (e.key === 'ArrowRight') {
                // Navigate to next slide in active carousel
            }
        });
    });
</script>
