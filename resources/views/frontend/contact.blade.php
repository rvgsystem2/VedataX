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
                                <p class="text-gray-600 mt-1 font-spartan">+66 968075911</p>
                                <p class="text-gray-600 mt-1 font-spartan">WhatsApp: +66 966626272</p>
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
                        {{-- <a href="#" class="w-12 h-12 rounded-full bg-blue-400 flex items-center justify-center text-white hover:bg-blue-500 transition duration-300 shadow-md">
                            <i class="fab fa-twitter"></i>
                        </a> --}}
                        <a href="#" class="w-12 h-12 rounded-full bg-pink-600 flex items-center justify-center text-white hover:bg-pink-700 transition duration-300 shadow-md">
                            <i class="fab fa-instagram"></i>
                        </a>
                        {{-- <a href="#" class="w-12 h-12 rounded-full bg-blue-700 flex items-center justify-center text-white hover:bg-blue-800 transition duration-300 shadow-md">
                            <i class="fab fa-linkedin-in"></i>
                        </a> --}}
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

@endsection
