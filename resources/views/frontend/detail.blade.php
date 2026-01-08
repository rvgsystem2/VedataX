@extends('component.main')
@section('content')

    @php
        $cityName  = optional($property->city)->name;
        $typeTitle = optional($property->propertyType)->title ?? ucfirst($property->type ?? '');
        $propertyType = $property->propertyType;
        $reference = $property->reference ?? ('PP' . str_pad($property->id, 5, '0', STR_PAD_LEFT));

        $bedrooms  = $property->bedrooms;
        $bathrooms = $property->bathrooms;
        $interiorSize = $property->area;               // m²
        $landSize = $property->land_size ?? null;      // agar future me column add karein

        // Main image pick
        $mainImage = $property->images
            ? $property->images->firstWhere('is_main', true) ?? $property->images->first()
            : null;
    @endphp

        <!-- Header -->
    {{-- <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-xl font-bold text-blue-700">ExpertPropertyAsia</span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">
                    <i class="fas fa-phone-alt mr-1"></i> +66 96 770 9170
                </span>
                <span class="text-sm text-gray-600">
                    <i class="fas fa-envelope mr-1"></i> julien@expertpropertyasia.com
                </span>
            </div>
        </div>
    </header> --}}

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Property Header -->
{{--        <div class="bg-white rounded-lg property-card p-6 mb-6">--}}
{{--            <div class="flex flex-col md:flex-row justify-between">--}}
{{--                <div>--}}
{{--                    <h1 class="text-2xl font-bold text-gray-800">--}}
{{--                        {{ $property->title }}--}}
{{--                    </h1>--}}
{{--                    <div class="flex flex-wrap items-center mt-2 text-gray-600">--}}
{{--                        <i class="fas fa-map-marker-alt mr-1"></i>--}}
{{--                        <span>--}}
{{--                            @if($property->address)--}}
{{--                                {{ $property->address }}--}}
{{--                            @endif--}}
{{--                            @if($property->address && $cityName)--}}
{{--                                ,--}}
{{--                            @endif--}}
{{--                            {{ $cityName }}--}}
{{--                        </span>--}}
{{--                        @if($typeTitle)--}}
{{--                            <span class="mx-2">•</span>--}}
{{--                            <span>{{ $typeTitle }}</span>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mt-4 md:mt-0 text-right">--}}
{{--                    <div class="text-3xl font-bold text-blue-700">--}}
{{--                        --}}{{-- THB ke hisaab se – agar aap INR use karenge to symbol change kar lena --}}
{{--                        ฿{{ number_format($property->price, 0) }}--}}
{{--                    </div>--}}
{{--                    <div class="text-sm text-gray-500 mt-1">--}}
{{--                        Reference: {{ $reference }}--}}
{{--                    </div>--}}

{{--                    @if($property->status)--}}
{{--                        <div--}}
{{--                            class="inline-flex mt-2 px-3 py-1 rounded-full text-xs font-semibold--}}
{{--                            {{ $property->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">--}}
{{--                            {{ ucfirst($property->status) }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Property Stats -->--}}
{{--            @if(!($propertyType->title == 'Land' || !$propertyType->slug == 'land'))--}}
{{--            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 pt-6 border-t border-gray-200">--}}
{{--                @if(!is_null($bedrooms))--}}
{{--                    <div class="text-center">--}}
{{--                        <div class="text-2xl font-bold text-gray-800">{{ $bedrooms }}</div>--}}
{{--                        <div class="text-sm text-gray-600">Beds</div>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                @if(!is_null($bathrooms))--}}
{{--                    <div class="text-center">--}}
{{--                        <div class="text-2xl font-bold text-gray-800">{{ $bathrooms }}</div>--}}
{{--                        <div class="text-sm text-gray-600">Baths</div>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                @if(!is_null($interiorSize))--}}
{{--                    <div class="text-center">--}}
{{--                        <div class="text-2xl font-bold text-gray-800">--}}
{{--                            {{ rtrim(rtrim(number_format($interiorSize, 2, '.', ''), '0'), '.') }} m²--}}
{{--                        </div>--}}
{{--                        <div class="text-sm text-gray-600">Interior Size</div>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                @if(!is_null($landSize))--}}
{{--                    <div class="text-center">--}}
{{--                        <div class="text-2xl font-bold text-gray-800">--}}
{{--                            {{ rtrim(rtrim(number_format($landSize, 2, '.', ''), '0'), '.') }} m²--}}
{{--                        </div>--}}
{{--                        <div class="text-sm text-gray-600">Land Size</div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            @endif--}}
{{--        </div>--}}

        <div class="bg-white rounded-xl property-card p-4 sm:p-6 mb-6 shadow-sm border border-gray-100">

            {{-- TOP SECTION --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                {{-- LEFT: Title + Address --}}
                <div class="space-y-1">
                    <h1 class="text-lg sm:text-2xl font-bold text-gray-800 leading-snug">
                        {{ $property->title }}
                    </h1>

                    <div class="flex flex-wrap items-center gap-1 text-sm text-gray-600">
                        <i class="fas fa-map-marker-alt text-xs"></i>

                        <span>
                    @if($property->address)
                                {{ $property->address }}
                            @endif

                            @if($property->address && $cityName)
                                ,
                            @endif

                            {{ $cityName }}
                </span>

                        @if($typeTitle)
                            <span class="mx-1">•</span>
                            <span class="font-medium">{{ $typeTitle }}</span>
                        @endif
                    </div>
                </div>

                {{-- RIGHT: Price + Ref + Status --}}
                <div class="sm:text-right flex sm:block items-center justify-between gap-4">

                    <div>
                        <div class="text-xl sm:text-3xl font-bold text-blue-700 leading-tight">
                            ฿{{ number_format($property->price, 0) }}
                        </div>

                        <div class="text-xs text-gray-500 mt-0.5">
                            Reference: {{ $reference }}
                        </div>
                    </div>

                    @if($property->status)
                        <span
                            class="inline-flex h-fit px-3 py-1 rounded-full text-xs font-semibold
                    {{ $property->status === 'available'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-gray-100 text-gray-700' }}">
                    {{ ucfirst($property->status) }}
                </span>
                    @endif
                </div>

            </div>


            {{-- Property Stats --}}
            {{-- ✅ Show stats ONLY if NOT Land --}}
            @if(!($propertyType->title === 'Land' || $propertyType->slug === 'land'))
                <div class="grid grid-cols-3 sm:grid-cols-4 gap-4 mt-6 pt-5 border-t border-gray-200">

                    @if(!is_null($bedrooms))
                        <div class="text-center">
                            <div class="text-lg sm:text-2xl font-bold text-gray-800">
                                {{ $bedrooms }}
                            </div>
                            <div class="text-[11px] sm:text-sm text-gray-600">
                                Beds
                            </div>
                        </div>
                    @endif

                    @if(!is_null($bathrooms))
                        <div class="text-center">
                            <div class="text-lg sm:text-2xl font-bold text-gray-800">
                                {{ $bathrooms }}
                            </div>
                            <div class="text-[11px] sm:text-sm text-gray-600">
                                Baths
                            </div>
                        </div>
                    @endif

                    @if(!is_null($interiorSize))
                        <div class="text-center">
                            <div class="text-lg sm:text-2xl font-bold text-gray-800">
                                {{ rtrim(rtrim(number_format($interiorSize, 2, '.', ''), '0'), '.') }} m²
                            </div>
                            <div class="text-[11px] sm:text-sm text-gray-600">
                                Interior Size
                            </div>
                        </div>
                    @endif

                    {{-- Desktop par Land Size alag se --}}
                    @if(!is_null($landSize))
                        <div class="hidden sm:block text-center">
                            <div class="text-lg sm:text-2xl font-bold text-gray-800">
                                {{ rtrim(rtrim(number_format($landSize, 2, '.', ''), '0'), '.') }} m²
                            </div>
                            <div class="text-[11px] sm:text-sm text-gray-600">
                                Land Size
                            </div>
                        </div>
                    @endif

                </div>
            @endif


        </div>



        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left Column -->
            <div class="lg:w-2/3">

                {{-- IMAGE GALLERY --}}
                @if($property->images && $property->images->count())
                    <div class="bg-white rounded-lg property-card p-4 mb-6">
                        @if($mainImage)
                            <div class="mb-3">
                                <img id="main-property-image"
                                     src="{{ asset('storage/' . ($mainImage->url ?? $mainImage->path)) }}"
                                     alt="{{ $property->title }}"
                                     class="w-full max-h-[420px] object-cover rounded-md">
                            </div>
                        @endif

                        @if($property->images->count() > 1)
                            <div class="grid grid-cols-3 md:grid-cols-5 gap-2">
                                @foreach($property->images as $img)
                                    <img src="{{ asset('storage/' . ($img->url ?? $img->path)) }}"
                                         alt=""
                                         class="w-full h-20 object-cover rounded cursor-pointer hover:opacity-80"
                                         onclick="document.getElementById('main-property-image').src = this.src">
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Property Description -->
                <div class="bg-white rounded-lg property-card p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">
                        {{ $property->title }}
                    </h2>
                    <p class="text-gray-600 whitespace-pre-line">
                        {{ $property->description }}
                    </p>
                </div>


                @if(!($propertyType->title == 'Land' || $propertyType->slug == 'land'))
                <!-- Property Features -->
                <div class="bg-white rounded-lg property-card p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Property Features</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Interior Features</h3>
                            <ul class="text-gray-600 space-y-1">
                                @forelse($property->interiors as $interior)
                                    <li>
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        {{ $interior->name }}
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-400">No interior features added.</li>
                                @endforelse
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Outdoor Amenities</h3>
                            <ul class="text-gray-600 space-y-1">
                                @forelse($property->amenities as $amenity)
                                    <li>
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        {{ $amenity->name }}
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-400">No outdoor amenities listed.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Utilities and Infrastructure</h3>
                            <ul class="text-gray-600 space-y-1">
                                @forelse($property->utilityInfrastructures as $utility)
                                    <li>
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        {{ $utility->name }}
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-400">No utility details added.</li>
                                @endforelse
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Safety and Security</h3>
                            <ul class="text-gray-600 space-y-1">
                                @forelse($property->safetySecurities as $safety)
                                    <li>
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        {{ $safety->name }}
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-400">No safety features added.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Location Highlights (simple dynamic info) -->
                <div class="bg-white rounded-lg property-card p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Location Highlights</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-map-marker-alt text-blue-500 mr-3 w-5"></i>
                                <span>
                                    {{ $property->address }}
                                    @if($cityName)
                                        , {{ $cityName }}
                                    @endif
                                </span>
                            </li>

                            @if($property->latitude && $property->longitude)
                                <li class="flex items-center">
                                    <i class="fas fa-globe-asia text-blue-500 mr-3 w-5"></i>
                                    <span>
                                        Coordinates: {{ $property->latitude }}, {{ $property->longitude }}
                                    </span>
                                </li>
                            @endif
                        </ul>

                        @if($property->latitude && $property->longitude)
                            <ul class="text-gray-600 space-y-2">
                                <li class="flex items-center">
                                    <i class="fas fa-map text-blue-500 mr-3 w-5"></i>
                                    <a href="https://www.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}"
                                       target="_blank"
                                       class="text-blue-600 hover:underline">
                                        View on Google Maps
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="lg:w-1/3">
                @if ($errors->has('contact'))
                    <div class="mb-3 text-sm text-red-600">
                        {{ $errors->first('contact') }}
                    </div>
                @endif

                <!-- Contact Form -->
                <div class="bg-white rounded-lg property-card p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Contact Agent</h2>
                    {{-- yahan aap apna contact route add kar sakte hain --}}
                    <form action="{{route('contact.save')}}" method="POST" class="space-y-4">
                        @csrf

                        <input type="hidden" name="property_id" value="{{$property->id}}">

                        <!-- GLOBAL ERROR -->
                        @if($errors->has('contact'))
                            <div class="bg-red-100 text-red-700 px-4 py-2 rounded-md text-sm mb-2">
                                {{ $errors->first('contact') }}
                            </div>
                        @endif

                        <!-- NAME -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Full Name <span class="text-red-600">*</span>
                            </label>

                            <input type="text" name="name"
                                   value="{{ old('name') }}"
                                   class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-blue-500
                      @error('name') border-red-500 @enderror">

                            @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- EMAIL -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Email <span class="text-red-600">*</span>
                            </label>

                            <input type="email" name="email"
                                   value="{{ old('email') }}"
                                   class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-blue-500
                      @error('email') border-red-500 @enderror">

                            @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- PHONE -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>

                            <input type="tel" name="phone"
                                   value="{{ old('phone') }}"
                                   class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-blue-500
                      @error('phone') border-red-500 @enderror">

                            @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- MESSAGE -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>

                            <textarea name="message" rows="4"
                                      class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-blue-500
                         @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>

                            @error('message')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SUBMIT -->
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                            Send Inquiry
                        </button>
                    </form>

                </div>

                <!-- Additional Details -->
                <div class="bg-white rounded-lg property-card p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Additional Details</h2>
                    <div class="space-y-3">
                        @if(!empty($property->furniture_package))
                            <div class="flex justify-between">
                                <span class="text-gray-600">Furniture Package:</span>
                                <span class="font-medium">
                                    ฿{{ number_format($property->furniture_package, 0) }} THB
                                </span>
                            </div>
                        @endif

                        @if(!empty($property->title_deed))
                            <div class="flex justify-between">
                                <span class="text-gray-600">Title Deed:</span>
                                <span class="font-medium">{{ $property->title_deed }}</span>
                            </div>
                        @endif

                        <div class="flex justify-between">
                            <span class="text-gray-600">Property Type:</span>
                            <span class="font-medium">{{ $typeTitle }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-600">Location:</span>
                            <span class="font-medium text-right">
                                {{ $cityName ?: '-' }}
                            </span>
                        </div>

                        @if($property->created_at)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Listed On:</span>
                                <span class="font-medium">{{ $property->created_at->format('d M Y') }}</span>
                            </div>
                        @endif
                    </div>

                    @if(!($propertyType->title == 'Land' || $propertyType->slug == 'land'))
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h3 class="font-semibold text-gray-700 mb-2">Room Dimensions</h3>
                        <div class="space-y-2 text-sm">
                            @if(!empty($property->master_bedroom_size))
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Master Bedroom:</span>
                                    <span class="font-medium">{{ $property->master_bedroom_size }} sqm</span>
                                </div>
                            @endif
                            @if(!empty($property->bedroom2_size))
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Bedroom 2:</span>
                                    <span class="font-medium">{{ $property->bedroom2_size }} sqm</span>
                                </div>
                            @endif
                            @if(!empty($property->bedroom3_size))
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Bedroom 3:</span>
                                    <span class="font-medium">{{ $property->bedroom3_size }} sqm</span>
                                </div>
                            @endif

                            @if(empty($property->master_bedroom_size) && empty($property->bedroom2_size) && empty($property->bedroom3_size))
                                <div class="text-gray-400">Room dimensions not provided.</div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

@endsection
