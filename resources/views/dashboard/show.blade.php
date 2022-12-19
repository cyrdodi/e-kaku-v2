<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">

      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Detail') }}
      </h2>
      <x-breadcrumb :links="[
        ['url' =>  route('dashboard.index'), 'name' => 'Dashboard']
        ]" current="Detail" />
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      {{-- data diri --}}
      <div class="bg-white shadow-sm card">
        <div class="relative card-body">
          <div class="flex gap-4">

            <img src="{{ asset('images/logo-pandeglang.png') }}" class="w-32" alt="">

            <section class="">
              <div class="mb-2 text-lg font-semibold">{{ $biodata->name }}</div>
              <div class="flex mb-2 text-gray-500 ">
                <x-icons.identification class="w-6 h-6 mr-2" />
                <span class="font-medium">{{ $biodata->nik }}</span>
              </div>
              <div class="flex mb-2">
                <x-icons.at-symbol class="w-6 h-6 mr-2" />
                <span>{{ $biodata->email }}</span>
              </div>
              <div class="flex mb-2">
                <x-icons.cake class="w-6 h-6 mr-2" />
                {{ $biodata->tempat_lahir .'/'. $biodata->tanggal_lahir }}
              </div>
              <div class="flex mb-2">
                @if($biodata->jenis_kelamin == 'l')
                <x-icons.male class="mr-2" />
                Laki-laki
                @else
                <x-icons.female class="mr-2" />
                Perempuan
                @endif
              </div>
              <div class="flex mb-2">
                <x-icons.map-pin class="w-6 h-6 mr-2" />
                {{ $biodata->alamat }}
              </div>
              <div class="absolute text-lg font-semibold text-gray-600 right-5 top-5">#{{ $biodata->no_pendaftaran }}
              </div>
            </section>
          </div>
        </div>
      </div> {{-- end data diri --}}

      {{-- --}}
      <section class="grid grid-cols-2 gap-4">

        {{-- data pelengkap --}}
        <div class="mt-4 bg-white shadow-sm card">
          <div class="card-body">
            <h3 class="mb-4 text-xl font-semibold text-primary">Informasi Lanjutan</h3>
            <table>
              <tr>
                <th class="w-40 text-left">No. Handphone</th>

                <td>{{ $biodata->no_hp }}</td>
              </tr>
              <tr>
                <th class="text-left">Agama</th>
                <td>{{ $biodata->agama->name }}</td>
              </tr>
              <tr>
                <th class="text-left">Status</th>
                <td>{{ $biodata->statusPerkawinan->name }}</td>
              </tr>
              <tr>
                <th class="text-left">Tinggi Badan</th>
                <td>{{ $biodata->tinggi_badan }} CM</td>
              </tr>
              <tr>
                <th class="text-left">Berat Badan</th>
                <td>{{ $biodata->berat_badan }} KG</td>
              </tr>
            </table>
          </div>
        </div>

        {{-- data pendidikan dan pengalaman --}}
        <div class="mt-4 bg-white shadow-sm card">
          <div class="card-body">
            <h3 class="mb-4 text-xl font-semibold text-primary">Pendidikan & Pengalaman</h3>
            <table>
              <tr>
                <th class="w-40 text-left">Pendidikan Terakhir</th>
                <td>{{ $biodata->pendidikanTerakhir->name }}</td>
              </tr>
              <tr>
                <th class="text-left">Tahun Lulus</th>
                <td>{{ $biodata->tahun_lulus }}</td>
              </tr>
              <tr>
                <th class="text-left">Institusi Pendidikan</th>
                <td>{{ $biodata->institusi_pendidikan }}</td>
              </tr>
              <tr>
                <th class="text-left">Jurusan</th>
                <td>{{ $biodata->jurusan }}</td>
              </tr>
              <tr>
                <th class="text-left">Ketermapilan</th>
                <td>{{ $biodata->keterampilan }}</td>
              </tr>
              <tr>
                <th class="text-left">Pengalaman</th>
                <td>{{ $biodata->pengalaman }}</td>
              </tr>
              <tr>
                <th class="text-left">Tujuan Melamar</th>
                <td>{{ $biodata->tujuan_lamaran }}</td>
              </tr>
            </table>
          </div>
        </div>

      </section>

      {{-- berkas --}}
      <section class="mt-4 bg-white shadow-sm card">
        <div class="card-body">
          <h3 class="mb-4 text-xl font-semibold text-primary">Berkas</h3>

          <table>
            <tr>
              <th class="w-40 text-left">KTP</th>
              <td><a href="">{{ $biodata->ktp }}</a></td>
            </tr>
            <tr>
              <th class="w-40 text-left">Ijazah</th>
              <td><a href="">{{ $biodata->ijazah }}</a></td>
            </tr>
            <tr>
              <th class="w-40 text-left">Sertifikat</th>
              <td>
                @if($biodata->ijazah !== '')
                <a href="">{{ $biodata->sertifikat }}</a>
                @endif
              </td>
            </tr>
          </table>

        </div>
      </section>


    </div>
  </div>
</x-app-layout>