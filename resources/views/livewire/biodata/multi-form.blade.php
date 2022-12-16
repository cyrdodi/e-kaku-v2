<div>
  <div class="flex justify-center ">
    <div class="w-full mt-6 bg-white max-w-7xl card">
      <div class="card-body">
        <form wire:submit.prevent="submit">
          <div class="grid gap-4 md:grid-cols-2">
            {{-- left --}}
            <div class="flex flex-col gap-4">

              {{-- informasi pribadi --}}
              <div class="p-4 border rounded-lg">
                <h3 class="mb-4 text-lg font-semibold ">Informasi Pribadi</h3>

                {{-- nik --}}
                <x-form.input label="NIK" name="nik" placeholder="Nomor Induk Kependudukan" wire:model="nik" />

                {{-- nama lengkap --}}
                <x-form.input label="Nama Lengkap" name="name" placeholder="" wire:model="name" />

                {{-- tempat lahir --}}
                <x-form.input label="Tempat Lahir" name="tempatLahir" placeholder="" wire:model="tempatLahir" />

                {{-- grouping --}}
                <div class="flex gap-2">
                  {{-- tanggal lahir --}}
                  <x-form.input label="Tanggal Lahir" name="tanggalLahir" type="date" placeholder=""
                    wire:model="tanggalLahir" />

                  {{-- jenis kelamin --}}
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
                </div>

                {{-- provinsi --}}
                <div class="w-full mb-4 form-control">
                  <label class="label">
                    <span class="label-text">Provinsi</span>
                  </label>
                  <select class="select select-bordered" name="provinsi" wire:model="provinsi">
                    <option>A</option>
                    <option>B</option>
                  </select>
                  @error('provinsi')
                  <small class="mt-4 text-red-500">{{ $message }}</small>
                  @enderror
                </div>

                <div class="grid grid-cols-2 gap-2">
                  {{-- kabupaten --}}
                  <div class="w-full mb-4 form-control">
                    <label class="label">
                      <span class="label-text">Kabupaten/Kota</span>
                    </label>
                    <select class="select select-bordered" name="kabupaten" wire:model="kabupaten">
                      <option>A</option>
                      <option>B</option>
                    </select>
                    @error('kabupaten')
                    <small class="mt-4 text-red-500">{{ $message }}</small>
                    @enderror
                  </div>


                  {{-- kecamatan --}}
                  <div class="w-full mb-4 form-control">
                    <label class="label">
                      <span class="label-text">Kecamatan</span>
                    </label>
                    <select class="select select-bordered" name="kecamatan" wire:model="kecamatan">
                      <option>A</option>
                      <option>B</option>
                    </select>
                    @error('kecamatan')
                    <small class="mt-4 text-red-500">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

                <div class="grid grid-cols-2 gap-2">
                  {{-- kelurahan --}}
                  <x-form.input label="kelurahan" name="kelurahan" />

                  {{-- kode pos --}}
                  <x-form.input label="Kode Pos" name="kode_pos" />
                </div>

                {{-- alamat lengkap --}}
                <x-form.textarea label="Alamat Lengkap" name="alamat" />
              </div>
              {{-- end informasi pribadi --}}


              {{-- informasi tambahan --}}
              <div class="p-4 border rounded-lg">
                <h3 class="mb-4 text-lg font-semibold ">Informasi Lanjutan</h3>

                {{-- no hp --}}
                <x-form.input label="No HP" name="handphone" type="number" />

                {{-- agama --}}
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

                {{-- status perkawinan --}}
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

                <div class="grid grid-cols-2 gap-2">
                  {{-- Tinggi badan --}}
                  <x-form.input label="Tinggi Badan" name="tinggiBadan" type="number" placeholder=""
                    wire:model="tinggiBadan" />
                  {{-- berat badan --}}
                  <x-form.input label="Berat Badan" name="beratBadan" type="number" placeholder=""
                    wire:model="beratBadan" />
                </div>

                {{-- penyandang disabilitas --}}
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
              </div> {{-- end informasi tambahan --}}
            </div> {{-- end left --}}


            {{-- right --}}
            <div class="flex flex-col gap-4">
              {{-- pendidikan dan pengalaman --}}
              <div class="p-4 border rounded-lg">
                <h3 class="mb-4 text-lg font-semibold ">Pendidikan dan Pengalaman</h3>

                <div class="grid grid-cols-2 gap-2">
                  {{-- pendidikan terkahir --}}
                  <div class="w-full mb-4 form-control">
                    <label class="label">
                      <span class="label-text">Pendidikan Terakhir</span>
                    </label>
                    <select class="select select-bordered" name="pendidikanTerakhir" wire:model="pendidikanTerakhir">
                      <option>Tidak</option>
                      <option>Ya</option>
                    </select>
                    @error('pendidikanTerakhir')
                    <small class="mt-4 text-red-500">{{ $message }}</small>
                    @enderror
                  </div>

                  {{-- tahun lulus --}}
                  <x-form.input type="number" label="Tahun Lulus" name="tahun_lulus" />
                </div>

                {{-- jurusan --}}
                <x-form.input label="Jurusan" name="jurusan" />

                {{-- keterampilan --}}
                <x-form.textarea label="keterampilan" name="keterampilan" />

                {{-- pengalaman kerja --}}
                <x-form.textarea label="pengalaman" name="pengalaman" />

              </div>
              {{-- end pendidikan dan pengalaman --}}

              {{-- berkas --}}
              <div class="flex flex-col gap-4">
                <div class="p-4 border rounded-lg">
                  <h3 class="mb-4 text-lg font-semibold ">Berkas</h3>

                  {{-- pas foto --}}
                  <x-form.input type="file" label="Pas Foto" name="pasFoto" altLabel="Max 2 MB" />

                  {{-- Foto ktp --}}
                  <x-form.input type="file" label="Foto KTP" name="fotoKtp" altLabel="Max 2 MB" />

                  {{-- foto ijazah --}}
                  <x-form.input type="file" label="Ijazah" name="ijazah" altLabel="Max 2 MB" />

                  {{-- sertifikat --}}
                  <x-form.input type="file" label="Sertifikat" name="sertifikat" altLabel="Max 2 MB" />

                </div>
              </div> {{-- end berkas --}}

            </div> {{-- end right --}}


          </div>



      </div>

    </div>
  </div>
</div>
</div>
</div>/