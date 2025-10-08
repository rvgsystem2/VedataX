@extends('component.main')
@section('content')

    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-xl font-bold text-blue-700">ExpertPropertyAsia</span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600"><i class="fas fa-phone-alt mr-1"></i> +66 96 770 9170</span>
                <span class="text-sm text-gray-600"><i class="fas fa-envelope mr-1"></i> julien@expertpropertyasia.com</span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Property Header -->
        <div class="bg-white rounded-lg property-card p-6 mb-6">
            <div class="flex flex-col md:flex-row justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">New 3-Bedroom Modern Villas in Bophut - Prime Location, Walking Distance to Beach</h1>
                    <div class="flex items-center mt-2 text-gray-600">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>Bo Phut, Ko Samui, Surat Thani</span>
                        <span class="mx-2">•</span>
                        <span>Villa/House</span>
                    </div>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="text-3xl font-bold text-blue-700">฿12,900,000</div>
                    <div class="text-sm text-gray-500 mt-1">Reference: PP12296</div>
                </div>
            </div>

            <!-- Property Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 pt-6 border-t border-gray-200">
                <div class="text-center">
                    <div class="text-2xl font-bold text-gray-800">3</div>
                    <div class="text-sm text-gray-600">Beds</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-gray-800">3</div>
                    <div class="text-sm text-gray-600">Baths</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-gray-800">272.05 m²</div>
                    <div class="text-sm text-gray-600">Interior Size</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-gray-800">352.21 m²</div>
                    <div class="text-sm text-gray-600">Land Size</div>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left Column -->
            <div class="lg:w-2/3">
                <!-- Property Description -->
                <div class="bg-white rounded-lg property-card p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Modern 3-Bedroom Villas for Sale in Bophut - Walking Distance to Fisherman's Village</h2>
                    <p class="text-gray-600 mb-4">
                        We are pleased to present a new collection of modern private pool villas in one of Koh Samui's most
                        sought-after locations ~ Bophut, just a short walk from the famous Fisherman's Village with its
                        beachfront restaurants, cafés, and boutique shops.
                    </p>
                    <p class="text-gray-600">
                        Designed with comfort and style in mind, these villas combine modern architecture with tropical
                        elegance, offering the perfect home for both permanent living and investment.
                    </p>
                </div>

                <!-- Property Features -->
                <div class="bg-white rounded-lg property-card p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Property Features</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Interior Features</h3>
                            <ul class="text-gray-600 space-y-1">
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Full Western Fitted Kitchen</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Open plan living space</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Unfurnished</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Spacious Living & Dining Area</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Outdoor Amenities</h3>
                            <ul class="text-gray-600 space-y-1">
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Garden</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Private infinity Pool</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Outdoor shower</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Swimming pool with salt water system</li>
                            </ul>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Utilities and Infrastructure</h3>
                            <ul class="text-gray-600 space-y-1">
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Storage Room</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Electricity</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Deep well</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Safety and Security</h3>
                            <ul class="text-gray-600 space-y-1">
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Fire Alarm</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> Emergency Exit</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i> CCTV</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Location Highlights -->
                <div class="bg-white rounded-lg property-card p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Location Highlights</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-walking text-blue-500 mr-3 w-5"></i>
                                <span>Fisherman's Village - 500 meters / walking distance</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-umbrella-beach text-blue-500 mr-3 w-5"></i>
                                <span>Bophut Beach - 3 minutes</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-shopping-cart text-blue-500 mr-3 w-5"></i>
                                <span>Big C & Lotus Supermarkets - 5 minutes</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-graduation-cap text-blue-500 mr-3 w-5"></i>
                                <span>International School of Samui (ISS) - 8 minutes</span>
                            </li>
                        </ul>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-umbrella-beach text-blue-500 mr-3 w-5"></i>
                                <span>Chaweng Beach & Central Festival Mall - 10 minutes</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-plane text-blue-500 mr-3 w-5"></i>
                                <span>Samui International Airport - 15 minutes</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-school text-blue-500 mr-3 w-5"></i>
                                <span>Windfield International School - 2.9 km</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-hospital text-blue-500 mr-3 w-5"></i>
                                <span>Bangkok Hospital - 11.0 km</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="lg:w-1/3">
                <!-- Contact Form -->
                <div class="bg-white rounded-lg property-card p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Contact Agent</h2>
                    <form class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                            Send Inquiry
                        </button>
                    </form>
                </div>

                <!-- Additional Details -->
                <div class="bg-white rounded-lg property-card p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Additional Details</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Furniture Package:</span>
                            <span class="font-medium">฿1,500,000 THB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Title Deed:</span>
                            <span class="font-medium">Chanote</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Property Type:</span>
                            <span class="font-medium">Villa/House</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Location:</span>
                            <span class="font-medium text-right">Maret, Koh Samui</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h3 class="font-semibold text-gray-700 mb-2">Room Dimensions</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Master Bedroom:</span>
                                <span class="font-medium">20.72 sqm</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Bedroom 2:</span>
                                <span class="font-medium">19.30 sqm</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Bedroom 3:</span>
                                <span class="font-medium">14.82 sqm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
