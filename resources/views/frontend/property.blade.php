
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

                                <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">
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

                                <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">
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

                                <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">
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

                                <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">
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

                                <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">
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

                                <div class="flex justify-start text-sm text-gray-600 mt-4 gap-4">
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
