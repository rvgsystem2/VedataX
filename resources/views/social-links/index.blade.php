<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 bg-white shadow-md px-6 py-4 rounded-lg">
            <div>
                <h2 class="font-bold text-2xl text-gray-800">{{ __('Social Links') }}</h2>
                <p class="text-sm text-gray-500">Manage website social profiles (Facebook, WhatsApp, Instagram).</p>
            </div>

            <a href="{{ route('social-links.edit') }}"
               class="font-bold text-base text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                {{ $social ? 'Edit Links' : 'Add Links' }}
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
            @if(!$social)
                <div class="text-sm text-gray-600">
                    No social links found. Click <b>Add Links</b> to set up.
                </div>
            @else
                @php
                    $items = [
                        'facebook' => ['label' => 'Facebook',  'hint' => 'https://facebook.com/yourpage'],
                        'whatsapp' => ['label' => 'WhatsApp',  'hint' => '91XXXXXXXXXX or wa.me link'],
                        'instagram'=> ['label' => 'Instagram', 'hint' => 'https://instagram.com/yourprofile'],
                    ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach($items as $field => $meta)
                        @php $value = $social->$field; @endphp

                        <div class="border border-gray-200 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-sm font-semibold text-gray-800">{{ $meta['label'] }}</div>
                                <div class="text-xs text-gray-400">{{ $field }}</div>
                            </div>

                            @if($value)
                                <div class="rounded-lg bg-gray-50 border border-gray-100 p-3">
                                    <div class="text-xs text-gray-500 mb-1">Saved</div>

                                    <div class="text-sm text-gray-800 break-all">
                                        {{ $value }}
                                    </div>

                                    @php
                                        // Quick open link logic:
                                        $openUrl = $value;

                                        // If whatsapp is number -> convert to wa.me
                                        if($field === 'whatsapp'){
                                            $digits = preg_replace('/\D+/', '', (string)$value);
                                            if(strlen($digits) >= 10 && !str_contains($value, 'http')){
                                                if(strlen($digits) === 10) $digits = '91'.$digits;
                                                $openUrl = 'https://wa.me/'.$digits;
                                            }
                                        }

                                        // If it's not http/https and not whatsapp number, do not make clickable
                                        $isLink = str_starts_with((string)$openUrl, 'http://') || str_starts_with((string)$openUrl, 'https://');
                                    @endphp

                                    <div class="mt-3 flex items-center gap-2">
                                        @if($isLink)
                                            <a href="{{ $openUrl }}" target="_blank"
                                               class="inline-flex items-center justify-center text-xs font-semibold px-3 py-1.5 rounded-md bg-gray-900 text-white hover:bg-black transition">
                                                Open
                                            </a>
                                        @else
                                            <span class="text-xs text-gray-400">Not a link format</span>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="w-full rounded-lg bg-gray-50 border border-dashed border-gray-200 p-6 flex items-center justify-center">
                                    <span class="text-xs text-gray-400">Not set</span>
                                </div>
                            @endif

                            <div class="mt-3 text-xs text-gray-400">
                                {{ $meta['hint'] }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 border-t pt-4">
                    <div class="text-xs text-gray-400">Last updated:</div>
                    <div class="text-sm text-gray-700">{{ $social->updated_at?->format('d M Y, h:i A') }}</div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
