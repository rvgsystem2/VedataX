@extends('component.main')
@section('content')

  <!-- Property Agents Section -->
<section class="py-16 md:py-12 bg-gradient-to-b from-white to-gray-50 font-sans">
    {{-- PROPERTY AGENT --}}

    <div class="max-w-7xl mx-auto lg:my-24 px-4 py-8 font-spartan">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-4 font-spartan">Meet Our Property Agents</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto font-spartan">
                Our expert agents are here to help you find your dream property with personalized support and local
                expertise.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card Start -->
            @foreach($users as $user)

            <div
                class="bg-white shadow-xl rounded-2xl overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <img src="{{asset('storage/'. $user->profile_image)}}" alt="Agent"
                    class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">

                <!-- Social Icons -->
                <div class="flex justify-center gap-3 -mt-6 z-10 relative">
                    <a href="{{$user->facebook}}" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-facebook-fill text-xl"></i>
                    </a>
                    <a href="{{$user->instagram}}" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-instagram-fill text-xl"></i>
                    </a>
                    <a href="{{$user->whatsapp}}" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-whatsapp-fill text-xl"></i>
                    </a>
                </div>

                <!-- Details -->
                <div class="p-4 text-center">
                    <h2 class="text-xl font-semibold text-gray-800 font-spartan">{{$user->name}}</h2>
                    <p class="text-sm text-gray-500 mt-1 font-spartan">Senior Property Consultant</p>
                </div>
            </div>
            @endforeach


        </div>
    </div>

</section>

@endsection
