<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Page Title' }}</title>

  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>

  @filamentStyles
  @vite('resources/css/app.css')
</head>

<body class="flex flex-col h-full font-sans antialiased">
  <div class="flex-grow bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white shadow">
      <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
    @endif

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>
  </div>

  <div class="items-center mt-auto bg-neutral text-neutral-content">
    @include('layouts.footer')
  </div>

  @filamentScripts
  @vite('resources/js/app.js')
</body>

</html>