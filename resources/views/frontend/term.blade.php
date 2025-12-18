@extends('component.main')
@section('content')



  <!-- Main Content -->
  <main class="max-w-5xl mx-auto p-6">
    <h2 class="text-3xl font-bold text-[#449FC3] mb-4 border-b-4 border-black inline-block pb-1 font-spartan">
{{--        Terms and Condition--}}
        {{ __('terms.title') }}
    </h2>
    <br>
    <span class="font-light text-base font-spartan">
{{--        Last updated: 9th September 2025--}}
        {{ __('terms.last_updated_label') }} {{ __('terms.last_updated_value') }}
    </span>
    <p class="text-lg text-gray-700 mb-6 font-spartan">
{{--        Welcome to the website of Vedata, a real estate agency focused on helping people find, rent, buy, or invest in properties in Koh Samui, Thailand. By using this website, you agree to these Terms and Conditions. If you do not agree, please do not use the site.--}}
        {{ __('terms.intro') }}
    </p>

    <!-- Section 1 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--          1. Services Provided--}}
          {{ __('terms.s1_title') }}
      </h3>

      <p class="text-gray-800 font-spartan">
{{--        Vedata offers information and services related to property listings, searches, connecting buyers, sellers, renters, and supporting clients with property investment opportunities in Koh Samui. While we try to provide accurate and up-to-date information, property details and availability can change, and we cannot guarantee that every detail is always correct.--}}
          {{ __('terms.s1_body') }}
      </p>
    </section>

    <!-- Section 2 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--          2. Using the Website--}}
          {{ __('terms.s2_title') }}
      </h3>
      <p class="text-gray-800 mb-2 font-spartan">
{{--        When using this website, you agree not to:--}}
          {{ __('terms.s2_intro') }}
{{--        Use the information or content for anything illegal or unauthorized;--}}
{{--        Copy, share, or distribute content from the website without permission from Vedata;--}}
{{--        Try to access, tamper with, harm, or interfere with any part of the Website, or any server, computer, or database linked to it, without permission.--}}
        @foreach(__('terms.s2_points') as $point)
            {{ $point }}
            @endforeach
      </p>

    </section>

    <!-- Section 3 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--          3. Privacy--}}
          {{ __('terms.s3_title') }}
      </h3>
      <p class="text-gray-800 mb-2 font-spartan">

{{--        We handle any personal information you provide responsibly and in accordance with our Privacy Policy. By using this Website, you consent to our collection, use, and protection of your data as described in that policy.--}}
          {{ __('terms.s3_body') }}

      </p>

    </section>

    <!-- Section 4 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--          4. Changes to These Terms--}}
          {{ __('terms.s4_title') }}
      </h3>
      <p class="text-gray-800 font-spartan" >
{{--        We may revise these Terms and Conditions from time to time. Updated terms will be posted on this page and take effect immediately. Your continued use of the Website constitutes acceptance of any changes. Any changes will be posted on this page with a new "Last updated" date.--}}
          {{ __('terms.s4_body') }}
      </p>
    </section>

    <!-- Section 5 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--          5. Intellectual Property--}}
          {{ __('terms.s5_title') }}
      </h3>
      <p class="text-gray-800 font-spartan">
{{--        All content on this Website - including text, images, graphics, and logos - is the property of Vedata or our partners and is protected under copyright and other intellectual property laws. You may not use, copy, or distribute this content without our prior permission.--}}
          {{ __('terms.s5_body') }}
      </p>
    </section>

    <!-- Section 6 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--          6. Links to Third-Party Websites--}}
          {{ __('terms.s6_title') }}
      </h3>
      <p class="text-gray-800 font-spartan">
{{--        For your convenience, this Website may contain links to external websites. Vedata has no control over these sites and is not responsible for their content or privacy practices.--}}
          {{ __('terms.s6_body') }}
      </p>
    </section>

     <section class="mb-8">
        <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--            7. Limitation of Liability--}}
            {{ __('terms.s7_title') }}
        </h3>
        <p class="text-gray-800 font-spartan">
{{--            While we strive to provide accurate and up-to-date property information, Vedata cannot guarantee that all details, prices, or availability are correct. By using this site, you acknowledge that we are not liable for any errors, omissions, or losses that may occur from relying on the information provided.</p>--}}
         {{ __('terms.s7_body') }}
     </section>

     <section class="mb-8">
        <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--            8. Governing Law--}}
            {{ __('terms.s8_title') }}
        </h3>
        <p class="text-gray-800 font-spartan">

{{--            These Terms and Conditions are governed by the laws of Thailand. Any disputes arising under these terms will be resolved exclusively in Thai courts.--}}
            {{ __('terms.s8_body') }}



             </p>
     </section>

     <section class="mb-8">
        <h3 class="text-2xl font-semibold gold mb-2 font-spartan">
{{--            9. Contact Information--}}
            {{ __('terms.s9_title') }}
        </h3>
        <p class="text-gray-800 font-spartan">
{{--            For any questions about this Privacy Policy or your personal information, please contact:--}}
            {{ __('terms.s9_intro') }}
        </p>
         <span>
            <strong>{{ __('terms.email_label') }}</strong>
            <a href="mailto:info@vedata.co" class="text-blue-600 hover:underline">
                info@vedata.co
            </a>
         </span>
         <br>
         <span>
            <strong>{{ __('terms.phone_label') }}</strong>
            <a href="tel:+66966626272" class="text-blue-600 hover:underline">
                +66 96 662 6272
            </a>
         </span>
     </section>
  </main>


@endsection
