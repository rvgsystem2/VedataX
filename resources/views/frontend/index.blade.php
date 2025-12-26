
@extends('component.main')
@section('content')
    <!-- Hero Section -->
    <style>
        /* Custom scrollbar for aesthetic consistency */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        /* General style for the custom input wrappers */
        .custom-select-wrapper {
            position: relative;
            user-select: none;
        }

        /* Style for the visible, clickable dropdown header */
        .custom-select-header {
            background-color: #e1e1e11f;

            border: 2px solid #fffbfb;
            color: #f6f6f6;
            font-size: 0.875rem;
            /* text-sm */
            padding: 1rem 1rem;
            /* py-4 px-4 */
            border-radius: 1rem;
            /* rounded-2xl */
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.2s;
        }

        .custom-select-header:hover {
            background-color: #b6b8bc;
            /* Slightly darker on hover */
        }

        .custom-select-header.icon-padded {
            padding-left: 3rem;
            /* Extra padding for icon */
        }

        /* Style for the hidden dropdown options list */
        .custom-select-options {
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 0.5rem;
            width: 100%;
            background-color: #ffffff;
            /* Options list is white with black text */
            color: #000000;
            border-radius: 1rem;
            /* rounded-2xl */
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            max-height: 300px;
            overflow-y: auto;
            z-index: 50;
            transition: all 0.2s;
            transform-origin: top;
        }

        .custom-option {
            padding: 0.75rem 1rem;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.1s;
        }

        .custom-option:hover {
            background-color: #e5e7eb;
            /* Light gray hover */
        }

        .custom-option.selected {
            background-color: #000000;
            color: #ffffff;
        }
    </style>

    <section class="relative h-screen w-full ">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gray-200 animate-pulse"></div>

            <img src="{{$homePageMedia && $homePageMedia->hero_bg ? asset('storage/'. $homePageMedia->hero_bg) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'}}"
                 alt="Luxury beach property in Thailand with pristine waters and modern architecture"
                 class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 opacity-0" loading="eager"
                 onload="this.style.opacity='1'" />
            <!-- Gradient Overlay -->

            <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-black/50"></div>
        </div>

        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4 sm:px-6 lg:px-8">
            <h1
                class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-4 md:mb-6 leading-tight tracking-tight">
                {{ __('index.hero_title') }}
            </h1>
            <p class="text-xl md:text-2xl lg:text-3xl text-white/90 mb-8 md:mb-12 max-w-3xl leading-relaxed font-light">
                {{ __('index.hero_subtitle') }}
            </p>


            <div class="w-full max-w-6xl">
                <div
                    class="bg-white/10 backdrop-blur-sm border border-white/50 rounded-3xl p-6 md:p-8 shadow-2xl transition-all duration-500 hover:shadow-white/20">
                    <form action="{{ route('property') }}" method="GET"
                          class="flex flex-col lg:flex-row gap-4 items-stretch lg:items-center">

                        <div class="flex flex-col lg:flex-row gap-4 flex-1">

                            {{-- LOCATION --}}
                            <div class="flex-1 relative">
                                <div class="custom-select-wrapper" data-dropdown-id="location" data-target="city">
                                    <!-- Left Icon -->
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-[10]">
                                        <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>

                                    <!-- Header -->
                                    <div class="custom-select-header icon-padded" data-value="">
                                        <span class="custom-select-label">{{ __('index.location') }}</span>
                                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <!-- Options -->
                                    <div class="custom-select-options hidden z-[9999]">
                                        @foreach ($cities as $city)
                                            <div class="custom-option" data-value="{{ $city->name }}">
                                                {{ $city->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <input type="hidden" name="city" value="">
                            </div>

                            {{-- PROPERTY TYPE --}}
                            <div class="flex-1 relative">
                                <div class="custom-select-wrapper" data-dropdown-id="property-type"
                                     data-target="property_type_id">
                                    <!-- Left Icon -->
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-[10]">
                                        <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </div>

                                    <!-- Header -->
                                    <div class="custom-select-header icon-padded" data-value="">
                                        <span class="custom-select-label">{{ __('index.property_type') }}</span>
                                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <!-- Options -->
                                    <div class="custom-select-options hidden z-[9999]">
                                        @foreach ($propertyTypes as $type)
                                            <div class="custom-option" data-value="{{ $type->id }}">
                                                {{ $type->title }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <input type="hidden" name="property_type_id" value="">
                            </div>

                            {{-- MIN PRICE --}}
                            <div class="flex-1 relative">
                                <div class="custom-select-wrapper" data-dropdown-id="min-price" data-target="min_price">
                                    <div class="custom-select-header icon-padded" data-value="">
                                        <span class="custom-select-label">{{ __('index.min_price') }}</span>
                                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <div class="custom-select-options hidden z-[9999]">
                                        <div class="custom-option" data-value="">{{ __('index.min_price') }}</div>

                                        @foreach($minPrices as $price)
                                            <div class="custom-option" data-value="{{ $price->value }}">
                                                {{ $price->label }}
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <input type="hidden" name="min_price" value="">
                            </div>

                            {{-- MAX PRICE --}}
                            <div class="flex-1 relative">
                                <div class="custom-select-wrapper" data-dropdown-id="max-price" data-target="max_price">
                                    <div class="custom-select-header icon-padded" data-value="">
                                        <span class="custom-select-label">{{ __('index.max_price') }}</span>
                                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <div class="custom-select-options hidden z-[9999]">
                                        <div class="custom-option" data-value="">{{ __('index.max_price') }}</div>

                                        @foreach($maxPrices as $price)
                                            <div class="custom-option" data-value="{{ $price->value }}">
                                                {{ $price->label }}
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <input type="hidden" name="max_price" value="">
                            </div>

                            {{-- BED & BATH --}}
                            <div class="flex-1 relative">
                                <button type="button" id="bb-toggle"
                                        class="custom-select-header w-full text-sm rounded-2xl px-4 py-4 flex items-center justify-between">
                                    <span class="font-medium">{{ __('index.bed_bath') }}</span>
                                    <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div id="bb-dropdown"
                                     class="absolute left-0 mt-2 w-full sm:w-80 bg-white text-black rounded-2xl shadow-2xl p-6 hidden z-[9999] opacity-0 scale-95 transition-all duration-200 origin-top">
                                    <div class="flex flex-col gap-6">

                                        <!-- Bedrooms -->
                                        <div>
                                            <p class="uppercase text-xs font-semibold mb-3 tracking-wide">{{ __('index.bedrooms') }}</p>
                                            <div class="flex gap-2 flex-wrap">
                                                <button type="button"
                                                        class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white"
                                                        data-value="any">{{ __('index.any') }}</button>
                                                <button type="button"
                                                        class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium"
                                                        data-value="1">1+</button>
                                                <button type="button"
                                                        class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium"
                                                        data-value="2">2+</button>
                                                <button type="button"
                                                        class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium"
                                                        data-value="3">3+</button>
                                            </div>
                                        </div>

                                        <!-- Bathrooms -->
                                        <div>
                                            <p class="uppercase text-xs font-semibold mb-3 tracking-wide">{{ __('index.bathrooms') }}</p>
                                            <div class="flex gap-2 flex-wrap">
                                                <button type="button"
                                                        class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white"
                                                        data-value="any">{{ __('index.any') }}</button>
                                                <button type="button"
                                                        class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium"
                                                        data-value="1">1+</button>
                                                <button type="button"
                                                        class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium"
                                                        data-value="2">2+</button>
                                                <button type="button"
                                                        class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium"
                                                        data-value="3">3+</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Hidden fields --}}
                        <input type="hidden" name="bedrooms" id="bedrooms" value="any">
                        <input type="hidden" name="bathrooms" id="bathrooms" value="any">

                        {{-- SEARCH BUTTON --}}
                        <button type="submit"
                                class="bg-white hover:bg-gray-200 text-black px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-white/20 transition-all duration-300 flex items-center justify-center gap-2 min-w-[140px] mt-4 lg:mt-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            {{ __('index.search') }}
                        </button>

                    </form>


                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ----- Generic custom select -----
            const wrappers = document.querySelectorAll('.custom-select-wrapper[data-target]');

            wrappers.forEach(wrapper => {
                const header = wrapper.querySelector('.custom-select-header');
                const optionsBox = wrapper.querySelector('.custom-select-options');
                const labelEl = wrapper.querySelector('.custom-select-label');
                const targetName = wrapper.dataset.target;
                const hiddenInput = document.querySelector('input[name="' + targetName + '"]');

                if (!header || !optionsBox || !hiddenInput) return;

                // open / close dropdown
                header.addEventListener('click', function(e) {
                    e.stopPropagation();
                    optionsBox.classList.toggle('hidden');
                });

                // option click
                optionsBox.querySelectorAll('.custom-option').forEach(opt => {
                    opt.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const value = this.dataset.value ?? this.textContent.trim();
                        const text = this.textContent.trim();

                        // label + data-value update
                        if (labelEl) labelEl.textContent = text;
                        header.setAttribute('data-value', value);

                        // hidden input set
                        hiddenInput.value = value;

                        // selected class
                        optionsBox.querySelectorAll('.custom-option').forEach(o => o
                            .classList.remove('selected'));
                        this.classList.add('selected');

                        optionsBox.classList.add('hidden');
                    });
                });
            });

            // close all on outside click
            document.addEventListener('click', function() {
                document.querySelectorAll('.custom-select-options').forEach(box => box.classList.add(
                    'hidden'));
            });

            // ----- Bed & Bath -----
            const bbToggle = document.getElementById('bb-toggle');
            const bbDropdown = document.getElementById('bb-dropdown');
            const bedInput = document.getElementById('bedrooms');
            const bathInput = document.getElementById('bathrooms');

            if (bbToggle && bbDropdown) {
                bbToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isHidden = bbDropdown.classList.contains('hidden');
                    bbDropdown.classList.toggle('hidden', !isHidden);
                    bbDropdown.classList.toggle('opacity-0', !isHidden);
                    bbDropdown.classList.toggle('scale-95', !isHidden);
                });

                document.querySelectorAll('.bb-bed').forEach(btn => {
                    btn.addEventListener('click', function() {
                        document.querySelectorAll('.bb-bed').forEach(b => b.classList.remove(
                            'bg-black', 'text-white'));
                        this.classList.add('bg-black', 'text-white');
                        if (bedInput) bedInput.value = this.dataset.value;
                    });
                });

                document.querySelectorAll('.bb-bath').forEach(btn => {
                    btn.addEventListener('click', function() {
                        document.querySelectorAll('.bb-bath').forEach(b => b.classList.remove(
                            'bg-black', 'text-white'));
                        this.classList.add('bg-black', 'text-white');
                        if (bathInput) bathInput.value = this.dataset.value;
                    });
                });

                // outside click to close
                document.addEventListener('click', function() {
                    bbDropdown.classList.add('hidden', 'opacity-0', 'scale-95');
                });
            }
        });
    </script>

    @include('frontend.slider')

    <section class="bg-white">
        <!-- Container -->
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-8">

            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <p class="text-sm uppercase text-gray-500 tracking-widest mb-2">{{ __('index.exclusive_locations') }}</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                    {{ __('index.discover_title') }}
                </h2>
                <p class="text-gray-600 uppercase tracking-wider text-xs md:text-sm">
                    {{ __('index.discover_desc') }}
                </p>
            </div>

            <!-- Properties grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 -mb-20">
                <!-- Property Card 1 -->
                <div class="relative group rounded-lg overflow-hidden shadow-lg cursor-pointer">
                    <img src="{{$homePageMedia && $homePageMedia->location_1 ? asset('storage/'. $homePageMedia->location_1) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80'}}"
                         alt="Bophut"
                         class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-4 left-4 text-white">

                        <h3 class="text-lg font-semibold mt-1">Bophut</h3>
                        <button class="mt-2 text-xs underline hover:text-green-500 flex items-center space-x-1">
                            <span>{{ __('index.more_details') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Property Card 2 -->
                <div class="relative group rounded-lg overflow-hidden shadow-lg cursor-pointer">
                    <img src="{{$homePageMedia && $homePageMedia->location_2 ? asset('storage/'. $homePageMedia->location_2) : 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=400&q=80'}}"
                         alt="Chaweng"
                         class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-4 left-4 text-white">

                        <h3 class="text-lg font-semibold mt-1">Chaweng</h3>
                        <button class="mt-2 text-xs underline hover:text-green-500 flex items-center space-x-1">
                            <span>{{ __('index.more_details') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Property Card 3 -->
                <div class="relative group rounded-lg overflow-hidden shadow-lg cursor-pointer">
                    <img src="{{$homePageMedia && $homePageMedia->location_3 ? asset('storage/'. $homePageMedia->location_3) : 'https://images.unsplash.com/photo-1472220625704-91e1462799b2?auto=format&fit=crop&w=400&q=80'}}"
                         alt="Bang Por"
                         class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-4 left-4 text-white">

                        <h3 class="text-lg font-semibold mt-1">Bang Por</h3>
                        <button class="mt-2 text-xs underline hover:text-green-500 flex items-center space-x-1">
                            <span>{{ __('index.more_details') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Property Card 4 -->
                <div class="relative group rounded-lg overflow-hidden shadow-lg cursor-pointer">
                    <img src="{{$homePageMedia && $homePageMedia->location_4 ? asset('storage/'. $homePageMedia->location_4) : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=400&q=80'}}"
                         alt="Maenam"
                         class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-4 left-4 text-white">

                        <h3 class="text-lg font-semibold mt-1">Maenam</h3>
                        <button class="mt-2 text-xs underline hover:text-green-500 flex items-center space-x-1">
                            <span>{{ __('index.more_details') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-white rounded-2xl  md:p-10 md:p-16 text-center text-white max-w-7xl mx-auto mt-16">
                <h3 class="text-2xl text-black md:text-4xl font-extrabold mb-8 leading-tight md:pt-0 pt-12 ">
                    {{ __('index.cta_title') }}
                </h3>
                <p
                    class="text-black uppercase tracking-widest md:mb-12 max-w-3xl mx-auto text-sm md:text-base leading-relaxed">
                    {{ __('index.cta_desc') }}
                </p>

                <!-- Features -->
                <div class="flex flex-col md:flex-row justify-between gap-12 md:mb-12 px-4 md:px-0">
                    <!-- Feature -->
                    <div class="flex flex-col items-center text-center max-w-xs mx-auto md:space-y-4">
                        <i class="fas fa-user-cog text-white text-3xl"></i>

                        <h4 class="font-bold text-lg text-black">{{ __('index.feature_1_title') }}</h4>
                        <p class="text-black text-sm md:text-base leading-relaxed text-black">
                            {{ __('index.feature_1_desc') }}
                        </p>
                    </div>

                    <div class="flex flex-col items-center text-center max-w-xs mx-auto md:space-y-4">
                        <i class="fas fa-clipboard-check text-white text-3xl"></i>

                        <h4 class="font-bold text-lg text-black">{{ __('index.feature_2_title') }}</h4>
                        <p class="text-black text-sm md:text-base leading-relaxed text-black">
                            {{ __('index.feature_2_desc') }}
                        </p>
                    </div>

                    <div class="flex flex-col items-center text-center max-w-xs mx-auto md:space-y-4">
                        <i class="fas fa-hands-helping text-white text-3xl"></i>
                        <h4 class="font-bold text-lg text-black">{{ __('index.feature_3_title') }}</h4>

                        <p class="text-black text-sm md:text-base leading-relaxed">
                            {{ __('index.feature_3_desc') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-8 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto px-4">
            <div class="overflow-hidden rounded-3xl shadow-lg">
                <img src="{{$homePageMedia && $homePageMedia->about_image ? asset('storage/'. $homePageMedia->about_image) : 'https://cdn.pixabay.com/photo/2019/07/14/10/48/river-4336788_1280.jpg'}}"
                     alt="Beautiful property in Thailand" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col justify-center">
                <h1 class="font-bold text-4xl py-4 text-gray-800 font-spartan">{{ __('index.about_title') }}</h1>
                <p class="text-gray-600 text-base leading-relaxed font-spartan">
                    {{ __('index.about_desc') }}
                </p>

            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="relative h-96 w-full mt-4">
        <!-- Background Image -->
        <img src="{{$homePageMedia && $homePageMedia->final_cat_bg ? asset('storage/'. $homePageMedia->final_cat_bg) : 'https://cdn.pixabay.com/photo/2020/06/23/00/53/river-5330961_1280.jpg'}}"
             alt="Beautiful property landscape" class="absolute inset-0 w-full h-full object-cover">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Centered Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6 text-white font-spartan">
                {{ __('index.final_cta_title') }}
            </h1>
            <div class="flex flex-col  gap-4 justify-center">

                <button
                    class="bg-transparent border-2 border-white text-white hover:bg-white/10 px-8 py-3 rounded-lg font-semibold transition-colors font-spartan">
                    {{ __('index.final_cta_btn') }}
                </button>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all property card sliders
            const propertyCards = document.querySelectorAll('.property-card');

            propertyCards.forEach((card, cardIndex) => {
                const slidesContainer = card.querySelector('.slides-container');
                const slides = card.querySelectorAll('.slide');
                const indicators = card.querySelectorAll('.indicator');
                const prevBtn = card.querySelector('.prevBtn');
                const nextBtn = card.querySelector('.nextBtn');

                let currentSlide = 1; // Start at the first real slide (not clone)
                const totalRealSlides = slides.length - 2; // Excluding clones
                const totalSlides = slides.length;

                // Set initial position to first real slide
                slidesContainer.style.transform = `translateX(-${100 / totalSlides}%)`;

                // Initialize indicators
                updateIndicators();

                // Function to update slider position
                function updateSlider() {
                    slidesContainer.style.transform = `translateX(-${currentSlide * (100 / totalSlides)}%)`;
                    updateIndicators();
                }

                // Function to update indicators
                function updateIndicators() {
                    indicators.forEach((indicator, index) => {
                        // Map currentSlide to indicator index (accounting for clones)
                        let indicatorIndex = currentSlide - 1;
                        if (indicatorIndex < 0) indicatorIndex = totalRealSlides - 1;
                        if (indicatorIndex >= totalRealSlides) indicatorIndex = 0;

                        if (index === indicatorIndex) {
                            indicator.classList.add('active');
                            indicator.classList.remove('bg-white/70');
                            indicator.classList.add('bg-white');
                        } else {
                            indicator.classList.remove('active');
                            indicator.classList.add('bg-white/70');
                            indicator.classList.remove('bg-white');
                        }
                    });
                }

                // Next slide
                nextBtn.addEventListener('click', function() {
                    currentSlide++;
                    updateSlider();

                    // If we're at the last clone, jump to the first real slide
                    if (currentSlide === totalSlides - 1) {
                        setTimeout(() => {
                            currentSlide = 1;
                            slidesContainer.style.transition = 'none';
                            updateSlider();
                            setTimeout(() => {
                                slidesContainer.style.transition =
                                    'transform 0.5s ease-in-out';
                            }, 50);
                        }, 500);
                    }
                });

                // Previous slide
                prevBtn.addEventListener('click', function() {
                    currentSlide--;
                    updateSlider();

                    // If we're at the first clone, jump to the last real slide
                    if (currentSlide === 0) {
                        setTimeout(() => {
                            currentSlide = totalSlides - 2;
                            slidesContainer.style.transition = 'none';
                            updateSlider();
                            setTimeout(() => {
                                slidesContainer.style.transition =
                                    'transform 0.5s ease-in-out';
                            }, 50);
                        }, 500);
                    }
                });

                // Auto slide every 5 seconds
                let slideInterval = setInterval(function() {
                    currentSlide++;
                    updateSlider();

                    // If we're at the last clone, jump to the first real slide
                    if (currentSlide === totalSlides - 1) {
                        setTimeout(() => {
                            currentSlide = 1;
                            slidesContainer.style.transition = 'none';
                            updateSlider();
                            setTimeout(() => {
                                slidesContainer.style.transition =
                                    'transform 0.5s ease-in-out';
                            }, 50);
                        }, 500);
                    }
                }, 6000);

                // Pause auto-slide on hover
                card.addEventListener('mouseenter', function() {
                    clearInterval(slideInterval);
                });

                card.addEventListener('mouseleave', function() {
                    slideInterval = setInterval(function() {
                        currentSlide++;
                        updateSlider();

                        // If we're at the last clone, jump to the first real slide
                        if (currentSlide === totalSlides - 1) {
                            setTimeout(() => {
                                currentSlide = 1;
                                slidesContainer.style.transition = 'none';
                                updateSlider();
                                setTimeout(() => {
                                    slidesContainer.style.transition =
                                        'transform 0.5s ease-in-out';
                                }, 50);
                            }, 500);
                        }
                    }, 5000);
                });

                // Click on indicators to navigate
                indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', function() {
                        currentSlide = index + 1; // +1 to account for first clone
                        updateSlider();
                    });
                });
            });

            // Outer slider functionality
            const outerSlidesContainer = document.querySelector('.outer-slides-container');
            const outerSlides = document.querySelectorAll('.outer-slide');
            const outerIndicators = document.querySelectorAll('.outer-indicator');
            const outerPrevBtn = document.getElementById('outer-prev-btn');
            const outerNextBtn = document.getElementById('outer-next-btn');

            let currentOuterSlide = 0;
            const totalOuterSlides = outerSlides.length;

            // Function to update outer slider
            function updateOuterSlider() {
                outerSlidesContainer.style.transform = `translateX(-${currentOuterSlide * 100}%)`;

                // Update indicators
                outerIndicators.forEach((indicator, index) => {
                    if (index === currentOuterSlide) {
                        indicator.classList.add('active');
                        indicator.classList.remove('bg-gray-300');
                        indicator.classList.add('bg-blue-500');
                    } else {
                        indicator.classList.remove('active');
                        indicator.classList.add('bg-gray-300');
                        indicator.classList.remove('bg-blue-500');
                    }
                });
            }

            // Next outer slide
            outerNextBtn.addEventListener('click', function() {
                currentOuterSlide = (currentOuterSlide + 1) % totalOuterSlides;
                updateOuterSlider();
            });

            // Previous outer slide
            outerPrevBtn.addEventListener('click', function() {
                currentOuterSlide = (currentOuterSlide - 1 + totalOuterSlides) % totalOuterSlides;
                updateOuterSlider();
            });

            // Click on outer indicators to navigate
            outerIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function() {
                    currentOuterSlide = index;
                    updateOuterSlider();
                });
            });

            // Initialize the outer slider
            updateOuterSlider();
        });
    </script>
@endsection
