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

                    @php
                        $selectedTypeIds = old(
                            'property_type_ids',
                            isset($property) ? $property->propertyTypes->pluck('id')->toArray() : []
                        );
                    @endphp

{{--                    <div>--}}
{{--                        <label class="block text-sm font-medium text-gray-700">Property Type</label>--}}
{{--                        <select name="property_type_ids[]" required multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">--}}
{{--                            <option value="">-- Select Category --</option>--}}
{{--                            @foreach($propertyTypes as $type)--}}
{{--                                <option value="{{ $type->id }}"--}}
{{--                                    {{ old('property_type_id', $property->property_type_id ?? '') == $type->id ? 'selected' : '' }}>--}}
{{--                                    {{ $type->title }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label class="block text-sm font-medium text-gray-700 mb-1">--}}
{{--                            Property Type <span class="text-red-600">*</span>--}}
{{--                        </label>--}}

{{--                        <div class="relative">--}}
{{--                            <select name="property_type_ids[]"--}}
{{--                                    multiple--}}
{{--                                    required--}}
{{--                                    size="6"--}}
{{--                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm--}}
{{--                       focus:ring-blue-500 focus:border-blue-500">--}}
{{--                                @foreach($propertyTypes as $type)--}}
{{--                                    <option value="{{ $type->id }}"--}}
{{--                                        {{ in_array($type->id, $selectedTypeIds) ? 'selected' : '' }}>--}}
{{--                                        {{ $type->title }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}

{{--                            <p class="text-xs text-gray-500 mt-1">--}}
{{--                                Multiple select: <span class="font-semibold">Ctrl</span> (Windows) / <span class="font-semibold">Cmd</span> (Mac) + click--}}
{{--                            </p>--}}

{{--                            @error('property_type_ids')--}}
{{--                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                            @error('property_type_ids.*')--}}
{{--                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        --}}{{-- Selected badges preview --}}
{{--                        <div class="mt-2 flex flex-wrap gap-2">--}}
{{--                            @foreach($propertyTypes as $type)--}}
{{--                                @if(in_array($type->id, $selectedTypeIds))--}}
{{--                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium--}}
{{--                             bg-indigo-50 text-indigo-700 border border-indigo-200">--}}
{{--                    @if($type->icon_class)--}}
{{--                                            <i class="{{ $type->icon_class }} mr-1 text-[10px]"></i>--}}
{{--                                        @endif--}}
{{--                                        {{ $type->title }}--}}
{{--                </span>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    @php
                        $selectedTypeIds = old(
                            'property_type_ids',
                            isset($property) ? $property->propertyTypes->pluck('id')->toArray() : []
                        );

                        $typeOptions = $propertyTypes->map(function($t){
                            return [
                                'id'    => (int) $t->id,
                                'label' => (string) $t->title,
                                'icon'  => (string) ($t->icon_class ?? ''),
                            ];
                        })->values();
                    @endphp

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Property Type <span class="text-red-600">*</span>
                        </label>

                        <div
                            x-data="multiSelectTypes({
                                options: @js($typeOptions),
                                selected: @js(array_map('intval', $selectedTypeIds)),
                                placeholder: 'Search & select property types...'
                            })"
                            x-init="init()"
                            class="relative">

                            {{-- Hidden inputs (IMPORTANT) --}}
                            <template x-for="id in selected" :key="'hid-'+id">
                                <input type="hidden" name="property_type_ids[]" :value="id">
                            </template>

                            {{-- Input / Trigger --}}
                            <button
                                type="button"
                                @click="toggleOpen()"
                                @keydown.enter.prevent="toggleOpen()"
                                @keydown.escape.prevent="open=false"
                                class="w-full min-h-[46px] rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                   flex items-center gap-2 flex-wrap"
                            >
                                {{-- Chips --}}
                                <template x-if="selected.length">
                                    <div class="flex flex-wrap gap-2">
                                        <template x-for="id in selected" :key="'chip-'+id">
                        <span
                            class="inline-flex items-center gap-1 rounded-full border border-indigo-200 bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700"
                        >
                            <template x-if="getIcon(id)">
                                <i :class="getIcon(id) + ' text-[10px]'"></i>
                            </template>

                            <span x-text="getLabel(id)"></span>

                            <span
                                class="ml-1 inline-flex h-4 w-4 items-center justify-center rounded-full bg-indigo-100 text-indigo-700 hover:bg-indigo-200"
                                @click.stop="remove(id)"
                                title="Remove"
                                >×</span>
                            </span>
                                        </template>
                                    </div>
                                </template>

                                {{-- Placeholder --}}
                                <template x-if="!selected.length">
                                    <span class="text-sm text-gray-400" x-text="placeholder"></span>
                                </template>

                                <span class="ml-auto text-gray-400">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>

                            {{-- Dropdown --}}
                            <div
                                x-show="open"
                                x-transition
                                @click.outside="open=false"
                                class="absolute z-[60] mt-2 w-full rounded-xl border border-gray-200 bg-white shadow-xl overflow-hidden"
                                style="display:none;"
                            >
                                {{-- Top actions --}}
                                <div class="p-3 border-b bg-gray-50">
                                    <div class="flex items-center gap-2">
                                        <div class="relative flex-1">
                                            <input
                                                type="text"
                                                x-model="search"
                                                @keydown.escape.prevent="open=false"
                                                placeholder="Search..."
                                                class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                            >
                                        </div>

                                        <button
                                            type="button"
                                            class="text-xs px-3 py-2 rounded-lg bg-white border border-gray-200 hover:bg-gray-100"
                                            @click="selectAllFiltered()"
                                        >
                                            Select all
                                        </button>

                                        <button
                                            type="button"
                                            class="text-xs px-3 py-2 rounded-lg bg-white border border-gray-200 hover:bg-gray-100"
                                            @click="clearAll()"
                                        >
                                            Clear
                                        </button>
                                    </div>

                                    <div class="mt-2 text-xs text-gray-500 flex items-center justify-between">
                                        <span>Selected: <span class="font-semibold" x-text="selected.length"></span></span>
                                        <span x-show="search" class="text-gray-400">Filtered: <span x-text="filteredOptions().length"></span></span>
                                    </div>
                                </div>

                                {{-- Options list --}}
                                <div class="max-h-72 overflow-auto">
                                    <template x-if="filteredOptions().length === 0">
                                        <div class="p-4 text-sm text-gray-500">No results found.</div>
                                    </template>

                                    <template x-for="opt in filteredOptions()" :key="'opt-'+opt.id">
                                        <label
                                            class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-50 cursor-pointer border-b last:border-b-0"
                                        >
                                            <input
                                                type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                :checked="isSelected(opt.id)"
                                                @change="toggle(opt.id)"
                                            >

                                            <div class="flex items-center gap-2">
                                                <template x-if="opt.icon">
                                                    <i :class="opt.icon + ' text-sm text-gray-600'"></i>
                                                </template>
                                                <span class="text-sm text-gray-800" x-text="opt.label"></span>
                                            </div>
                                        </label>
                                    </template>
                                </div>

                                {{-- Footer --}}
                                <div class="p-3 bg-gray-50 border-t flex items-center justify-between">
                                    <p class="text-xs text-gray-500">
                                        Tip: Search karke multiple select kar sakte ho ✅
                                    </p>
                                    <button
                                        type="button"
                                        class="text-sm px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700"
                                        @click="open=false"
                                    >
                                        Done
                                    </button>
                                </div>
                            </div>

                            {{-- Errors --}}
                            @error('property_type_ids')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            @error('property_type_ids.*')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
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
                        <label class="block text-sm font-medium text-gray-700">Area (sqm)</label>
                        <input type="number" step="0.1" name="area" value="{{ old('area', $property->area ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Built In (Year)</label>
                        <input type="text" name="built_in" maxlength="4" value="{{ old('built_in', $property->built_in ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    {{-- Usually listed_by = Auth::id(), but keeping field if you really want to set manually --}}
{{--                    <div>--}}
{{--                        <label class="block text-sm font-medium text-gray-700">Listed By (User ID)</label>--}}
{{--                        <input type="number" name="listed_by" value="{{ old('listed_by', $property->listed_by ?? '') }}"--}}
{{--                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />--}}
{{--                    </div>--}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Listed By (User)
                        </label>

                        <select name="listed_by"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

                            <option value="">-- Select User --</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('listed_by', $property->listed_by ?? '') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} (ID: {{ $user->id }})
                                </option>
                            @endforeach

                        </select>
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
                                <div id="property-image-{{ $img->id }}" class="border rounded p-2 text-center">
                                    <img
                                        src="{{ asset('storage/'.$img->url) }}"
                                        data-full="{{ asset('storage/'.$img->url) }}"
                                        class="w-full h-24 object-cover mb-1 cursor-pointer rounded"
                                        onclick="openImageModal(this)"
                                    >

                                    <div class="text-xs text-gray-600 truncate">{{ $img->path }}</div>

                                    <div class="mt-1 flex items-center justify-center gap-3">
                                        <label class="inline-flex items-center text-xs">
{{--                                            <input type="radio" name="existing_main_image" value="{{ $idx }}"--}}
{{--                                                {{ $property->main_image_index == $idx ? 'checked' : '' }}>--}}
                                            <input type="radio" name="existing_main_image" value="{{ $img->id }}"
                                                {{ $img->is_main ? 'checked' : '' }}>

                                            <span class="ml-1">Main</span>
                                        </label>

                                        <button type="button"
                                                class="inline-flex items-center text-xs text-red-600 hover:text-red-700 hover:underline"
                                                onclick="deletePropertyImage({{ $img->id }}, this)">
                                            Delete
                                        </button>
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

            {{-- IMAGE PREVIEW MODAL --}}
            <div id="imageModal"
                 class="fixed inset-0 z-[9999] hidden items-center justify-center">
                {{-- Backdrop --}}
                <div class="absolute inset-0 bg-black/70" onclick="closeImageModal()"></div>

                {{-- Modal Box --}}
                <div class="relative z-10 w-[95vw] max-w-5xl rounded-2xl bg-white shadow-2xl overflow-hidden">
                    <div class="flex items-center justify-between px-4 py-3 border-b">
                        <p class="text-sm font-semibold text-gray-800">Image Preview</p>
                        <button type="button"
                                class="h-9 w-9 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700"
                                onclick="closeImageModal()">
                            ✕
                        </button>
                    </div>

                    <div class="p-3 bg-black">
                        <img id="modalImage"
                             src=""
                             alt="Preview"
                             class="w-full max-h-[75vh] object-contain rounded-lg bg-black">
                    </div>

                    <div class="px-4 py-3 flex items-center justify-end gap-2 border-t">
                        <button type="button"
                                class="px-4 py-2 text-sm rounded-lg bg-gray-100 hover:bg-gray-200"
                                onclick="closeImageModal()">
                            Close
                        </button>
                    </div>
                </div>
            </div>


    </div>

    <script>
        // existing functions...
        // addDynamicRow(), removeDynamicRow() already there

        function openImageModal(imgEl) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');

            const src = imgEl.getAttribute('data-full') || imgEl.src;
            modalImg.src = src;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');

            modalImg.src = '';
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        // ESC to close
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeImageModal();
        });
    </script>


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


    <script>
        async function deletePropertyImage(imageId, btnEl) {
            if (!confirm('Delete this image permanently?')) return;

            // UI: disable
            btnEl.disabled = true;
            btnEl.classList.add('opacity-60', 'pointer-events-none');

            try {
                const res = await fetch(`{{ route('properties.images.delete', '__ID__') }}`.replace('__ID__', imageId), {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });

                const data = await res.json();

                if (!res.ok || !data.status) {
                    throw new Error(data.message || 'Delete failed');
                }

                // remove card from UI
                const card = document.getElementById(`property-image-${imageId}`);
                if (card) card.remove();

            } catch (err) {
                alert(err.message || 'Something went wrong');
                btnEl.disabled = false;
                btnEl.classList.remove('opacity-60', 'pointer-events-none');
            }
        }
    </script>



    <script>
        function multiSelectTypes({ options = [], selected = [], placeholder = 'Select...' }) {
            return {
                open: false,
                search: '',
                options: options,
                selected: Array.isArray(selected) ? selected : [],
                placeholder: placeholder,

                init() {
                    // unique + int
                    this.selected = [...new Set(this.selected.map(v => parseInt(v, 10)).filter(Boolean))];
                },

                toggleOpen() {
                    this.open = !this.open;
                    if (this.open) {
                        this.$nextTick(() => {
                            const inp = this.$el.querySelector('input[x-model="search"]');
                            if (inp) inp.focus();
                        });
                    }
                },

                filteredOptions() {
                    const q = (this.search || '').toLowerCase().trim();
                    if (!q) return this.options;
                    return this.options.filter(o => (o.label || '').toLowerCase().includes(q));
                },

                isSelected(id) {
                    id = parseInt(id, 10);
                    return this.selected.includes(id);
                },

                toggle(id) {
                    id = parseInt(id, 10);
                    if (!id) return;

                    if (this.selected.includes(id)) {
                        this.selected = this.selected.filter(x => x !== id);
                    } else {
                        this.selected.push(id);
                    }
                },

                remove(id) {
                    id = parseInt(id, 10);
                    this.selected = this.selected.filter(x => x !== id);
                },

                clearAll() {
                    this.selected = [];
                },

                selectAllFiltered() {
                    const ids = this.filteredOptions().map(o => parseInt(o.id, 10)).filter(Boolean);
                    const set = new Set(this.selected);
                    ids.forEach(i => set.add(i));
                    this.selected = [...set];
                },

                getLabel(id) {
                    id = parseInt(id, 10);
                    const o = this.options.find(x => parseInt(x.id, 10) === id);
                    return o ? o.label : ('#' + id);
                },

                getIcon(id) {
                    id = parseInt(id, 10);
                    const o = this.options.find(x => parseInt(x.id, 10) === id);
                    return o ? (o.icon || '') : '';
                },
            }
        }
    </script>



</x-app-layout>
