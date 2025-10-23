@extends('component.main')
@section('content')

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#64748b',
                        accent: '#3b82f6'
                    }
                }
            }
        }
    </script>

    <!-- Main Content -->
    <div class="pt-12 bg-white">


        <!-- Image Gallery Section -->
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-2 font-spartan">Luxury Villa Gallery</h1>
            <p class="text-gray-600 mb-8 font-spartan">Explore our premium property through these stunning images</p>

            <section id="gallery" class="py-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Large Main Image -->
                    <div class="lg:col-span-2 relative group">
                        <img
                            src="https://cdn.pixabay.com/photo/2021/04/05/18/02/villa-balbiano-6154200_1280.jpg"
                            alt="Main Villa"
                            class="w-full h-80 lg:h-full object-cover rounded-xl shadow-md cursor-pointer transition-transform duration-300 group-hover:scale-[1.02]"
                            onclick="openLightbox(this.src)"
                        >
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-600 text-white text-sm font-medium px-3 py-1 rounded-lg shadow-md font-spartan">FOR SALE</span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <button id="favorite-btn" class="bg-white/90 hover:bg-white text-gray-800 rounded-full w-10 h-10 flex items-center justify-center transition-all duration-300 shadow-md hover:shadow-lg">
                                <i class="far fa-heart text-lg"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-black/40 text-white text-sm px-3 py-1 rounded-lg backdrop-blur-sm">
                            <i class="fas fa-camera mr-1 font-spartan"></i> Main Property
                        </div>
                    </div>

                    <!-- Small Grid Images -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="group relative">
                            <img
                                src="https://cdn.pixabay.com/photo/2020/04/28/04/03/villa-5102551_1280.jpg"
                                alt="Villa Exterior"
                                class="w-full h-64 object-cover rounded-xl shadow hover:shadow-lg transition-all duration-300 cursor-pointer group-hover:scale-[1.03]"
                                onclick="openLightbox(this.src)"
                            >
                            <div class="absolute bottom-2 left-2 bg-black/40 text-white text-xs px-2 py-1 rounded backdrop-blur-sm font-spartan">
                                Exterior
                            </div>
                        </div>
                        <div class="group relative">
                            <img
                                src="https://cdn.pixabay.com/photo/2017/03/30/00/25/villa-2186914_1280.jpg"
                                alt="Villa Garden"
                                class="w-full h-64 object-cover rounded-xl shadow hover:shadow-lg transition-all duration-300 cursor-pointer group-hover:scale-[1.03]"
                                onclick="openLightbox(this.src)"
                            >
                            <div class="absolute bottom-2 left-2 bg-black/40 text-white text-xs px-2 py-1 rounded backdrop-blur-sm font-spartan">
                                Garden
                            </div>
                        </div>
                        <div class="group relative">
                            <img
                                src="https://cdn.pixabay.com/photo/2022/07/05/14/59/living-room-7303275_1280.jpg"
                                alt="Living Room"
                                class="w-full h-64 object-cover rounded-xl shadow hover:shadow-lg transition-all duration-300 cursor-pointer group-hover:scale-[1.03]"
                                onclick="openLightbox(this.src)"
                            >
                            <div class="absolute bottom-2 left-2 bg-black/40 text-white text-xs px-2 py-1 rounded backdrop-blur-sm font-spartan">
                                Living Room
                            </div>
                        </div>
                        <div class="group relative">
                            <img
                                src="https://cdn.pixabay.com/photo/2022/07/05/14/58/living-room-7303274_1280.jpg"
                                alt="Living Room"
                                class="w-full h-64 object-cover rounded-xl shadow hover:shadow-lg transition-all duration-300 cursor-pointer group-hover:scale-[1.03]"
                                onclick="openLightbox(this.src)"
                            >
                            <div class="absolute inset-0 bg-black/40 rounded-xl flex items-center justify-center cursor-pointer transition-all duration-300 hover:bg-black/30" onclick="openLightbox(this.previousElementChild.src)">
                                <span class="text-white font-medium text-lg bg-black/30 px-4 py-2 rounded-lg backdrop-blur-sm font-spartan">+12 Photos</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Lightbox Modal -->
        <div id="lightbox" class="lightbox fixed inset-0 bg-black/90 z-50 flex items-center justify-center hidden">
            <div class="lightbox-content max-w-4xl w-full mx-4 relative">
                <button id="close-lightbox" class="absolute -top-12 right-0 text-white text-2xl hover:text-gray-300 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
                <button id="prev-btn" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-2xl bg-black/30 hover:bg-black/50 rounded-full w-10 h-10 flex items-center justify-center transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="next-btn" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-2xl bg-black/30 hover:bg-black/50 rounded-full w-10 h-10 flex items-center justify-center transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <img id="lightbox-img" src="" alt="" class="w-full h-auto max-h-[80vh] object-contain rounded-lg">
            </div>
        </div>


        <!-- Property Details Section -->
        <section class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1  gap-8">
                <!-- Left Section - Property Info -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Property Header -->
                    <div id="overview" class="scroll-mt-24">
                        <h1 class="text-3xl font-bold text-gray-800 font-spartan">New 3-Bedroom Modern Villas in Bophut - Prime Location, Walking Distance to Beach</h1>
                        <div class="flex items-center text-gray-600 mt-2">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span class="font-spartan">Bo Phut, Ko Samui, Surat Thani - Villa/House</span>
                        </div>
                        <div class="mt-4">
                            <span class="text-sm text-gray-600 font-spartan">Sale Price</span>
                            <p class="text-3xl font-bold text-primary font-spartan">฿12,900,000</p>
                        </div>
                    </div>

                    <!-- Key Features -->
                    <div class="flex flex-wrap gap-6 bg-white rounded-lg shadow-sm p-6">
                        <div class="flex flex-row gap-2 items-center">
                            <i class="fas fa-bed text-primary text-xl"></i>
                            <div>
                                <p class="font-semibold text-lg font-spartan">3</p>
                                <p class="text-sm text-gray-600 font-spartan">Beds</p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 items-center">
                            <i class="fas fa-bath text-primary text-xl"></i>
                            <div>
                                <p class="font-semibold text-lg font-spartan">3</p>
                                <p class="text-sm text-gray-600 font-spartan">Baths</p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 items-center">
                            <i class="fas fa-vector-square text-primary text-xl"></i>
                            <div>
                                <p class="font-semibold text-lg font-spartan">200</p>
                                <p class="text-sm text-gray-600 font-spartan">SQM</p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 items-center">
                            <i class="fas fa-swimming-pool text-primary text-xl"></i>
                            <div>
                                <p class="font-semibold text-lg font-spartan">1</p>
                                <p class="text-sm text-gray-600 font-spartan">Pool</p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 items-center">
                            <i class="fas fa-car text-primary text-xl"></i>
                            <div>
                                <p class="font-semibold text-lg font-spartan">2</p>
                                <p class="text-sm text-gray-600 font-spartan">Parking</p>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-semibold mb-4 text-gray-800 font-spartan">Modern 3-Bedroom Villas for Sale in Bophut - Walking Distance to Fisherman's Village</h2>
                        <p class="text-gray-700 leading-relaxed mb-4 font-spartan">
                            We are pleased to present a new collection of modern private pool villas in one of Koh Samui's most sought-after locations - Bophut, just a short walk from the famous Fisherman's Village with its beachfront restaurants, cafés, and boutique shops.
                        </p>
                        <p class="text-gray-700 leading-relaxed font-spartan">
                            Designed with comfort and style in mind, these villas combine modern architecture with tropical elegance, offering the perfect home for both permanent living and investment.
                        </p>
                    </div>

                    <!-- Location Highlights -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 font-spartan">Location Highlights</h2>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="font-spartan">Fisherman's Village - 500 meters/walking distance</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="font-spartan">Bophut Beach - 3 minutes</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="font-spartan">Big C & Lotus Supermarkets - 5 minutes</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="font-spartan">International School of Samui (ISS) - 8 minutes</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="font-spartan">Chaweng Beach & Central Festival Mall - 10 minutes</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="font-spartan">Samui International Airport - 15 minutes</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Property Features -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 font-spartan">Property Features</h2>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-home text-primary mt-1 mr-3"></i>
                                <span class="font-spartan">3 Bedrooms each with en-suite bathroom</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-couch text-primary mt-1 mr-3"></i>
                                <span class="font-spartan">Spacious Living Room & Dining Area - open-plan layout (51.83 sqm)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-utensils text-primary mt-1 mr-3"></i>
                                <span class="font-spartan">Fully Equipped Kitchen - modern appliances included</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-swimming-pool text-primary mt-1 mr-3"></i>
                                <span class="font-spartan">Infinity Swimming Pool - 30 sqm with large sun terrace (51.28 sqm)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-wind text-primary mt-1 mr-3"></i>
                                <span class="font-spartan">Air Conditioning & Ceiling Fans throughout</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-tshirt text-primary mt-1 mr-3"></i>
                                <span class="font-spartan">Laundry Room, Pump Room & Storage for convenience</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-car text-primary mt-1 mr-3"></i>
                                <span class="font-spartan">Private Parking - 27 sqm</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Sizes & Areas -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 font-spartan">Sizes & Areas</h2>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex justify-between py-2 border-b border-gray-100">
                                <span>Land Area:</span>
                                <span class="font-medium font-spartan">352.21 sqm</span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-gray-100">
                                <span>Built Area:</span>
                                <span class="font-medium font-spartan">272.05 sqm</span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-gray-100 font-spartan">
                                <span>Interior Area:</span>
                                <span class="font-medium font-spartan">162.07 sqm</span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-gray-100 font-spartan">
                                <span>Exterior Area:</span>
                                <span class="font-medium font-spartan">79.98 sqm</span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-gray-100 font-spartan">
                                <span>Pool Area:</span>
                                <span class="font-medium font-spartan">30 sqm</span>
                            </li>
                            <li class="flex justify-between py-2 font-spartan">
                                <span>Usable Area:</span>
                                <span class="font-medium font-spartan">253.36 sqm</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Room Dimensions -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 font-spartan">Room Dimensions</h2>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex justify-between py-2 border-b border-gray-100 font-spartan">
                                <span>Master Bedroom:</span>
                                <span class="font-medium font-spartan">20.72 sqm with en-suite bathroom (10.42 sqm)</span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-gray-100 font-spartan">
                                <span>Bedroom 2:</span>
                                <span class="font-medium font-spartan">19.30 sqm with en-suite bathroom (4.65 sqm)</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span>Bedroom 3:</span>
                                <span class="font-medium font-spartan">14.82 sqm with en-suite bathroom (4.32 sqm)</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Additional Details -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 font-spartan">Additional Details</h2>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex justify-between py-2 border-b border-gray-100">
                                <span>Furniture Package:</span>
                                <span class="font-medium font-spartan">1,500,000 THB</span>
                            </li>
                            <li class="flex justify-between py-2 border-b border-gray-100">
                                <span>Title Deed:</span>
                                <span class="font-medium font-spartan">Chanote</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span>Price:</span>
                                <span class="font-medium text-primary font-spartan">12,900,000 THB</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Location Details -->
                    <div id="location" class="scroll-mt-24 bg-white rounded-lg shadow-sm p-6">
                        <p class="text-gray-700 mb-4 font-spartan">
                            <strong>Location: </strong>Maret, Koh Samui - Nestled in one of the most sought-after areas, this villa is just a short distance from vibrant attractions, beaches, and services.
                        </p>
                        <h3 class="text-lg font-semibold mb-3 text-gray-800 font-spartan">Nearby Attractions</h3>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 mb-6">
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-map-marker-alt text-primary mt-1 mr-3 text-sm"></i>
                                <span>Lamai Beach: 5.6 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-map-marker-alt text-primary mt-1 mr-3 text-sm"></i>
                                <span>Central Festival Samui: 13.0 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-map-marker-alt text-primary mt-1 mr-3 text-sm"></i>
                                <span>Samui International Airport: 15.0 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-map-marker-alt text-primary mt-1 mr-3 text-sm"></i>
                                <span>Lamai Night Market: 4.3 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-map-marker-alt text-primary mt-1 mr-3 text-sm"></i>
                                <span>Big C Mini Lamai: 5.0 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-map-marker-alt text-primary mt-1 mr-3 text-sm"></i>
                                <span>Fisherman's Village: 14.0 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-map-marker-alt text-primary mt-1 mr-3 text-sm"></i>
                                <span>Overlap Stone: 7.8 km</span>
                            </li>
                        </ul>

                        <h3 class="text-lg font-semibold mb-3 text-gray-800 font-spartan">Nearby Beaches</h3>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 mb-6">
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-umbrella-beach text-primary mt-1 mr-3 text-sm"></i>
                                <span>Silver Beach: 5.6 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-umbrella-beach text-primary mt-1 mr-3 text-sm"></i>
                                <span>Bophut Beach: 13.0 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-umbrella-beach text-primary mt-1 mr-3 text-sm"></i>
                                <span>Chaweng Beach: 14.0 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-umbrella-beach text-primary mt-1 mr-3 text-sm"></i>
                                <span>Lipa Noi Beach: 20.0 km</span>
                            </li>
                        </ul>

                        <h3 class="text-lg font-semibold mb-3 text-gray-800 font-spartan">Nearby Waterfalls</h3>
                        <div class="flex items-start text-gray-700 mb-6 font-spartan">
                            <i class="fas fa-water text-primary mt-1 mr-3"></i>
                            <span>Namueng Waterfall: 13.0 km</span>
                        </div>

                        <h3 class="text-lg font-semibold mb-3 text-gray-800 font-spartan">Nearby Hospitals</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700 mb-6">
                            <div class="flex items-start font-spartan">
                                <i class="fas fa-hospital text-primary mt-1 mr-3"></i>
                                <span>Bangkok Hospital: 11.0 km</span>
                            </div>
                            <div class="flex items-start font-spartan">
                                <i class="fas fa-hospital text-primary mt-1 mr-3"></i>
                                <span>Samui International Hospital: 15.0 km</span>
                            </div>
                        </div>

                        <h3 class="text-lg font-semibold mb-3 text-gray-800 font-spartan">Nearby Schools</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-graduation-cap text-primary mt-1 mr-3"></i>
                                <span>Windfield International School: 2.9 km</span>
                            </li>
                            <li class="flex items-start font-spartan">
                                <i class="fas fa-graduation-cap text-primary mt-1 mr-3"></i>
                                <span>Panyadee The British International School: 9.6 km</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right Section - Contact & Agent Info -->
                <div class="space-y-6">
                    <!-- Contact Form -->
                    <div id="contact" class="scroll-mt-24 bg-white rounded-xl shadow-lg p-6 sticky top-32">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 font-spartan">Schedule a Viewing</h3>
                        <form class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1 font-spartan">Full Name</label>
                                <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Your name">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1 font-spartan">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Your email">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1 font-spartan">Phone</label>
                                <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Your phone number">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1 font-spartan">Message</label>
                                <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Your message or questions"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition font-spartan">Send Inquiry</button>
                        </form>

                        <!-- Agent Info -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 font-spartan">Property Agent</h3>
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Agent" class="w-12 h-12 rounded-full object-cover">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-800 font-spartan">John Smith</p>
                                    <p class="text-sm text-gray-600 font-spartan">Premium Property Agent</p>
                                </div>
                            </div>
                            <div class="mt-4 flex space-x-3">
                                <button class="flex-1 bg-gray-100 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-200 transition font-spartan">Call</button>
                                <button class="flex-1 bg-gray-100 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-200 transition font-spartan">WhatsApp</button>
                            </div>
                        </div>
                    </div>

                    {{-- <!-- Mortgage Calculator -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 font-spartan">Mortgage Calculator</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 font-spartan">Loan Amount</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-spartan">฿</span>
                                    <input type="text" value="12,900,000" class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 font-spartan">Interest Rate</label>
                                <div class="relative">
                                    <input type="text" value="4.5" class="w-full pr-8 pl-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-spartan">%</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 font-spartan">Loan Term</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent font-spartan">
                                    <option>15 years</option>
                                    <option>20 years</option>
                                    <option selected>25 years</option>
                                    <option>30 years</option>
                                </select>
                            </div>
                            <button class="w-full bg-secondary text-white py-3 rounded-lg font-semibold hover:bg-gray-600 transition font-spartan">Calculate</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- Property Features Section -->
        <section id="features" class="scroll-mt-24 max-w-7xl mx-auto px-4 py-16">
            <!-- Section Title -->
            <div class="text-center mb-12">
              <h2 class="text-3xl font-bold text-gray-800 font-spartan">Property Features</h2>
              <p class="text-gray-500 mt-2 font-spartan">Explore the details that make this property unique</p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 gap-8">

              <!-- Interior Features -->
              <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 font-spartan">Interior Features</h3>
                <ul class="space-y-2 text-gray-600 font-spartan">
                  <li>• Full Western Fitted Kitchen</li>
                  <li>• Open Plan Living Space</li>
                  <li>• Unfurnished</li>
                  <li>• Spacious Living & Dining Area</li>
                  <li>• Living Area</li>
                  <li>• Living & Dining Area</li>
                </ul>
              </div>

              <!-- Outdoor Amenities -->
              <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 font-spartan">Outdoor Amenities</h3>
                <ul class="space-y-2 text-gray-600 font-spartan">
                  <li>• Garden</li>
                  <li>• Private Infinity Pool</li>
                  <li>• Outdoor Bathtub</li>
                  <li>• Outdoor Shower</li>
                  <li>• Private Plunge Pool</li>
                  <li>• Near Beach</li>
                  <li>• Hillside</li>
                  <li>• Private Roof Terrace</li>
                  <li>• Sala</li>
                  <li>• Swimming Pool with Salt Water System</li>
                </ul>
              </div>

              <!-- Utilities & Infrastructure -->
              <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 font-spartan">Utilities & Infrastructure</h3>
                <ul class="space-y-2 text-gray-600 font-spartan">
                  <li>• Storage Room</li>
                  <li>• Electricity</li>
                  <li>• Deep Well</li>
                </ul>
              </div>

              <!-- Safety & Security -->
              <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 font-spartan">Safety & Security</h3>
                <ul class="space-y-2 text-gray-600 font-spartan">
                  <li>• Fire Alarm</li>
                  <li>• Emergency Exit</li>
                  <li>• CCTV</li>
                </ul>
              </div>

              <!-- Parking -->
              <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 font-spartan">Parking</h3>
                <ul class="space-y-2 text-gray-600">
                  <li>• Garage</li>
                  <li>• Private Parking</li>
                </ul>
              </div>

              <!-- Balcony & Terrace -->
              <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 font-spartan">Balcony & Terrace</h3>
                <ul class="space-y-2 text-gray-600 font-spartan">
                  <li>• Balcony with Outdoor Furniture</li>
                  <li>• Terrace with Outdoor Furniture</li>
                </ul>
              </div>

              <!-- Special Features -->
              <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 font-spartan">Special Features</h3>
                <ul class="space-y-2 text-gray-600">
                  <li>• Modern Design</li>
                  <li>• Flat Land</li>
                  <li>• Luxury</li>
                </ul>
              </div>
            </div>
          </section>

          <!-- Map Section -->
          <div id="location-map" class="scroll-mt-24 map w-full py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 font-spartan">Property Location</h2>
                    <p class="text-gray-500 mt-2 font-spartan">Explore the neighborhood and nearby amenities</p>
                </div>
                <div class="w-full h-[450px] lg:h-[550px] rounded-2xl overflow-hidden shadow-xl">
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7141.653092241154!2w80.25370086023918!3d26.49351251383031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c37bae2d6145f%3A0xba274702d0c780c7!2s70%2C%20New%20Shivli%20Rd%2C%20Gautam%20Vihar%2C%20Kalyanpur%2C%20Kanpur%2C%20Uttar%20Pradesh%20208017!5e0!3m2!1sen!2sin!4v1759569177976!5m2!1sen!2sin"
                      class="w-full h-full border-0"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
          </div>
    </div>

    <!-- Image Lightbox -->
    <div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4">
        <div class="relative max-w-4xl max-h-full">
            <button id="close-lightbox" class="absolute -top-12 right-0 text-white text-2xl hover:text-gray-300 transition">
                <i class="fas fa-times"></i>
            </button>
            <img id="lightbox-img" src="" alt="" class="max-w-full max-h-full object-contain">
        </div>
    </div>

    <style>
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script>
        // Simple favorite toggle functionality
        document.getElementById('favorite-btn').addEventListener('click', function() {
            const icon = this.querySelector('i');
            if(icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas', 'text-red-500');
            } else {
                icon.classList.remove('fas', 'text-red-500');
                icon.classList.add('far');
            }
        });

        // Image lightbox functionality
        function openLightbox(src) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            lightboxImg.src = src;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
        }

        document.getElementById('close-lightbox').addEventListener('click', function() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
        });

        // Close lightbox when clicking outside the image
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
                this.classList.remove('flex');
            }
        });

        // Smooth scrolling for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
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
