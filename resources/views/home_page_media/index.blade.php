<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 bg-white shadow-md px-6 py-4 rounded-lg">
            <div>
                <h2 class="font-bold text-2xl text-gray-800">{{ __('Home Page Media') }}</h2>
                <p class="text-sm text-gray-500">Hero background, locations, about image & final category background.</p>
            </div>

            <a href="{{ route('home.media.edit') }}"
               class="font-bold text-base text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                {{ $media ? 'Edit Media' : 'Add Media' }}
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-8 lg:px-16 pb-10">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            @if(!$media)
                <div class="text-sm text-gray-600">
                    No media record found. Click <b>Add Media</b> to upload images.
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @php
                        $items = [
                            'hero_bg'      => 'Hero Background',
                            'location_1'   => 'Location 1',
                            'location_2'   => 'Location 2',
                            'location_3'   => 'Location 3',
                            'location_4'   => 'Location 4',
                            'about_image'  => 'About Image',
                            'final_cat_bg' => 'Final Category Background',
                        ];
                    @endphp

                    @foreach($items as $field => $label)
                        <div class="border border-gray-200 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-sm font-semibold text-gray-800">{{ $label }}</div>
                                <div class="text-xs text-gray-400">{{ $field }}</div>
                            </div>

                            @if($media->$field)
                                <div class="w-full h-40 rounded-lg overflow-hidden bg-gray-100 border border-gray-100">
                                    <img src="{{ asset('storage/'.$media->$field) }}"
                                         class="w-full h-full object-cover"
                                         alt="{{ $label }}">
                                </div>

                            @else
                                <div class="w-full h-40 rounded-lg bg-gray-50 border border-dashed border-gray-200 flex items-center justify-center">
                                    <span class="text-xs text-gray-400">No image</span>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
                @if($media && $media->address)
                    <div class="mt-6 border-t pt-4">
                        <div class="text-sm font-semibold text-gray-700 mb-1">Address</div>
                        <div class="text-sm text-gray-600 whitespace-pre-line">
                            {{ $media->address }}
                        </div>
                    </div>
                @endif

            @endif
        </div>
    </div>
</x-app-layout>
