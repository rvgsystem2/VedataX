{{-- resources/views/admin/price_ranges/form.blade.php --}}
@php
    /** @var \App\Models\PriceRange|null $range */
    $isEdit = isset($range) && $range;
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ $isEdit ? __('Edit Price Range') : __('Add Price Range') }}
            </h2>

            <a href="{{ route('price-ranges.index') }}"
               class="font-bold text-base text-white bg-gradient-to-r from-[#000308] to-[#c21108] px-4 py-2 rounded-md shadow-md hover:from-[#c21108] hover:to-[#000308] transition duration-300 ease-in-out">
                Back
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-8 lg:px-16">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">

            {{-- ERRORS --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ $isEdit ? route('price-ranges.update', $range->id) : route('price-ranges.store') }}"
                method="POST">
                @csrf


                {{-- TYPE --}}
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Type</label>
                    <select name="type" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#c21108] focus:border-[#c21108]">
                        <option value="">Select Type</option>
                        <option value="min" {{ old('type', $range->type ?? '') === 'min' ? 'selected' : '' }}>Min Price</option>
                        <option value="max" {{ old('type', $range->type ?? '') === 'max' ? 'selected' : '' }}>Max Price</option>
                    </select>
                </div>

                {{-- LABEL --}}
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Label (Display Text)</label>
                    <input type="text" name="label" required
                           placeholder="e.g. ฿1,000,000"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#c21108] focus:border-[#c21108]"
                           value="{{ old('label', $range->label ?? '') }}">
                </div>

                {{-- VALUE --}}
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Value (Numeric)</label>
                    <input type="number" name="value"
                           placeholder="e.g. 1000000"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#c21108] focus:border-[#c21108]"
                           value="{{ old('value', $range->value ?? '') }}">
                    <p class="text-xs text-gray-500 mt-1">Value should be numeric. Example: 3000000</p>
                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end gap-3">
                    <a href="{{ route('price-ranges.index') }}"
                       class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="bg-gradient-to-r from-[#c21108] to-[#000308] text-white px-6 py-2.5 rounded-lg shadow-md font-semibold hover:from-[#000308] hover:to-[#c21108] transition duration-300">
                        {{ $isEdit ? 'Update' : 'Save' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
