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

            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                alt="Luxury beach property in Thailand with pristine waters and modern architecture"
                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 opacity-0" loading="eager"
                onload="this.style.opacity='1'" />
            <!-- Gradient Overlay -->

            <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-black/50"></div>
        </div>

        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4 sm:px-6 lg:px-8">
            <h1
                class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-4 md:mb-6 leading-tight tracking-tight">
                VEDATA PROPERTIES
            </h1>
            <p class="text-xl md:text-2xl lg:text-3xl text-white/90 mb-8 md:mb-12 max-w-3xl leading-relaxed font-light">
                Premium Properties in Thailand's Most Desirable Locations
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
                                        <span class="custom-select-label">Location</span>
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
                                        <span class="custom-select-label">Property Type</span>
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
                                        <span class="custom-select-label">Min</span>
                                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <div class="custom-select-options hidden z-[9999]">
                                        <div class="custom-option" data-value="">Min</div>
                                        <div class="custom-option" data-value="1000000">฿1,000,000</div>
                                        <div class="custom-option" data-value="3000000">฿3,000,000</div>
                                    </div>
                                </div>
                                <input type="hidden" name="min_price" value="">
                            </div>

                            {{-- MAX PRICE --}}
                            <div class="flex-1 relative">
                                <div class="custom-select-wrapper" data-dropdown-id="max-price" data-target="max_price">
                                    <div class="custom-select-header icon-padded" data-value="">
                                        <span class="custom-select-label">Max</span>
                                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <div class="custom-select-options hidden z-[9999]">
                                        <div class="custom-option" data-value="">Max</div>
                                        <div class="custom-option" data-value="10000000">฿10,000,000</div>
                                        <div class="custom-option" data-value="20000000">฿20,000,000</div>
                                    </div>
                                </div>
                                <input type="hidden" name="max_price" value="">
                            </div>

                            {{-- BED & BATH --}}
                            <div class="flex-1 relative">
                                <button type="button" id="bb-toggle"
                                    class="custom-select-header w-full text-sm rounded-2xl px-4 py-4 flex items-center justify-between">
                                    <span class="font-medium">Bed & Bath</span>
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
                                            <p class="uppercase text-xs font-semibold mb-3 tracking-wide">Bedrooms</p>
                                            <div class="flex gap-2 flex-wrap">
                                                <button type="button"
                                                    class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white"
                                                    data-value="any">Any</button>
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
                                            <p class="uppercase text-xs font-semibold mb-3 tracking-wide">Bathrooms</p>
                                            <div class="flex gap-2 flex-wrap">
                                                <button type="button"
                                                    class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white"
                                                    data-value="any">Any</button>
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
                            Search
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


    {{--    <script> --}}
    {{--        // --- Custom Dropdown Logic (Replacing <select>) --- --}}
    {{--        document.querySelectorAll('.custom-select-wrapper').forEach(wrapper => { --}}
    {{--            const header = wrapper.querySelector('.custom-select-header'); --}}
    {{--            const optionsContainer = wrapper.querySelector('.custom-select-options'); --}}
    {{--            const options = wrapper.querySelectorAll('.custom-option'); --}}

    {{--            // Toggle dropdown visibility --}}
    {{--            header.addEventListener('click', () => { --}}
    {{--                // Close any other open dropdowns first --}}
    {{--                document.querySelectorAll('.custom-select-options').forEach(container => { --}}
    {{--                    if (container !== optionsContainer) { --}}
    {{--                        container.classList.add('hidden'); --}}
    {{--                    } --}}
    {{--                }); --}}
    {{--                document.getElementById('bb-dropdown').classList.add('hidden', 'opacity-0', --}}
    {{--                    'scale-95'); // Also close Bed/Bath --}}

    {{--                optionsContainer.classList.toggle('hidden'); --}}
    {{--            }); --}}

    {{--            // Handle option selection --}}
    {{--            options.forEach(option => { --}}
    {{--                option.addEventListener('click', () => { --}}
    {{--                    const value = option.getAttribute('data-value'); --}}
    {{--                    const label = option.textContent.trim(); --}}

    {{--                    // Update header display and value --}}
    {{--                    header.querySelector('.custom-select-label').textContent = label; --}}
    {{--                    header.setAttribute('data-value', value); --}}

    {{--                    // Update selection highlight --}}
    {{--                    options.forEach(opt => opt.classList.remove('selected')); --}}
    {{--                    option.classList.add('selected'); --}}

    {{--                    // Close dropdown --}}
    {{--                    optionsContainer.classList.add('hidden'); --}}
    {{--                }); --}}
    {{--            }); --}}
    {{--        }); --}}


    {{--        // --- Bed & Bath dropdown toggle (Original Logic) --- --}}
    {{--        const bbToggle = document.getElementById('bb-toggle'); --}}
    {{--        const bbDropdown = document.getElementById('bb-dropdown'); --}}

    {{--        bbToggle.addEventListener('click', () => { --}}
    {{--            // Close any other open dropdowns first --}}
    {{--            document.querySelectorAll('.custom-select-options').forEach(container => { --}}
    {{--                container.classList.add('hidden'); --}}
    {{--            }); --}}

    {{--            // Toggle Bed & Bath visibility --}}
    {{--            const isHidden = bbDropdown.classList.contains('hidden'); --}}

    {{--            if (isHidden) { --}}
    {{--                bbDropdown.classList.remove('hidden'); --}}
    {{--                void bbDropdown.offsetWidth; --}}
    {{--                bbDropdown.classList.remove('opacity-0', 'scale-95'); --}}
    {{--            } else { --}}
    {{--                bbDropdown.classList.add('opacity-0', 'scale-95'); --}}
    {{--                setTimeout(() => { --}}
    {{--                    if (bbDropdown.classList.contains('opacity-0')) { --}}
    {{--                        bbDropdown.classList.add('hidden'); --}}
    {{--                    } --}}
    {{--                }, 200); --}}
    {{--            } --}}
    {{--        }); --}}

    {{--        // --- Close all dropdowns when clicking outside --- --}}
    {{--        document.addEventListener('click', (e) => { --}}
    {{--            // Check for custom dropdowns --}}
    {{--            if (!e.target.closest('.custom-select-wrapper')) { --}}
    {{--                document.querySelectorAll('.custom-select-options').forEach(container => { --}}
    {{--                    container.classList.add('hidden'); --}}
    {{--                }); --}}
    {{--            } --}}
    {{--            // Check for Bed & Bath dropdown --}}
    {{--            if (!bbDropdown.contains(e.target) && !bbToggle.contains(e.target)) { --}}
    {{--                bbDropdown.classList.add('hidden', 'opacity-0', 'scale-95'); --}}
    {{--            } --}}
    {{--        }); --}}

    {{--        // --- Bed/Bath button logic to simulate selection --- --}}
    {{--        function setupButtonSelection(selector) { --}}
    {{--            document.querySelectorAll(selector).forEach(button => { --}}
    {{--                button.addEventListener('click', () => { --}}
    {{--                    document.querySelectorAll(selector).forEach(btn => { --}}
    {{--                        // Remove selection style --}}
    {{--                        btn.classList.remove('bg-black', 'text-white'); --}}
    {{--                        btn.classList.add('hover:bg-black', 'hover:text-white'); --}}
    {{--                    }); --}}
    {{--                    // Apply selection style to the clicked button --}}
    {{--                    button.classList.add('bg-black', 'text-white'); --}}
    {{--                    button.classList.remove('hover:bg-black', 'hover:text-white'); --}}
    {{--                }); --}}
    {{--            }); --}}
    {{--        } --}}
    {{--        setupButtonSelection('.bb-bed'); --}}
    {{--        setupButtonSelection('.bb-bath'); --}}
    {{--    </script> --}}

    {{--
  <div class="w-full relative">
    <div class="swiper multiple-slide-carousel swiper-container relative">
      <div class="swiper-wrapper mb-16">
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
            <span class="text-2xl font-semibold text-indigo-600">Slide 1</span>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide">
          <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
            <span class="text-2xl font-semibold text-indigo-600">Slide 2</span>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="swiper-slide">
          <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
            <span class="text-2xl font-semibold text-indigo-600">Slide 3</span>
          </div>
        </div>
        <!-- Slide 4 -->
        <div class="swiper-slide">
          <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
            <span class="text-2xl font-semibold text-indigo-600">Slide 4</span>
          </div>
        </div>
      </div>

      <!-- Navigation Buttons -->
      <div class="absolute flex justify-center items-center m-auto left-0 right-0 w-fit bottom-12">
        <button id="slider-button-left" class="swiper-button-prev group !p-2 flex justify-center items-center border border-solid border-indigo-600 !w-12 !h-12 transition-all duration-500 rounded-full hover:bg-indigo-600 !-translate-x-16">
          <svg class="h-5 w-5 text-indigo-600 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
            <path d="M10.0002 11.9999L6 7.99971L10.0025 3.99719" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <button id="slider-button-right" class="swiper-button-next group !p-2 flex justify-center items-center border border-solid border-indigo-600 !w-12 !h-12 transition-all duration-500 rounded-full hover:bg-indigo-600 !translate-x-16">
          <svg class="h-5 w-5 text-indigo-600 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
            <path d="M5.99984 4.00012L10 8.00029L5.99748 12.0028" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper('.multiple-slide-carousel', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      navigation: {
        nextEl: '#slider-button-right',
        prevEl: '#slider-button-left',
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    });
  </script> --}}

    @include('frontend.slider')


    {{-- end testing slider --}}
    <!-- Best Deals Section -->
    {{-- <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Best Deals</h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">Find your dream property with our exclusive
                    selection of premium listings and expert advice.</p>
            </div>

            <!-- Outer Slider for Property Cards -->
            <div class="section-slider rounded-2xl bg-white">
                <div class="section-slides-container">
                    <!-- Slide 1 -->
                    <div class="section-slide p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Property Card 1 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1596394516093-9ba7a5f3b56f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Resort garden" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80"
                                                    alt="Resort exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1586375300773-8384e3e4916f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80"
                                                    alt="Resort pool" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Resort interior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1596394516093-9ba7a5f3b56f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Resort garden" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80"
                                                    alt="Resort exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        17,000,000 THB
                                    </div>
                                </div>

                                <!-- Property Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">New Boutique Resort with
                                        Tropical Garden
                                    </h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Lipa Noi, Thailand</span>
                                    </div>

                                    <!-- Property Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">6</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">800</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">4</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Sunny Houssaye</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            2 months ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Card 2 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600585154340-6e3cbfc87c9f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Modern villa" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600585154340-6e3cbfc87c9f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Modern villa" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1153&q=80"
                                                    alt="Living room" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Kitchen" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600607687644-c7171b42498b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Bedroom" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600585154340-6e3cbfc87c9f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Modern villa" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        12,500,000 THB
                                    </div>
                                </div>

                                <!-- Property Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Modern Villa with Ocean
                                        View</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Koh Samui, Thailand</span>
                                    </div>

                                    <!-- Property Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">4</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">450</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">3</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Michael Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            1 week ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Card 3 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Luxury apartment" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Luxury apartment" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=958&q=80"
                                                    alt="Living area" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Kitchen" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Bathroom" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Luxury apartment" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        8,900,000 THB
                                    </div>
                                </div>

                                <!-- Property Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Luxury Apartment in City
                                        Center</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Bangkok, Thailand</span>
                                    </div>

                                    <!-- Property Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">3</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">120</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">2</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Sarah Williams</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            3 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="section-slide p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Property Card 4 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111832-11a84d8220e3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111496-98df8c39913d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111832-11a84d8220e3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property view" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111476-7de74b63c6c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property interior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111826-35702cf228df?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property pool" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111496-98df8c39913d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        22,500,000 THB
                                    </div>
                                </div>

                                <!-- Property Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Beachfront Paradise
                                        Property</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Krabi, Thailand</span>
                                    </div>

                                    <!-- Property Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">6</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">850</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">5</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Robert Chen</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            1 week ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Card 5 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property interior" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257535-62ffc83ca1d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property interior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257590-2b7ce6e1ad1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property kitchen" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257610-7dfe8d7d964e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property bedroom" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        15,200,000 THB
                                    </div>
                                </div>

                                <!-- Property Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Cliffside Luxury Retreat
                                    </h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Koh Tao, Thailand</span>
                                    </div>

                                    <!-- Property Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">5</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">720</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">4</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">David Wilson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            2 weeks ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Card 6 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property exterior" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257610-7dfe8d7d964e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property bedroom" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257590-2b7ce6e1ad1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property kitchen" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257535-62ffc83ca1d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property interior" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Property exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        11,300,000 THB
                                    </div>
                                </div>

                                <!-- Property Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Contemporary Pool Property
                                    </h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Hua Hin, Thailand</span>
                                    </div>

                                    <!-- Property Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">4</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">520</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">3</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Michael Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            3 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Outer Slider Navigation -->
                <button class="outer-nav-btn outer-prev-btn" id="best-deals-prev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="outer-nav-btn outer-next-btn" id="best-deals-next">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Outer Slider Indicators -->
                <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
                    <div class="w-3 h-3 bg-gray-300 rounded-full outer-indicator active" data-slide="0"></div>
                    <div class="w-3 h-3 bg-gray-300 rounded-full outer-indicator" data-slide="1"></div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center mt-12">
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    View All Properties
                </button>
            </div>
        </div>
    </section>

    <!-- Luxury Villas Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Luxury Villas</h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">Discover our exclusive collection of premium
                    villas in Thailand's most desirable locations.</p>
            </div>

            <!-- Outer Slider for Villa Cards -->
            <div class="section-slider rounded-2xl bg-white">
                <div class="section-slides-container">
                    <!-- Outer Slide 1 -->
                    <div class="section-slide p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Villa Card 1 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1596394516093-9ba7a5f3b56f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa garden" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=1171&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1586375300773-8384e3e4916f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80"
                                                    alt="Villa pool" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa interior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1596394516093-9ba7a5f3b56f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa garden" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=1171&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        17,000,000 THB
                                    </div>
                                </div>

                                <!-- Villa Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Oceanfront Luxury Villa
                                    </h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Lipa Noi, Koh Samui</span>
                                    </div>

                                    <!-- Villa Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">5</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">650</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">4</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Sunny Houssaye</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            2 months ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Villa Card 2 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1153&q=80"
                                                    alt="Villa interior" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600585154340-6e3cbfc87c9f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1153&q=80"
                                                    alt="Villa interior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa kitchen" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600607687644-c7171b42498b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa bedroom" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1600585154340-6e3cbfc87c9f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        12,500,000 THB
                                    </div>
                                </div>

                                <!-- Villa Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Hillside Modern Villa</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Koh Phangan, Thailand</span>
                                    </div>

                                    <!-- Villa Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">4</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">480</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">3</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Michael Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            3 weeks ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Villa Card 3 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa bathroom" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=958&q=80"
                                                    alt="Villa living area" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa kitchen" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa bathroom" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        9,800,000 THB
                                    </div>
                                </div>

                                <!-- Villa Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Tropical Garden Villa</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Phuket, Thailand</span>
                                    </div>

                                    <!-- Villa Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">3</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">350</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">2</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Sarah Williams</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            5 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Outer Slide 2 -->
                    <div class="section-slide p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Villa Card 4 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111832-11a84d8220e3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111496-98df8c39913d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111832-11a84d8220e3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa view" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111476-7de74b63c6c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa interior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111826-35702cf228df?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa pool" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1575517111496-98df8c39913d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        22,500,000 THB
                                    </div>
                                </div>

                                <!-- Villa Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Beachfront Paradise Villa
                                    </h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Krabi, Thailand</span>
                                    </div>

                                    <!-- Villa Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">6</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">850</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">5</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Robert Chen</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            1 week ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Villa Card 5 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa interior" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257535-62ffc83ca1d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa interior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257590-2b7ce6e1ad1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa kitchen" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257610-7dfe8d7d964e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa bedroom" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        15,200,000 THB
                                    </div>
                                </div>

                                <!-- Villa Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Cliffside Luxury Retreat
                                    </h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Koh Tao, Thailand</span>
                                    </div>

                                    <!-- Villa Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">5</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">720</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">4</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">David Wilson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            2 weeks ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Villa Card 6 -->
                            <div class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden">
                                <!-- Image Slider Section -->
                                <div class="relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div
                                            class="slides-container flex transition-transform duration-500 ease-in-out h-full">
                                            <!-- Clone last slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Original slides -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257610-7dfe8d7d964e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa bedroom" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257590-2b7ce6e1ad1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa kitchen" class="w-full h-full object-cover">
                                            </div>
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257535-62ffc83ca1d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa interior" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Clone first slide for seamless looping -->
                                            <div class="slide flex-shrink-0 w-full h-full">
                                                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Villa exterior" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="prevBtn absolute left-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-left text-sm md:text-base text-white"></i>
                                    </button>
                                    <button
                                        class="nextBtn absolute right-3 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-8 h-8 md:w-10 md:h-10 flex items-center justify-center transition-all duration-200 z-10">
                                        <i class="fas fa-chevron-right text-sm md:text-base text-white"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2 z-10">
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                        <div class="w-2 h-2 bg-white/70 rounded-full indicator"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        11,300,000 THB
                                    </div>
                                </div>

                                <!-- Villa Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Contemporary Pool Villa
                                    </h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Hua Hin, Thailand</span>
                                    </div>

                                    <!-- Villa Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bed text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">4</p>
                                                <p class="text-xs text-gray-500">Bedrooms</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">520</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-bath text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">3</p>
                                                <p class="text-xs text-gray-500">Bathrooms</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Michael Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            3 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Outer Slider Navigation -->
                <button class="outer-nav-btn outer-prev-btn" id="villas-prev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="outer-nav-btn outer-next-btn" id="villas-next">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Outer Slider Indicators -->
                <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
                    <div class="w-3 h-3 bg-gray-300 rounded-full outer-indicator active" data-slide="0"></div>
                    <div class="w-3 h-3 bg-gray-300 rounded-full outer-indicator" data-slide="1"></div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center mt-12">
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    View All Villas
                </button>
            </div>
        </div>
    </section> --}}

    <!-- Land for Sale Section -->


    {{-- <style>
        .image-slides-container {
            display: flex;
            transition: transform 0.5s ease;
        }

        .image-slide {
            min-width: 100%;
        }

        .section-slides-container {
            display: flex;
            transition: transform 0.5s ease;
        }

        .section-slide {
            min-width: 100%;
        }

        .image-nav-btn,
        .outer-nav-btn {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-slider:hover .image-nav-btn,
        .section-slider:hover .outer-nav-btn {
            opacity: 1;
        }

        .price-tag {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }
    </style>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Land for Sale</h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">Prime land opportunities for development and
                    investment across Thailand's most promising locations.</p>
            </div>

            <!-- Outer Slider for Land Cards -->
            <div class="section-slider rounded-2xl bg-white relative overflow-hidden">
                <div class="section-slides-container">
                    <!-- Outer Slide 1 -->
                    <div class="section-slide p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Land Card 1 -->
                            <div
                                class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                                <!-- Image Slider Section -->
                                <div class="image-slider relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div class="image-slides-container h-full">
                                            <!-- Slide 1 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 4 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="image-nav-btn image-prev-btn absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-left text-sm"></i>
                                    </button>
                                    <button
                                        class="image-nav-btn image-next-btn absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-right text-sm"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div
                                        class="image-indicators absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                        <div class="image-indicator active w-2 h-2 rounded-full bg-white cursor-pointer"
                                            data-slide="0"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="1"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="2"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="3"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        5,200,000 THB
                                    </div>
                                </div>

                                <!-- Land Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Ocean View Land Plot</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Koh Samui, Thailand</span>
                                    </div>

                                    <!-- Land Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">800</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-mountain text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Hill</p>
                                                <p class="text-xs text-gray-500">Topography</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-road text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Yes</p>
                                                <p class="text-xs text-gray-500">Road Access</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Sunny Houssaye</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            1 month ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Land Card 2 -->
                            <div
                                class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                                <!-- Image Slider Section -->
                                <div class="image-slider relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div class="image-slides-container h-full">
                                            <!-- Slide 1 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 4 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="image-nav-btn image-prev-btn absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-left text-sm"></i>
                                    </button>
                                    <button
                                        class="image-nav-btn image-next-btn absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-right text-sm"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div
                                        class="image-indicators absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                        <div class="image-indicator active w-2 h-2 rounded-full bg-white cursor-pointer"
                                            data-slide="0"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="1"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="2"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="3"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        8,500,000 THB
                                    </div>
                                </div>

                                <!-- Land Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Beachfront Development
                                        Land</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Phuket, Thailand</span>
                                    </div>

                                    <!-- Land Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">1,200</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-mountain text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Flat</p>
                                                <p class="text-xs text-gray-500">Topography</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-road text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Yes</p>
                                                <p class="text-xs text-gray-500">Road Access</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Michael Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            2 weeks ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Land Card 3 -->
                            <div
                                class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                                <!-- Image Slider Section -->
                                <div class="image-slider relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div class="image-slides-container h-full">
                                            <!-- Slide 1 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 4 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="image-nav-btn image-prev-btn absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-left text-sm"></i>
                                    </button>
                                    <button
                                        class="image-nav-btn image-next-btn absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-right text-sm"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div
                                        class="image-indicators absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                        <div class="image-indicator active w-2 h-2 rounded-full bg-white cursor-pointer"
                                            data-slide="0"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="1"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="2"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="3"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        3,800,000 THB
                                    </div>
                                </div>

                                <!-- Land Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Rice Field Land Plot</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Chiang Mai, Thailand</span>
                                    </div>

                                    <!-- Land Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">2,500</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-mountain text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Flat</p>
                                                <p class="text-xs text-gray-500">Topography</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-road text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Yes</p>
                                                <p class="text-xs text-gray-500">Road Access</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Sarah Williams</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            3 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Outer Slide 2 -->
                    <div class="section-slide p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Land Card 4 -->
                            <div
                                class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                                <!-- Image Slider Section -->
                                <div class="image-slider relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div class="image-slides-container h-full">
                                            <!-- Slide 1 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 4 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="image-nav-btn image-prev-btn absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-left text-sm"></i>
                                    </button>
                                    <button
                                        class="image-nav-btn image-next-btn absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-right text-sm"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div
                                        class="image-indicators absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                        <div class="image-indicator active w-2 h-2 rounded-full bg-white cursor-pointer"
                                            data-slide="0"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="1"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="2"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="3"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        6,700,000 THB
                                    </div>
                                </div>

                                <!-- Land Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Mountain View Land</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Krabi, Thailand</span>
                                    </div>

                                    <!-- Land Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">1,500</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-mountain text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Sloping</p>
                                                <p class="text-xs text-gray-500">Topography</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-road text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Yes</p>
                                                <p class="text-xs text-gray-500">Road Access</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Robert Chen</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            1 week ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Land Card 5 -->
                            <div
                                class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                                <!-- Image Slider Section -->
                                <div class="image-slider relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div class="image-slides-container h-full">
                                            <!-- Slide 1 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 4 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="image-nav-btn image-prev-btn absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-left text-sm"></i>
                                    </button>
                                    <button
                                        class="image-nav-btn image-next-btn absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-right text-sm"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div
                                        class="image-indicators absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                        <div class="image-indicator active w-2 h-2 rounded-full bg-white cursor-pointer"
                                            data-slide="0"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="1"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="2"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="3"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        4,500,000 THB
                                    </div>
                                </div>

                                <!-- Land Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Riverside Land Plot</h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Kanchanaburi, Thailand</span>
                                    </div>

                                    <!-- Land Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">3,200</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-mountain text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Flat</p>
                                                <p class="text-xs text-gray-500">Topography</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-road text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Yes</p>
                                                <p class="text-xs text-gray-500">Road Access</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">David Wilson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            2 weeks ago
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Land Card 6 -->
                            <div
                                class="property-card max-w-sm w-full mx-auto bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                                <!-- Image Slider Section -->
                                <div class="image-slider relative">
                                    <div class="overflow-hidden relative h-56 md:h-64">
                                        <!-- Slides -->
                                        <div class="image-slides-container h-full">
                                            <!-- Slide 1 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80"
                                                    alt="Land landscape" class="w-full h-full object-cover">
                                            </div>
                                            <!-- Slide 4 -->
                                            <div class="image-slide h-full">
                                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1332&q=80"
                                                    alt="Land view" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Arrows -->
                                    <button
                                        class="image-nav-btn image-prev-btn absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-left text-sm"></i>
                                    </button>
                                    <button
                                        class="image-nav-btn image-next-btn absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                                        <i class="fas fa-chevron-right text-sm"></i>
                                    </button>

                                    <!-- Slide Indicators -->
                                    <div
                                        class="image-indicators absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                        <div class="image-indicator active w-2 h-2 rounded-full bg-white cursor-pointer"
                                            data-slide="0"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="1"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="2"></div>
                                        <div class="image-indicator w-2 h-2 rounded-full bg-white/70 cursor-pointer"
                                            data-slide="3"></div>
                                    </div>

                                    <!-- Price Tag -->
                                    <div
                                        class="absolute top-3 right-3 price-tag text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-md z-10">
                                        7,200,000 THB
                                    </div>
                                </div>

                                <!-- Land Details Section -->
                                <div class="p-5 md:p-6">
                                    <!-- Title -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1">Forest Land for Eco Resort
                                    </h2>

                                    <!-- Location -->
                                    <div class="flex items-center text-gray-600 mb-4">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-500 text-sm"></i>
                                        <span class="text-sm md:text-base">Khao Yai, Thailand</span>
                                    </div>

                                    <!-- Land Features -->
                                    <div class="flex justify-between items-center mb-5">
                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-vector-square text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">5,000</p>
                                                <p class="text-xs text-gray-500">SQM</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-mountain text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Rolling</p>
                                                <p class="text-xs text-gray-500">Topography</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                <i class="fas fa-road text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-lg font-bold text-gray-800">Limited</p>
                                                <p class="text-xs text-gray-500">Road Access</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <div class="border-t border-gray-200 my-4"></div>

                                    <!-- Agent and Date -->
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-9 h-9 rounded-full bg-gray-300 overflow-hidden mr-3">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80"
                                                    alt="Agent" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-800">Michael Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            3 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Outer Slider Navigation -->
                <button
                    class="outer-nav-btn outer-prev-btn absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-10 h-10 rounded-full flex items-center justify-center shadow-lg z-10">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button
                    class="outer-nav-btn outer-next-btn absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 w-10 h-10 rounded-full flex items-center justify-center shadow-lg z-10">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Outer Slider Indicators -->
                <div class="outer-indicators absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <div class="outer-indicator active w-3 h-3 rounded-full bg-blue-600 cursor-pointer" data-slide="0">
                    </div>
                    <div class="outer-indicator w-3 h-3 rounded-full bg-gray-300 cursor-pointer" data-slide="1"></div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center mt-12">
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    View All Land Plots
                </button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all image sliders
            document.querySelectorAll('.image-slider').forEach(slider => {
                initImageSlider(slider);
            });

            // Initialize outer slider
            initOuterSlider();
        });

        function initImageSlider(slider) {
            const container = slider.querySelector('.image-slides-container');
            const slides = slider.querySelectorAll('.image-slide');
            const prevBtn = slider.querySelector('.image-prev-btn');
            const nextBtn = slider.querySelector('.image-next-btn');
            const indicators = slider.querySelectorAll('.image-indicator');

            let currentSlide = 0;
            const totalSlides = slides.length;

            // Function to update slider position
            function updateSlider() {
                container.style.transform = `translateX(-${currentSlide * 100}%)`;

                // Update indicators
                indicators.forEach((indicator, index) => {
                    if (index === currentSlide) {
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
            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlider();
            }

            // Previous slide
            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateSlider();
            }

            // Event listeners
            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            // Indicator click events
            indicators.forEach(indicator => {
                indicator.addEventListener('click', function() {
                    currentSlide = parseInt(this.getAttribute('data-slide'));
                    updateSlider();
                });
            });

            // Auto slide (optional)
            // setInterval(nextSlide, 5000);
        }

        function initOuterSlider() {
            const container = document.querySelector('.section-slides-container');
            const slides = document.querySelectorAll('.section-slide');
            const prevBtn = document.querySelector('.outer-prev-btn');
            const nextBtn = document.querySelector('.outer-next-btn');
            const indicators = document.querySelectorAll('.outer-indicator');

            let currentSlide = 0;
            const totalSlides = slides.length;

            // Function to update slider position
            function updateSlider() {
                container.style.transform = `translateX(-${currentSlide * 100}%)`;

                // Update indicators
                indicators.forEach((indicator, index) => {
                    if (index === currentSlide) {
                        indicator.classList.add('active', 'bg-blue-600');
                        indicator.classList.remove('bg-gray-300');
                    } else {
                        indicator.classList.remove('active', 'bg-blue-600');
                        indicator.classList.add('bg-gray-300');
                    }
                });
            }

            // Next slide
            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlider();
            }

            // Previous slide
            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateSlider();
            }

            // Event listeners
            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            // Indicator click events
            indicators.forEach(indicator => {
                indicator.addEventListener('click', function() {
                    currentSlide = parseInt(this.getAttribute('data-slide'));
                    updateSlider();
                });
            });
        }
    </script>

    <script>
        // Initialize all sliders when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize property card image sliders
            initializePropertySliders();

            // Initialize outer sliders for each section
            initializeOuterSlider('best-deals-prev', 'best-deals-next', 'best-deals');
            initializeOuterSlider('villas-prev', 'villas-next', 'villas');
            initializeOuterSlider('land-prev', 'land-next', 'land');
        });

        // Function to initialize property card image sliders
        function initializePropertySliders() {
            const propertyCards = document.querySelectorAll('.property-card');

            propertyCards.forEach(card => {
                const slidesContainer = card.querySelector('.slides-container');
                const slides = card.querySelectorAll('.slide');
                const prevBtn = card.querySelector('.prevBtn');
                const nextBtn = card.querySelector('.nextBtn');
                const indicators = card.querySelectorAll('.indicator');

                let currentSlide = 1; // Start at 1 because of the clone
                const totalSlides = slides.length - 2; // Excluding clones

                // Set initial position
                updateSliderPosition();

                // Next button event
                nextBtn.addEventListener('click', () => {
                    currentSlide++;
                    updateSliderPosition();
                });

                // Previous button event
                prevBtn.addEventListener('click', () => {
                    currentSlide--;
                    updateSliderPosition();
                });

                // Indicator click events
                indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => {
                        currentSlide = index + 1;
                        updateSliderPosition();
                    });
                });

                // Update slider position and indicators
                function updateSliderPosition() {
                    // Handle infinite loop
                    if (currentSlide > totalSlides) {
                        currentSlide = 1;
                    } else if (currentSlide < 1) {
                        currentSlide = totalSlides;
                    }

                    // Calculate the translateX value
                    const translateX = -currentSlide * 100;
                    slidesContainer.style.transform = `translateX(${translateX}%)`;

                    // Update indicators
                    indicators.forEach((indicator, index) => {
                        if (index === currentSlide - 1) {
                            indicator.classList.add('bg-white');
                            indicator.classList.remove('bg-white/70');
                        } else {
                            indicator.classList.remove('bg-white');
                            indicator.classList.add('bg-white/70');
                        }
                    });
                }

                // Auto-advance slides (optional)
                setInterval(() => {
                    currentSlide++;
                    updateSliderPosition();
                }, 5000);
            });
        }

        // Function to initialize outer sliders
        function initializeOuterSlider(prevBtnId, nextBtnId, sectionName) {
            const prevBtn = document.getElementById(prevBtnId);
            const nextBtn = document.getElementById(nextBtnId);
            const sliderContainer = prevBtn.closest('.section-slider');
            const slidesContainer = sliderContainer.querySelector('.section-slides-container');
            const slides = sliderContainer.querySelectorAll('.section-slide');
            const indicators = sliderContainer.querySelectorAll('.outer-indicator');

            let currentSlide = 0;
            const totalSlides = slides.length;

            // Set initial position
            updateOuterSliderPosition();

            // Next button event
            nextBtn.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateOuterSliderPosition();
            });

            // Previous button event
            prevBtn.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateOuterSliderPosition();
            });

            // Indicator click events
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    updateOuterSliderPosition();
                });
            });

            // Update slider position and indicators
            function updateOuterSliderPosition() {
                // Calculate the translateX value
                const translateX = -currentSlide * 100;
                slidesContainer.style.transform = `translateX(${translateX}%)`;

                // Update indicators
                indicators.forEach((indicator, index) => {
                    if (index === currentSlide) {
                        indicator.classList.add('active');
                        indicator.classList.remove('bg-gray-300');
                        indicator.classList.add('bg-blue-600');
                    } else {
                        indicator.classList.remove('active');
                        indicator.classList.add('bg-gray-300');
                        indicator.classList.remove('bg-blue-600');
                    }
                });
            }

            // Auto-advance slides (optional)
            setInterval(() => {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateOuterSliderPosition();
            }, 8000);
        }
    </script> --}}

    {{-- SERVICE WE OFFER --}}

    {{-- <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-6 my-6">
        <!-- Heading -->
        <div class="text-center mb-10">
            <h1
                class="text-4xl font-extrabold text-black bg-clip-text  font-spartan">
                Services We Offer
            </h1>
            <p class="text-gray-700 text-base md:text-lg font-medium mt-2 font-spartan">
                Trusted real estate solutions in Koh Samui for buying, selling, and managing properties
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6  ">
            <!-- Card 1 -->
            <div
                class="bg-gradient-to-br from-white to-blue-500/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-blue-700">
                    <i class="ri-terminal-box-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 font-spartan">Property Management</h2>
                <p class="text-gray-600 text-sm font-spartan">
                    Comprehensive services for landlords and investors to manage real estate assets efficiently and
                    profitably.
                </p>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-gradient-to-br from-white to-blue-500/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-blue-700">
                    <i class="ri-bank-card-2-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 font-spartan">Property Buying</h2>
                <p class="text-gray-600 text-sm font-spartan">
                    Discover hand-picked listings and receive expert advice to buy the perfect property in the ideal
                    location.
                </p>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-gradient-to-br from-white to-blue-500/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-blue-700">
                    <i class="ri-verified-badge-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 font-spartan">Legal Assistance</h2>
                <p class="text-gray-600 text-sm font-spartan">
                    Navigate the legal side of real estate with confidence—contracts, titles, and compliance all
                    covered.
                </p>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-gradient-to-br from-white to-blue-500/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-blue-700">
                    <i class="ri-verified-badge-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 font-spartan">Legal Assistance</h2>
                <p class="text-gray-600 text-sm font-spartan">
                    Navigate the legal side of real estate with confidence—contracts, titles, and compliance all
                    covered.
                </p>
            </div>

            <!-- Card 5 -->
            <div
                class="bg-gradient-to-br from-white to-blue-500/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-blue-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 1010 10A10 10 0 0012 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 font-spartan">Investment Consulting</h2>
                <p class="text-gray-600 text-sm font-spartan">
                    Make smart investment decisions with data-driven strategies and personalized ROI forecasts.
                </p>
            </div>

            <!-- Card 6 -->
            <div
                class="bg-gradient-to-br from-white to-blue-500/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-blue-700">
                    <i class="ri-home-3-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 font-spartan">Rental Services</h2>
                <p class="text-gray-600 text-sm font-spartan">
                    Get expert help listing, marketing, and managing rental properties with tenant screening and
                    support.
                </p>
            </div>
        </div>


    </div> --}}


    <section class="bg-white">
        <!-- Container -->
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-8">

            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <p class="text-sm uppercase text-gray-500 tracking-widest mb-2">Exclusive Locations</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                    Discover Thailand's Finest Properties
                </h2>
                <p class="text-gray-600 uppercase tracking-wider text-xs md:text-sm">
                    From hilltop sunsets to beachfront mornings, discover areas that fit your lifestyle, vision and
                    investment goals.
                </p>
            </div>

            <!-- Properties grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 -mb-20">
                <!-- Property Card 1 -->
                <div class="relative group rounded-lg overflow-hidden shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80"
                        alt="Bophut"
                        class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-4 left-4 text-white">

                        <h3 class="text-lg font-semibold mt-1">Bophut</h3>
                        <button class="mt-2 text-xs underline hover:text-green-500 flex items-center space-x-1">
                            <span>More Details</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Property Card 2 -->
                <div class="relative group rounded-lg overflow-hidden shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=400&q=80"
                        alt="Chaweng"
                        class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-4 left-4 text-white">

                        <h3 class="text-lg font-semibold mt-1">Chaweng</h3>
                        <button class="mt-2 text-xs underline hover:text-green-500 flex items-center space-x-1">
                            <span>More Details</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Property Card 3 -->
                <div class="relative group rounded-lg overflow-hidden shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1472220625704-91e1462799b2?auto=format&fit=crop&w=400&q=80"
                        alt="Bang Por"
                        class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-4 left-4 text-white">

                        <h3 class="text-lg font-semibold mt-1">Bang Por</h3>
                        <button class="mt-2 text-xs underline hover:text-green-500 flex items-center space-x-1">
                            <span>More Details</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Property Card 4 -->
                <div class="relative group rounded-lg overflow-hidden shadow-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=400&q=80"
                        alt="Maenam"
                        class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-4 left-4 text-white">

                        <h3 class="text-lg font-semibold mt-1">Maenam</h3>
                        <button class="mt-2 text-xs underline hover:text-green-500 flex items-center space-x-1">
                            <span>More Details</span>
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
                    Interested in Buying Prime Properties with Vedata Properties?
                </h3>
                <p
                    class="text-black uppercase tracking-widest md:mb-12 max-w-3xl mx-auto text-sm md:text-base leading-relaxed">
                    Experince a new standard of living with vedata Properties, where Koh Samui's finest real state meet
                    thoughful investment. We specialize in showcasing a handpicked selection of high-end homes, villas and
                    development opportunities across the island, each choosen for its design, location, and long-term value.
                </p>

                <!-- Features -->
                <div class="flex flex-col md:flex-row justify-between gap-12 md:mb-12 px-4 md:px-0">
                    <!-- Feature -->
                    <div class="flex flex-col items-center text-center max-w-xs mx-auto md:space-y-4">
                        <i class="fas fa-user-cog text-white text-3xl"></i>

                        <h4 class="font-bold text-lg text-black">Personalized Guidance</h4>
                        <p class="text-black text-sm md:text-base leading-relaxed text-black">
                            Buying property in Samui is more than a transaction. It's about finding the right fit for your
                            lifestyle and investment goals. Our team works closely with each client to understand what truly
                            matters, offering honest advice and tailored solutions from first viewing to final handover.


                        </p>
                    </div>

                    <div class="flex flex-col items-center text-center max-w-xs mx-auto md:space-y-4">
                        <i class="fas fa-clipboard-check text-white text-3xl"></i>


                        <h4 class="font-bold text-lg text-black">Excellent Service
                        </h4>
                        <p class="text-black text-sm md:text-base leading-relaxed text-black">
                            We take pride in making every step clear, efficient, and enjoyable. From market insights and
                            legal support to private viewings and deal structuring, Vedata ensures a smooth process built on
                            trust and transparency.

                        </p>
                    </div>

                    <div class="flex flex-col items-center text-center max-w-xs mx-auto md:space-y-4">
                        {{-- <i class="fas fa-clipboard-check text-green-400 text-3xl"></i> --}}
                        <i class="fas fa-hands-helping text-white text-3xl"></i>
                        <h4 class="font-bold text-lg text-black">Customer Care</h4>


                        <p class="text-black text-sm md:text-base leading-relaxed">
                            Our connection doesn't stop at the sale. Vedata continues to assist clients with after-purchase
                            support, local insights, and opportunities to grow their property portfolio. Because for us,
                            lasting relationships are the real investment.
                        </p>
                    </div>
                </div>

                {{-- <button
          class="bg-white text-[#0a0b3b] font-bold px-10 py-4 rounded-full shadow-lg hover:bg-black hover:text-white transition-colors duration-300 focus:outline-none focus:ring-4 focus:ring-green-300"
          aria-label="Contact Zenith Samui"
        >
          Contact Us
        </button> --}}
            </div>
        </div>
        </div>
    </section>


    <!-- About Section -->
    <section class="py-8 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto px-4">
            <div class="overflow-hidden rounded-3xl shadow-lg">
                <img src="https://cdn.pixabay.com/photo/2019/07/14/10/48/river-4336788_1280.jpg"
                    alt="Beautiful property in Thailand" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col justify-center">
                <h1 class="font-bold text-4xl py-4 text-gray-800 font-spartan">About Us</h1>
                <p class="text-gray-600 text-base leading-relaxed font-spartan">
                    At Vedata, we specialize in premium real estate across Koh Samui, presenting an exclusive portfolio of
                    villas, land, condominiums and commercial spaces suited for both lifestyle and investment. With deep
                    local insight and a client first approach, our team guides you through every stage of the buying
                    process, from property selection to ownership transfer. Alongside established properties, we also curate
                    access to select development projects and off-plan investments, offering clients the chance to be part
                    of Koh Samui's continued growth. Whether you're seeking a private home, a development venture, or a
                    strategic addition to your portfolio, Vedata delivers trusted expertise and a personalized experience
                    designed to help youake comident, informed decisions.
                </p>

            </div>
        </div>
    </section>


    <!-- Final CTA Section -->
    <section class="relative h-96 w-full mt-4">
        <!-- Background Image -->
        <img src="https://cdn.pixabay.com/photo/2020/06/23/00/53/river-5330961_1280.jpg"
            alt="Beautiful property landscape" class="absolute inset-0 w-full h-full object-cover">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Centered Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6 text-white font-spartan">Own Your Piece of Koh
                Samui</h1>
            <div class="flex flex-col  gap-4 justify-center">

                <button
                    class="bg-transparent border-2 border-white text-white hover:bg-white/10 px-8 py-3 rounded-lg font-semibold transition-colors font-spartan">
                    Explore Available Opportunities
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
