<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <div>
                <h2 class="font-bold text-2xl text-gray-800">Enquiry Details</h2>
                <p class="text-sm text-gray-500">Enquiry ID: #{{ $enquiry->id }}</p>
            </div>

            <a href="{{ route('enquiries.index') }}"
               class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
                ← Back
            </a>
        </div>
    </x-slot>

    @php
        $statusColors = [
            'pending'     => 'bg-yellow-50 text-yellow-700 border-yellow-200',
            'contacted'   => 'bg-blue-50 text-blue-700 border-blue-200',
            'in_progress' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
            'closed'      => 'bg-green-50 text-green-700 border-green-200',
            'close'       => 'bg-green-50 text-green-700 border-green-200',
            'rejected'    => 'bg-red-50 text-red-700 border-red-200',
        ];
        $statusClass = $statusColors[$enquiry->status] ?? 'bg-gray-50 text-gray-700 border-gray-200';
    @endphp

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Summary --}}
            <div class="bg-white rounded-2xl shadow border border-gray-100 p-6">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Contact</p>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $enquiry->name }}</h3>
                    </div>

                    <span class="inline-flex px-3 py-1 rounded-full border text-xs font-semibold {{ $statusClass }}">
                        {{ ucfirst(str_replace('_',' ', $enquiry->status)) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 text-sm">
                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="font-medium text-gray-800 break-all">{{ $enquiry->email }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Phone</p>
                        <p class="font-medium text-gray-800">{{ $enquiry->phone ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Subject</p>
                        <p class="font-medium text-gray-800">{{ $enquiry->subject ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Property ID</p>
                        <p class="font-medium text-gray-800">{{ $enquiry->property_id ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">User ID</p>
                        <p class="font-medium text-gray-800">{{ $enquiry->user_id ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Created At</p>
                        <p class="font-medium text-gray-800">
                            {{ optional($enquiry->created_at)->format('d M Y, h:i A') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Updated At</p>
                        <p class="font-medium text-gray-800">
                            {{ optional($enquiry->updated_at)->format('d M Y, h:i A') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="bg-white rounded-2xl shadow border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Message</h3>

                @if($enquiry->message)
                    <div class="rounded-xl bg-gray-50 border border-gray-100 p-4 text-sm text-gray-800 whitespace-pre-line">
                        {{ $enquiry->message }}
                    </div>
                @else
                    <div class="rounded-xl bg-gray-50 border border-gray-100 p-4 text-sm text-gray-500">
                        No message provided.
                    </div>
                @endif
            </div>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row sm:justify-between gap-3">
                <a href="{{ route('enquiries.index') }}"
                   class="px-4 py-2 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50 transition text-center">
                    ← Back to List
                </a>

                <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                    @csrf
                    <button type="submit"
                            class="px-4 py-2 rounded-xl border border-red-600 text-red-600
                                   hover:bg-red-600 hover:text-white transition w-full sm:w-auto">
                        🗑️ Delete Enquiry
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
