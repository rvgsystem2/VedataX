<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ isset($property) ? 'Edit Property' : 'Add New Property' }}
            </h2>

            <a href="{{ route('properties.index') }}"
               class="font-bold text-base text-white bg-gray-600 px-4 py-2 rounded-md shadow-md hover:bg-gray-800 transition duration-300 ease-in-out">
                ← Back to List
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-6">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}"
                  method="POST" enctype="multipart/form-data"
                  class="space-y-6 bg-white p-8 rounded shadow">
                @csrf


                {{-- BASIC DETAILS --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ old('title', $property->title ?? '') }}" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Price (THB)
                        </label>

                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-sm">฿</span>
                            </div>

                            <input type="number"
                                   name="price"
                                   value="{{ old('price', $property->price ?? '') }}"
                                   required
                                   class="block w-full pl-7 pr-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="0.00">
                        </div>
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select Type --</option>
                            <option value="rent" {{ old('type', $property->type ?? '') == 'rent' ? 'selected' : '' }}>Rent</option>
                            <option value="sale" {{ old('type', $property->type ?? '') == 'sale' ? 'selected' : '' }}>Sale</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select Status --</option>
                            <option value="available" {{ old('status', $property->status ?? '') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="sold" {{ old('status', $property->status ?? '') == 'sold' ? 'selected' : '' }}>Sold</option>
                            <option value="rented" {{ old('status', $property->status ?? '') == 'rented' ? 'selected' : '' }}>Rented</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Property Type</label>
                        <select name="property_type_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select Category --</option>
                            @foreach($propertyTypes as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('property_type_id', $property->property_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                    {{ $type->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">City</label>
                        <select name="city_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Select City --</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ old('city_id', $property->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" value="{{ old('address', $property->address ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Area (sqft)</label>
                        <input type="number" step="0.1" name="area" value="{{ old('area', $property->area ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Built In (Year)</label>
                        <input type="text" name="built_in" maxlength="4" value="{{ old('built_in', $property->built_in ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    {{-- Usually listed_by = Auth::id(), but keeping field if you really want to set manually --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Listed By (User ID)</label>
                        <input type="number" name="listed_by" value="{{ old('listed_by', $property->listed_by ?? '') }}" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="4"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $property->description ?? '') }}</textarea>
                </div>

                {{-- BED / BATH / MAIN IMAGE INDEX --}}
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bedrooms</label>
                        <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bathrooms</label>
                        <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Main Image Index (0-based)</label>
                        <input type="number" name="main_image_index" value="{{ old('main_image_index', 0) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>
                </div>

                {{-- LOCATION COORDINATES --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Latitude</label>
                        <input type="text" name="latitude" value="{{ old('latitude', $property->latitude ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Longitude</label>
                        <input type="text" name="longitude" value="{{ old('longitude', $property->longitude ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>
                </div>

                {{-- AMENITIES (MASTER TABLE BASED) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Amenities</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mt-1">
                        @foreach($amenities as $amenity)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}"
                                       {{ in_array($amenity->id, old('amenities', isset($property) ? $property->amenities->pluck('id')->toArray() : [])) ? 'checked' : '' }}
                                       class="form-checkbox text-indigo-600">
                                <span class="ml-2 text-sm text-gray-700">{{ $amenity->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- IMAGES --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Images</label>
                    <input type="file" name="images[]" multiple accept="image/*"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    <p class="text-xs text-gray-500 mt-1">Upload JPG/PNG images, max 2MB each</p>

                    @if(isset($property) && $property->images->count())
                        <div class="mt-3 grid grid-cols-2 md:grid-cols-4 gap-3">
                            @foreach($property->images as $idx => $img)
                                <div class="border rounded p-2 text-center">
                                    <img src="{{ asset('storage/'.$img->path) }}" alt="" class="w-full h-24 object-cover mb-1">
                                    <div class="text-xs text-gray-600 truncate">{{ $img->path }}</div>
                                    <div class="mt-1 flex items-center justify-center gap-2">
                                        <label class="inline-flex items-center text-xs">
                                            <input type="radio" name="existing_main_image" value="{{ $idx }}"
                                                {{ $property->main_image_index == $idx ? 'checked' : '' }}>
                                            <span class="ml-1">Main</span>
                                        </label>
                                        <label class="inline-flex items-center text-xs text-red-600">
                                            <input type="checkbox" name="delete_images[]" value="{{ $img->id }}">
                                            <span class="ml-1">Delete</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- BEST DEAL --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Best Deal</label>

                    <label class="flex items-center mt-2 cursor-pointer">
                        <input type="checkbox"
                               name="best_deal"
                               value="1"
                               {{ old('best_deal', $property->best_deal ?? false) ? 'checked' : '' }}
                               class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">

                        <span class="ml-2 text-sm text-gray-700">
                Mark this property as Best Deal
            </span>
                    </label>
                </div>

                {{-- INTERIORS --}}
                @php
                    $oldInteriors = old('interiors');
                    $interiors = $oldInteriors ?? (isset($property) ? $property->interiors->map(function($i){
                        return ['name' => $i->name, 'icon_class' => $i->icon_class];
                    })->toArray() : []);
                    if (empty($interiors)) {
                        $interiors = [['name' => '', 'icon_class' => '']];
                    }
                @endphp
                <div class="border-t pt-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-semibold text-gray-800">Interiors</h3>
                        <button type="button"
                                onclick="addDynamicRow('interiors')"
                                class="text-xs px-2 py-1 bg-gray-100 rounded hover:bg-gray-200">
                            + Add Interior
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mb-2">Example: Wardrobe, Modular Kitchen, TV Unit, etc.</p>

                    <div id="interiors-wrapper" data-next-index="{{ count($interiors) }}" class="space-y-2">
                        @foreach($interiors as $i => $row)
                            <div class="grid md:grid-cols-3 gap-3 dynamic-row">
                                <input type="text"
                                       name="interiors[{{ $i }}][name]"
                                       value="{{ $row['name'] ?? '' }}"
                                       placeholder="Interior name"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

                                <input type="text"
                                       name="interiors[{{ $i }}][icon_class]"
                                       value="{{ $row['icon_class'] ?? '' }}"
                                       placeholder="Icon class (optional, e.g. fa fa-bed)"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

                                <button type="button"
                                        onclick="removeDynamicRow(this)"
                                        class="mt-1 inline-flex items-center justify-center px-3 py-2 text-xs bg-red-100 text-red-600 rounded hover:bg-red-200">
                                    Remove
                                </button>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{-- UTILITY & INFRASTRUCTURE --}}
                @php
                    $oldUtilities = old('utilities');
                    $utilities = $oldUtilities ?? (isset($property) ? $property->utilityInfrastructures->map(function($u){
                        return ['name' => $u->name, 'icon_class' => $u->icon_class];
                    })->toArray() : []);
                    if (empty($utilities)) {
                        $utilities = [['name' => '', 'icon_class' => '']];
                    }
                @endphp
                <div class="border-t pt-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-semibold text-gray-800">Utility & Infrastructure</h3>
                        <button type="button"
                                onclick="addDynamicRow('utilities')"
                                class="text-xs px-2 py-1 bg-gray-100 rounded hover:bg-gray-200">
                            + Add Utility
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mb-2">Example: Water Supply, Power Backup, Lift, Parking, etc.</p>

                    <div id="utilities-wrapper" data-next-index="{{ count($utilities) }}" class="space-y-2">
                        @foreach($utilities as $i => $row)
                            <div class="grid md:grid-cols-3 gap-3 dynamic-row">
                                <input type="text"
                                       name="utilities[{{ $i }}][name]"
                                       value="{{ $row['name'] ?? '' }}"
                                       placeholder="Utility / infrastructure name"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

                                <input type="text"
                                       name="utilities[{{ $i }}][icon_class]"
                                       value="{{ $row['icon_class'] ?? '' }}"
                                       placeholder="Icon class (optional)"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

                                <button type="button"
                                        onclick="removeDynamicRow(this)"
                                        class="mt-1 inline-flex items-center justify-center px-3 py-2 text-xs bg-red-100 text-red-600 rounded hover:bg-red-200">
                                    Remove
                                </button>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{-- SAFETY & SECURITY --}}
                @php
                    $oldSafeties = old('safeties');
                    $safeties = $oldSafeties ?? (isset($property) ? $property->safetySecurities->map(function($s){
                        return ['name' => $s->name, 'icon_class' => $s->icon_class];
                    })->toArray() : []);
                    if (empty($safeties)) {
                        $safeties = [['name' => '', 'icon_class' => '']];
                    }
                @endphp
                <div class="border-t pt-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-semibold text-gray-800">Safety & Security</h3>
                        <button type="button"
                                onclick="addDynamicRow('safeties')"
                                class="text-xs px-2 py-1 bg-gray-100 rounded hover:bg-gray-200">
                            + Add Safety Option
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mb-2">Example: CCTV, Security Guard, Fire Exit, Intercom, etc.</p>

                    <div id="safeties-wrapper" data-next-index="{{ count($safeties) }}" class="space-y-2">
                        @foreach($safeties as $i => $row)
                            <div class="grid md:grid-cols-3 gap-3 dynamic-row">
                                <input type="text"
                                       name="safeties[{{ $i }}][name]"
                                       value="{{ $row['name'] ?? '' }}"
                                       placeholder="Safety / security feature"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

                                <input type="text"
                                       name="safeties[{{ $i }}][icon_class]"
                                       value="{{ $row['icon_class'] ?? '' }}"
                                       placeholder="Icon class (optional)"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

                                <button type="button"
                                        onclick="removeDynamicRow(this)"
                                        class="mt-1 inline-flex items-center justify-center px-3 py-2 text-xs bg-red-100 text-red-600 rounded hover:bg-red-200">
                                    Remove
                                </button>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{-- SUBMIT BUTTON --}}
                <div class="pt-6">
                    <button type="submit"
                            class="px-6 py-2 text-white {{ isset($property) ? 'bg-blue-600 hover:bg-blue-700' : 'bg-[#c21108] hover:bg-[#000308]' }} rounded shadow-md transition">
                        {{ isset($property) ? 'Update Property' : 'Save Property' }}
                    </button>
                </div>
            </form>


    </div>
    {{-- SIMPLE JS FOR DYNAMIC ROWS --}}
    <script>
        function addDynamicRow(group) {
            const wrapperId = group + '-wrapper';
            const wrapper = document.getElementById(wrapperId);
            if (!wrapper) return;

            let index = parseInt(wrapper.getAttribute('data-next-index') || '0', 10);

            const row = document.createElement('div');
            row.className = 'grid md:grid-cols-3 gap-3 dynamic-row mt-2';

            if (group === 'interiors') {
                row.innerHTML = `
                <input type="text"
                       name="interiors[${index}][name]"
                       placeholder="Interior name"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <input type="text"
                       name="interiors[${index}][icon_class]"
                       placeholder="Icon class (optional, e.g. fa fa-bed)"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <button type="button"
                        onclick="removeDynamicRow(this)"
                        class="mt-1 inline-flex items-center justify-center px-3 py-2 text-xs bg-red-100 text-red-600 rounded hover:bg-red-200">
                    Remove
                </button>
            `;
            } else if (group === 'utilities') {
                row.innerHTML = `
                <input type="text"
                       name="utilities[${index}][name]"
                       placeholder="Utility / infrastructure name"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <input type="text"
                       name="utilities[${index}][icon_class]"
                       placeholder="Icon class (optional)"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <button type="button"
                        onclick="removeDynamicRow(this)"
                        class="mt-1 inline-flex items-center justify-center px-3 py-2 text-xs bg-red-100 text-red-600 rounded hover:bg-red-200">
                    Remove
                </button>
            `;
            } else if (group === 'safeties') {
                row.innerHTML = `
                <input type="text"
                       name="safeties[${index}][name]"
                       placeholder="Safety / security feature"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <input type="text"
                       name="safeties[${index}][icon_class]"
                       placeholder="Icon class (optional)"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <button type="button"
                        onclick="removeDynamicRow(this)"
                        class="mt-1 inline-flex items-center justify-center px-3 py-2 text-xs bg-red-100 text-red-600 rounded hover:bg-red-200">
                    Remove
                </button>
            `;
            }

            wrapper.appendChild(row);
            wrapper.setAttribute('data-next-index', index + 1);
        }

        function removeDynamicRow(button) {
            const row = button.closest('.dynamic-row');
            if (row) row.remove();
        }
    </script>

</x-app-layout>
