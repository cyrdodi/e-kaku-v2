<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  {{-- favicon --}}
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body class="">
  {{-- navbar --}}
  <div class="">
    <div class=" md:container md:mx-auto navbar">
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
            <li><a href="#persyaratan">Persyaratan</a></li>
            <li><a href="#penggunaan">Penggunaan</a></li>
            <li><a href="#hubungi">Hubungi Kami</a></li>
          </ul>
        </div>
        <a class="" href="/">
          <div class="flex">
            <img src="{{ asset('images/logo-pandeglang.png') }}" alt="logo" class="object-contain w-8 mr-3">
            <div>
              <div class="font-bold normal-case ">DISNAKER<span class="font-light">TRANS</span></div>
              <div class="text-xs text-gray-500">Kabupaten Pandeglang</div>
            </div>
          </div>
        </a>
      </div>
      <div class="hidden navbar-center lg:flex">
        <ul class="px-1 menu menu-horizontal">
          <li><a href="#home">Home</a></li>
          <li><a href="#persyaratan">Persyaratan</a></li>
          <li><a href="#penggunaan">Penggunaan</a></li>
          <li><a href="#hubungi">Hubungi Kami</a></li>
        </ul>
      </div>
      <div class="navbar-end">
        <a href="{{ route('login') }}" class="btn btn-primary btn-outline">Login</a>
      </div>
    </div>
  </div>
  {{-- end navbar --}}

  {{-- header --}}
  <div class="bg-slate-100" id="home">
    <div class="flex gap-12 py-12 mx-4 md:flex-row md:container md:mx-auto md:justify-center md:items-center">
      <div class="w-2/3">
        <h1 class="font-bold text-7xl">E-Kaku</h1>
        <div class="mt-10 text-xl text-gray-700">Aplikasi pembuatan kartu AK/1 Online Dinas Tenaga Kerja dan
          Transmigrasi Kabupaten Pandeglang</div>
        <div class="mt-10">
          <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
        </div>
      </div>
      <div class="items-center justify-center hidden w-full md:flex">
        <img src="{{ asset('images/logo-pandeglang.png') }}" alt="Logo Pandeglang" class="w-[400px]">
      </div>
    </div>
  </div>
  {{-- end header --}}
  {{-- persyaratan --}}
  <div id="persyaratan">
    <div class="gap-12 py-12 mx-4 md:container md:flex md:items-center md:justify-center md:mx-auto">
      <div class="">
        <img src="{{ asset('images/Files And Folder_Isometric.png') }}" alt="file ilustration">
      </div>

      <div>
        <h2 class="text-4xl font-semibold">Persyaratan Pendaftaran <span class="font-bold">AK/1</span> di E-Kaku</h2>
        <ul class="mt-6 ml-8 list-disc">
          <li>Pas Foto Background Merah, Format: <span class="badges">JPG</span>, <span class="badges">JPEG</span>,
            <span class="badges">PNG</span>
          </li>
          <li> Scan KTP, Format: <span class="badges">JPG</span>, <span class="badges">JPEG</span>, <span
              class="badges">PNG</span> </li>
          <li>Scan Ijazah, Terkakhir Format: <span class="badges">PDF</span> </li>
          <li>Sertifikat (Opsional), Format: <span class="badges">PDF</span> </li>
        </ul>
        <small class="mt-4 italic text-gray-600">*Masing-masing file berukuran maksimal 2 MB</small>
      </div>
    </div>
  </div>
  {{-- end persyaratan --}}

  {{-- Tata Cara Pendaftaran --}}
  <div class="bg-slate-100" id="penggunaan">
    <div class="gap-12 py-12 mx-4 md:container md:flex md:items-center md:justify-center md:mx-auto ">
      <div>
        <h2 class="text-4xl font-semibold">Tata Cara Penggunaan E-Kaku</h2>
        <ol class="mt-6 ml-8 list-decimal">
          <li>Pencari Kerja membuat akun pada website E-Kaku</li>
          <li>Setelah mempunyai akun, langkah selanjutnya adalah melengkapi Biodata dan upload Berkas persyaratan</li>
          <li>Pencari Kerja kemudian bisa langsung ke kantor pelayanan Dinas Tenaga Kerja dan Transmigrasi Pandeglang
          </li>
          <li>Selanjutnya, Petugas akan mencetak Kartu Kuning anda</li>
        </ol>
        {{-- <small class="mt-4 italic text-gray-600">*Masing-masing file berukuran maksimal 2 MB</small> --}}
      </div>
      <div>
        <img src="{{ asset('images/Information carousel_Isometric.png') }}" alt="Ilustrasi Informasi" class="w-[430px]">
      </div>
    </div>
  </div>
  {{-- end tata cara --}}

  {{-- hubungi kami --}}
  <div id="hubungi">
    <div class="w-full gap-12 py-12 mx-4 md:container md:mx-auto md:flex md:justify-center md:items-start">
      {{-- maps --}}
      {{-- alamat --}}
      <div class=" mapouter">
        <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas"
            src="https://maps.google.com/maps?q=M38J+RX8,%20Sukamanah,%20Kec.%20Kaduhejo,%20Kabupaten%20Pandeglang,%20Banten%2042252&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
          <style>
            .mapouter {
              position: relative;
              text-align: right;
              height: 500px;
              width: 100%;
            }
          </style>
          <style>
            .gmap_canvas {
              overflow: hidden;
              height: 500px;
              width: 100%;
            }
          </style>
        </div>
      </div>
      <div>
        <h2 class="mb-4 text-5xl font-bold">Alamat</h2>
        <div>Sukamanah, Kaduhejo, Kabupaten Pandeglang, Banten 42252, Indonesia</div>
        <div class="flex items-center mt-4 mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
          </svg>
          <div>0253 - 202038</div>
        </div>
        <div class="flex items-center">
          <x-icons.at-symbol class="w-6 h-6 mr-2" />
          <div>disnakertrans@pandeglangkab.go.id</div>
        </div>
      </div>
    </div>
  </div>
  {{-- end hubungi kami --}}

  {{-- footer --}}
  <footer class="p-4 bg-neutral text-neutral-content">
    <div class="container items-center mx-auto footer">
      <div class="items-center grid-flow-col ">
        <p>Copyright © {{ date('Y') }} - Dinas Tenaga Kerja dan Transmigrasi Pandeglang</p>
      </div>
      <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
        <a href="https://www.instagram.com/disnakertrans.pandeglang/" target="_blank"><svg
            xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <rect x="4" y="4" width="16" height="16" rx="4"></rect>
            <circle cx="12" cy="12" r="3"></circle>
            <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line>
          </svg>
        </a>
        <a href="https://www.facebook.com/nakertrans.disnakertrans">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
          </svg>
        </a>
      </div>
    </div>
  </footer>
</body>

</html>