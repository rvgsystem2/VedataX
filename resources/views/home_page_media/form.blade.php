@php
    $fields = [
        'hero_bg'      => 'Hero Background',
        'location_1'   => 'Location 1',
        'location_2'   => 'Location 2',
        'location_3'   => 'Location 3',
        'location_4'   => 'Location 4',
        'about_image'  => 'About Image',
        'final_cat_bg' => 'Final Category Background',
    ];
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    @foreach($fields as $name => $label)
        <div class="border border-gray-200 rounded-xl p-4">
            <div class="flex items-start justify-between gap-3 mb-3">
                <div>
                    <div class="text-sm font-semibold text-gray-800">{{ $label }}</div>

                </div>

                @if($media && $media->$name)
                    <button type="submit"
                            name="delete_field"
                            value="{{ $name }}"
                            class="text-xs font-semibold text-red-600 hover:underline"
                            onclick="return confirm('Remove this image?');">
                        Remove
                    </button>
                @endif

            </div>

            {{-- Preview --}}
            @if($media && $media->$name)
                <div class="w-full h-40 rounded-lg overflow-hidden bg-gray-100 border border-gray-100 mb-3">
                    <img src="{{ asset('storage/'.$media->$name) }}" class="w-full h-full object-cover" alt="{{ $label }}">
                </div>
            @else
                <div class="w-full h-40 rounded-lg bg-gray-50 border border-dashed border-gray-200 flex items-center justify-center mb-3">
                    <span class="text-xs text-gray-400">No image uploaded</span>
                </div>
            @endif

            {{-- Upload --}}
            <label class="block text-sm font-semibold text-gray-700 mb-1">Upload / Replace</label>
            <input type="file" name="{{ $name }}"
                   class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-[#c21108] focus:border-[#c21108]">
            <p class="text-xs text-gray-500 mt-1">Allowed: jpg, png, webp (max 4MB)</p>
        </div>
    @endforeach

        {{-- Address --}}
        <div class="md:col-span-2 border border-gray-200 rounded-xl p-4">
            <div class="text-sm font-semibold text-gray-800 mb-2">
                Address
            </div>

            <textarea name="address" rows="3"
                      class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-[#c21108] focus:border-[#c21108]"
                      placeholder="Enter address for home page display">{{ old('address', $media->address ?? '') }}</textarea>

            <p class="text-xs text-gray-500 mt-1">
                This address will be shown on the home page (footer / contact section).
            </p>
        </div>


</div>
