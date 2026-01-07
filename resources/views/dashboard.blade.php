<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Dashboard') }}
            </h2>

            <a href="{{ route('dashboard') }}"
               class="font-bold text-2xl text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md inline-block hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                {{ __('Dashboard') }}
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-32">

        <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center my-12">
            📊 Business-wise Analytics
        </h3>

        {{-- Top Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            {{-- Total Properties --}}
            <div class="bg-white rounded-xl shadow-md p-5 border-t-4 border-blue-500">
                <div class="text-sm text-gray-500 mb-1">Total Properties</div>
                <div class="text-3xl font-bold text-gray-800">{{ $totalProperties }}</div>
                <div class="text-xs text-gray-400 mt-1">
                    Available: {{ $availableProperties }},
                    Sold: {{ $soldProperties }},
                    Rented: {{ $rentedProperties }}
                </div>
            </div>

            {{-- Property Types --}}
            <div class="bg-white rounded-xl shadow-md p-5 border-t-4 border-emerald-500">
                <div class="text-sm text-gray-500 mb-1">Property Type Split</div>
                <div class="text-3xl font-bold text-gray-800">
                    {{ $saleTypeCount }} <span class="text-sm font-normal text-gray-500">Sale</span>
                </div>
                <div class="text-lg font-semibold text-gray-700">
                    {{ $rentTypeCount }} <span class="text-sm font-normal text-gray-500">Rent</span>
                </div>
                <div class="text-xs text-gray-400 mt-1">
                    Best Deals: {{ $bestDealCount }}
                </div>
            </div>

            {{-- Total Enquiries --}}
            <div class="bg-white rounded-xl shadow-md p-5 border-t-4 border-orange-500">
                <div class="text-sm text-gray-500 mb-1">Total Enquiries</div>
                <div class="text-3xl font-bold text-gray-800">{{ $totalEnquiries }}</div>
                <div class="text-xs text-gray-400 mt-1">
                    Pending: {{ $pendingEnquiries }},
                    In Progress: {{ $inProgressEnquiries }},
                    Closed: {{ $closedEnquiries }}
                </div>
            </div>

            {{-- Today Enquiries --}}
            <div class="bg-white rounded-xl shadow-md p-5 border-t-4 border-pink-500">
                <div class="text-sm text-gray-500 mb-1">Today's Enquiries</div>
                <div class="text-3xl font-bold text-gray-800">{{ $todayEnquiries }}</div>
                <div class="text-xs text-gray-400 mt-1">
                    {{ now()->format('d M Y') }}
                </div>
            </div>
        </div>

        {{-- Two-column section: Recent Properties & Recent Enquiries --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">

            {{-- Recent Properties --}}
            <div class="bg-white rounded-2xl shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-bold text-gray-800">
                        🏠 Recent Properties
                    </h4>
                    <a href="{{ route('properties.index') }}"
                       class="text-sm text-blue-600 hover:underline">
                        View all
                    </a>
                </div>

                @if($recentProperties->count())
                    <ul class="divide-y divide-gray-100">
                        @foreach($recentProperties as $property)
                            <li class="py-3">
                                <div class="flex justify-between">
                                    <div>
                                        <div class="font-semibold text-gray-800">
                                            {{ $property->title }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ optional($property->city)->name ?? 'No city' }}
                                            • {{ ucfirst($property->type) }}
                                            • Status: {{ ucfirst($property->status) }}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm font-bold text-emerald-600">
                                            THB {{ number_format($property->price, 2) }}
                                        </div>
                                        <div class="text-xs text-gray-400">
                                            {{ $property->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500">No properties found.</p>
                @endif
            </div>

            {{-- Recent Enquiries --}}
            <div class="bg-white rounded-2xl shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-bold text-gray-800">
                        📩 Recent Enquiries
                    </h4>
                    <a href="{{ route('enquiries.index') }}"
                       class="text-sm text-blue-600 hover:underline">
                        View all
                    </a>
                </div>

                @if($recentEnquiries->count())
                    <ul class="divide-y divide-gray-100">
                        @foreach($recentEnquiries as $enquiry)
                            <li class="py-3">
                                <div class="flex justify-between">
                                    <div>
                                        <div class="font-semibold text-gray-800">
                                            {{ $enquiry->name }}
                                            <span class="text-xs text-gray-500">
                                                ({{ $enquiry->email }})
                                            </span>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            Property:
                                            {{ optional($enquiry->property)->title ?? 'General Enquiry' }}
                                        </div>
                                        <div class="text-xs text-gray-400 mt-1">
                                            {{ Str::limit($enquiry->message, 60) }}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-[11px] font-semibold
                                            @class([
                                                'bg-yellow-100 text-yellow-700' => $enquiry->status === 'pending',
                                                'bg-blue-100 text-blue-700' => $enquiry->status === 'in_progress',
                                                'bg-green-100 text-green-700' => $enquiry->status === 'closed',
                                                'bg-red-100 text-red-700' => $enquiry->status === 'rejected',
                                                'bg-gray-100 text-gray-700' => $enquiry->status === 'contacted',
                                            ])">
                                            {{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}
                                        </span>
                                        <div class="text-xs text-gray-400 mt-1">
                                            {{ $enquiry->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500">No enquiries found.</p>
                @endif
            </div>
        </div>

    </div>
</x-app-layout>
