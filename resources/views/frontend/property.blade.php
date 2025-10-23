

@extends('component.main')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @include('frontend.villa')

<style>
                    .swiper-button-next, .swiper-button-prev {
                        color: white;
                        background: rgba(0, 0, 0, 0.5);
                        width: 32px;
                        height: 32px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .swiper-button-next:after, .swiper-button-prev:after {
                        font-size: 16px;
                        font-weight: bold;
                    }
                    .property-card {
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                    }
                    .property-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                    }
                    .favorite-btn.active i {
                        color: #ef4444;
                    }
</style>



    <!-- Share Modal -->
    <div id="shareModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Share Property</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex space-x-4 justify-center">
                <button class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button class="w-12 h-12 rounded-full bg-blue-400 text-white flex items-center justify-center">
                    <i class="fab fa-twitter"></i>
                </button>
                <button class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center">
                    <i class="fab fa-whatsapp"></i>
                </button>
                <button class="w-12 h-12 rounded-full bg-gray-800 text-white flex items-center justify-center">
                    <i class="far fa-envelope"></i>
                </button>
            </div>
            <div class="mt-4 flex">
                <input type="text" id="shareLink" value="https://example.com/property/123"
                    class="flex-1 border border-gray-300 rounded-l-lg px-3 py-2 text-sm" readonly>
                <button id="copyLink" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg text-sm">Copy</button>
            </div>
        </div>
    </div>




    <!-- Main Content -->
 <!-- Main Content -->
<main class="container max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col gap-8">
        <!-- Property Listings -->
        <div class="lg:w-full">
            <!-- Category Tabs -->
            {{-- <div class="bg-white rounded-xl shadow-sm p-4 mb-6 overflow-x-scroll lg:overflow-hidden">
                <div class="flex flex-row gap-2" id="property-tabs">
                    <button
                        class="p-2 md:px-4 md:py-2 bg-blue-600 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105 active-tab text-xs md:text-base"
                        data-tab="all">
                        All Properties
                    </button>
                    <button
                        class="p-2 md:px-4 md:py-2 bg-gray-200 text-gray-700 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 hover:bg-blue-100 hover:text-blue-600 text-xs md:text-base"
                        data-tab="sale">
                        For Sale
                    </button>
                    <button
                        class="p-2 md:px-4 md:py-2 bg-gray-200 text-gray-700 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 hover:bg-blue-100 hover:text-blue-600 text-xs md:text-base"
                        data-tab="rent">
                        For Rent
                    </button>
                    <button
                        class="p-2 md:px-4 md:py-2 bg-gray-200 text-gray-700 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 hover:bg-blue-100 hover:text-blue-600 text-xs md:text-base"
                        data-tab="new">
                        New Developments
                    </button>
                    <button
                        class="p-2 md:px-4 md:py-2 bg-gray-200 text-gray-700 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 hover:bg-blue-100 hover:text-blue-600 text-xs md:text-base"
                        data-tab="luxury">
                        Luxury
                    </button>
                </div>
            </div> --}}

            {{-- <!-- Results Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-base md:text-2xl font-bold text-gray-800" id="results-count">124 Properties Found</h2>
                    <p class="text-gray-600 text-xs">in Thailand</p>
                </div>
                <div class="flex items-center md:space-x-4">
                    <span class="text-gray-600 text-sm font-bold">Sort by:</span>
                    <select class="md:px-4 md:py-2 p-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option>Newest</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Size: Large to Small</option>
                    </select>
                </div>
            </div> --}}

            {{-- <!-- Property Grid -->
            <div class="container mx-auto md:px-4">
                <h1 class=" text-xl md:text-3xl font-bold text-gray-800 mb-8 text-center">Premium Properties</h1>

                <div id="property-container" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <!-- Property Card 1 - White Lotus Beach Residence -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="sale" data-category="luxury">
                        <div class="relative">
                            <div class="swiper propertySwiper1 h-48">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2013/10/12/18/05/villa-194671_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2020/03/20/20/06/strasbourg-4951889_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2012/08/25/11/28/at-home-54935_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded">LEASEHOLD FOR SALE</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <button
                                    class="favorite-btn bg-white/90 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center transition">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>

                            <!-- Price and icons overlay -->
                            <div
                                class="absolute bottom-0 left-0 right-0 px-4 py-3 flex justify-between items-center bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">
                                <!-- Price -->
                                <span class="text-white font-semibold text-lg">12,900,000THB</span>

                                <!-- Icons -->
                                <div class="flex space-x-3 text-white text-lg">
                                    <!-- Expand Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-expand"></i>
                                    </button>

                                    <!-- Heart Icon -->
                                    <button class="favorite-btn hover:text-red-400 transition">
                                        <i class="far fa-heart"></i>
                                    </button>

                                    <!-- Plus Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-bold text-gray-900 mb-1">White Lotus Beach Residence - Premium Villa...</h2>
                            <p class="text-gray-600 text-sm mb-4">Bang Por, Koh Samui, Thailand</p>

                            <!-- Property features -->
                            <div class="flex justify-between text-sm text-gray-700 mb-6">
                                <div class="flex items-center">
                                    <i class="fas fa-bed text-gray-500 mr-1"></i>
                                    <span>2-3 Bedrooms</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath text-gray-500 mr-1"></i>
                                    <span>3 Bathrooms</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-ruler-combined text-gray-500 mr-1"></i>
                                    <span>320 SQM</span>
                                </div>
                            </div>

                            <!-- Agent info and time -->
                            <div class="flex justify-between items-center mt-4">
                                <!-- Agent Info -->
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                        SH
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                    </div>
                                </div>

                                <!-- Share Button and Time -->
                                <div class="flex items-center space-x-2">
                                    <!-- Share Icon -->
                                    <button
                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                    <!-- Time Posted -->
                                    <p class="text-xs text-gray-500">2 months ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 2 - Modern Villa -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="sale" data-category="luxury">
                        <div class="relative">
                            <div class="swiper propertySwiper2 h-48">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2015/11/06/11/45/interior-1026447_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2015/11/06/11/39/single-family-home-1026371_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2016/11/18/17/20/living-room-1835923_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded">FOR SALE</span>
                            </div>
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
                                <span class="text-white font-semibold text-lg">12,900,000THB</span>

                                <!-- Icons -->
                                <div class="flex space-x-3 text-white text-lg">
                                    <!-- Expand Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-expand"></i>
                                    </button>

                                    <!-- Heart Icon -->
                                    <button class="favorite-btn hover:text-red-400 transition">
                                        <i class="far fa-heart"></i>
                                    </button>

                                    <!-- Plus Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Modern Villa in Beverly Hills</h3>
                                    <p class="text-gray-600 text-sm flex items-center mt-1">
                                        <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                        1234 Sunset Blvd, Beverly Hills
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-between text-sm text-gray-600 mt-4">
                                <div class="flex items-center">
                                    <i class="fas fa-bed text-gray-400 mr-1"></i>
                                    <span>4 Beds</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath text-gray-400 mr-1"></i>
                                    <span>3 Baths</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                    <span>3,500 sqft</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <!-- Agent Info -->
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                        SH
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                    </div>
                                </div>

                                <!-- Share Button and Time -->
                                <div class="flex items-center space-x-2">
                                    <!-- Share Icon -->
                                    <button
                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                    <!-- Time Posted -->
                                    <p class="text-xs text-gray-500">2 months ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 3 - Luxury Apartment -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="rent" data-category="new">
                        <div class="relative">
                            <div class="swiper propertySwiper3 h-48">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2019/11/12/17/48/villa-4621636_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2022/07/05/15/01/villa-7303284_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2017/05/12/00/22/project-2305733_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="bg-green-600 text-white text-xs font-medium px-2 py-1 rounded">FOR RENT</span>
                            </div>
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
                                <span class="text-white font-semibold text-lg">12,900,000THB</span>

                                <!-- Icons -->
                                <div class="flex space-x-3 text-white text-lg">
                                    <!-- Expand Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-expand"></i>
                                    </button>

                                    <!-- Heart Icon -->
                                    <button class="favorite-btn hover:text-red-400 transition">
                                        <i class="far fa-heart"></i>
                                    </button>

                                    <!-- Plus Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Luxury Apartment Downtown</h3>
                                    <p class="text-gray-600 text-sm flex items-center mt-1">
                                        <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                        5678 Main St, Los Angeles
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-between text-sm text-gray-600 mt-4">
                                <div class="flex items-center">
                                    <i class="fas fa-bed text-gray-400 mr-1"></i>
                                    <span>2 Beds</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath text-gray-400 mr-1"></i>
                                    <span>2 Baths</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                    <span>1,200 sqft</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <!-- Agent Info -->
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                        SH
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                    </div>
                                </div>

                                <!-- Share Button and Time -->
                                <div class="flex items-center space-x-2">
                                    <!-- Share Icon -->
                                    <button
                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                    <!-- Time Posted -->
                                    <p class="text-xs text-gray-500">2 months ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 4 - New Development -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="sale" data-category="new">
                        <div class="relative">
                            <div class="swiper propertySwiper4 h-48">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2017/04/10/22/28/residence-2219972_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2016/09/22/11/55/kitchen-1687121_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded">NEW DEVELOPMENT</span>
                            </div>
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
                                <span class="text-white font-semibold text-lg">8,500,000THB</span>

                                <!-- Icons -->
                                <div class="flex space-x-3 text-white text-lg">
                                    <!-- Expand Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-expand"></i>
                                    </button>

                                    <!-- Heart Icon -->
                                    <button class="favorite-btn hover:text-red-400 transition">
                                        <i class="far fa-heart"></i>
                                    </button>

                                    <!-- Plus Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Modern Condo Development</h3>
                                    <p class="text-gray-600 text-sm flex items-center mt-1">
                                        <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                        Sukhumvit, Bangkok
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-between text-sm text-gray-600 mt-4">
                                <div class="flex items-center">
                                    <i class="fas fa-bed text-gray-400 mr-1"></i>
                                    <span>1 Bed</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath text-gray-400 mr-1"></i>
                                    <span>1 Bath</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                    <span>45 SQM</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <!-- Agent Info -->
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                        SH
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                    </div>
                                </div>

                                <!-- Share Button and Time -->
                                <div class="flex items-center space-x-2">
                                    <!-- Share Icon -->
                                    <button
                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                    <!-- Time Posted -->
                                    <p class="text-xs text-gray-500">1 week ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 5 - Luxury Villa -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="sale" data-category="luxury">
                        <div class="relative">
                            <div class="swiper propertySwiper5 h-48">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2016/04/18/08/50/kitchen-1336160_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2016/11/18/17/46/architecture-1836070_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="bg-purple-600 text-white text-xs font-medium px-2 py-1 rounded">LUXURY VILLA</span>
                            </div>
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
                                <span class="text-white font-semibold text-lg">25,000,000THB</span>

                                <!-- Icons -->
                                <div class="flex space-x-3 text-white text-lg">
                                    <!-- Expand Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-expand"></i>
                                    </button>

                                    <!-- Heart Icon -->
                                    <button class="favorite-btn hover:text-red-400 transition">
                                        <i class="far fa-heart"></i>
                                    </button>

                                    <!-- Plus Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Premium Luxury Villa</h3>
                                    <p class="text-gray-600 text-sm flex items-center mt-1">
                                        <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                        Phuket, Thailand
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-between text-sm text-gray-600 mt-4">
                                <div class="flex items-center">
                                    <i class="fas fa-bed text-gray-400 mr-1"></i>
                                    <span>5 Beds</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath text-gray-400 mr-1"></i>
                                    <span>4 Baths</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                    <span>650 SQM</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <!-- Agent Info -->
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                        SH
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                    </div>
                                </div>

                                <!-- Share Button and Time -->
                                <div class="flex items-center space-x-2">
                                    <!-- Share Icon -->
                                    <button
                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                    <!-- Time Posted -->
                                    <p class="text-xs text-gray-500">3 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 6 - Rental Property -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="rent" data-category="luxury">
                        <div class="relative">
                            <div class="swiper propertySwiper6 h-48">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2017/08/02/01/01/living-room-2569325_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://cdn.pixabay.com/photo/2017/08/27/10/16/interior-2685521_1280.jpg"
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="bg-green-600 text-white text-xs font-medium px-2 py-1 rounded">LUXURY RENTAL</span>
                            </div>
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
                                <span class="text-white font-semibold text-lg">85,000THB/month</span>

                                <!-- Icons -->
                                <div class="flex space-x-3 text-white text-lg">
                                    <!-- Expand Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-expand"></i>
                                    </button>

                                    <!-- Heart Icon -->
                                    <button class="favorite-btn hover:text-red-400 transition">
                                        <i class="far fa-heart"></i>
                                    </button>

                                    <!-- Plus Icon -->
                                    <button class="hover:text-gray-300 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">Executive Rental Villa</h3>
                                    <p class="text-gray-600 text-sm flex items-center mt-1">
                                        <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                        Pattaya, Thailand
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-between text-sm text-gray-600 mt-4">
                                <div class="flex items-center">
                                    <i class="fas fa-bed text-gray-400 mr-1"></i>
                                    <span>3 Beds</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath text-gray-400 mr-1"></i>
                                    <span>3 Baths</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                    <span>280 SQM</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <!-- Agent Info -->
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                        SH
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                    </div>
                                </div>

                                <!-- Share Button and Time -->
                                <div class="flex items-center space-x-2">
                                    <!-- Share Icon -->
                                    <button
                                        class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                    <!-- Time Posted -->
                                    <p class="text-xs text-gray-500">1 month ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="flex items-center space-x-2">
                    <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-blue-100 hover:text-blue-600">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-3 py-2 rounded-lg bg-blue-600 text-white">1</button>
                    <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-blue-100 hover:text-blue-600">2</button>
                    <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-blue-100 hover:text-blue-600">3</button>
                    <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-blue-100 hover:text-blue-600">4</button>
                    <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-blue-100 hover:text-blue-600">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div> --}}




                <!-- Property Grid -->
                <div class="container mx-auto md:px-4 py-8">
                    <h1 class="text-xl md:text-3xl font-bold text-gray-800 mb-8 text-center">Premium Properties</h1>

                    <div id="property-container" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <!-- Property Card 1 - White Lotus Beach Residence -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="sale" data-category="luxury">
                            <div class="relative">
                                <div class="swiper propertySwiper1 h-48">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2013/10/12/18/05/villa-194671_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2020/03/20/20/06/strasbourg-4951889_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2012/08/25/11/28/at-home-54935_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span class="bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded">LEASEHOLD FOR SALE</span>
                                </div>
                                <div class="absolute top-3 right-3">
                                    <button
                                        class="favorite-btn bg-white/90 hover:bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center transition">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>

                                <!-- Price and icons overlay -->
                                <div
                                    class="absolute bottom-0 left-0 right-0 px-4 py-3 flex justify-between items-center bg-gradient-to-t from-black/70 via-black/30 to-transparent z-10">
                                    <!-- Price -->
                                    <span class="text-white font-semibold text-lg">12,900,000THB</span>

                                    <!-- Icons -->
                                    <div class="flex space-x-3 text-white text-lg">
                                        <!-- Expand Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-expand"></i>
                                        </button>

                                        <!-- Heart Icon -->
                                        <button class="favorite-btn hover:text-red-400 transition">
                                            <i class="far fa-heart"></i>
                                        </button>

                                        <!-- Plus Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h2 class="text-lg font-bold text-gray-900 mb-1">White Lotus Beach Residence - Premium Villa...</h2>
                                <p class="text-gray-600 text-sm mb-4">Bang Por, Koh Samui, Thailand</p>

                                <!-- Property features -->
                                <div class="flex justify-between text-sm text-gray-700 mb-6">
                                    <div class="flex items-center">
                                        <i class="fas fa-bed text-gray-500 mr-1"></i>
                                        <span>2-3 Bedrooms</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-bath text-gray-500 mr-1"></i>
                                        <span>3 Bathrooms</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-ruler-combined text-gray-500 mr-1"></i>
                                        <span>320 SQM</span>
                                    </div>
                                </div>

                                <!-- Agent info and time -->
                                <div class="flex justify-between items-center mt-4">
                                    <!-- Agent Info -->
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                            SH
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                        </div>
                                    </div>

                                    <!-- Share Button and Time -->
                                    <div class="flex items-center space-x-2">
                                        <!-- Share Icon -->
                                        <button
                                            class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                        <!-- Time Posted -->
                                        <p class="text-xs text-gray-500">2 months ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 2 - Modern Villa -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="sale" data-category="luxury">
                            <div class="relative">
                                <div class="swiper propertySwiper2 h-48">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2015/11/06/11/45/interior-1026447_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2015/11/06/11/39/single-family-home-1026371_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2016/11/18/17/20/living-room-1835923_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span class="bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded">FOR SALE</span>
                                </div>
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
                                    <span class="text-white font-semibold text-lg">12,900,000THB</span>

                                    <!-- Icons -->
                                    <div class="flex space-x-3 text-white text-lg">
                                        <!-- Expand Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-expand"></i>
                                        </button>

                                        <!-- Heart Icon -->
                                        <button class="favorite-btn hover:text-red-400 transition">
                                            <i class="far fa-heart"></i>
                                        </button>

                                        <!-- Plus Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-800">Modern Villa in Beverly Hills</h3>
                                        <p class="text-gray-600 text-sm flex items-center mt-1">
                                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                            1234 Sunset Blvd, Beverly Hills
                                        </p>
                                    </div>
                                </div>

                                <div class="flex justify-between text-sm text-gray-600 mt-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-bed text-gray-400 mr-1"></i>
                                        <span>4 Beds</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-bath text-gray-400 mr-1"></i>
                                        <span>3 Baths</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                        <span>3,500 sqft</span>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center mt-4">
                                    <!-- Agent Info -->
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                            SH
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                        </div>
                                    </div>

                                    <!-- Share Button and Time -->
                                    <div class="flex items-center space-x-2">
                                        <!-- Share Icon -->
                                        <button
                                            class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                        <!-- Time Posted -->
                                        <p class="text-xs text-gray-500">2 months ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 3 - Luxury Apartment -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="rent" data-category="new">
                            <div class="relative">
                                <div class="swiper propertySwiper3 h-48">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2019/11/12/17/48/villa-4621636_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2022/07/05/15/01/villa-7303284_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2017/05/12/00/22/project-2305733_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span class="bg-green-600 text-white text-xs font-medium px-2 py-1 rounded">FOR RENT</span>
                                </div>
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
                                    <span class="text-white font-semibold text-lg">12,900,000THB</span>

                                    <!-- Icons -->
                                    <div class="flex space-x-3 text-white text-lg">
                                        <!-- Expand Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-expand"></i>
                                        </button>

                                        <!-- Heart Icon -->
                                        <button class="favorite-btn hover:text-red-400 transition">
                                            <i class="far fa-heart"></i>
                                        </button>

                                        <!-- Plus Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-800">Luxury Apartment Downtown</h3>
                                        <p class="text-gray-600 text-sm flex items-center mt-1">
                                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                            5678 Main St, Los Angeles
                                        </p>
                                    </div>
                                </div>

                                <div class="flex justify-between text-sm text-gray-600 mt-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-bed text-gray-400 mr-1"></i>
                                        <span>2 Beds</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-bath text-gray-400 mr-1"></i>
                                        <span>2 Baths</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                        <span>1,200 sqft</span>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center mt-4">
                                    <!-- Agent Info -->
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                            SH
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                        </div>
                                    </div>

                                    <!-- Share Button and Time -->
                                    <div class="flex items-center space-x-2">
                                        <!-- Share Icon -->
                                        <button
                                            class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                        <!-- Time Posted -->
                                        <p class="text-xs text-gray-500">2 months ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 4 - New Development -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="sale" data-category="new">
                            <div class="relative">
                                <div class="swiper propertySwiper4 h-48">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2017/04/10/22/28/residence-2219972_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2016/09/22/11/55/kitchen-1687121_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span class="bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded">NEW DEVELOPMENT</span>
                                </div>
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
                                    <span class="text-white font-semibold text-lg">8,500,000THB</span>

                                    <!-- Icons -->
                                    <div class="flex space-x-3 text-white text-lg">
                                        <!-- Expand Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-expand"></i>
                                        </button>

                                        <!-- Heart Icon -->
                                        <button class="favorite-btn hover:text-red-400 transition">
                                            <i class="far fa-heart"></i>
                                        </button>

                                        <!-- Plus Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-800">Modern Condo Development</h3>
                                        <p class="text-gray-600 text-sm flex items-center mt-1">
                                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                            Sukhumvit, Bangkok
                                        </p>
                                    </div>
                                </div>

                                <div class="flex justify-between text-sm text-gray-600 mt-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-bed text-gray-400 mr-1"></i>
                                        <span>1 Bed</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-bath text-gray-400 mr-1"></i>
                                        <span>1 Bath</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                        <span>45 SQM</span>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center mt-4">
                                    <!-- Agent Info -->
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                            SH
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                        </div>
                                    </div>

                                    <!-- Share Button and Time -->
                                    <div class="flex items-center space-x-2">
                                        <!-- Share Icon -->
                                        <button
                                            class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                        <!-- Time Posted -->
                                        <p class="text-xs text-gray-500">1 week ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 5 - Luxury Villa -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="sale" data-category="luxury">
                            <div class="relative">
                                <div class="swiper propertySwiper5 h-48">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2016/04/18/08/50/kitchen-1336160_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2016/11/18/17/46/architecture-1836070_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span class="bg-purple-600 text-white text-xs font-medium px-2 py-1 rounded">LUXURY VILLA</span>
                                </div>
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
                                    <span class="text-white font-semibold text-lg">25,000,000THB</span>

                                    <!-- Icons -->
                                    <div class="flex space-x-3 text-white text-lg">
                                        <!-- Expand Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-expand"></i>
                                        </button>

                                        <!-- Heart Icon -->
                                        <button class="favorite-btn hover:text-red-400 transition">
                                            <i class="far fa-heart"></i>
                                        </button>

                                        <!-- Plus Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-800">Premium Luxury Villa</h3>
                                        <p class="text-gray-600 text-sm flex items-center mt-1">
                                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                            Phuket, Thailand
                                        </p>
                                    </div>
                                </div>

                                <div class="flex justify-between text-sm text-gray-600 mt-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-bed text-gray-400 mr-1"></i>
                                        <span>5 Beds</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-bath text-gray-400 mr-1"></i>
                                        <span>4 Baths</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                        <span>650 SQM</span>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center mt-4">
                                    <!-- Agent Info -->
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                            SH
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                        </div>
                                    </div>

                                    <!-- Share Button and Time -->
                                    <div class="flex items-center space-x-2">
                                        <!-- Share Icon -->
                                        <button
                                            class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                        <!-- Time Posted -->
                                        <p class="text-xs text-gray-500">3 days ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Card 6 - Rental Property -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden property-card" data-type="rent" data-category="luxury">
                            <div class="relative">
                                <div class="swiper propertySwiper6 h-48">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2017/08/02/01/01/living-room-2569325_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://cdn.pixabay.com/photo/2017/08/27/10/16/interior-2685521_1280.jpg"
                                                class="w-full h-full object-cover" />
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span class="bg-green-600 text-white text-xs font-medium px-2 py-1 rounded">LUXURY RENTAL</span>
                                </div>
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
                                    <span class="text-white font-semibold text-lg">85,000THB/month</span>

                                    <!-- Icons -->
                                    <div class="flex space-x-3 text-white text-lg">
                                        <!-- Expand Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-expand"></i>
                                        </button>

                                        <!-- Heart Icon -->
                                        <button class="favorite-btn hover:text-red-400 transition">
                                            <i class="far fa-heart"></i>
                                        </button>

                                        <!-- Plus Icon -->
                                        <button class="hover:text-gray-300 transition">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-800">Executive Rental Villa</h3>
                                        <p class="text-gray-600 text-sm flex items-center mt-1">
                                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                            Pattaya, Thailand
                                        </p>
                                    </div>
                                </div>

                                <div class="flex justify-between text-sm text-gray-600 mt-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-bed text-gray-400 mr-1"></i>
                                        <span>3 Beds</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-bath text-gray-400 mr-1"></i>
                                        <span>3 Baths</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-vector-square text-gray-400 mr-1"></i>
                                        <span>280 SQM</span>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center mt-4">
                                    <!-- Agent Info -->
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center text-white font-bold">
                                            SH
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Sunny Houssaye</p>
                                        </div>
                                    </div>

                                    <!-- Share Button and Time -->
                                    <div class="flex items-center space-x-2">
                                        <!-- Share Icon -->
                                        <button
                                            class="share-btn w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                        <!-- Time Posted -->
                                        <p class="text-xs text-gray-500">1 month ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <nav class="flex items-center space-x-1">
                        <button class="px-2 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <button class="px-3 py-1 rounded bg-black text-white text-sm">1</button>
                        <button class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm">2</button>
                        <button class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm">3</button>
                        <button class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm">4</button>
                        <button class="px-2 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </nav>
                </div>

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
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
    .active-tab {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%) !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        transform: scale(1.05);
    }

    .property-card {
        transition: all 0.3s ease;
    }

    .property-card.hidden {
        display: none;
        opacity: 0;
        transform: translateY(10px);
    }

    .property-card.visible {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .loading-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: .5;
        }
    }
</style>

<script>
    // Initialize Swiper sliders
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all property swipers
        const swipers = document.querySelectorAll('.swiper');
        swipers.forEach((swiperEl, index) => {
            new Swiper(swiperEl, {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });

        // Initialize tabs functionality
        initializeTabs();
    });

    // Tab functionality
    let activeTab = 'all';

    function initializeTabs() {
        const tabs = document.querySelectorAll('#property-tabs button');
        const propertyCards = document.querySelectorAll('.property-card');

        // Set initial state for all cards
        propertyCards.forEach(card => {
            card.classList.add('visible');
        });

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabType = this.getAttribute('data-tab');

                // Update active tab styling
                tabs.forEach(t => {
                    t.classList.remove('active-tab', 'bg-blue-600', 'text-white');
                    t.classList.add('bg-gray-200', 'text-gray-700');
                });

                this.classList.add('active-tab');
                this.classList.remove('bg-gray-200', 'text-gray-700');

                // Filter properties
                filterProperties(tabType);
                activeTab = tabType;
            });
        });
    }

    // Filter properties based on active tab
    function filterProperties(tabType) {
        const propertyCards = document.querySelectorAll('.property-card');
        const container = document.getElementById('property-container');

        // Show loading state
        container.classList.add('opacity-50', 'loading-pulse');

        setTimeout(() => {
            let visibleCount = 0;

            propertyCards.forEach(card => {
                const propertyType = card.getAttribute('data-type');
                const propertyCategory = card.getAttribute('data-category');

                let shouldShow = false;

                switch(tabType) {
                    case 'all':
                        shouldShow = true;
                        break;
                    case 'sale':
                        shouldShow = propertyType === 'sale';
                        break;
                    case 'rent':
                        shouldShow = propertyType === 'rent';
                        break;
                    case 'new':
                        shouldShow = propertyCategory === 'new';
                        break;
                    case 'luxury':
                        shouldShow = propertyCategory === 'luxury';
                        break;
                    default:
                        shouldShow = true;
                }

                if (shouldShow) {
                    card.classList.remove('hidden');
                    card.classList.add('visible');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('visible');
                }
            });

            // Remove loading state
            container.classList.remove('opacity-50', 'loading-pulse');

            // Update results count
            updateResultsCount(tabType, visibleCount);

        }, 300);
    }

    // Update results count display
    function updateResultsCount(tabType, count) {
        const resultsElement = document.getElementById('results-count');

        let resultsText = '';
        switch(tabType) {
            case 'all':
                resultsText = `${count} Properties Found`;
                break;
            case 'sale':
                resultsText = `${count} Properties For Sale`;
                break;
            case 'rent':
                resultsText = `${count} Properties For Rent`;
                break;
            case 'new':
                resultsText = `${count} New Developments`;
                break;
            case 'luxury':
                resultsText = `${count} Luxury Properties`;
                break;
        }

        resultsElement.textContent = resultsText;
    }

    // Favorite button functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('.favorite-btn')) {
            const btn = e.target.closest('.favorite-btn');
            const icon = btn.querySelector('i');

            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas', 'text-red-500');
            } else {
                icon.classList.remove('fas', 'text-red-500');
                icon.classList.add('far');
            }
        }
    });

    // Share button functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('.share-btn')) {
            // Simple share functionality - in real implementation, use Web Share API
            alert('Share this property!');
        }
    });

    // Export functions for external use
    window.filterPropertiesByTab = function(tabType) {
        const tabButton = document.querySelector(`[data-tab="${tabType}"]`);
        if (tabButton) {
            tabButton.click();
        }
    };

    window.getActiveTab = function() {
        return activeTab;
    };
</script>

    <script>
        // Initialize Swiper for each property card
        document.addEventListener('DOMContentLoaded', function() {
            // Property 1
            new Swiper('.propertySwiper1', {
                navigation: {
                    nextEl: '.propertySwiper1 .swiper-button-next',
                    prevEl: '.propertySwiper1 .swiper-button-prev',
                },
                loop: true,
            });

            // Property 2
            new Swiper('.propertySwiper2', {
                navigation: {
                    nextEl: '.propertySwiper2 .swiper-button-next',
                    prevEl: '.propertySwiper2 .swiper-button-prev',
                },
                loop: true,
            });

            // Property 3
            new Swiper('.propertySwiper3', {
                navigation: {
                    nextEl: '.propertySwiper3 .swiper-button-next',
                    prevEl: '.propertySwiper3 .swiper-button-prev',
                },
                loop: true,
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
        });
    </script>
@endsection
