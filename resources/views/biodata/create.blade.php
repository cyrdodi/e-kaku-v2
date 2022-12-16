<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12 container mx-auto">
    {{-- <div class=" mx-auto sm:px-6 lg:px-8">
      <div class="card w-96 bg-base-100 shadow-xl">
        <div class="card-body">
          <h2 class="card-title">Data Diri</h2> --}}
          {{-- form --}}
          {{--
          <x-form.input label="NIK" name="nik" placeholder="Nomor Induk Kependudukan" />
          <x-form.input label="Nama Lengkap" name="name" placeholder="" />
          <x-form.input label="Tempat Lahir" name="birthplace" placeholder="" />
          <x-form.input label="Tanggal Lahir" name="birthday" type="date" placeholder="" />
          <div class="form-control w-full max-w-xs mb-4">
            <label class="label">
              <span class="label-text">Jenis Kelamin</span>
            </label>
            <select class="select select-bordered" name="jenis_kelamin">
              <option disabled selected>Pilih Jenis Kelamin</option>
              <option>Laki-laki</option>
              <option>Perempuan</option>
            </select>

            @error('jenis_kelamin')
            <small class="mt-4 text-red-500">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-control w-full max-w-xs mb-4">
            <label class="label">
              <span class="label-text">Agama</span>
            </label>
            <select class="select select-bordered" name="agama">
              <option disabled selected>Pilih Agama</option>
              <option>Islam</option>
              <option>Kristen Protestan</option>
              <option>Kristen Katolik</option>
              <option>Budha</option>
              <option>Hindu</option>
            </select>

            @error('jenis_kelamin')
            <small class="mt-4 text-red-500">{{ $message }}</small>
            @enderror
          </div> --}}

          @livewire('biodata.multi-form')


          {{--
        </div>
      </div> --}}
    </div>
  </div>
</x-app-layout>