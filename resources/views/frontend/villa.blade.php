

<script src="https://cdn.tailwindcss.com"></script>



<style>
    /* ---------- Base Glassmorphism ---------- */
    .bg-glass {
        background: rgba(250, 250, 250, 0.1);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(247, 246, 246, 0.3);
        border-radius: 1rem;
    }

    /* ---------- Form Container ---------- */
    form {
        transition: all 0.3s ease;
    }

    form:hover {
        box-shadow: 0 20px 50px rgba(255, 255, 255, 0.15);
    }

    /* ---------- Custom Select Headers ---------- */
    .custom-select-header {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 1rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .custom-select-options {
        position: absolute;
        /* important for z-index */
        z-index: 50;
        /* same as bb-dropdown */
        transition: all 0.3s ease;
        overflow: hidden;
        border-radius: 1rem;
        background: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .custom-select-header:hover {
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
    }

    /* ---------- Custom Select Options ---------- */
    .custom-select-options {
        transition: all 0.3s ease;
        overflow: hidden;
        border-radius: 1rem;
        background: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .custom-option {
        padding: 0.5rem 1rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .custom-option:hover,
    .custom-option.selected {
        background: linear-gradient(90deg, #000000, #080808);
        color: white;
        font-weight: 600;
    }

    /* ---------- Bed & Bath Buttons ---------- */
    .bb-bed,
    .bb-bath {
        transition: all 0.3s ease;
        border: 1px solid #000;
        border-radius: 0.5rem;
        font-size: 0.8rem;
        font-weight: 500;
        padding: 0.5rem 0.75rem;
        cursor: pointer;
        background: white;
        color: black;
    }

    .bb-bed:hover,
    .bb-bath:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(6, 1, 0, 0.4);
    }

    .bb-bed.active,
    .bb-bath.active {
        background: linear-gradient(90deg, #080200, #080400);
        color: white;
        border-color: transparent;
    }

    /* ---------- Bed & Bath Dropdown ---------- */
    #bb-dropdown {
        transition: all 0.3s ease;
        transform-origin: top;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 50;
        width: 100%;
        background: rgb(254, 252, 252);
        border-radius: 1rem;
        padding: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        display: none;
    }
</style>

@php
    $minPrices = App\Models\PriceRange::where('type', 'min')->get();
    $maxPrices = App\Models\PriceRange::where('type', 'max')->get();
@endphp

<section class="relative w-full max-w-9xl md:block hidden">
    <div class="bg-gray-200 p-6 transition-all duration-500 hover:shadow-xl relative z-10">

        <form action="{{ route('property') }}"
              method="GET"
              class="flex flex-col lg:flex-row gap-4 items-stretch z-50">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 flex-1">

                {{-- LOCATION DROPDOWN (same style) --}}
                <div class="custom-select-wrapper relative z-50 border border-gray-300 rounded-2xl"
                     data-target="city">
                    <div class="custom-select-header" data-value="{{ request('city', '') }}">
                <span class="custom-select-label">
                    {{ request('city', 'Location') }}
                </span>
                        <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                    <div class="custom-select-options hidden absolute left-0 mt-2 w-full bg-white">
                        {{-- Default option --}}
                        <div class="custom-option {{ request('city') === null || request('city') === '' ? 'selected' : '' }}"
                             data-value="">
                            Location
                        </div>

                        {{-- Dynamic cities --}}
                        @foreach($cities as $city)
                            <div class="custom-option {{ request('city') === $city->name ? 'selected' : '' }}"
                                 data-value="{{ $city->name }}">
                                {{ $city->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="city" id="city" value="{{ request('city', '') }}">


                {{-- PROPERTY TYPE DROPDOWN (same style) --}}
                <div class="custom-select-wrapper relative z-50 border border-gray-300 rounded-2xl"
                     data-target="property_type_id">
                    <div class="custom-select-header" data-value="{{ request('property_type_id', '') }}">
                <span class="custom-select-label">
                    {{ request('property_type_id') ? ($propertyTypes->firstWhere('id', request('property_type_id'))->title ?? 'Property Type') : 'Property Type' }}
                </span>
                        <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                    <div class="custom-select-options hidden absolute left-0 mt-2 w-full bg-white">
                        <div class="custom-option {{ !request('property_type_id') ? 'selected' : '' }}"
                             data-value="">
                            Property Type
                        </div>

                        @foreach($propertyTypes as $type)
                            <div class="custom-option {{ (string)request('property_type_id') === (string)$type->id ? 'selected' : '' }}"
                                 data-value="{{ $type->id }}">
                                {{ $type->title }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="property_type_id" id="property_type_id" value="{{ request('property_type_id', '') }}">


                <div class="flex gap-2">
                    {{-- MIN --}}
                    <div class="custom-select-wrapper flex-1 relative z-50 border border-gray-300 rounded-2xl"
                         data-target="min_price">

                        @php
                            $selectedMinValue = request('min_price');
                            $selectedMinLabel = 'Min';

                            if ($selectedMinValue) {
                                $foundMin = $minPrices->firstWhere('value', (int) $selectedMinValue);
                                if ($foundMin) {
                                    $selectedMinLabel = $foundMin->label;
                                }
                            }
                        @endphp

                        <div class="custom-select-header" data-value="{{ $selectedMinValue ?? '' }}">
            <span class="custom-select-label font-medium">
                {{ $selectedMinLabel }}
            </span>
                            <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <div class="custom-select-options hidden absolute left-0 mt-2 w-full bg-white">
                            {{-- Default Min --}}
                            <div class="custom-option {{ !request('min_price') ? 'selected' : '' }}"
                                 data-value="">
                                Min
                            </div>

                            {{-- Dynamic Min Options --}}
                            @foreach($minPrices as $price)
                                <div class="custom-option {{ (string)request('min_price') === (string)$price->value ? 'selected' : '' }}"
                                     data-value="{{ $price->value }}">
                                    {{ $price->label }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- MAX --}}
                    <div class="custom-select-wrapper flex-1 relative z-50 border border-gray-300 rounded-2xl"
                         data-target="max_price">

                        @php
                            $selectedMaxValue = request('max_price');
                            $selectedMaxLabel = 'Max';

                            if ($selectedMaxValue) {
                                $foundMax = $maxPrices->firstWhere('value', (int) $selectedMaxValue);
                                if ($foundMax) {
                                    $selectedMaxLabel = $foundMax->label;
                                }
                            }
                        @endphp

                        <div class="custom-select-header" data-value="{{ $selectedMaxValue ?? '' }}">
            <span class="custom-select-label font-medium">
                {{ $selectedMaxLabel }}
            </span>
                            <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <div class="custom-select-options hidden absolute left-0 mt-2 w-full bg-white">
                            {{-- Default Max --}}
                            <div class="custom-option {{ !request('max_price') ? 'selected' : '' }}"
                                 data-value="">
                                Max
                            </div>

                            {{-- Dynamic Max Options --}}
                            @foreach($maxPrices as $price)
                                <div class="custom-option {{ (string)request('max_price') === (string)$price->value ? 'selected' : '' }}"
                                     data-value="{{ $price->value }}">
                                    {{ $price->label }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>



                <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', '') }}">
                <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', '') }}">


                {{-- BED & BATH (same UI as your original) --}}
                <div class="relative z-50 border border-gray-300 rounded-2xl">
                    <button type="button" id="bb-toggle" class="custom-select-header w-full">
                <span class="font-medium">
                    Bed & Bath
                </span>
                        <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="bb-dropdown" class="p-4 hidden bg-white rounded-2xl shadow-lg">
                        <div class="flex flex-col gap-4">

                            {{-- Bedrooms --}}
                            <div>
                                <p class="uppercase text-xs font-semibold mb-2">Bedrooms</p>
                                <div class="flex gap-2 flex-wrap">
                                    @php $beds = request('bedrooms', 'any'); @endphp
                                    <button type="button"
                                            class="bb-bed {{ $beds === 'any' ? 'active' : '' }}"
                                            data-value="any">Any</button>
                                    <button type="button"
                                            class="bb-bed {{ $beds === '1+' || $beds === '1' ? 'active' : '' }}"
                                            data-value="1+">1+</button>
                                    <button type="button"
                                            class="bb-bed {{ $beds === '2+' || $beds === '2' ? 'active' : '' }}"
                                            data-value="2+">2+</button>
                                    <button type="button"
                                            class="bb-bed {{ $beds === '3+' || $beds === '3' ? 'active' : '' }}"
                                            data-value="3+">3+</button>
                                    <button type="button"
                                            class="bb-bed {{ $beds === '4+' || $beds === '4' ? 'active' : '' }}"
                                            data-value="4+">4+</button>
                                    <button type="button"
                                            class="bb-bed {{ $beds === '5+' || $beds === '5' ? 'active' : '' }}"
                                            data-value="5+">5+</button>
                                </div>
                            </div>

                            {{-- Bathrooms --}}
                            <div>
                                <p class="uppercase text-xs font-semibold mb-2">Bathrooms</p>
                                <div class="flex gap-2 flex-wrap">
                                    @php $baths = request('bathrooms', 'any'); @endphp
                                    <button type="button"
                                            class="bb-bath {{ $baths === 'any' ? 'active' : '' }}"
                                            data-value="any">Any</button>
                                    <button type="button"
                                            class="bb-bath {{ $baths === '1+' || $baths === '1' ? 'active' : '' }}"
                                            data-value="1+">1+</button>
                                    <button type="button"
                                            class="bb-bath {{ $baths === '2+' || $baths === '2' ? 'active' : '' }}"
                                            data-value="2+">2+</button>
                                    <button type="button"
                                            class="bb-bath {{ $baths === '3+' || $baths === '3' ? 'active' : '' }}"
                                            data-value="3+">3+</button>
                                    <button type="button"
                                            class="bb-bath {{ $baths === '4+' || $baths === '4' ? 'active' : '' }}"
                                            data-value="4+">4+</button>
                                    <button type="button"
                                            class="bb-bath {{ $baths === '5+' || $baths === '5' ? 'active' : '' }}"
                                            data-value="5+">5+</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{-- Hidden fields for bed & bath --}}
            <input type="hidden" name="bedrooms" id="bedrooms" value="{{ request('bedrooms', 'any') }}">
            <input type="hidden" name="bathrooms" id="bathrooms" value="{{ request('bathrooms', 'any') }}">

            {{-- BUTTON – same style as your RESET button, text "Search" --}}
            <button type="submit"
                    class="bg-black text-white px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 min-w-[140px]">
                Search
            </button>

        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const bbToggle   = document.getElementById('bb-toggle');
                const bbDropdown = document.getElementById('bb-dropdown');

                // ---------- Custom Select Logic (Location, Type, Min, Max) ----------
                document.querySelectorAll('.custom-select-wrapper').forEach(wrapper => {
                    const header           = wrapper.querySelector('.custom-select-header');
                    const optionsContainer = wrapper.querySelector('.custom-select-options');
                    const options          = wrapper.querySelectorAll('.custom-option');
                    const target           = wrapper.dataset.target;

                    // Bed & Bath wrapper me custom-select-options hi nahi hain, usko skip kar do
                    if (!header || !optionsContainer) return;

                    header.addEventListener('click', (e) => {
                        e.stopPropagation();

                        // Sab dropdown close
                        document.querySelectorAll('.custom-select-options').forEach(c => {
                            if (c !== optionsContainer) c.classList.add('hidden');
                        });

                        // Bed & Bath band
                        if (bbDropdown) bbDropdown.style.display = 'none';

                        optionsContainer.classList.toggle('hidden');
                    });

                    options.forEach(option => {
                        option.addEventListener('click', (e) => {
                            e.stopPropagation();

                            // Label text change
                            const labelEl = header.querySelector('.custom-select-label');
                            if (labelEl) {
                                labelEl.textContent = option.textContent.trim();
                            }

                            // header data-value set
                            header.dataset.value = option.dataset.value;

                            // selected class manage
                            options.forEach(opt => opt.classList.remove('selected'));
                            option.classList.add('selected');

                            // Hidden input update (city, property_type_id, min_price, max_price)
                            if (target) {
                                const hiddenInput = document.getElementById(target);
                                if (hiddenInput) {
                                    const val = option.dataset.value;
                                    // Min/Max text ko empty treat karo
                                    hiddenInput.value = (val === 'Min' || val === 'Max') ? '' : val;
                                }
                            }

                            optionsContainer.classList.add('hidden');
                        });
                    });
                });

                // ---------- Bed & Bath Dropdown ----------
                if (bbToggle && bbDropdown) {
                    bbToggle.addEventListener('click', (e) => {
                        e.stopPropagation();

                        // sab select dropdown band
                        document.querySelectorAll('.custom-select-options').forEach(c => c.classList.add('hidden'));

                        bbDropdown.style.display = (bbDropdown.style.display === 'block' ? 'none' : 'block');
                    });
                }

                // ---------- Close dropdowns when clicking outside ----------
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('.custom-select-wrapper')) {
                        document.querySelectorAll('.custom-select-options').forEach(c => c.classList.add('hidden'));
                    }

                    if (bbDropdown && !bbDropdown.contains(e.target) && !bbToggle.contains(e.target)) {
                        bbDropdown.style.display = 'none';
                    }
                });

                // ---------- Bed & Bath Button Selection + hidden field update ----------
                function setupButtonSelection(selector, hiddenId) {
                    const buttons    = document.querySelectorAll(selector);
                    const hiddenInput = document.getElementById(hiddenId);

                    buttons.forEach(button => {
                        button.addEventListener('click', (e) => {
                            e.preventDefault();

                            buttons.forEach(btn => btn.classList.remove('active'));
                            button.classList.add('active');

                            if (hiddenInput) {
                                hiddenInput.value = button.dataset.value;
                            }
                        });
                    });
                }

                setupButtonSelection('.bb-bed', 'bedrooms');
                setupButtonSelection('.bb-bath', 'bathrooms');
            });
        </script>



    </div>
</section>


{{-- mobile screen --}}
<nav class="nav bg-gray-200/70 backdrop-blur-lg border-b border-black/10 w-full z-50 top-0 pt-2 block md:hidden">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="nav__inner flex justify-between items-center h-20">

        <!-- Desktop Menu -->
        <div class="nav__menu desktop hidden xl:flex items-center space-x-6">
          <form class="search-form flex items-center gap-3">

            <!-- Location Selector -->
            <div class="search-form__group relative">
              <svg class="search-form__icon absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-black/70" fill="none"
                   stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <select class="search-form__select bg-white/40 border border-black/20 rounded-2xl text-sm text-black pl-12 pr-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
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

            <!-- Property Type Selector -->
            <div class="search-form__group relative">
              <svg class="search-form__icon absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-black/70" fill="none"
                   stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10h3m10-11l2 2v9h-3m-6 0h6"/>
              </svg>
              <select class="search-form__select bg-white/40 border border-black/20 rounded-2xl text-sm text-black pl-12 pr-8 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
                <option>Property Type</option>
                <option>Villa/House</option>
                <option>Beachfront</option>
                <option>Sea View</option>
                <option>Land</option>
              </select>
            </div>

            <!-- Price Range -->
            <div class="search-form__group flex gap-2">
              <select class="search-form__select bg-white/40 border border-black/20 rounded-2xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
                <option>Min</option>
                <option>฿1,000,000</option>
                <option>฿5,000,000</option>
              </select>
              <select class="search-form__select bg-white/40 border border-black/20 rounded-2xl text-sm text-black px-4 py-3 focus:ring-2 focus:ring-blue-400 hover:bg-white/60 cursor-pointer">
                <option>Max</option>
                <option>฿10,000,000</option>
                <option>฿50,000,000</option>
              </select>
            </div>

            <!-- Bed & Bath Dropdown -->
            <div class="search-form__group relative">
              <button type="button" id="bedBathToggle" class="search-form__button w-full bg-white/40 border border-black/20 text-black text-sm rounded-2xl px-4 py-3 flex items-center justify-between focus:ring-2 focus:ring-blue-400 hover:bg-white/60 transition">
                <span class="font-medium">Bed & Bath</span>
                <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
              </button>

              <div id="bedBathDropdown" class="search-form__dropdown absolute left-0 mt-2 w-full sm:w-80 bg-white text-black rounded-2xl shadow-2xl p-6 hidden transition-transform duration-200 scale-95 opacity-0 origin-top">
                <div class="flex flex-col gap-6">
                  <div>
                    <p class="search-form__label uppercase text-xs font-semibold mb-3 tracking-wide">Bedrooms</p>
                    <div class="flex gap-2 flex-wrap">
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white">Any</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">1+</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">2+</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">3+</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">4+</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">5+</button>
                    </div>
                  </div>
                  <div>
                    <p class="search-form__label uppercase text-xs font-semibold mb-3 tracking-wide">Bathrooms</p>
                    <div class="flex gap-2 flex-wrap">
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white">Any</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">1+</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">2+</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">3+</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">4+</button>
                      <button class="bb-option px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white">5+</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Reset Button -->
            <button type="reset" class="search-form__reset text-black bg-white/60 border border-black/10 px-6 py-3 rounded-2xl font-semibold hover:bg-blue-400 hover:text-white transition flex items-center gap-2">
              <i class="fas fa-redo-alt"></i> Reset
            </button>
          </form>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuToggleBtn" class="nav__mobile-toggle xl:hidden text-black focus:outline-none text-2xl">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <form action="{{ route('property') }}" method="GET" class="flex flex-col gap-3" id="mobileFilterForm">

        {{-- LOCATION (custom dropdown like desktop) --}}
        <div class="custom-select-wrapper relative border border-gray-300 rounded-2xl bg-white"
             data-target="m_city">
            <div class="custom-select-header" data-value="{{ request('city','') }}">
            <span class="custom-select-label">
                {{ request('city') ? request('city') : 'Location' }}
            </span>
                <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div class="custom-select-options hidden absolute left-0 mt-2 w-full bg-white">
                <div class="custom-option {{ !request('city') ? 'selected' : '' }}" data-value="">Location</div>
                @foreach($cities as $city)
                    <div class="custom-option {{ request('city') === $city->name ? 'selected' : '' }}"
                         data-value="{{ $city->name }}">
                        {{ $city->name }}
                    </div>
                @endforeach
            </div>
        </div>
        <input type="hidden" name="city" id="m_city" value="{{ request('city','') }}">


        {{-- PROPERTY TYPE (custom dropdown like desktop) --}}
        <div class="custom-select-wrapper relative border border-gray-300 rounded-2xl bg-white"
             data-target="m_property_type_id">

            @php
                $mobileTypeLabel = 'Property Type';
                if (request('property_type_id')) {
                    $t = $propertyTypes->firstWhere('id', (int)request('property_type_id'));
                    if ($t) $mobileTypeLabel = $t->title;
                }
            @endphp

            <div class="custom-select-header" data-value="{{ request('property_type_id','') }}">
                <span class="custom-select-label">{{ $mobileTypeLabel }}</span>
                <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div class="custom-select-options hidden absolute left-0 mt-2 w-full bg-white">
                <div class="custom-option {{ !request('property_type_id') ? 'selected' : '' }}" data-value="">
                    Property Type
                </div>
                @foreach($propertyTypes as $type)
                    <div class="custom-option {{ (string)request('property_type_id') === (string)$type->id ? 'selected' : '' }}"
                         data-value="{{ $type->id }}">
                        {{ $type->title }}
                    </div>
                @endforeach
            </div>
        </div>
        <input type="hidden" name="property_type_id" id="m_property_type_id" value="{{ request('property_type_id','') }}">


        {{-- MIN/MAX (custom dropdown like desktop) --}}
        <div class="flex gap-2">
            {{-- MIN --}}
            @php
                $mMinVal = request('min_price');
                $mMinLabel = 'Min';
                if ($mMinVal) {
                    $fm = $minPrices->firstWhere('value', (int)$mMinVal);
                    if ($fm) $mMinLabel = $fm->label;
                }
            @endphp
            <div class="custom-select-wrapper flex-1 relative border border-gray-300 rounded-2xl bg-white"
                 data-target="m_min_price">
                <div class="custom-select-header" data-value="{{ $mMinVal ?? '' }}">
                    <span class="custom-select-label">{{ $mMinLabel }}</span>
                    <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                <div class="custom-select-options hidden absolute left-0 mt-2 w-full bg-white">
                    <div class="custom-option {{ !request('min_price') ? 'selected' : '' }}" data-value="">Min</div>
                    @foreach($minPrices as $price)
                        <div class="custom-option {{ (string)request('min_price') === (string)$price->value ? 'selected' : '' }}"
                             data-value="{{ $price->value }}">
                            {{ $price->label }}
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- MAX --}}
            @php
                $mMaxVal = request('max_price');
                $mMaxLabel = 'Max';
                if ($mMaxVal) {
                    $fx = $maxPrices->firstWhere('value', (int)$mMaxVal);
                    if ($fx) $mMaxLabel = $fx->label;
                }
            @endphp
            <div class="custom-select-wrapper flex-1 relative border border-gray-300 rounded-2xl bg-white"
                 data-target="m_max_price">
                <div class="custom-select-header" data-value="{{ $mMaxVal ?? '' }}">
                    <span class="custom-select-label">{{ $mMaxLabel }}</span>
                    <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                <div class="custom-select-options hidden absolute left-0 mt-2 w-full bg-white">
                    <div class="custom-option {{ !request('max_price') ? 'selected' : '' }}" data-value="">Max</div>
                    @foreach($maxPrices as $price)
                        <div class="custom-option {{ (string)request('max_price') === (string)$price->value ? 'selected' : '' }}"
                             data-value="{{ $price->value }}">
                            {{ $price->label }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <input type="hidden" name="min_price" id="m_min_price" value="{{ request('min_price','') }}">
        <input type="hidden" name="max_price" id="m_max_price" value="{{ request('max_price','') }}">


        {{-- BED & BATH (same as desktop: buttons + hidden values) --}}
        <div class="relative border border-gray-300 rounded-2xl bg-white">
            <button type="button" id="m_bb_toggle" class="custom-select-header w-full">
                <span class="font-medium">Bed & Bath</span>
                <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="m_bb_dropdown" class="p-4 hidden bg-white rounded-2xl shadow-lg absolute left-0 mt-2 w-full z-50">
                <div class="flex flex-col gap-4">
                    <div>
                        <p class="uppercase text-xs font-semibold mb-2">Bedrooms</p>
                        <div class="flex gap-2 flex-wrap">
                            @php $mbeds = request('bedrooms','any'); @endphp
                            <button type="button" class="bb-bed {{ $mbeds==='any' ? 'active':'' }}" data-value="any">Any</button>
                            <button type="button" class="bb-bed {{ $mbeds==='1+'||$mbeds==='1' ? 'active':'' }}" data-value="1+">1+</button>
                            <button type="button" class="bb-bed {{ $mbeds==='2+'||$mbeds==='2' ? 'active':'' }}" data-value="2+">2+</button>
                            <button type="button" class="bb-bed {{ $mbeds==='3+'||$mbeds==='3' ? 'active':'' }}" data-value="3+">3+</button>
                            <button type="button" class="bb-bed {{ $mbeds==='4+'||$mbeds==='4' ? 'active':'' }}" data-value="4+">4+</button>
                            <button type="button" class="bb-bed {{ $mbeds==='5+'||$mbeds==='5' ? 'active':'' }}" data-value="5+">5+</button>
                        </div>
                    </div>

                    <div>
                        <p class="uppercase text-xs font-semibold mb-2">Bathrooms</p>
                        <div class="flex gap-2 flex-wrap">
                            @php $mbaths = request('bathrooms','any'); @endphp
                            <button type="button" class="bb-bath {{ $mbaths==='any' ? 'active':'' }}" data-value="any">Any</button>
                            <button type="button" class="bb-bath {{ $mbaths==='1+'||$mbaths==='1' ? 'active':'' }}" data-value="1+">1+</button>
                            <button type="button" class="bb-bath {{ $mbaths==='2+'||$mbaths==='2' ? 'active':'' }}" data-value="2+">2+</button>
                            <button type="button" class="bb-bath {{ $mbaths==='3+'||$mbaths==='3' ? 'active':'' }}" data-value="3+">3+</button>
                            <button type="button" class="bb-bath {{ $mbaths==='4+'||$mbaths==='4' ? 'active':'' }}" data-value="4+">4+</button>
                            <button type="button" class="bb-bath {{ $mbaths==='5+'||$mbaths==='5' ? 'active':'' }}" data-value="5+">5+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="bedrooms" id="m_bedrooms" value="{{ request('bedrooms','any') }}">
        <input type="hidden" name="bathrooms" id="m_bathrooms" value="{{ request('bathrooms','any') }}">


        {{-- Buttons --}}
        <div class="flex gap-2">
            <button type="submit" class="flex-1 bg-black text-white py-3 rounded-xl font-semibold hover:bg-black/90 transition">
                Search
            </button>

            <a href="{{ route('property') }}"
               class="flex-1 text-center bg-blue-500 text-white py-3 rounded-xl font-semibold hover:bg-blue-600 transition">
                Reset
            </a>
        </div>
    </form>

  </nav>


{{--<script>--}}
{{--    // Mobile Menu Toggle--}}
{{--const mobileBtn = document.getElementById('mobileMenuToggleBtn');--}}
{{--const mobileMenu = document.getElementById('mobileMenuDropdown');--}}

{{--mobileBtn.addEventListener('click', () => {--}}
{{--  mobileMenu.classList.toggle('hidden');--}}
{{--  mobileBtn.innerHTML = mobileMenu.classList.contains('hidden') ?--}}
{{--    '<i class="fas fa-bars"></i>' :--}}
{{--    '<i class="fas fa-times"></i>';--}}
{{--});--}}

{{--// Bed & Bath Toggle--}}
{{--const bedBathBtn = document.getElementById('bedBathToggle');--}}
{{--const bedBathDropdown = document.getElementById('bedBathDropdown');--}}

{{--bedBathBtn.addEventListener('click', () => {--}}
{{--  bedBathDropdown.classList.toggle('hidden');--}}
{{--  bedBathDropdown.classList.toggle('scale-95');--}}
{{--  bedBathDropdown.classList.toggle('opacity-0');--}}
{{--  bedBathDropdown.classList.toggle('scale-100');--}}
{{--  bedBathDropdown.classList.toggle('opacity-100');--}}
{{--});--}}

{{--</script>--}}


{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}

{{--        // ---------------- Mobile Menu Toggle ------------------}}
{{--        const mobileBtn  = document.getElementById('mobileMenuToggleBtn');--}}
{{--        const mobileMenu = document.getElementById('mobileMenuDropdown');--}}

{{--        mobileBtn?.addEventListener('click', () => {--}}
{{--            mobileMenu.classList.toggle('hidden');--}}
{{--            mobileBtn.innerHTML = mobileMenu.classList.contains('hidden')--}}
{{--                ? '<i class="fas fa-bars"></i>'--}}
{{--                : '<i class="fas fa-times"></i>';--}}

{{--            // close all dropdowns when closing menu--}}
{{--            if (mobileMenu.classList.contains('hidden')) closeAllMobileDropdowns();--}}
{{--        });--}}

{{--        // ---------------- Custom Select Logic (MOBILE) ------------------}}
{{--        const mBbToggle   = document.getElementById('m_bb_toggle');--}}
{{--        const mBbDropdown = document.getElementById('m_bb_dropdown');--}}

{{--        function closeAllMobileDropdowns() {--}}
{{--            document.querySelectorAll('#mobileMenuDropdown .custom-select-options').forEach(c => c.classList.add('hidden'));--}}
{{--            if (mBbDropdown) mBbDropdown.classList.add('hidden');--}}
{{--        }--}}

{{--        // open/close custom dropdowns--}}
{{--        document.querySelectorAll('#mobileMenuDropdown .custom-select-wrapper').forEach(wrapper => {--}}
{{--            const header = wrapper.querySelector('.custom-select-header');--}}
{{--            const optionsContainer = wrapper.querySelector('.custom-select-options');--}}
{{--            const options = wrapper.querySelectorAll('.custom-option');--}}
{{--            const target  = wrapper.dataset.target;--}}

{{--            if (!header || !optionsContainer) return;--}}

{{--            header.addEventListener('click', (e) => {--}}
{{--                e.stopPropagation();--}}

{{--                // close other dropdowns--}}
{{--                document.querySelectorAll('#mobileMenuDropdown .custom-select-options').forEach(c => {--}}
{{--                    if (c !== optionsContainer) c.classList.add('hidden');--}}
{{--                });--}}

{{--                // close Bed&Bath--}}
{{--                if (mBbDropdown) mBbDropdown.classList.add('hidden');--}}

{{--                optionsContainer.classList.toggle('hidden');--}}
{{--            });--}}

{{--            options.forEach(option => {--}}
{{--                option.addEventListener('click', (e) => {--}}
{{--                    e.stopPropagation();--}}

{{--                    // label update--}}
{{--                    const labelEl = header.querySelector('.custom-select-label');--}}
{{--                    if (labelEl) labelEl.textContent = option.textContent.trim();--}}

{{--                    // selected class--}}
{{--                    options.forEach(opt => opt.classList.remove('selected'));--}}
{{--                    option.classList.add('selected');--}}

{{--                    // hidden input update--}}
{{--                    if (target) {--}}
{{--                        const hiddenInput = document.getElementById(target);--}}
{{--                        if (hiddenInput) hiddenInput.value = option.dataset.value ?? '';--}}
{{--                    }--}}

{{--                    optionsContainer.classList.add('hidden');--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}

{{--        // ---------------- Bed & Bath (MOBILE) ------------------}}
{{--        mBbToggle?.addEventListener('click', (e) => {--}}
{{--            e.stopPropagation();--}}
{{--            // close other selects--}}
{{--            document.querySelectorAll('#mobileMenuDropdown .custom-select-options').forEach(c => c.classList.add('hidden'));--}}
{{--            mBbDropdown.classList.toggle('hidden');--}}
{{--        });--}}

{{--        function setupBtn(selector, hiddenId) {--}}
{{--            const buttons = document.querySelectorAll(`#mobileMenuDropdown ${selector}`);--}}
{{--            const hidden  = document.getElementById(hiddenId);--}}

{{--            buttons.forEach(btn => {--}}
{{--                btn.addEventListener('click', (e) => {--}}
{{--                    e.preventDefault();--}}
{{--                    buttons.forEach(b => b.classList.remove('active'));--}}
{{--                    btn.classList.add('active');--}}
{{--                    if (hidden) hidden.value = btn.dataset.value;--}}
{{--                });--}}
{{--            });--}}
{{--        }--}}
{{--        setupBtn('.bb-bed', 'm_bedrooms');--}}
{{--        setupBtn('.bb-bath', 'm_bathrooms');--}}

{{--        // ---------------- Outside Click Close ------------------}}
{{--        document.addEventListener('click', (e) => {--}}
{{--            if (!e.target.closest('#mobileMenuDropdown')) return;--}}
{{--            if (!e.target.closest('.custom-select-wrapper') && !e.target.closest('#m_bb_dropdown') && !e.target.closest('#m_bb_toggle')) {--}}
{{--                closeAllMobileDropdowns();--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        function setHeaderLabel(wrapper, text) {
            const header = wrapper?.querySelector('.custom-select-header');
            const label  = header?.querySelector('.custom-select-label');
            if (label) label.textContent = text;
        }

        function getWrapper(target) {
            return document.querySelector(`.custom-select-wrapper[data-target="${target}"]`);
        }

        function filterPriceOptions(minTarget, maxTarget, minDefaultText='Min', maxDefaultText='Max') {
            const minWrap = getWrapper(minTarget);
            const maxWrap = getWrapper(maxTarget);

            const minInput = document.getElementById(minTarget);
            const maxInput = document.getElementById(maxTarget);

            if (!minWrap || !maxWrap || !minInput || !maxInput) return;

            const minVal = minInput.value ? parseInt(minInput.value, 10) : null;
            const maxVal = maxInput.value ? parseInt(maxInput.value, 10) : null;

            // -------- MAX options: show only >= MIN
            maxWrap.querySelectorAll('.custom-option').forEach(opt => {
                const v = opt.dataset.value ?? '';
                if (v === '') { opt.classList.remove('hidden'); return; } // default Max
                const n = parseInt(v, 10);
                if (minVal !== null && n < minVal) opt.classList.add('hidden');
                else opt.classList.remove('hidden');
            });

            // -------- MIN options: show only <= MAX
            minWrap.querySelectorAll('.custom-option').forEach(opt => {
                const v = opt.dataset.value ?? '';
                if (v === '') { opt.classList.remove('hidden'); return; } // default Min
                const n = parseInt(v, 10);
                if (maxVal !== null && n > maxVal) opt.classList.add('hidden');
                else opt.classList.remove('hidden');
            });

            // -------- If selected values become invalid => reset them
            if (minVal !== null && maxVal !== null && minVal > maxVal) {
                // reset max (you can choose reset min instead)
                maxInput.value = '';
                setHeaderLabel(maxWrap, maxDefaultText);

                // maxWrap: selected class reset
                maxWrap.querySelectorAll('.custom-option').forEach(opt => opt.classList.remove('selected'));
                const defMax = maxWrap.querySelector('.custom-option[data-value=""]');
                if (defMax) defMax.classList.add('selected');
            }
        }

        // Initial apply on page load
        filterPriceOptions('min_price', 'max_price', 'Min', 'Max');       // desktop
        filterPriceOptions('m_min_price', 'm_max_price', 'Min', 'Max');   // mobile

        // Re-apply whenever any custom option is clicked (after your selection logic runs)
        document.addEventListener('click', function (e) {
            if (e.target.classList?.contains('custom-option')) {
                // tiny delay so hidden inputs update first
                setTimeout(() => {
                    filterPriceOptions('min_price', 'max_price', 'Min', 'Max');
                    filterPriceOptions('m_min_price', 'm_max_price', 'Min', 'Max');
                }, 0);
            }
        });

    });
</script>
