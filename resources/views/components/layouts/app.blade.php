<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="description"
    content="Aplikasi pembuatan kartu kuning secara online Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pandeglang">
  <meta name="author" content="Dodi Yulian">

  <title>{{ config('app.name', 'E-Kaku v2') }}</title>

  {{-- favicon --}}
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>


  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @filamentStyles

</head>

<body class="flex flex-col h-full font-plusjakarta antialiased">
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
    <main class="">
      {{ $slot }}
    </main>
  </div>

  <div class="items-center mt-auto bg-neutral text-neutral-content">
    @include('layouts.footer')
  </div>

  @livewire('notifications')

  @filamentScripts
</body>

</html>