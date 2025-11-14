<!-- Footer Section -->
<footer class="bg-black text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:mx-24">

            <!-- Company Info -->
            <div class="space-y-4 ">
                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset('asset/img/WhatsApp Image 2025-10-02 at 15.19.08_1c3d1629.jpg') }}" alt="" class="max-w-[150px] h-auto rounded">
                </div>
                <h2 class="text-xl font-bold text-center md:text-left font-spartan">Vedata </h2>

                <p class="text-gray-300 flex items-start gap-2 text-sm">
                    <i class="fas fa-map-marker-alt text-blue-400 mt-1"></i>
                    7/21 Moo 6 Maenam 84330, Koh Samui, Thailand
                </p>
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-envelope text-blue-400"></i>
                        <a href="mailto:info@vedata.co" class="hover:text-blue-300 transition-colors text-sm font-spartan">info@vedata.co</a>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-phone text-blue-400"></i>
                        <a href="tel:+06966626272" class="hover:text-blue-300 transition-colors text-sm font-spartan">+66 96 662 6272</a>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-phone text-blue-400"></i>
                        <a href="tel:+06536427888" class="hover:text-blue-300 transition-colors text-sm font-spartan">+66 96 807 5911</a>
                    </div>
                </div>
            </div>

            <!-- Sale Collection Section -->
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b border-gray-700 pb-2 font-spartan">Categories</h3>
                <ul class="space-y-2">
                    <a href="{{route('property')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Villas/ Houses
                    </li></a>
                    <a href="{{route('property')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Sea View Properties
                    </li></a>
                    <a href="{{route('property')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Beachfront Villas
                    </li></a>
                    <a href="{{route('property')}}"><li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Land Plots
                    </li></a>
                    <a href="{{route('property')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Business
                    </li></a>
                    {{-- <a href="{{route('property')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Rental Properties
                    </li></a> --}}
                </ul>
            </div>

            <!-- Resources Section -->
            <div>
                <h4 class="text-md font-semibold mb-4 text-gray-300 font-spartan ">Other Links</h4>
                <ul class="space-y-2">
                   <a href="{{route('contact')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Contact Us
                    </li></a>
                    <a href="{{route('privacy')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Privacy Policy
                    </li></a>
                    <a href="{{route('term')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Terms & Conditions
                    </li></a>
                    <a href="{{route('frontend.agent')}}">  <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i> Agents
                    </li></a>
                    {{-- <a href="{{route('property')}}"> <li class="flex items-center gap-2 hover:text-blue-300 transition-colors cursor-pointer text-sm font-spartan">
                        <i class="fas fa-chevron-right text-xs text-blue-400"></i>
                    </li></a> --}}
                </ul>
            </div>

            <!-- Image Section -->
            <div class="flex justify-center lg:justify-end">
                <img src="{{asset('asset/img/footer.jpg')}}" alt="" class="w-full max-w-xs h-auto rounded-lg shadow-lg">
            </div>
        </div>

        <!-- Separator -->
        <div class="border-t border-gray-700 my-10"></div>

        <!-- Copyright -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-400 text-sm text-center font-spartan">
                © 2025 All Rights Reserved | Vedata Properties
            </p>
            <div class="flex space-x-3">
                <a href="#" class="bg-gray-800 text-gray-300 hover:bg-blue-600 hover:text-white p-2 rounded-full transition">
                    <i class="fab fa-facebook-f"></i>
                </a>
                {{-- <a href="#" class="bg-gray-800 text-gray-300 hover:bg-blue-400 hover:text-white p-2 rounded-full transition">
                    <i class="fab fa-twitter"></i>
                </a> --}}
                <a href="#" class="bg-gray-800 text-gray-300 hover:bg-pink-600 hover:text-white p-2 rounded-full transition">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/1234567890" target="_blank"
   class="bg-gray-800 text-gray-300 hover:bg-green-600 hover:text-white p-2 rounded-full transition">
  <i class="fab fa-whatsapp"></i>
</a>

            </div>
        </div>
    </div>
</footer>
