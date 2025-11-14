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

<style>
    /* Custom scrollbar for aesthetic consistency */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-thumb { background-color: rgba(255, 255, 255, 0.2); border-radius: 3px; }

    /* General style for the custom input wrappers */
    .custom-select-wrapper {
        position: relative;
        user-select: none;
    }

    /* Style for the visible, clickable dropdown header */
    .custom-select-header {
        background-color: #e1e1e11f;

        border: 2px solid #0c0000;
        color: #0b0000;
        font-size: 0.875rem; /* text-sm */
        padding: 1rem 1rem; /* py-4 px-4 */
        border-radius: 1rem; /* rounded-2xl */
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        transition: all 0.2s;
    }
    .custom-select-header:hover {
        background-color: #7c8086; /* Slightly darker on hover */
    }
    .custom-select-header.icon-padded {
        padding-left: 3rem; /* Extra padding for icon */
    }

    /* Style for the hidden dropdown options list */
    .custom-select-options {
        position: absolute;
        top: 100%;
        left: 0;
        margin-top: 0.5rem;
        width: 100%;
        background-color: #ffffff; /* Options list is white with black text */
        color: #000000;
        border-radius: 1rem; /* rounded-2xl */
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
        background-color: #e5e7eb; /* Light gray hover */
    }
    .custom-option.selected {
        background-color: #000000;
        color: #ffffff;
    }
</style>

<section class="relative max-w-full ">


            <div class="bg-black/10 backdrop-blur-sm border border-white/50  p-4 md:p-6 transition-all duration-500 hover:shadow-white/20">
                <form class="flex flex-col lg:flex-row gap-4 items-stretch" onsubmit="alert('Searching with custom values...'); return false;">

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 flex-1">

                        <div class="custom-select-wrapper" data-dropdown-id="location">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-50">
                                <svg class="w-5 h-5 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="custom-select-header icon-padded" data-value="Koh Samui">
                                <span class="custom-select-label">Koh Samui</span>
                                <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="custom-select-options hidden">
                                <div class="custom-option selected" data-value="Koh Samui">Koh Samui</div>
                                <div class="custom-option" data-value="Bang Makham">Bang Makham</div>
                                <div class="custom-option" data-value="Band Por">Band Por</div>
                                <div class="custom-option" data-value="Bang Rak">Bang Rak</div>
                                <div class="custom-option" data-value="Bophut">Bophut</div>
                                </div>
                        </div>

                        <div class="custom-select-wrapper" data-dropdown-id="property-type">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-50">
                                <svg class="w-5 h-5 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </div>
                            <div class="custom-select-header icon-padded" data-value="Property Type">
                                <span class="custom-select-label">Property Type</span>
                                <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="custom-select-options hidden">
                                <div class="custom-option selected" data-value="Property Type">Property Type</div>
                                <div class="custom-option" data-value="Villa/House">Villa/House</div>
                                <div class="custom-option" data-value="Sea View">Sea View</div>
                                <div class="custom-option" data-value="Beachfront">Beachfront</div>
                                </div>
                        </div>

                        <div class="flex gap-2">
                            <div class="custom-select-wrapper flex-1" data-dropdown-id="min-price">
                                <div class="custom-select-header" data-value="Min">
                                    <span class="custom-select-label font-medium">Min</span>
                                    <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                                <div class="custom-select-options hidden">
                                    <div class="custom-option selected" data-value="Min">Min</div>
                                    <div class="custom-option" data-value="฿1,000,000">฿1,000,000</div>
                                    <div class="custom-option" data-value="฿3,000,000">฿3,000,000</div>
                                    </div>
                            </div>

                            <div class="custom-select-wrapper flex-1" data-dropdown-id="max-price">
                                <div class="custom-select-header" data-value="Max">
                                    <span class="custom-select-label font-medium">Max</span>
                                    <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                                <div class="custom-select-options hidden">
                                    <div class="custom-option selected" data-value="Max">Max</div>
                                    <div class="custom-option" data-value="฿10,000,000">฿10,000,000</div>
                                    <div class="custom-option" data-value="฿20,000,000">฿20,000,000</div>
                                    </div>
                            </div>
                        </div>

                        <div class="relative">
                            <button
                                type="button"
                                id="bb-toggle"
                                class="custom-select-header w-full border text-sm rounded-2xl px-4 py-4 flex items-center justify-between"
                            >
                                <span class="font-medium">Bed & Bath</span>
                                <svg class="w-4 h-4 text-black/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div id="bb-dropdown" class="absolute left-0 mt-2 w-full sm:w-80 bg-white text-black rounded-2xl shadow-2xl p-6 hidden z-50 transition-all duration-200 origin-top scale-95 opacity-0">
                                <div class="flex flex-col gap-6">
                                    <div>
                                        <p class="uppercase text-xs font-semibold mb-3 tracking-wide text-start">Bedrooms</p>
                                        <div class="flex gap-2 flex-wrap">
                                            <button class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white transition-colors" data-value="any">Any</button>
                                            <button class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white transition-colors" data-value="1+">1+</button>
                                            <button class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white transition-colors" data-value="2+">2+</button>
                                            <button class="bb-bed px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white transition-colors" data-value="3+">3+</button>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="uppercase text-xs font-semibold mb-3 tracking-wide text-start">Bathrooms</p>
                                        <div class="flex gap-2 flex-wrap">
                                            <button class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium bg-black text-white transition-colors" data-value="any">Any</button>
                                            <button class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white transition-colors" data-value="1+">1+</button>
                                            <button class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white transition-colors" data-value="2+">2+</button>
                                            <button class="bb-bath px-3 py-2 border border-black rounded-lg text-xs font-medium hover:bg-black hover:text-white transition-colors" data-value="3+">3+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="bg-white hover:bg-gray-200 text-black px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-white/20 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center justify-center gap-2 min-w-[140px]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v6h6M20 20v-6h-6M5.64 18.36A9 9 0 0118.36 5.64M6 6a9 9 0 0112.73 12.73"/>
                        </svg>
                        Reset
                    </button>

                </form>
            </div>

</section>

<script>
    // --- Custom Dropdown Logic (Replacing <select>) ---
    document.querySelectorAll('.custom-select-wrapper').forEach(wrapper => {
        const header = wrapper.querySelector('.custom-select-header');
        const optionsContainer = wrapper.querySelector('.custom-select-options');
        const options = wrapper.querySelectorAll('.custom-option');

        // Toggle dropdown visibility
        header.addEventListener('click', () => {
            // Close any other open dropdowns first
            document.querySelectorAll('.custom-select-options').forEach(container => {
                if (container !== optionsContainer) {
                    container.classList.add('hidden');
                }
            });
            document.getElementById('bb-dropdown').classList.add('hidden', 'opacity-0', 'scale-95'); // Also close Bed/Bath

            optionsContainer.classList.toggle('hidden');
        });

        // Handle option selection
        options.forEach(option => {
            option.addEventListener('click', () => {
                const value = option.getAttribute('data-value');
                const label = option.textContent.trim();

                // Update header display and value
                header.querySelector('.custom-select-label').textContent = label;
                header.setAttribute('data-value', value);

                // Update selection highlight
                options.forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');

                // Close dropdown
                optionsContainer.classList.add('hidden');
            });
        });
    });


    // --- Bed & Bath dropdown toggle (Original Logic) ---
    const bbToggle = document.getElementById('bb-toggle');
    const bbDropdown = document.getElementById('bb-dropdown');

    bbToggle.addEventListener('click', () => {
        // Close any other open dropdowns first
        document.querySelectorAll('.custom-select-options').forEach(container => {
            container.classList.add('hidden');
        });

        // Toggle Bed & Bath visibility
        const isHidden = bbDropdown.classList.contains('hidden');

        if (isHidden) {
            bbDropdown.classList.remove('hidden');
            void bbDropdown.offsetWidth;
            bbDropdown.classList.remove('opacity-0', 'scale-95');
        } else {
            bbDropdown.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                if (bbDropdown.classList.contains('opacity-0')) {
                    bbDropdown.classList.add('hidden');
                }
            }, 200);
        }
    });

    // --- Close all dropdowns when clicking outside ---
    document.addEventListener('click', (e) => {
      // Check for custom dropdowns
      if (!e.target.closest('.custom-select-wrapper')) {
        document.querySelectorAll('.custom-select-options').forEach(container => {
            container.classList.add('hidden');
        });
      }
      // Check for Bed & Bath dropdown
      if (!bbDropdown.contains(e.target) && !bbToggle.contains(e.target)) {
        bbDropdown.classList.add('hidden', 'opacity-0', 'scale-95');
      }
    });

    // --- Bed/Bath button logic to simulate selection ---
    function setupButtonSelection(selector) {
        document.querySelectorAll(selector).forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll(selector).forEach(btn => {
                    // Remove selection style
                    btn.classList.remove('bg-black', 'text-white');
                    btn.classList.add('hover:bg-black', 'hover:text-white');
                });
                // Apply selection style to the clicked button
                button.classList.add('bg-black', 'text-white');
                button.classList.remove('hover:bg-black', 'hover:text-white');
            });
        });
    }
    setupButtonSelection('.bb-bed');
    setupButtonSelection('.bb-bath');
</script>


