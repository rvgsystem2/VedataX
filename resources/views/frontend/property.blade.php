
@extends('component.main')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @include('frontend.villa')

    <style>
        .swiper-button-next,
        .swiper-button-prev {
            color: white;
            background: rgba(0, 0, 0, 0.5);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 16px;
            font-weight: bold;
        }
        .property-card{
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .favorite-btn.active i {
            color: #ef4444;
        }
    </style>




 <!-- Main Content -->
<main class="container max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col gap-8">
          <!-- Property Grid -->
                <div class="container mx-auto md:px-4 py-8">
                    <h1 class="text-xl md:text-3xl font-bold text-gray-800 mb-8 text-center">Premium Properties</h1>

                    <div id="property-container" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <!-- Property Card 1 - White Lotus Beach Residence -->
                        @php
                            use Illuminate\Support\Str;
                        @endphp

                        @foreach($properties as $property)
                            @php
                                $cityName = optional($property->city)->name;

                                // Main image pick
                                $mainImage = $property->images
                                    ? $property->images->firstWhere('is_main', true) ?? $property->images->first()
                                    : null;

                                // Badge text (top-left)
                                $badgeText = strtoupper($property->type ?? 'property');   // RENT / SALE
                                if (!empty($property->best_deal) && $property->best_deal) {
                                    $badgeText = 'BEST DEAL';
                                }

                                // Card filters
                                $dataType     = $property->type;                          // rent / sale
                                $dataCategory = $property->best_deal ? 'luxury' : 'standard';

                                // Agent (agar relation agent ya user ho)
                                $agent = $property->listedBy ?? $property->user ?? null;
                                $agentName = $agent->name ?? 'Agent';
                                $initials = collect(explode(' ', $agentName))
                                                ->map(fn($p) => Str::substr($p, 0, 1))
                                                ->implode('');
                                $initials = Str::upper(Str::limit($initials, 2, ''));

                                $postedAgo = $property->created_at ? $property->created_at->diffForHumans() : '';
                            @endphp

                            <a href="{{ route('detail', $property->id) }}" class="block">
                                <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card"
                                     data-type="{{ $dataType }}"
                                     data-category="{{ $dataCategory }}">
                                    <div class="relative">
                                        {{-- Swiper for property images --}}
                                        <div class="swiper propertySwiper6 h-48">
                                            <div class="swiper-wrapper">
                                                @if($property->images && $property->images->count())
                                                    @foreach($property->images as $img)
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('storage/' . ($img->url ?? $img->path)) }}"
                                                                 class="w-full h-full object-cover"
                                                                 alt="{{ $property->title }}">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    {{-- Fallback image --}}
                                                    <div class="swiper-slide">
                                                        <img src="https://via.placeholder.com/800x600?text=No+Image"
                                                             class="w-full h-full object-cover"
                                                             alt="No image available">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>

                                        {{-- Badge (Top Left) --}}
                                        <div class="absolute top-3 left-3">
                                            <span class="bg-green-600 text-white text-xs font-medium px-2 py-1 rounded">
                                                {{ $badgeText }}
                                                @if($property->type === 'rent')
                                                    RENTAL
                                                @endif
                                            </span>
                                        </div>

                                        {{-- Favourite (Top Right) --}}
                                        <div class="absolute top-3 right-3">
                                            <button
                                                class="favorite-btn bg-white/90 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center transition">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </div>

                                        <!-- Price overlay -->
                                        <div
                                            class="absolute bottom-0 left-0 right-0 px-4 py-3 flex justify-between items-center bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">
                                            <!-- Price -->
                                            <span class="text-white font-semibold text-lg">
                                                {{ display_price($property->price) }}
                                                                        @if($property->type === 'rent')
                                                                            /month
                                                                        @endif
                                            </span>

                                            <!-- Icons -->
                                            <div class="flex space-x-3 text-white text-lg">
                                                <!-- Expand Icon -->
                                                <button class="hover:text-gray-300 transition" title="View details">
                                                    <i class="fas fa-expand"></i>
                                                </button>

                                                <!-- Heart Icon -->
                                                <button class="favorite-btn hover:text-red-400 transition" title="Add to favorites">
                                                    <i class="far fa-heart"></i>
                                                </button>

                                                <!-- Plus Icon (e.g. compare / shortlist) -->
                                                <button class="hover:text-gray-300 transition" title="Add to compare">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                {{-- Title --}}
                                                <h3 class="font-bold text-lg text-gray-800">
                                                    {{ Str::limit($property->title, 60) }}
                                                </h3>

                                                {{-- Location --}}
                                                <p class="text-gray-600 text-sm flex items-center mt-1">
                                                    <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                                    {{ $cityName ?: 'Thailand' }}
                                                </p>
                                            </div>
                                        </div>

                                        {{-- Beds / Baths / Area --}}
                                        <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">
                                            @if(!($property->propertyType->title== 'Land' || $property->propertyType->slug == 'land'))
                                                @if(!is_null($property->bedrooms))
                                                    <div class="flex items-center">
                                                        <i class="fas fa-bed text-gray-400 mr-1"></i>
                                                        <span>{{ $property->bedrooms }} Beds</span>
                                                    </div>
                                                @endif

                                                @if(!is_null($property->bathrooms))
                                                    <div class="flex items-center">
                                                        <i class="fas fa-bath text-gray-400 mr-1"></i>
                                                        <span>{{ $property->bathrooms }} Baths</span>
                                                    </div>
                                                @endif

                                            @endif

                                            @if(!is_null($property->area))
                                                <div class="flex items-center">
                                                    <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                                    <span>{{ rtrim(rtrim(number_format($property->area, 2, '.', ''), '0'), '.') }} SQM</span>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex justify-between items-center mt-4">
                                            <!-- Agent Info -->
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                                    @if($agent->profile_image)
                                                        <img src="{{asset('storage/'. $agent->profile_image)}}" alt="" class="rounded-2xl w-full h-full">
                                                    @else
                                                    {{ $initials }}
                                                    @endif
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-900">
                                                        {{ $agentName }}
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Share Button and Time -->
                                            <div class="flex items-center space-x-2">
                                                <!-- Share Icon -->
{{--                                                <button--}}
{{--                                                    class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">--}}
{{--                                                    <i class="fas fa-share-alt"></i>--}}
{{--                                                </button>--}}
                                                <!-- Time Posted -->
                                                @if($postedAgo)
                                                    <p class="text-xs text-gray-500">{{ $postedAgo }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <!-- Property Card 3 - Luxury Apartment -->

                        <!-- Property Card 4 - New Development -->

                    </div>
                </div>

                <!-- Pagination -->
{{--                <div class="flex justify-center mt-12">--}}
{{--                    <nav class="flex items-center space-x-1">--}}
{{--                        <button class="px-2 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">--}}
{{--                            <i class="fas fa-chevron-left text-xs"></i>--}}
{{--                        </button>--}}
{{--                        <button class="px-3 py-1 rounded bg-black text-white text-sm">1</button>--}}
{{--                        <button class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm">2</button>--}}
{{--                        <button class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm">3</button>--}}
{{--                        <button class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm">4</button>--}}
{{--                        <button class="px-2 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">--}}
{{--                            <i class="fas fa-chevron-right text-xs"></i>--}}
{{--                        </button>--}}
{{--                    </nav>--}}
{{--                </div>--}}


        @if ($properties->hasPages())
            <div class="flex justify-center mt-12">
                <nav class="flex items-center space-x-1">

                    {{-- Previous Button --}}
                    @if ($properties->onFirstPage())
                        <button
                            class="px-2 py-1 rounded border border-gray-300 bg-white text-gray-400 cursor-not-allowed transition-colors"
                            disabled
                        >
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                    @else
                        <a
                            href="{{ $properties->previousPageUrl() }}"
                            class="px-2 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors"
                        >
                            <i class="fas fa-chevron-left text-xs"></i>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @for ($page = 1; $page <= $properties->lastPage(); $page++)
                        @if ($page == $properties->currentPage())
                            {{-- Active page --}}
                            <span
                                class="px-3 py-1 rounded bg-black text-white text-sm"
                            >
                        {{ $page }}
                    </span>
                        @else
                            <a
                                href="{{ $properties->url($page) }}"
                                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm"
                            >
                                {{ $page }}
                            </a>
                        @endif
                    @endfor

                    {{-- Next Button --}}
                    @if ($properties->hasMorePages())
                        <a
                            href="{{ $properties->nextPageUrl() }}"
                            class="px-2 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors"
                        >
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    @else
                        <button
                            class="px-2 py-1 rounded border border-gray-300 bg-white text-gray-400 cursor-not-allowed transition-colors"
                            disabled
                        >
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    @endif

                </nav>
            </div>
        @endif


        <script>
                    // Initialize Swiper for each property card
                    document.addEventListener('DOMContentLoaded', function() {
                        // Initialize all property swipers
                        for (let i = 1; i <= 6; i++) {
                            new Swiper(`.propertySwiper${i}`, {
                                navigation: {
                                    nextEl: `.propertySwiper${i} .swiper-button-next`,
                                    prevEl: `.propertySwiper${i} .swiper-button-prev`,
                                },
                                loop: true,
                            });
                        }

                        // Favorite button functionality
                        document.querySelectorAll('.favorite-btn').forEach(button => {
                            button.addEventListener('click', function() {
                                const icon = this.querySelector('i');
                                if (icon.classList.contains('far')) {
                                    icon.classList.remove('far');
                                    icon.classList.add('fas');
                                    this.classList.add('active');
                                } else {
                                    icon.classList.remove('fas');
                                    icon.classList.add('far');
                                    this.classList.remove('active');
                                }
                            });
                        });

                        // Share button functionality
                        document.querySelectorAll('.share-btn').forEach(button => {
                            button.addEventListener('click', function() {
                                // In a real app, this would open a share dialog
                                alert('Share property functionality would go here');
                            });
                        });
                    });
                </script>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {

    /* -------------------------------
       Initialize ALL Swiper sliders
    -------------------------------- */
    document.querySelectorAll('[class*="propertySwiper"]').forEach(swiper => {
        new Swiper(`.${swiper.classList[0]}`, {
            navigation: {
                nextEl: `.${swiper.classList[0]} .swiper-button-next`,
                prevEl: `.${swiper.classList[0]} .swiper-button-prev`
            },
            loop: true
        });
    });

    /* -------------------------------
       Favorite Button (heart)
    -------------------------------- */
    document.querySelectorAll(".favorite-btn").forEach(button => {
        button.addEventListener("click", () => {
            const icon = button.querySelector("i");
            icon.classList.toggle("far");
            icon.classList.toggle("fas");
            button.classList.toggle("active");
        });
    });

    /* -------------------------------
       Share Button
    -------------------------------- */
    document.querySelectorAll(".share-btn").forEach(button => {
        button.addEventListener("click", () => {
            alert("Share property functionality goes here.");
        });
    });

});
</script>

@endsection
