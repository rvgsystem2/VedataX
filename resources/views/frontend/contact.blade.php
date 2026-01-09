@extends('component.main')
@section('content')



    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #0ea5e9 100%);
        }
        .property-option {
            transition: all 0.3s ease;
        }
        .property-option:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .property-option.selected {
            border-color: #0ea5e9;
            background-color: #f0f9ff;
        }
    </style>


    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 max-w-6xl ">
        <!-- Hero Section -->


        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Contact Information -->
            <div class="lg:w-1/2">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-6">

                    <h1 class="text-4xl font-bold text-gray-800 mb-4 font-spartan">{{__('contact.title')}}</h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto font-spartan">
{{--                        Get in touch with Vedata Real Estate experts for questions about properties, listings, or tailored support in Samui. We're here to help you find the right home or investment.--}}
                        {{__('contact.subtitle')}}
                    </p>
                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 font-spartan">{{__('contact.address_label')}}</p>

                                <a
                                    href="https://www.google.com/maps/search/?api=1&query=7%2F21+moo+6+Maenam+84330%2C+Koh+Samui%2C+Thailand"
                                    target="_blank"
                                    class="text-gray-600 mt-1 font-spartan hover:text-blue-600 underline">
{{--                                    7/21 moo 6 Maenam 84330, Koh Samui, Thailand--}}
                                    {{ $address ?? __('contact.address_text')}}
                                </a>
                            </div>

                        </div>

                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 font-spartan">{{__('contact.email_label')}}</p>

                                <a
                                    href="mailto:info@vedata.co"
                                    class="text-gray-600 mt-1 font-spartan hover:text-blue-600 underline">
                                    info@vedata.co
                                </a>
                            </div>

                        </div>

                        <!-- Phone -->
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-phone text-blue-600"></i>
                            </div>
                            <div>
                                <div>
                                    <p class="font-semibold text-gray-700 font-spartan">{{__('contact.phone_label')}}</p>

                                    <a href="tel:+66968075911"
                                       class="text-gray-600 mt-1 font-spartan font-bold hover:text-blue-600 underline block">
                                        +66 96 807 5911
                                    </a>

                                    <a href="tel:+66966626272"
                                       class="text-gray-600 mt-1 font-spartan font-bold hover:text-blue-600 underline block">
                                        +66 96 662 6272
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 font-spartan">{{__('contact.follow_us')}}</h2>
                    <!-- Social Media Links -->
<div class="flex flex-wrap justify-center gap-4 mt-6">
    <!-- Facebook -->
    <a href="{{$socialLinks && $socialLinks->facebook ? $socialLinks->facebook : 'https://facebook.com'}}" target="_blank" aria-label="Facebook"
      class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-600 text-white shadow-md hover:bg-blue-700 hover:scale-105 transition-transform duration-300 ease-out">
      <i class="fab fa-facebook-f text-lg"></i>
    </a>

{{--    <!-- WhatsApp -->--}}
{{--    <a href="{{$socialLinks && $socialLinks->whatsapp ? $socialLinks->whatsapp : 'https://wa.me/1234567890'}} " target="_blank" aria-label="WhatsApp"--}}
{{--      class="flex items-center justify-center w-12 h-12 rounded-full bg-green-500 text-white shadow-md hover:bg-green-600 hover:scale-105 transition-transform duration-300 ease-out">--}}
{{--      <i class="fab fa-whatsapp text-lg"></i>--}}
{{--    </a>--}}


    @php
        $raw = $socialLinks->whatsapp ?? null;

        // fallback
        $waUrl = 'https://wa.me/1234567890';

        if($raw){
          $raw = trim($raw);

          // अगर full link है तो direct use
          if(Str::startsWith($raw, ['http://', 'https://', 'wa.me/', 'api.whatsapp.com'])){
              $waUrl = Str::startsWith($raw, 'wa.me/') ? 'https://' . $raw : $raw;
          } else {
              // वरना number मानकर clean करो
              $digits = preg_replace('/\D+/', '', $raw);

              // 10 digit => India 91 add
              if(strlen($digits) === 10) $digits = '66'.$digits;

              // minimum sanity check
              if(strlen($digits) >= 11) $waUrl = 'https://wa.me/'.$digits;
          }
        }
    @endphp

        <!-- WhatsApp -->
    <a href="{{ $waUrl }}" target="_blank" aria-label="WhatsApp"
       class="flex items-center justify-center w-12 h-12 rounded-full bg-green-500 text-white shadow-md hover:bg-green-600 hover:scale-105 transition-transform duration-300 ease-out">
        <i class="fab fa-whatsapp text-lg"></i>
    </a>

    <!-- Instagram -->
    <a href="{{$socialLinks && $socialLinks->instagram ? $socialLinks->instagram : 'https://instagram.com'}}" target="_blank" aria-label="Instagram"
      class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 text-white shadow-md hover:opacity-90 hover:scale-105 transition-transform duration-300 ease-out">
      <i class="fab fa-instagram text-lg"></i>
    </a>

    <!-- Optional: Add more -->
    <!-- <a href="#" aria-label="LinkedIn" class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-800 text-white shadow-md hover:bg-blue-900 hover:scale-105 transition-transform duration-300 ease-out">
      <i class="fab fa-linkedin-in text-lg"></i>
    </a> -->
  </div>

                </div>
            </div>
            <!-- Contact Form -->
            <div class="lg:w-2/4">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 font-spartan">{{__('contact.form_title')}}</h2>

                    <form action="{{route('contact.save')}}" method="POST" class="space-y-6">
                        @csrf

                        <input type="hidden" id="subject-input" name="subject" value="Buy a Property">

                        <!-- GLOBAL ERROR -->
                        @if($errors->has('contact'))
                            <div class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm">
                                {{ $errors->first('contact') }}
                            </div>
                        @endif

                        <!-- FIRST + LAST NAME -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">{{__('contact.first_name')}}</label>
                                <input type="text" name="first_name"
                                       value="{{ old('first_name') }}"
                                       class="w-full px-4 py-3 border rounded-lg @error('first_name') border-red-500 @enderror">

                                @error('first_name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">{{__('contact.last_name')}}</label>
                                <input type="text" name="last_name"
                                       value="{{ old('last_name') }}"
                                       class="w-full px-4 py-3 border rounded-lg @error('last_name') border-red-500 @enderror">

                                @error('last_name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- EMAIL + PHONE -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">{{__('contact.email')}}</label>
                                <input type="email" name="email"
                                       value="{{ old('email') }}"
                                       class="w-full px-4 py-3 border rounded-lg @error('email') border-red-500 @enderror">

                                @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">{{__('contact.phone')}}</label>
                                <input type="tel" name="phone"
                                       value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 border rounded-lg @error('phone') border-red-500 @enderror">

                                @error('phone')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- SUBJECT OPTIONS -->
                        <div>
                            <label class="block text-gray-700 mb-3 font-medium">{{__('contact.subject')}}</label>

                            @error('subject')
                            <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                            @enderror

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 subject-options">

                                <div class="property-option selected border-2 border-blue-500 rounded-lg p-4 cursor-pointer text-center"
                                     data-subject="Buy a Property">
                                    <i class="fas fa-home text-blue-500 text-xl mb-2"></i>
                                    <p>{{__('contact.subject_buy')}}</p>
                                </div>

                                <div class="property-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer text-center"
                                     data-subject="Rent a Property">
                                    <i class="fas fa-key text-blue-500 text-xl mb-2"></i>
                                    <p>{{__('contact.subject_rent')}}</p>
                                </div>

                                <div class="property-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer text-center"
                                     data-subject="List a Property">
                                    <i class="fas fa-list text-blue-500 text-xl mb-2"></i>
                                    <p>{{__('contact.subject_list')}}</p>
                                </div>

                                <div class="property-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer text-center"
                                     data-subject="General Inquiry">
                                    <i class="fas fa-question-circle text-blue-500 text-xl mb-2"></i>
                                    <p>{{__('contact.subject_general')}}</p>
                                </div>
                            </div>
                        </div>

                        <!-- MESSAGE -->
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">{{__('contact.message')}}</label>
                            <textarea name="message" rows="5"
                                      class="w-full px-4 py-3 border rounded-lg @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>

                            @error('message')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SUBMIT -->
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-4 rounded-lg font-semibold text-lg hover:bg-blue-700">
                            {{__('contact.submit')}}
                        </button>
                    </form>


                    <script>
                        document.querySelectorAll(".property-option").forEach(item => {
                            item.addEventListener("click", () => {
                                document.querySelectorAll(".property-option").forEach(o => {
                                    o.classList.remove("border-blue-500","selected");
                                    o.classList.add("border-gray-200");
                                });
                                item.classList.remove("border-gray-200");
                                item.classList.add("border-blue-500","selected");

                                document.getElementById("subject-input").value = item.dataset.subject;
                            });
                        });
                    </script>


                </div>
            </div>

        </div>
    </main>

{{-- map --}}
<div class="w-full mt-12  flex justify-center">
{{--    @php--}}
{{--        $address = $business->address ?? 'New Delhi, India';--}}
{{--        $mapAddress = urlencode($address);--}}
{{--    @endphp--}}
{{--    <iframe--}}
{{--        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2714825.355713062!2d-112.21401231472422!3d41.76651791208626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1759477293939!5m2!1sen!2sin"--}}
{{--        class="w-full max-w-9xl h-[450px] border-0"--}}
{{--        allowfullscreen=""--}}
{{--        loading="lazy"--}}
{{--        referrerpolicy="no-referrer-when-downgrade">--}}
{{--    </iframe>--}}
    <iframe
        src="https://www.google.com/maps?q={{ $address ?? 'Thailand'}}&output=embed"
        class="w-full max-w-9xl h-[450px] border-0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>


    <script>
        // Property option selection
        document.addEventListener('DOMContentLoaded', function() {
            const propertyOptions = document.querySelectorAll('.property-option');

            propertyOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove selected class from all options
                    propertyOptions.forEach(opt => {
                        opt.classList.remove('selected');
                        opt.classList.remove('border-blue-500');
                    });

                    // Add selected class to clicked option
                    this.classList.add('selected');
                    this.classList.add('border-blue-500');
                });
            });
        });
    </script>

@endsection
