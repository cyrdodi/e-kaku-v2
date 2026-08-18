<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'E-Kaku') }} - Layanan Kartu Pencari Kerja (AK.1) Pandeglang</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  {{-- favicon --}}
  <link rel="icon" type="image/svg+xml" href="{{ asset('logo-didingklik.svg') }}">
  <link rel="icon" type="image/png" href="{{ asset('logo-didingklik-dark.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('logo-didingklik-dark.png') }}">
  <meta name="theme-color" content="#2563eb">
  <meta name="description"
    content="Aplikasi pembuatan Kartu Pencari Kerja (AK.1) secara online Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pandeglang dialihkan ke Didingklik">
  <meta name="author" content="Dodi Yulian">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-blue-500 selection:text-white">

  {{-- Sticky Glassmorphic Navbar --}}
  <header class="sticky top-0 z-50 backdrop-blur-md bg-white/90 border-b border-slate-200/80 transition-all duration-300">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-20 items-center justify-between gap-4">
        
        <!-- Brand Logo -->
        <div class="flex items-center gap-3 shrink-0">
          <a class="flex items-center gap-2.5 group transition-transform duration-200 hover:scale-105" href="/">
            <img src="{{ asset('images/logo-app.png') }}" alt="Logo Disnakertrans" class="h-9 sm:h-10 object-contain drop-shadow-sm">
            <div class="h-6 w-px bg-slate-300"></div>
            <img src="{{ asset('logo-didingklik-dark.png') }}" alt="Logo Didingklik" class="h-8 sm:h-9 object-contain drop-shadow-sm">
          </a>
        </div>

        <!-- Desktop Navigation Links -->
        <nav class="hidden xl:flex items-center gap-1 bg-slate-100/80 p-1.5 rounded-full border border-slate-200/60 shadow-inner shrink-0">
          <a href="#home" class="px-3.5 py-1.5 text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-white rounded-full transition-all duration-200 whitespace-nowrap">Home</a>
          <a href="#persyaratan" class="px-3.5 py-1.5 text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-white rounded-full transition-all duration-200 whitespace-nowrap">Persyaratan</a>
          <a href="#penggunaan" class="px-3.5 py-1.5 text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-white rounded-full transition-all duration-200 whitespace-nowrap">Penggunaan</a>
          <a href="#hubungi" class="px-3.5 py-1.5 text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-white rounded-full transition-all duration-200 whitespace-nowrap">Hubungi Kami</a>
        </nav>

        <!-- Header Actions -->
        <div class="flex items-center gap-2.5 shrink-0">
          <a href="https://didingklik.pandeglangkab.go.id" target="_blank" rel="noopener noreferrer" 
             class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 rounded-full shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200 hover:-translate-y-0.5 whitespace-nowrap">
            <span>Website Didingklik</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>
            </svg>
          </a>

          <!-- Mobile Dropdown Menu (DaisyUI) -->
          <div class="dropdown dropdown-end xl:hidden">
            <label tabindex="0" class="btn btn-ghost btn-circle text-slate-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
              </svg>
            </label>
            <ul tabindex="0" class="p-3 mt-3 shadow-2xl menu menu-compact dropdown-content bg-white/95 backdrop-blur-xl border border-slate-200 rounded-2xl w-60 space-y-1">
              <li><a href="#home" class="py-2.5 font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-600 rounded-xl whitespace-nowrap">Home</a></li>
       
              <li><a href="#persyaratan" class="py-2.5 font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-600 rounded-xl whitespace-nowrap">Persyaratan</a></li>
              <li><a href="#penggunaan" class="py-2.5 font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-600 rounded-xl whitespace-nowrap">Penggunaan</a></li>
              <li><a href="#hubungi" class="py-2.5 font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-600 rounded-xl whitespace-nowrap">Hubungi Kami</a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </header>

  {{-- Status Session Banner --}}
  @if(session('status'))
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <div class="p-4 text-sm text-blue-900 rounded-2xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200/80 shadow-sm flex items-center gap-3">
      <div class="p-2 bg-blue-600 text-white rounded-xl shrink-0 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
      <div class="font-medium">{{ session('status') }}</div>
    </div>
  </div>
  @endif

  {{-- Hero Section --}}
  <section id="home" class="relative overflow-hidden pt-12 pb-20 lg:pt-16 lg:pb-28">
    <!-- Mesh Background Gradient Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-full overflow-hidden pointer-events-none -z-10 opacity-70">
      <div class="absolute -top-32 left-1/4 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl"></div>
      <div class="absolute top-20 right-10 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl"></div>
      <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-teal-300/15 rounded-full blur-3xl"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
        
        <!-- Hero Text Content -->
        <div class="lg:col-span-7 text-center lg:text-left space-y-6">
          
          <!-- Badge Header -->
          <div class="inline-flex items-center gap-2.5 px-4 py-2 text-xs sm:text-sm font-semibold text-blue-700 bg-blue-100/80 border border-blue-200/60 rounded-full shadow-sm hover:bg-blue-100 transition-colors">
            <img src="{{ asset('images/logo-pandeglang.png') }}" alt="Logo Pandeglang" class="w-4 h-4 object-contain">
            <span>Layanan Terintegrasi Didingklik Pandeglang</span>
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
          </div>

          <!-- Main Title -->
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
            Layanan <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700">Kartu Pencari Kerja (AK.1)</span> Kini Berada di Didingklik
          </h1>

          <!-- Paragraph -->
          <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
            Pendaftaran dan pembuatan <strong>Kartu Pencari Kerja (AK.1)</strong> Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pandeglang resmi dialihkan ke dalam ekosistem aplikasi terpadu <strong>Didingklik</strong> (Dewi Iing Klik).
          </p>

          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
            <a href="https://didingklik.pandeglangkab.go.id" target="_blank" rel="noopener noreferrer" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 text-base font-bold text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 rounded-2xl shadow-xl shadow-blue-500/25 hover:shadow-2xl hover:shadow-blue-500/35 transition-all duration-300 hover:-translate-y-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>
              </svg>
              <span>Buka Website Didingklik</span>
            </a>

            <a href="https://play.google.com/store/apps/details?id=id.co.citigov.didingklik" target="_blank" rel="noopener noreferrer" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 text-base font-semibold text-slate-700 bg-white hover:bg-slate-900 hover:text-white border border-slate-300 hover:border-slate-900 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 640 640" fill="currentColor">
                <path d="M389.6 298.3L168.9 77L449.7 238.2L389.6 298.3zM111.3 64C98.3 70.8 89.6 83.2 89.6 99.3L89.6 540.6C89.6 556.7 98.3 569.1 111.3 575.9L367.9 319.9L111.3 64zM536.5 289.6L477.6 255.5L411.9 320L477.6 384.5L537.7 350.4C555.7 336.1 555.7 303.9 536.5 289.6zM168.9 563L449.7 401.8L389.6 341.7L168.9 563z"/>
              </svg>
              <span>App Play Store</span>
            </a>
          </div>

          <!-- Highlight Badges -->
          <div class="pt-4 flex flex-wrap items-center justify-center lg:justify-start gap-4 text-xs font-semibold text-slate-500">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 rounded-lg border border-slate-200/60">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              100% Online & Gratis
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 rounded-lg border border-slate-200/60">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              Tanda Tangan Elektronik (TTE)
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 rounded-lg border border-slate-200/60">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
              Cetak Mandiri dari Rumah
            </span>
          </div>

        </div>

        <!-- Hero Visual Showcase Card -->
        <div class="lg:col-span-5 flex flex-col items-center justify-center relative">
          
          <div class="w-full max-w-md bg-white/90 backdrop-blur-xl p-8 rounded-3xl border border-slate-200/80 shadow-2xl shadow-blue-500/10 space-y-6 relative hover:shadow-blue-500/15 transition-all duration-300">
            
            <!-- Logo Header Card -->
            <div class="flex items-center justify-center gap-4 py-2 border-b border-slate-100">
              <img src="{{ asset('images/logo-pandeglang.png') }}" alt="Logo Pemkab Pandeglang" class="h-16 object-contain hover:scale-105 transition-transform">
              <div class="h-10 w-px bg-slate-200"></div>
              <img src="{{ asset('logo-didingklik-dark.png') }}" alt="Didingklik Logo" class="h-16 object-contain hover:scale-105 transition-transform">
            </div>

            <!-- Hero Illustration Image -->
            <div class="flex justify-center py-2">
              <img src="{{ asset('images/hero.png') }}" alt="Hero Ilustrasi AK.1" class="w-56 sm:w-64 object-contain drop-shadow-md hover:scale-102 transition-transform duration-300">
            </div>

            <!-- Card Bottom Notice -->
            <div class="p-3.5 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl border border-blue-100 text-center">
              <p class="text-xs font-semibold text-blue-900">
                Disnakertrans Kab. Pandeglang
              </p>
              <p class="text-[11px] text-blue-700/80 mt-0.5">
                Integrasi Layanan Publik Terpadu Didingklik
              </p>
            </div>

          </div>

        </div>

      </div>
    </div>
  </section>

  {{-- Pengalihan Migration Notice Section --}}
  <section id="pengalihan" class="py-12 bg-slate-900 text-white relative overflow-hidden">
    <!-- Decorative Glowing Elements -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-600/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="bg-gradient-to-r from-slate-800/90 via-slate-900/90 to-slate-800/90 backdrop-blur-xl border border-slate-700/80 rounded-3xl p-8 sm:p-10 shadow-2xl">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
          
          <div class="space-y-3 text-center lg:text-left">
            <div class="inline-flex items-center gap-2 px-3 py-1 text-xs font-bold text-amber-400 bg-amber-400/10 border border-amber-400/30 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
              <span>Pengumuman Penting Migration</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-amber-300 tracking-tight">
              Penonaktifan Login & Pendaftaran Mandiri E-Kaku
            </h2>
            <p class="text-slate-300 text-sm sm:text-base max-w-3xl leading-relaxed">
              Layanan registrasi dan login mandiri untuk masyarakat umum pada portal E-Kaku ini telah dinonaktifkan. Seluruh layanan publik kependudukan dan ketenagakerjaan Kabupaten Pandeglang kini disatukan secara resmi dalam portal <strong>Didingklik</strong>.
            </p>
          </div>

          <div class="shrink-0">
            <a href="https://didingklik.pandeglangkab.go.id" target="_blank" rel="noopener noreferrer" 
               class="inline-flex items-center gap-2 px-6 py-3.5 text-sm font-bold text-slate-900 bg-amber-400 hover:bg-amber-300 rounded-2xl shadow-lg shadow-amber-400/20 hover:shadow-amber-400/30 transition-all duration-200 hover:scale-105">
              <span>Kunjungi Didingklik</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  {{-- Persyaratan Section --}}
  <section id="persyaratan" class="py-16 sm:py-24 bg-white relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      
      <!-- Section Header -->
      <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 text-xs font-semibold text-blue-700 bg-blue-50 border border-blue-200/60 rounded-full">
          <span>Dokumen Persyaratan</span>
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
          Persyaratan Pendaftaran <span class="text-blue-600">Kartu AK.1</span>
        </h2>
        <p class="text-slate-600 text-base sm:text-lg">
          Siapkan dokumen digital berikut dalam bentuk file sebelum mengajukan pembuatan Kartu Pencari Kerja melalui aplikasi Didingklik:
        </p>
      </div>

      <!-- Requirements Grid & Illustration Layout -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        
        <!-- Left Illustration -->
        <div class="lg:col-span-5 flex justify-center">
          <div class="relative p-6 bg-slate-50 rounded-3xl border border-slate-100 shadow-sm flex items-center justify-center">
            <img src="{{ asset('images/Files And Folder_Isometric.png') }}" alt="Ilustrasi Berkas" class="w-80 max-w-full drop-shadow-md hover:scale-105 transition-transform duration-300">
          </div>
        </div>

        <!-- Right Requirements Grid Cards -->
        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
          
          <!-- Card 1: Pas Foto -->
          <div class="p-5 bg-slate-50/80 hover:bg-white rounded-2xl border border-slate-200/70 hover:border-blue-300 shadow-none hover:shadow-xl transition-all duration-300 space-y-3 group">
            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg group-hover:bg-blue-600 group-hover:text-white transition-colors">
              📷
            </div>
            <h3 class="font-bold text-slate-900 text-base">Pas Foto Resmi</h3>
            <p class="text-xs text-slate-600 leading-relaxed">
              Pas foto formal berlatar belakang <strong>Merah</strong>.
            </p>
            <div class="flex items-center gap-1.5 pt-1">
              <span class="px-2 py-0.5 text-[11px] font-semibold text-blue-700 bg-blue-100 rounded-md">JPG</span>
              <span class="px-2 py-0.5 text-[11px] font-semibold text-blue-700 bg-blue-100 rounded-md">JPEG</span>
              <span class="px-2 py-0.5 text-[11px] font-semibold text-blue-700 bg-blue-100 rounded-md">PNG</span>
            </div>
          </div>

          <!-- Card 2: Scan KTP -->
          <div class="p-5 bg-slate-50/80 hover:bg-white rounded-2xl border border-slate-200/70 hover:border-blue-300 shadow-none hover:shadow-xl transition-all duration-300 space-y-3 group">
            <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-lg group-hover:bg-indigo-600 group-hover:text-white transition-colors">
              🪪
            </div>
            <h3 class="font-bold text-slate-900 text-base">Scan KTP Pandeglang</h3>
            <p class="text-xs text-slate-600 leading-relaxed">
              KTP aktif asli domisili <strong>Kabupaten Pandeglang</strong>.
            </p>
            <div class="flex items-center gap-1.5 pt-1">
              <span class="px-2 py-0.5 text-[11px] font-semibold text-indigo-700 bg-indigo-100 rounded-md">JPG</span>
              <span class="px-2 py-0.5 text-[11px] font-semibold text-indigo-700 bg-indigo-100 rounded-md">JPEG</span>
              <span class="px-2 py-0.5 text-[11px] font-semibold text-indigo-700 bg-indigo-100 rounded-md">PNG</span>
            </div>
          </div>

          <!-- Card 3: Scan Ijazah -->
          <div class="p-5 bg-slate-50/80 hover:bg-white rounded-2xl border border-slate-200/70 hover:border-blue-300 shadow-none hover:shadow-xl transition-all duration-300 space-y-3 group">
            <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-lg group-hover:bg-teal-600 group-hover:text-white transition-colors">
              🎓
            </div>
            <h3 class="font-bold text-slate-900 text-base">Scan Ijazah Terakhir</h3>
            <p class="text-xs text-slate-600 leading-relaxed">
              Ijazah pendidikan terakhir (SD / SMP / SMA / SMK / Diploma / Sarjana).
            </p>
            <div class="flex items-center gap-1.5 pt-1">
              <span class="px-2 py-0.5 text-[11px] font-semibold text-teal-800 bg-teal-100 rounded-md">PDF</span>
              <span class="px-2 py-0.5 text-[11px] font-semibold text-teal-800 bg-teal-100 rounded-md">JPG</span>
              <span class="px-2 py-0.5 text-[11px] font-semibold text-teal-800 bg-teal-100 rounded-md">PNG</span>
            </div>
          </div>

          <!-- Card 4: Sertifikat -->
          <div class="p-5 bg-slate-50/80 hover:bg-white rounded-2xl border border-slate-200/70 hover:border-blue-300 shadow-none hover:shadow-xl transition-all duration-300 space-y-3 group">
            <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold text-lg group-hover:bg-amber-500 group-hover:text-white transition-colors">
              📜
            </div>
            <h3 class="font-bold text-slate-900 text-base">Sertifikat / Pengalaman</h3>
            <p class="text-xs text-slate-600 leading-relaxed">
              Sertifikat pelatihan keterampilan atau surat pengalaman kerja (opsional).
            </p>
            <div class="flex items-center gap-1.5 pt-1">
              <span class="px-2 py-0.5 text-[11px] font-semibold text-amber-800 bg-amber-100 rounded-md">PDF</span>
            </div>
          </div>

        </div>

      </div>

      <!-- Max File Size Footer Note -->
      <div class="mt-8 text-center text-xs font-semibold text-slate-500 bg-slate-100/70 py-2.5 px-4 rounded-full max-w-md mx-auto border border-slate-200/60">
        * Catatan: Masing-masing berkas berukuran maksimal <strong>2 MB</strong>
      </div>

    </div>
  </section>

  {{-- Tata Cara Section --}}
  <section id="penggunaan" class="py-16 sm:py-24 bg-slate-100/70 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 text-xs font-semibold text-indigo-700 bg-indigo-50 border border-indigo-200/60 rounded-full">
          <span>Panduan Pengajuan</span>
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
          Tata Cara Pengajuan via <span class="text-indigo-600">Didingklik</span>
        </h2>
        <p class="text-slate-600 text-base sm:text-lg">
          Ikuti 4 langkah mudah berikut untuk mengajukan Kartu Pencari Kerja (AK.1) secara online:
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        
        <!-- Left Steps Process Grid -->
        <div class="lg:col-span-7 space-y-4">
          
          <!-- Step 1 -->
          <div class="p-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 flex gap-4 items-start">
            <div class="w-10 h-10 shrink-0 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-extrabold text-sm flex items-center justify-center shadow-md shadow-blue-500/20">
              01
            </div>
            <div class="space-y-1">
              <h3 class="font-bold text-slate-900 text-base">Akses Portal / Aplikasi Didingklik</h3>
              <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                Buka website resmi <a href="https://didingklik.pandeglangkab.go.id" target="_blank" class="text-blue-600 font-semibold underline hover:text-blue-700">didingklik.pandeglangkab.go.id</a> atau unduh aplikasi mobile Didingklik dari Google Play Store.
              </p>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="p-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 flex gap-4 items-start">
            <div class="w-10 h-10 shrink-0 rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 text-white font-extrabold text-sm flex items-center justify-center shadow-md shadow-indigo-500/20">
              02
            </div>
            <div class="space-y-1">
              <h3 class="font-bold text-slate-900 text-base">Registrasi atau Log In Akun</h3>
              <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                Buat akun pengguna baru Didingklik sesuai data NIK KTP Anda, atau masuk menggunakan akun Didingklik yang telah terdaftar.
              </p>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="p-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 flex gap-4 items-start">
            <div class="w-10 h-10 shrink-0 rounded-2xl bg-gradient-to-br from-purple-600 to-pink-600 text-white font-extrabold text-sm flex items-center justify-center shadow-md shadow-purple-500/20">
              03
            </div>
            <div class="space-y-1">
              <h3 class="font-bold text-slate-900 text-base">Isi Formulir & Unggah Dokumen</h3>
              <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                Pilih menu layanan <strong>"Kartu Pencari Kerja (AK.1)"</strong> Disnakertrans, lengkapi profil data diri, lalu unggah dokumen persyaratan digital.
              </p>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="p-5 bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 flex gap-4 items-start">
            <div class="w-10 h-10 shrink-0 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white font-extrabold text-sm flex items-center justify-center shadow-md shadow-emerald-500/20">
              04
            </div>
            <div class="space-y-1">
              <h3 class="font-bold text-slate-900 text-base">Persetujuan & Cetak AK.1 Mandiri</h3>
              <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                Setelah dokumen diverifikasi & disetujui petugas, Kartu AK.1 resmi ber-Tanda Tangan Elektronik (TTE) dapat langsung diunduh & dicetak secara mandiri.
              </p>
            </div>
          </div>

        </div>

        <!-- Right Illustration -->
        <div class="lg:col-span-5 flex justify-center">
          <div class="p-6 bg-white rounded-3xl border border-slate-200/60 shadow-lg flex items-center justify-center">
            <img src="{{ asset('images/Information carousel_Isometric.png') }}" alt="Ilustrasi Panduan" class="w-96 max-w-full drop-shadow-md hover:scale-105 transition-transform duration-300">
          </div>
        </div>

      </div>

    </div>
  </section>

  {{-- Hubungi Kami Section --}}
  <section id="hubungi" class="py-16 sm:py-24 bg-white relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-stretch">
        
        <!-- Map Canvas -->
        <div class="lg:col-span-7 rounded-3xl overflow-hidden shadow-xl border border-slate-200 min-h-[380px] sm:min-h-[450px]">
          <iframe width="100%" height="100%" id="gmap_canvas"
            src="https://maps.google.com/maps?q=M38J+RX8,%20Sukamanah,%20Kec.%20Kaduhejo,%20Kabupaten%20Pandeglang,%20Banten%2042252&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="w-full h-full min-h-[380px] border-0"></iframe>
        </div>

        <!-- Contact Detail Card -->
        <div class="lg:col-span-5 flex flex-col justify-between p-8 bg-slate-50 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
          
          <div class="space-y-6">
            <div>
              <div class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full mb-3">
                <span>Kantor Pelayanan</span>
              </div>
              <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kontak & Alamat</h2>
            </div>

            <!-- Address -->
            <div class="flex items-start gap-3 text-slate-600">
              <div class="p-2.5 bg-blue-100 text-blue-600 rounded-xl shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </div>
              <div class="text-sm leading-relaxed">
                <strong class="text-slate-900 block font-semibold mb-0.5">Dinas Tenaga Kerja dan Transmigrasi</strong>
                Jl. Raya Labuan KM 4 Cipacung Pandeglang, Kaduhejo, Kabupaten Pandeglang, Provinsi Banten 42253
              </div>
            </div>

            <!-- Phone -->
            <div class="flex items-center gap-3 text-slate-600">
              <div class="p-2.5 bg-emerald-100 text-emerald-600 rounded-xl shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
              </div>
              <div class="text-sm">
                <span class="text-xs text-slate-400 block font-medium">Telepon / Fax</span>
                <strong class="text-slate-900 font-semibold">0253 - 202038</strong>
              </div>
            </div>

            <!-- Email -->
            <div class="flex items-center gap-3 text-slate-600">
              <div class="p-2.5 bg-indigo-100 text-indigo-600 rounded-xl shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
              </div>
              <div class="text-sm">
                <span class="text-xs text-slate-400 block font-medium">Email Resmi</span>
                <strong class="text-slate-900 font-semibold">disnakertrans@pandeglangkab.go.id</strong>
              </div>
            </div>
          </div>

          <!-- Quick Portal Link Box -->
          <div class="p-4 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl text-white shadow-lg space-y-2">
            <div class="text-xs font-medium text-blue-100">Portal Layanan Terpadu Pandeglang</div>
            <a href="https://didingklik.pandeglangkab.go.id" target="_blank" class="inline-flex items-center gap-2 font-bold text-sm text-white hover:text-amber-300 transition-colors">
              <span>didingklik.pandeglangkab.go.id</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
          </div>

        </div>

      </div>

    </div>
  </section>

  {{-- Footer Component Include --}}
  @include('layouts.footer')

</body>

</html>