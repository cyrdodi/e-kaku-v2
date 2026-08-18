<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'E-Kaku') }} - Layanan Kartu AK/1 Pandeglang</title>

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
    content="Aplikasi pembuatan kartu kuning secara online Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pandeglang dialihkan ke Didingklik">
  <meta name="author" content="Dodi Yulian">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body class="bg-slate-50 text-slate-800">
  {{-- navbar --}}
  <div class="bg-white shadow-sm border-b border-slate-100 sticky top-0 z-50">
    <div class="mx-auto max-w-7xl navbar px-4 sm:px-6 lg:px-8">
      <div class="navbar-start">
        <div class="dropdown">
          <label tabindex="0" class="btn btn-ghost lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
          </label>
          <ul tabindex="0" class="p-2 mt-3 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
            <li><a href="#home">Home</a></li>
            <li><a href="#pengalihan">Info Didingklik</a></li>
            <li><a href="#persyaratan">Persyaratan</a></li>
            <li><a href="#penggunaan">Penggunaan</a></li>
            <li><a href="#hubungi">Hubungi Kami</a></li>
            <li class="border-t pt-2 mt-2">
              <a href="{{ route('login') }}" class="text-primary font-semibold">Login Admin</a>
            </li>
          </ul>
        </div>
        <a class="flex items-center gap-3 py-1" href="/">
          <img src="{{ asset('images/logo-app.png') }}" alt="Logo Disnakertrans" class="h-8 sm:h-9 object-contain">
          <div class="h-6 w-px bg-slate-200"></div>
          <img src="{{ asset('logo-didingklik-dark.png') }}" alt="Logo Didingklik" class="h-8 sm:h-9 object-contain">
        </a>
      </div>
      <div class="hidden navbar-center lg:flex">
        <ul class="px-1 menu menu-horizontal font-medium">
          <li><a href="#home">Home</a></li>
          <li><a href="#pengalihan">Info Didingklik</a></li>
          <li><a href="#persyaratan">Persyaratan</a></li>
          <li><a href="#penggunaan">Penggunaan</a></li>
          <li><a href="#hubungi">Hubungi Kami</a></li>
        </ul>
      </div>
      <div class="navbar-end gap-2">
        <a href="https://didingklik.pandeglangkab.go.id" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm md:btn-md gap-2">
          <span>Website Didingklik</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
        </a>
        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm text-gray-600 hidden md:inline-flex" title="Khusus Admin / Petugas">
          Login Admin
        </a>
      </div>
    </div>
  </div>
  {{-- end navbar --}}

  @if(session('status'))
  <div class="max-w-7xl mx-auto px-4 mt-4">
    <div class="p-4 mb-2 text-sm text-blue-800 rounded-xl bg-blue-50 border border-blue-200 flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <div>{{ session('status') }}</div>
    </div>
  </div>
  @endif

  {{-- header --}}
  <div class="bg-gradient-to-b from-slate-100 via-slate-50 to-white py-12" id="home">
    <div
      class="flex flex-col-reverse justify-center gap-12 px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8 md:flex-row md:items-center">
      <div class="md:w-2/3 animate__animated animate__slideInLeft">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 text-xs font-semibold text-primary bg-primary/10 rounded-full mb-4">
          <img src="{{ asset('images/logo-pandeglang.png') }}" alt="Logo Pandeglang" class="w-4 h-4 object-contain">
          <span>Layanan Terintegrasi Didingklik Pandeglang</span>
        </div>
        <h1 class="font-extrabold text-center md:text-left text-4xl md:text-5xl lg:text-6xl text-slate-900 leading-tight">
          Layanan Kartu Kuning (AK/1) Kini Berada di <span class="text-primary">Didingklik</span>
        </h1>
        <p class="mt-4 text-lg text-slate-600 md:text-left text-center leading-relaxed">
          Pendaftaran dan pembuatan Kartu AK/1 Online Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pandeglang resmi dialihkan ke aplikasi terpadu <strong>Didingklik</strong> (Dewi Iing Klik).
        </p>

        <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-3 mt-6">
          <a href="https://didingklik.pandeglangkab.go.id" target="_blank" rel="noopener noreferrer" class="btn btn-primary gap-2 shadow-lg shadow-primary/25">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
            <span>Buka Website Didingklik</span>
          </a>
          <a href="https://play.google.com/store/apps/details?id=id.co.citigov.didingklik" target="_blank" rel="noopener noreferrer" class="btn btn-outline border-slate-300 text-slate-700 hover:bg-slate-800 hover:text-white hover:border-slate-800 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 640 640" fill="currentColor">
              <path d="M389.6 298.3L168.9 77L449.7 238.2L389.6 298.3zM111.3 64C98.3 70.8 89.6 83.2 89.6 99.3L89.6 540.6C89.6 556.7 98.3 569.1 111.3 575.9L367.9 319.9L111.3 64zM536.5 289.6L477.6 255.5L411.9 320L477.6 384.5L537.7 350.4C555.7 336.1 555.7 303.9 536.5 289.6zM168.9 563L449.7 401.8L389.6 341.7L168.9 563z"/>
            </svg>
            <span>App Didingklik (Play Store)</span>
          </a>
        </div>
      </div>
      <div class="flex flex-col items-center justify-center w-full md:flex animate__animated animate__slideInRight gap-4">
        <div class="bg-white p-4 rounded-2xl shadow-xl border border-slate-100 flex items-center justify-center gap-3">
          <img src="{{ asset('images/logo-pandeglang.png') }}" alt="Logo Pemkab Pandeglang" class="h-16 object-contain">
          <div class="h-12 w-px bg-slate-200"></div>
          <img src="{{ asset('logo-didingklik-dark.png') }}" alt="Didingklik Logo" class="h-16 object-contain">
        </div>
        <img src="{{ asset('images/hero.png') }}" alt="Hero Ilustrasi" class="md:w-[220px] w-[140px] opacity-90 drop-shadow-sm">
      </div>
    </div>
  </div>
  {{-- end header --}}

  {{-- Pengalihan Notice Banner --}}
  <div id="pengalihan" class="py-8 bg-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-2 text-center md:text-left">
          <h2 class="text-2xl font-bold text-amber-300">Penonaktifan Login & Pendaftaran Mandiri E-Kaku</h2>
          <p class="text-blue-100 max-w-3xl">
            Layanan registrasi dan login mandiri untuk masyarakat umum pada portal E-Kaku ini telah dinonaktifkan. Seluruh layanan publik kependudukan dan tenaga kerja Kabupaten Pandeglang disatukan dalam platform <strong>Didingklik</strong>.
          </p>
        </div>
        <div class="flex gap-3 shrink-0">
          <a href="https://didingklik.pandeglangkab.go.id" target="_blank" rel="noopener noreferrer" class="btn btn-warning shadow-md">
            Kunjungi Didingklik
          </a>
        </div>
      </div>
    </div>
  </div>

  {{-- persyaratan --}}
  <div id="persyaratan" class="py-12 animate__animated animate__fadeInUp">
    <div class="gap-12 px-4 py-6 mx-auto md:flex md:items-center md:justify-center max-w-7xl sm:px-6 lg:px-8">
      <div class="shrink-0 flex justify-center">
        <img src="{{ asset('images/Files And Folder_Isometric.png') }}" alt="file ilustration" class="w-[320px] max-w-full">
      </div>

      <div>
        <h2 class="text-3xl font-bold text-slate-900">Persyaratan Pendaftaran <span class="text-primary font-extrabold">AK/1</span></h2>
        <p class="text-slate-600 mt-2">Pastikan dokumen berikut siap sebelum mengajukan pembuatan Kartu Kuning melalui Didingklik:</p>
        <ul class="mt-6 space-y-3">
          <li class="flex items-start gap-2">
            <span class="bg-primary/10 text-primary p-1 rounded-full text-xs mt-0.5">✓</span>
            <div><b>Pas Foto</b> Background Merah, Format: <span class="badges">JPG</span>, <span class="badges">JPEG</span>, <span class="badges">PNG</span></div>
          </li>
          <li class="flex items-start gap-2">
            <span class="bg-primary/10 text-primary p-1 rounded-full text-xs mt-0.5">✓</span>
            <div><b>Scan KTP Pandeglang</b>, Format: <span class="badges">JPG</span>, <span class="badges">JPEG</span>, <span class="badges">PNG</span></div>
          </li>
          <li class="flex items-start gap-2">
            <span class="bg-primary/10 text-primary p-1 rounded-full text-xs mt-0.5">✓</span>
            <div><b>Scan Ijazah Terakhir</b>, Format: <span class="badges">PDF</span>, <span class="badges">JPG</span>, <span class="badges">JPEG</span>, <span class="badges">PNG</span></div>
          </li>
          <li class="flex items-start gap-2">
            <span class="bg-primary/10 text-primary p-1 rounded-full text-xs mt-0.5">✓</span>
            <div><b>Sertifikat Keterampilan / Pengalaman Kerja</b> (Opsional), Format: <span class="badges">PDF</span></div>
          </li>
        </ul>
        <div class="mt-4 text-xs italic text-slate-500">*Masing-masing berkas berukuran maksimal 2 MB</div>
      </div>
    </div>
  </div>
  {{-- end persyaratan --}}

  {{-- Tata Cara Pendaftaran --}}
  <div class="bg-slate-100 py-12" id="penggunaan">
    <div
      class="gap-12 px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8 md:flex md:items-center md:justify-center md:mx-auto">
      <div>
        <h2 class="text-3xl font-bold text-slate-900">Tata Cara Pengajuan Via Didingklik</h2>
        <ol class="mt-6 space-y-4 list-decimal ml-6 text-slate-700">
          <li class="pl-2">
            <strong>Akses Didingklik:</strong> Buka portal <a href="https://didingklik.pandeglangkab.go.id" target="_blank" class="text-primary underline">didingklik.pandeglangkab.go.id</a> atau unduh aplikasinya di Google Play Store.
          </li>
          <li class="pl-2">
            <strong>Registrasi / Log In:</strong> Buat akun baru atau masuk menggunakan akun Didingklik Anda.
          </li>
          <li class="pl-2">
            <strong>Isi Formulir & Upload Berkas:</strong> Pilih layanan Kartu Kuning (AK/1) Disnakertrans, lengkapi data diri serta unggah dokumen persyaratan.
          </li>
          <li class="pl-2">
            <strong>Verifikasi & Cetak:</strong> Datang ke kantor pelayanan Disnakertrans Kabupaten Pandeglang untuk pencetakan fisik kartu.
          </li>
        </ol>
      </div>
      <div class="shrink-0 flex justify-center mt-6 md:mt-0">
        <img src="{{ asset('images/Information carousel_Isometric.png') }}" alt="Ilustrasi Informasi" class="w-[380px] max-w-full">
      </div>
    </div>
  </div>
  {{-- end tata cara --}}

  {{-- hubungi kami --}}
  <div id="hubungi" class="py-12">
    <div class="w-full gap-12 px-4 py-6 max-w-7xl md:mx-auto md:flex md:justify-center md:items-start">
      {{-- maps --}}
      <div class="mapouter rounded-xl overflow-hidden shadow-sm border border-slate-200">
        <div class="gmap_canvas"><iframe width="100%" height="450" id="gmap_canvas"
            src="https://maps.google.com/maps?q=M38J+RX8,%20Sukamanah,%20Kec.%20Kaduhejo,%20Kabupaten%20Pandeglang,%20Banten%2042252&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
          <style>
            .mapouter {
              position: relative;
              text-align: right;
              height: 450px;
              width: 100%;
            }
          </style>
          <style>
            .gmap_canvas {
              overflow: hidden;
              height: 450px;
              width: 100%;
            }
          </style>
        </div>
      </div>
      <div class="mt-6 md:mt-0">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">Kontak & Alamat</h2>
        <div class="text-slate-600 leading-relaxed">Jl. Raya Labuan KM 4 Cipacung Pandeglang, Kaduhejo, Kabupaten Pandeglang Provinsi Banten 42253</div>
        <div class="flex items-center mt-4 mb-2 text-slate-700">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 mr-2 text-primary shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
          </svg>
          <div>0253 - 202038</div>
        </div>
        <div class="flex items-center text-slate-700">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 mr-2 text-primary shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
          </svg>
          <div>disnakertrans@pandeglangkab.go.id</div>
        </div>

        <div class="mt-8 p-4 bg-slate-100 rounded-xl border border-slate-200">
          <div class="font-semibold text-slate-900 text-sm mb-1">Akses Layanan Terpadu:</div>
          <a href="https://didingklik.pandeglangkab.go.id" target="_blank" class="text-primary text-sm hover:underline flex items-center gap-1 font-medium">
            didingklik.pandeglangkab.go.id &rarr;
          </a>
        </div>
      </div>
    </div>
  </div>
  {{-- end hubungi kami --}}

  {{-- footer --}}
  @include('layouts.footer')
</body>

</html>