<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    /* Fix for dropdown appearing behind hero section */
    nav {
        position: relative;
        z-index: 60;
    }

    #menu-categories,
    #menu-currency,
    #menu-language {
        z-index: 70 !important;
    }

    #mobile-menu {
        z-index: 80 !important;
        position: relative;
    }

    .dropdown-shadow {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .hover-lift {
        transition: all 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-2px);
    }

    .gradient-text {
        background: linear-gradient(135deg, #306be9 0%, #57d0f5 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .mobile-menu-bg {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    }

    .property-count {
        font-size: 0.7rem;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        padding: 2px 6px;
        margin-left: 4px;
    }

    .dropdown-enter {
        animation: dropdownEnter 0.2s ease-out;
    }

    @keyframes dropdownEnter {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    }
</style>

<!-- Enhanced NAVBAR with z-index fix -->
<nav class="navbar-gradient shadow-xl top-0 z-60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Enhanced Logo -->
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('asset/img/head-logo.jpeg') }}" alt="" class="w-28 h-12">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6 items-center">

                <a href="{{ route('property') }}"
                    class="text-black hover:text-blue-500 transition flex items-center hover-lift">
                    <i class="fas fa-shopping-cart mr-1"></i>
                    Buy
                </a>
               {{--  <a href="{{ route('property') }}"
                    class="text-black hover:text-blue-500 transition flex items-center hover-lift">
                    <i class="fas fa-key mr-1"></i>
                    Rent
                </a> --}}
                @php
                    $propertyTypes = \App\Models\PropertyType::all();
                @endphp

                <!-- Enhanced Categories Dropdown -->
                <div class="relative group">
                    <button class="flex items-center text-black hover:text-blue-500 transition hover-lift"
                        onclick="toggleDropdown('categories')">
                        <i class="fas fa-th-large mr-1"></i>
                        Categories
                        <svg id="arrow-categories" class="w-4 h-4 ml-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="menu-categories"
                        class="absolute mt-2 w-56 bg-white rounded-lg dropdown-shadow hidden overflow-hidden dropdown-enter"
                        style="z-index: 70;">
                        <div class="p-3 dropdown-header text-white">
                            <h3 class="font-semibold">Property Types</h3>
                        </div>
                        <div class="py-2">
                            @foreach($propertyTypes as $propertyType)
                                <a href="{{ route('property', $propertyType->slug) }}"
                                   class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="{{ $propertyType->icon_class }} text-gray-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium">
                                            {{ $propertyType->title ?? $propertyType->name }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ number_format($propertyType->properties_count) }} properties
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        {{--                        <div class="py-2">--}}
{{--                            @foreach($propertyTypes as $propertyType)--}}
{{--                                <a href="{{ route('property', 'villa-house') }}"--}}
{{--                                   class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">--}}
{{--                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">--}}
{{--                                        <i class="{{$propertyType->icon_class}} text-gray-600"></i>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="font-medium">{{$propertyType->name}}</div>--}}
{{--                                        <div class="text-xs text-gray-500">{{number_format($propertyType->properties->count())}} properties</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            @endforeach--}}

{{--                            <a href="{{ route('property', 'sea-view') }}"--}}
{{--                                class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">--}}
{{--                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">--}}
{{--                                    <i class="fas fa-umbrella-beach text-gray-600"></i>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="font-medium">Sea View</div>--}}
{{--                                    <div class="text-xs text-gray-500">567 properties</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="{{route('property', 'beachfront')}}"--}}
{{--                                class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">--}}
{{--                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">--}}
{{--                                    <i class="fas fa-city text-gray-600"></i>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="font-medium">Beachfront</div>--}}
{{--                                    <div class="text-xs text-gray-500">890 properties</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="{{route('property', 'land')}}" class="flex items-center px-4 py-3 hover:bg-gray-50 transition">--}}
{{--                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">--}}
{{--                                    <i class="fas fa-mountain text-gray-600"></i>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="font-medium">Land</div>--}}
{{--                                    <div class="text-xs text-gray-500">321 properties</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="{{route('property', 'business')}}"--}}
{{--                            class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">--}}
{{--                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">--}}
{{--                                <i class="fas fa-city text-gray-600"></i>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <div class="font-medium">Bussiness</div>--}}
{{--                                <div class="text-xs text-gray-500">890 properties</div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        --}}{{-- <a href="{{route('property')}}"--}}
{{--                        class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">--}}
{{--                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">--}}
{{--                            <i class="fas fa-city text-gray-600"></i>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="font-medium">Rental</div>--}}
{{--                            <div class="text-xs text-gray-500">890 properties</div>--}}
{{--                        </div>--}}
{{--                    </a> --}}
{{--                        </div>--}}
                    </div>
                </div>

                {{-- <a href="{{ route('about') }}"
                    class="text-black hover:text-blue-500 transition flex items-center hover-lift">
                    <i class="fas fa-info-circle mr-1"></i>
                    About
                </a>
            <a href="{{ route('feature') }}"
                class="text-black hover:text-blue-500 transition flex items-center hover-lift">
                <i class="fas fa-info-circle mr-1"></i>
                Detail
            </a> --}}
                <a href="{{ route('contact') }}"
                    class="text-black hover:text-blue-500 transition flex items-center hover-lift">
                    <i class="fas fa-envelope mr-1"></i>
                    Contact
                </a>

                <a href="{{ route('dashboard') }}"
                    class="text-black hover:text-blue-500 transition flex items-center hover-lift">
                    <i class="fas fa-envelope mr-1"></i>
                    Dashboard
                </a>

                <!-- Enhanced Currency Dropdown -->
                <div class="relative group">
                    <button class="flex items-center text-black hover:text-blue-500 transition hover-lift"
                        onclick="toggleDropdown('currency')">
                        <i class="fas fa-money-bill-wave mr-1"></i>
                        THB ฿
                        <svg id="arrow-currency" class="w-4 h-4 ml-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="menu-currency"
                        class="absolute mt-2 w-40 bg-white rounded-lg dropdown-shadow hidden overflow-hidden dropdown-enter"
                        style="z-index: 70;">
                        <div class="p-3 dropdown-header text-white">
                            <h3 class="font-semibold">Select Currency</h3>
                        </div>
                        <div class="py-2">
                            <a href="#"
                               class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">
                                <span class="font-medium mr-2">Baht</span>- THB ฿
                            </a>
                            <a href="#"
                               class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">
                                <span class="font-medium mr-2">United</span>- USD $
                            </a>
                            <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition">
                                <span class="font-medium mr-2">Euro</span>- EUR €
                            </a>
                            <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition">
                                <span class="font-medium mr-2">Pound Sterling</span>- GBP £
                            </a>
                            <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition">
                                <span class="font-medium mr-2">Russian Ruble</span>- RUB ₽
                            </a>
                            <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 transition">
                                <span class="font-medium mr-2">Chinese Yuan</span>- CNY ¥
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Enhanced Language Dropdown -->
                <div class="relative group">
                    <button class="flex items-center text-black hover:text-blue-500 transition hover-lift"
                        onclick="toggleDropdown('language')">
                        <i class="fas fa-globe mr-1"></i>
                        English
                        <svg id="arrow-language" class="w-4 h-4 ml-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="menu-language"
                        class="absolute mt-2 w-40 bg-white rounded-lg dropdown-shadow hidden overflow-hidden dropdown-enter"
                        style="z-index: 70;">
                        <div class="p-3 dropdown-header text-white">
                            <h3 class="font-semibold">Select Language</h3>
                        </div>
                        <div class="py-2">
                            <a href="#"
                               class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">
                                <span class="w-6 mr-2 text-center"><span class="fi fi-us"></span></span> English
                            </a>
                            <a href="#"
                               class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">
                                <span class="w-6 mr-2 text-center"><span class="fi fi-th"></span></span> ไทย
                            </a>
                            <a href="#"
                               class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">
                                <span class="w-6 mr-2 text-center"><span class="fi fi-cn"></span></span> 中文
                            </a>
                            <a href="#"
                               class="flex items-center px-4 py-3 hover:bg-gray-50 transition border-b border-gray-100">
                                <span class="w-6 mr-2 text-center"><span class="fi fi-fr"></span></span> Français
                            </a>
                            <a href="#"
                               class="flex items-center px-4 py-3 hover:bg-gray-50 transition">
                                <span class="w-6 mr-2 text-center"><span class="fi fi-th"></span></span> ภาษาไทย
                            </a>
                        </div>

                    </div>
                </div>

                <!-- User Profile / Login -->
                {{-- <div class="relative group">
                    <button class="flex items-center text-white  transition hover-lift">
                        <div
                            class="w-8 h-8 bg-gradient-to-r from-blue-400 to-sky-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                    </button>
                </div> --}}
            </div>

            <!-- Mobile Button -->
            <div class="md:hidden flex items-center">
                <button onclick="toggleMobileMenu()" class="text-black focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Enhanced Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden mobile-menu-bg px-4 pb-6 pt-2" style="z-index: 80;">
        <div class="space-y-4">
            <a href="{{ route('property') }}"
                class="block py-3 text-white hover:bg-white/10 rounded-lg px-3 transition flex items-center">
                <i class="fas fa-shopping-cart mr-3 w-5 text-center"></i>
                Buy
            </a>
            {{-- <a href="{{ route('property') }}"
                class="block py-3 text-white hover:bg-white/10 rounded-lg px-3 transition flex items-center">
                <i class="fas fa-key mr-3 w-5 text-center"></i>
                Rent
            </a> --}}
            <div>
                <button onclick="toggleMobileDropdown('categories-mobile')"
                    class="w-full text-left py-3 flex justify-between items-center text-white hover:bg-white/10 rounded-lg px-3 transition z-90">
                    <div class="flex items-center">
                        <i class="fas fa-th-large mr-3 w-5 text-center"></i>
                        Categories
                    </div>
                    <svg id="arrow-categories-mobile" class="w-4 h-4 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="menu-categories-mobile" class="ml-8 mt-2 space-y-2  hidden">
                    <a href="{{ route('property') }}"
                        class="block py-2 text-white/80 hover:text-white transition flex items-center">
                        <i class="fas fa-building mr-2 w-4 text-center"></i>
                        Apartments <span class="property-count">1,234</span>
                    </a>
                    <a href="{{ route('property') }}"
                        class="block py-2 text-white/80 hover:text-white transition flex items-center">
                        <i class="fas fa-umbrella-beach mr-2 w-4 text-center"></i>
                        Villas <span class="property-count">567</span>
                    </a>
                    <a href="{{route('property')}}" class="block py-2 text-white/80 hover:text-white transition flex items-center">
                        <i class="fas fa-city mr-2 w-4 text-center"></i>
                        Townhouses <span class="property-count">890</span>
                    </a>
                    <a href="{{route('property')}}" class="block py-2 text-white/80 hover:text-white transition flex items-center">
                        <i class="fas fa-mountain mr-2 w-4 text-center"></i>
                        Land <span class="property-count">321</span>
                    </a>
                </div>
            </div>
            {{-- <a href="{{ route('about') }}"
                class="block py-3 text-white hover:bg-white/10 rounded-lg px-3 transition flex items-center">
                <i class="fas fa-info-circle mr-3 w-5 text-center"></i>
                About
            </a>
        <a href="{{ route('feature') }}"
            class="block py-3 text-white hover:bg-white/10 rounded-lg px-3 transition flex items-center">
            <i class="fas fa-info-circle mr-3 w-5 text-center"></i>
            Detail
        </a> --}}
            <a href="{{ route('contact') }}"
                class="block py-3 text-white hover:bg-white/10 rounded-lg px-3 transition flex items-center">
                <i class="fas fa-envelope mr-3 w-5 text-center"></i>
                Contact
            </a>

            <div class="pt-2 border-t border-white/20 ">
                <div class="text-white text-sm font-medium mb-2 px-3">Settings</div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-white/10 rounded-lg p-3">
                        <label class="text-white text-xs block mb-1">Currency</label>
                        <select class="w-full bg-transparent text-white text-sm focus:outline-none">
                            <option class="text-gray-800">THB ฿</option>
                            <option class="text-gray-800">USD $</option>
                            <option class="text-gray-800">EUR €</option>
                        </select>
                    </div>
                    <div class="bg-white/10 rounded-lg p-3">
                        <label class="text-white text-xs block mb-1">Language</label>
                        <select class="w-full text-black text-sm focus:outline-none">

                            <option><span class="w-6 mr-2 text-center"><span class="fi fi-us"></span></span> English<option>
                           <option ><span class="w-6 mr-2 text-center"><span class="fi fi-th"></span></span> ไทย</option>
                           <option >  <span class="w-6 mr-2 text-center"><span class="fi fi-cn"></span></span> 中文</option>
                           <option > <span class="w-6 mr-2 text-center"><span class="fi fi-fr"></span></span> Français</option>
                           <option> <span class="w-6 mr-2 text-center"><span class="fi fi-th"></span></span> ภาษาไทย</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- JS: Enhanced Dropdown Logic -->
<script>
    let currentDropdown = null;

    // Toggle dropdown (desktop)
    function toggleDropdown(id) {
        const menu = document.getElementById(`menu-${id}`);
        const arrow = document.getElementById(`arrow-${id}`);

        // If same dropdown clicked, close it
        if (currentDropdown === id) {
            menu.classList.add('hidden');
            arrow.classList.remove('rotate-180');
            currentDropdown = null;
            return;
        }

        // Close any open dropdown
        if (currentDropdown) {
            const prevMenu = document.getElementById(`menu-${currentDropdown}`);
            const prevArrow = document.getElementById(`arrow-${currentDropdown}`);
            prevMenu?.classList.add('hidden');
            prevArrow?.classList.remove('rotate-180');
        }

        // Open the new dropdown
        menu?.classList.remove('hidden');
        arrow?.classList.add('rotate-180');
        currentDropdown = id;
    }

    // Toggle mobile menu
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');

        // Reset mobile categories dropdown when closing mobile menu
        if (menu.classList.contains('hidden')) {
            document.getElementById('menu-categories-mobile')?.classList.add('hidden');
            document.getElementById('arrow-categories-mobile')?.classList.remove('rotate-180');
        }
    }

    // Toggle mobile dropdowns (like categories)
    function toggleMobileDropdown(id) {
        const menu = document.getElementById(`menu-${id}`);
        const arrow = document.getElementById(`arrow-${id}`);

        menu?.classList.toggle('hidden');
        arrow?.classList.toggle('rotate-180');
    }

    // Global click listener: close dropdowns when clicking outside
    document.addEventListener('click', function (e) {
        // Close desktop dropdowns
        if (currentDropdown) {
            const menu = document.getElementById(`menu-${currentDropdown}`);
            const toggleBtn = document.querySelector(`[onclick="toggleDropdown('${currentDropdown}')"]`);

            if (menu && toggleBtn && !menu.contains(e.target) && !toggleBtn.contains(e.target)) {
                menu.classList.add('hidden');
                document.getElementById(`arrow-${currentDropdown}`).classList.remove('rotate-180');
                currentDropdown = null;
            }
        }

        // Close mobile dropdown (categories)
        const mobileMenu = document.getElementById('menu-categories-mobile');
        const mobileToggle = document.querySelector(`[onclick="toggleMobileDropdown('categories-mobile')"]`);

        if (
            mobileMenu &&
            !mobileMenu.classList.contains('hidden') &&
            !mobileMenu.contains(e.target) &&
            !mobileToggle.contains(e.target)
        ) {
            mobileMenu.classList.add('hidden');
            document.getElementById('arrow-categories-mobile')?.classList.remove('rotate-180');
        }
    });
</script>
