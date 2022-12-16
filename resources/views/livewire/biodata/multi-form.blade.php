<div>
  {{-- Success is as dangerous as failure. --}}
  <div class="flex justify-center">

    <ul class=" steps">
      <li class="step {{ $currentStep == 1 ? 'step-primary' : '' }}">Informasi Pribadi</li>
      <li class="step {{ $currentStep == 2 ? 'step-primary' : '' }}">Informasi Pelengkap</li>
      <li class="step {{ $currentStep == 3 ? 'step-primary' : '' }}">Pendidikan & Pengalaman</li>
      <li class="step {{ $currentStep == 4 ? 'step-primary' : '' }}">Berkas</li>
    </ul>
  </div>

  <div class="flex justify-center ">
    <div class="w-full max-w-4xl mt-6 bg-white card">
      <div class="card-body">

        {{ $currentStep }}
        {{-- <form wire:submit.prevent> --}}

          {{-- step 1 --}}
          <div class="gap-4 {{ $currentStep != 1 ?  'hidden' : 'md:grid md:grid-cols-2'   }}">

            <div>
              <x-form.input label="NIK" name="nik" placeholder="Nomor Induk Kependudukan" wire:model="nik" />
              <x-form.input label="Nama Lengkap" name="name" placeholder="" wire:model="name" />
              <x-form.input label="Tempat Lahir" name="tempatLahir" placeholder="" wire:model="tempatLahir" />
              <x-form.input label="Tanggal Lahir" name="tanggalLahir" type="date" placeholder=""
                wire:model="tanggalLahir" />
              <div class="w-full mb-4 form-control">
                <label class="label">
                  <span class="label-text">Jenis Kelamin</span>
                </label>
                <select class="select select-bordered" name="jenisKelamin" wire:model="jenisKelamin">
                  <option disabled selected>Pilih Jenis Kelamin</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>

                @error('jenisaKelamin')
                <small class="mt-4 text-red-500">{{ $message }}</small>
                @enderror
              </div>

              <div class="w-full mb-4 form-control">
                <label class="label">
                  <span class="label-text">Agama</span>
                </label>
                <select class="select select-bordered" name="agama" wire:model="agama">
                  <option disabled selected>Pilih Agama</option>
                  <option>Islam</option>
                  <option>Kristen Protestan</option>
                  <option>Kristen Katolik</option>
                  <option>Budha</option>
                  <option>Hindu</option>
                </select>

                @error('agama')
                <small class="mt-4 text-red-500">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div>
              <div class="w-full mb-4 form-control">
                <label class="label">
                  <span class="label-text">Status Perkawinan</span>
                </label>
                <select class="select select-bordered" name="statusPerkawinan" wire:model="statusPerkawinan">
                  <option disabled selected>Pilih Status</option>
                  <option>Belum Menikah</option>
                  <option>Menikah</option>
                  <option>Janda</option>
                  <option>Duda</option>
                </select>

                @error('statusPerkawinan')
                <small class="mt-4 text-red-500">{{ $message }}</small>
                @enderror
              </div>

              <x-form.input label="Tinggi Badan" name="tinggiBadan" type="number" placeholder=""
                wire:model="tinggiBadan" />
              <x-form.input label="Berat Badan" name="beratBadan" type="number" placeholder=""
                wire:model="beratBadan" />

              <div class="w-full mb-4 form-control">
                <label class="label">
                  <span class="label-text">Penyandang Disabilitas</span>
                </label>
                <select class="select select-bordered" name="isDisability" wire:model="isDisability">
                  <option>Tidak</option>
                  <option>Ya</option>
                </select>

                @error('isDisability')
                <small class="mt-4 text-red-500">{{ $message }}</small>
                @enderror
              </div>

              <button class="btn btn-primary" wire:click="firstStepSubmit">Selanjutnya</button>
            </div>
          </div>

          {{-- step 2 --}}flex
          <div class="{{ $currentStep != 2 ?  'hidden' : ''   }}">
            step 2 form here
            <button class="btn btn-secondary" wire:click="back(1)">Kembali</button>
          </div>
          {{--
        </form> --}}

      </div>
    </div>
  </div>