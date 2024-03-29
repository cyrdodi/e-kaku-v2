<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Biodata') }}
      </h2>
      <x-breadcrumb current="Biodata" />
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="relative overflow-hidden sm:rounded-lg">

        @if(!$biodata)
        <div class="bg-white card">
          <div class="card-body">
            <div class="gap-6 md:flex">
              {{-- image --}}
              <div>
                <img src="{{ asset('images/Profiling_Isometric.png') }}" alt="Ilustrasi">
              </div>
              {{-- copyright --}}
              <div>
                <h1 class="mb-4 text-3xl font-bold text-primary">Selamat Datang di Aplikasi E-Kaku</h1>
                <p>Langkah selanjutnya adalah kamu harus melengkapi Biodata dan upload Berkas, pastikan kamu sudah
                  menyiapkan berkas yang diperlukan.</p>
                <ul class="mt-2 ml-8 list-disc">
                  <li><b>Pas Foto</b> Background Merah, Format: <span class="badges">JPG</span>, <span
                      class="badges">JPEG</span>,
                    <span class="badges">PNG</span>
                  </li>
                  <li><b>Scan KTP</b>, Format: <span class="badges">JPG</span>, <span class="badges">JPEG</span>, <span
                      class="badges">PNG</span> </li>
                  <li><b>Scan Ijazah Terakhir</b>, Format: <span class="badges">PDF</span>, <span
                      class="badges">JPG</span>,
                    <span class="badges">JPEG</span>, <span class="badges">PNG</span>
                  </li>
                  <li>Sertifikat (Opsional), Format: <span class="badges">PDF</span> </li>
                </ul>
                <small class="mt-4 italic text-gray-600">*Masing-masing file berukuran maksimal 2 MB</small>
                <div class="mt-6">
                  <a href="{{ route('biodata.create') }}" class="btn btn-primary">Lengkapi Biodata</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        {{-- --}}

        <div class="bg-white card">
          <div class="card-body">
            <div class="gap-6 md:flex">
              {{-- image --}}
              <div>
                <img src="{{ asset('images/Job Interview _Isometric.png') }}" alt="Ilustrasi">
              </div>
              {{-- copyright --}}
              <div>
                <h1 class="mb-4 text-3xl font-bold text-primary">Datamu sudah terekam di Disnakertrans Kab. Pandeglang!
                </h1>
                <p>Selanjutnya untuk melakukan pencetakan dan verifikasi silahkan mengunjungi Dinas Ketenagakerjaan/Mal
                  Pelayanan Publik Kab. Pandeglang</p>

                <div class="mt-4">
                  <a href="{{ route('biodata.show') }}" class="btn btn-primary">
                    <x-icons.user class="" />
                    <span class="ml-2">Lihat Biodata</span>
                  </a>
                </div>
                <h2 class="mt-4 font-semibold">Jadwal Pelayanan</h2>
                <div>
                  Hari: Senin - Jumat
                </div>
                <div>
                  Jam: 09:00 s/d 13:00
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>


</x-app-layout>