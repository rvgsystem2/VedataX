<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 bg-white shadow-md px-6 py-4 rounded-lg">
            <div>
                <h2 class="font-bold text-2xl text-gray-800">{{ __('Update Home Page Media') }}</h2>
                <p class="text-sm text-gray-500">Upload images and replace existing ones.</p>
            </div>

            <a href="{{ route('home.media.index') }}"
               class="text-sm font-semibold text-gray-700 bg-gray-100 px-4 py-2 rounded-md hover:bg-gray-200">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-8 lg:px-16 pb-10">
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                <div class="font-semibold mb-2">Please fix the errors below:</div>
                <ul class="list-disc ml-5 text-sm space-y-1">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('home.media.store') }}" method="POST" enctype="multipart/form-data"
              class="bg-white shadow-md rounded-lg p-6">
            @csrf

            @include('home_page_media.form', ['media' => $media])

            <div class="mt-6 flex items-center justify-end gap-3">
                <a href="{{ route('home.media.index') }}"
                   class="px-4 py-2 rounded-md bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200">
                    Cancel
                </a>

                <button type="submit"
                        class="px-5 py-2 rounded-md text-white font-bold bg-gradient-to-r from-[#c21108] to-[#000308] shadow-md hover:from-[#000308] hover:to-[#c21108]">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
