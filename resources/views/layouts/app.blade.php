<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="description"
    content="Aplikasi pembuatan kartu kuning secara online Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pandeglang">
  <meta name="author" content="Dodi Yulian">

  <title>{{ config('app.name', 'E-Kaku v2') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  {{-- favicon --}}
  <link rel="icon" type="image/svg+xml" href="{{ asset('logo-didingklik.svg') }}">
  <link rel="icon" type="image/png" href="{{ asset('logo-didingklik-dark.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('logo-didingklik-dark.png') }}">

  <!-- Scripts -->
  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  @filamentStyles

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
  @livewireScripts
  @filamentScripts
  @stack('scripts')
  <livewire:wire-elements-modal />
  <livewire:notifications />
</body>

</html>