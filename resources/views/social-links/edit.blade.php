<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 bg-white shadow-md px-6 py-4 rounded-lg">
            <div>
                <h2 class="font-bold text-2xl text-gray-800">{{ __('Social Links') }}</h2>
                <p class="text-sm text-gray-500">Add / update your social profile links.</p>
            </div>

            <a href="{{ route('social-links.index') }}"
               class="font-bold text-base text-gray-800 bg-gray-100 px-4 py-2 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition">
                Back
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-8 lg:px-16 pb-10">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                <div class="font-semibold mb-2">Please fix the following:</div>
                <ul class="list-disc ml-5 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <form method="POST" action="{{ route('social-links.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    {{-- Facebook --}}
                    <div class="space-y-1">
                        <label class="block text-xs font-medium text-slate-700">
                            Facebook URL <span class="text-gray-400">(optional)</span>
                        </label>
                        <input type="text" name="facebook"
                               placeholder="https://facebook.com/yourpage"
                               class="w-full text-sm border border-slate-300 rounded-xl px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               value="{{ old('facebook', $social->facebook ?? '') }}">
                        <div class="text-xs text-gray-400">Example: https://facebook.com/realvictorygroups</div>
                    </div>

                    {{-- Instagram --}}
                    <div class="space-y-1">
                        <label class="block text-xs font-medium text-slate-700">
                            Instagram URL <span class="text-gray-400">(optional)</span>
                        </label>
                        <input type="text" name="instagram"
                               placeholder="https://instagram.com/yourprofile"
                               class="w-full text-sm border border-slate-300 rounded-xl px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               value="{{ old('instagram', $social->instagram ?? '') }}">
                        <div class="text-xs text-gray-400">Example: https://instagram.com/yourbrand</div>
                    </div>

                    {{-- WhatsApp --}}
                    <div class="space-y-1 md:col-span-2">
                        <label class="block text-xs font-medium text-slate-700">
                            WhatsApp <span class="text-gray-400">(number or link)</span>
                        </label>
                        <input type="text" name="whatsapp"
                               placeholder="66XXXXXXXXXX or https://wa.me/66XXXXXXXXXX"
                               class="w-full text-sm border border-slate-300 rounded-xl px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               value="{{ old('whatsapp', $social->whatsapp ?? '') }}">
                        <div class="text-xs text-gray-400">
                            If you enter only number (10-digit), system will open it as wa.me link automatically on view page.
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('social-links.index') }}"
                       class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 text-sm font-semibold">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-5 py-2 rounded-lg text-white text-sm font-bold bg-gradient-to-r from-[#c21108] to-[#000308] shadow-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition">
                        Save Social Links
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
