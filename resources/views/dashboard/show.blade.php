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
          <div class="flex gap-6">

            <img src="{{ asset('storage/' .  $biodata->pas_foto_path) }}"
              class="object-cover w-40 h-48 bg-gray-100 border rounded-lg" alt="Pas Foto">

            <section class="">
              <div class="mb-2 text-lg font-semibold">{{ $biodata->name }}</div>
              <div class="flex mb-2 text-gray-500 ">
                <x-icons.identification class="w-6 h-6 mr-2" />
                <span class="font-medium">{{ $biodata->nik }}</span>
              </div>
              <div class="text-lg font-semibold text-gray-600 md:absolute md:right-5 md:top-5">#{{
                $biodata->no_pendaftaran }}
              </div>
              <div class="flex mb-2">
                <x-icons.at-symbol class="w-6 h-6 mr-2" />
                <span>{{ $biodata->email }}</span>
              </div>
              <div class="flex mb-2">
                <x-icons.cake class="w-6 h-6 mr-2" />
                {{ $biodata->tempat_lahir .'/'. date('d-m-Y', strtotime($biodata->tanggal_lahir)) }}
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
              <div class="flex w-2/3 mb-2">
                <x-icons.map-pin class="w-6 h-6 mr-2" />
                {{ $biodata->alamat .', RT/RW ' . $biodata->rtrw .', '. $biodata->kelurahan .', '.
                $biodata->kecamatan->name .', '. $biodata->kabupaten .', '. $biodata->provinsi .' - '.
                $biodata->kode_pos}}
              </div>
            </section>
          </div>
        </div>
      </div> {{-- end data diri --}}

      <div class="flex mt-4">

        @if($cetak == null)
        <button onclick="Livewire.emit('openModal', 'dashboard.cetak', {{ json_encode(['biodata' => $biodata->id]) }})"
          class="btn btn-primary ">Cetak Kartu</button>
        @else
        <a class="btn btn-primary" href="{{ route('dashboardPrintView', ['cetak_trans' => $cetak->id]) }}">Cetak
          Ulang</a>
        @endif
        <a class="btn btn-primary" href="{{ route('dashboard.print') }}">Print PDF</a>

        <a href="{{ route('dashboardEdit', ['biodata' => $biodata->id]) }}"
          class="ml-4 btn btn-primary btn-outline">Edit</a>
      </div>

      {{-- --}}
      <section class="grid grid-cols-1 gap-4 md:grid-cols-2">

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
                <th class="text-left">Keterampilan</th>
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
              <td><a href="{{ asset('storage/' . $biodata->ktp_path) }}" target="_blank" class="underline">{{
                  $biodata->ktp }}</a></td>
            </tr>
            <tr>
              <th class="w-40 text-left">Ijazah</th>
              <td><a href="{{ asset('storage/' . $biodata->ijazah_path) }}" target="_blank" class="underline">{{
                  $biodata->ijazah }}</a>
              </td>
            </tr>
            <tr>
              <th class="w-40 text-left">Sertifikat</th>
              <td>
                @if($biodata->ijazah !== '')
                <a href="{{ asset('storage/' . $biodata->sertifikat_path) }}" target="_blank" class="underline">{{
                  $biodata->sertifikat
                  }}</a>
                @endif
              </td>
            </tr>
          </table>

        </div>
      </section>


    </div>
  </div>
</x-app-layout>