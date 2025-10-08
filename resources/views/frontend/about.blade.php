@extends('component.main')
@section('content')
    {{-- Banner --}}
    {{-- <div class="w-full h-[300px] md:h-[400px] relative">
        <img src="{{asset('asset/img/banner.jpg')}}" alt="Property Banner" class="w-full h-full object-cover">
        <div class="absolute inset-0 top-0 left-0 right-0 bg-black/50 items-center text-center pt-32">
            <h1 class="text-white text-3xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg font-spartan">
                Find Your Dream Property
            </h1>
            <div class="flex justify-center space-x-2 py-2 font-spartan">
                <p class="text-white hover:underline"> <a href="/">Home</p></a>
                <p class="text-white">/</p>
                <p class="text-white hover:underline"><a href="{{route('about')}}">About</p></a>
            </div>
        </div>
    </div> --}}

    {{-- Search Form --}}
    {{-- <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 md:-mt-12 my-12 font-spartan">
        <div class="bg-white rounded-xl shadow-lg px-6 py-8 md:py-10">
            <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Search Input -->
                <input type="text" placeholder="Search"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500" />

                <!-- Property Type -->
                <select
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 font-spartan">
                    <option disabled selected>Property Type</option>
                    <option>Villa</option>
                    <option>Apartment</option>
                    <option>Commercial</option>
                </select>

                <!-- Location -->
                <select
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 font-spartan">
                    <option disabled selected>Location</option>
                    <option>Location1</option>
                    <option>Chennai</option>
                    <option>Hyderabad</option>
                </select>

                <!-- Search Button -->
                <button type="submit"
                    class="w-full bg-[#449FC3] text-white font-semibold py-3 rounded-md hover:bg-sky-900 transition duration-200 font-spartan">
                    Search Here
                </button>
            </form>
        </div>
    </div> --}}

    {{-- About Us --}}
     <!-- About Section -->
     <section class="py-16 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto px-4">
            <div class="overflow-hidden rounded-3xl shadow-lg">
                <img src="https://cdn.pixabay.com/photo/2019/07/14/10/48/river-4336788_1280.jpg"
                    alt="Beautiful property in Thailand" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col justify-center">
                <h1 class="font-bold text-4xl py-4 text-gray-800 font-spartan">About Us</h1>
                <p class="text-gray-600 text-base leading-relaxed font-spartan">
                    At Vedata, we specialize in premium real estate on Koh Samui, offering villas, condos, land, and
                    commercial properties for both living and investment. Our team's local expertise ensures you're
                    guided through every step, from purchase to rental and management. Whether you're looking for a
                    private residence or a profitable opportunity, we provide trusted, personalized service to help you
                    make the right choice.
                </p>

            </div>
        </div>
    </section>



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
    <main class="container mx-auto px-4 py-8 max-w-6xl md:mt-24 mt-12">
        <!-- Hero Section -->


        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Contact Information -->
            <div class="lg:w-1/2">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-6">

                    <h1 class="text-4xl font-bold text-gray-800 mb-4 font-spartan">Contact Us</h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto font-spartan">
                        Get in touch with Vedata Real Estate experts for questions about properties, listings, or tailored support in Samui. We're here to help you find the right home or investment.
                    </p>
                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 font-spartan">Address</p>
                                <p class="text-gray-600 mt-1 font-spartan">7/21 moo 6 Maenam 84330, Koh Samui, Thailand</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 font-spartan">Email</p>
                                <p class="text-gray-600 mt-1 font-spartan">info@vedata.co</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-phone text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700 font-spartan">Phone</p>
                                <p class="text-gray-600 mt-1 font-spartan">+66 83 642 7888</p>
                                <p class="text-gray-600 mt-1 font-spartan">WhatsApp: +66 96 662 6272</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 font-spartan">Follow Us</h2>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-white hover:bg-blue-700 transition duration-300 shadow-md">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-full bg-blue-400 flex items-center justify-center text-white hover:bg-blue-500 transition duration-300 shadow-md">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-full bg-pink-600 flex items-center justify-center text-white hover:bg-pink-700 transition duration-300 shadow-md">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-full bg-blue-700 flex items-center justify-center text-white hover:bg-blue-800 transition duration-300 shadow-md">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Contact Form -->
            <div class="lg:w-2/4">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 font-spartan">Send us a message</h2>

                    <form class="space-y-6">
                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium font-spartan" for="first-name">First name</label>
                                <input type="text" id="first-name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2 font-medium font-spartan" for="last-name">Last name</label>
                                <input type="text" id="last-name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>
                        </div>

                        <!-- Contact Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium font-spartan" for="email">Email address</label>
                                <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2 font-medium font-spartan" for="phone">Phone number</label>
                                <input type="tel" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>
                        </div>

                        <!-- Subject Options -->
                        <div>
                            <label class="block text-gray-700 mb-3 font-medium font-spartan">Subject</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="property-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer text-center selected">
                                    <i class="fas fa-home text-blue-500 text-xl mb-2 font-spartan"></i>
                                    <p class="font-medium font-spartan">Buy a Property</p>
                                </div>
                                <div class="property-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer text-center">
                                    <i class="fas fa-key text-blue-500 text-xl mb-2"></i>
                                    <p class="font-medium font-spartan">Rent a Property</p>
                                </div>
                                <div class="property-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer text-center">
                                    <i class="fas fa-list text-blue-500 text-xl mb-2"></i>
                                    <p class="font-medium font-spartan">List a Property</p>
                                </div>
                                <div class="property-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer text-center">
                                    <i class="fas fa-question-circle text-blue-500 text-xl mb-2"></i>
                                    <p class="font-medium font-spartan">General Inquiry</p>
                                </div>
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium font-spartan" for="message">Message</label>
                            <textarea id="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" placeholder="Tell us about your property needs..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-lg font-semibold text-lg hover:bg-blue-700 transition duration-300 shadow-md hover:shadow-lg font-spartan">
                            SUBMIT
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </main>

{{-- map --}}
<div class="w-full mt-12  flex justify-center">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2714825.355713062!2d-112.21401231472422!3d41.76651791208626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1759477293939!5m2!1sen!2sin"
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
    <!-- Fonts (optional, for styling) -->

    {{-- <section class="bg-[#449FC3]/20 lg:py-16 font-[Raleway] py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-sky-950 mb-12 font-spartan">What Our Clients Say</h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <!-- Testimonial Card 1 -->
                <div
                    class="bg-white rounded-xl shadow-md flex flex-col md:flex-row overflow-hidden transition hover:shadow-xl">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample10.jpg" alt="Client Image"
                        class="w-full md:w-1/3 object-cover">
                    <div class="p-6 flex flex-col justify-center relative">
                        <p class="text-sm text-gray-600 italic leading-relaxed mb-4 relative">
                            <span class="text-yellow-400 text-3xl absolute -left-3 -top-3 font-spartan">“</span>
                            Sometimes I think the surest sign that intelligent life exists elsewhere in the universe is that
                            none of it has tried to contact us.
                            <span class="text-yellow-400 text-3xl absolute -right-3 -bottom-3">”</span>
                        </p>
                        <div class="mt-2">
                            <h4 class="text-sky-950 font-bold text-sm uppercase font-spartan">Pelican Steve</h4>
                            <span class="text-xs text-gray-400 font-spartan">LittleSnippets</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 2 -->
                <div
                    class="bg-white rounded-xl shadow-md flex flex-col md:flex-row overflow-hidden transition hover:shadow-xl">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample33.jpg" alt="Client Image"
                        class="w-full md:w-1/3 object-cover">
                    <div class="p-6 flex flex-col justify-center relative">
                        <p class="text-sm text-gray-600 italic leading-relaxed mb-4 relative">
                            <span class="text-yellow-400 text-3xl absolute -left-3 -top-3 font-spartan">“</span>
                            I don't need to compromise on my principles, because they don't have the slightest bearing on
                            what happens to me anyway.
                            <span class="text-yellow-400 text-3xl absolute -right-3 -bottom-3">”</span>
                        </p>
                        <div class="mt-2">
                            <h4 class="text-sky-950 font-bold text-sm uppercase font-spartan">Max Conversion</h4>
                            <span class="text-xs text-gray-400 font-spartan">LittleSnippets</span>
                        </div>
                    </div>
                </div>

                 <!-- Testimonial Card 1 -->
                 <div
                 class="bg-white rounded-xl shadow-md flex flex-col md:flex-row overflow-hidden transition hover:shadow-xl">
                 <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample10.jpg" alt="Client Image"
                     class="w-full md:w-1/3 object-cover">
                 <div class="p-6 flex flex-col justify-center relative">
                     <p class="text-sm text-gray-600 italic leading-relaxed mb-4 relative">
                         <span class="text-yellow-400 text-3xl absolute -left-3 -top-3 font-spartan">“</span>
                         Sometimes I think the surest sign that intelligent life exists elsewhere in the universe is that
                         none of it has tried to contact us.
                         <span class="text-yellow-400 text-3xl absolute -right-3 -bottom-3">”</span>
                     </p>
                     <div class="mt-2">
                         <h4 class="text-sky-950 font-bold text-sm uppercase font-spartan">Pelican Steve</h4>
                         <span class="text-xs text-gray-400 font-spartan">LittleSnippets</span>
                     </div>
                 </div>
             </div>

            </div>
        </div>
    </section>

 --}}


    {{-- Mission & Vision Placeholder --}}
    {{-- <section class="bg-gray-50 py-20">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-950 mb-6">Our Mission & Vision</h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                Empower people to find their perfect property through innovation, transparency, and trust.
                We're committed to building a smarter, faster, and more connected real estate ecosystem.
            </p>

            <strong> Unleashing Possibilities:</strong>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">We believe that real estate is not just about properties; it’s about the endless
                possibilities they offer. Our mission is to empower you to dream big, think creatively, and explore
                opportunities that redefine the way you live.</p>

                <strong>Elevating Experiences:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed"> Your home is more than just a place; it’s an experience. We strive to locate homes
                that enrich your life, offering comfort, joy, and a sense of belonging that transcends walls and embraces
                your soul.</p>

                <strong>Building Lasting Relationships:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">  We are not just real estate agents; we are your trusted partners in your
                journey towards a new lifestyle. Our mission is to forge genuine connections with our clients, built on
                trust, transparency, and shared visions.</p>

                <strong>Empowering Decisions: </strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">  Making real estate decisions can be overwhelming, but we are here to guide you every
                step of the way. Our mission is to empower you with knowledge, insights, and market expertise, enabling you
                to make informed choices.</p>

                <strong>Innovation and Creativity:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed"> We are pioneers in reimagining real estate. Our mission is to infuse innovation
                and creativity into every aspect of our services, from cutting-edge technology to imaginative marketing, to
                redefine the real estate experience.</p>

                <strong>Exceeding Expectations:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed"> At Manderley, we aim higher, reach farther, and exceed expectations. Our mission is
                to set new standards of excellence in the industry and deliver extraordinary results that leave a lasting
                impact.</p>

                <strong>Nurturing Communities:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">Real estate is not just about individual properties; it’s about building thriving
                communities. Our mission is to contribute positively to the neighborhoods we serve, fostering a sense of
                community, belonging, and harmony.</p>

                <strong>Enabling Your Vision:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed"> Your lifestyle is unique, and so are your dreams. Our mission is to listen,
                understand, and bring to life your vision of an ideal home, locating spaces that reflect your personality
                and aspirations. We also understand the need for change are sensitive to all situations when selling a
                property.
            </p>
        </div>
    </section> --}}

    {{-- contact --}}
        {{-- let's connect form  --}}
   {{-- @include('frontend.contact-form') --}}

@endsection
