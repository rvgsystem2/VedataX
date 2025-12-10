{{-- resources/views/admin/price_ranges/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Price Ranges') }}
            </h2>

            <a href="{{ route('price-ranges.create') }}"
               class="font-bold text-base text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                + Add New
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-8 lg:px-16">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Label</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Type</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Value</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-600 uppercase">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @forelse($priceRanges as $index => $range)
                    <tr>
                        {{-- Sr. No. --}}
                        <td class="px-6 py-4 text-sm text-gray-800">
                            {{ $priceRanges->firstItem() + $index }}
                        </td>

                        {{-- Label --}}
                        <td class="px-6 py-4 text-sm text-gray-900 font-semibold">
                            {{ $range->label }}
                        </td>

                        {{-- Type Badge --}}
                        <td class="px-6 py-4 text-sm">
                            @if($range->type === 'min')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Min Price
                                    </span>
                            @elseif($range->type === 'max')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Max Price
                                    </span>
                            @else
                                <span class="text-xs text-gray-500">{{ $range->type }}</span>
                            @endif
                        </td>

                        {{-- Value --}}
                        <td class="px-6 py-4 text-sm text-gray-700">
                            @if(!is_null($range->value))
                                ฿{{ number_format($range->value) }}
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-right text-sm">

                            <form action="{{ route('price-ranges.destroy', $range->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this price range?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            No price ranges found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $priceRanges->links() }}
        </div>
    </div>
</x-app-layout>
