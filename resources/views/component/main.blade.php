<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Vedata x Reality One</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="icon" href="{{ asset('asset/img/logo1.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  {{-- font --}}
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
  @include('component.header')

  <main class="bg-gray-200 font-spartan">@yield('content')</main>

  @include('component.footer')

  {{--
  <!-- JavaScript for Tabs -->
  <script>
    const tabButtons = document.querySelectorAll('.tab-btn');
    const cards = document.querySelectorAll('.property-card');

    tabButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const tab = btn.dataset.tab;

        // Update button styles
        tabButtons.forEach(b => {
          b.classList.remove('bg-blue', 'text-white');
          b.classList.add('bg-gray-100', 'text-gray-700');
        });
        btn.classList.add('bg-blue', 'text-white');
        btn.classList.remove('bg-gray-100', 'text-gray-700');

        // Filter cards
        cards.forEach(card => {
          if (tab === 'featured' && card.dataset.category === 'featured') {
            card.classList.remove('hidden');
          } else if (tab === 'sell' && card.dataset.category === 'sell') {
            card.classList.remove('hidden');
          } else if (tab === 'rent' && card.dataset.category === 'rent') {
            card.classList.remove('hidden');
          } else if (tab === 'featured') {
            card.classList.remove('hidden');
          } else {
            card.classList.add('hidden');
          }
        });
      });
    });
  </script>
  --}}
</body>
</html>
