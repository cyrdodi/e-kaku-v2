<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="container py-12 mx-auto">
    <div>
      @foreach($errors->all() as $message)
      <p>{{ $message }}</p>
      @endforeach
      <div class="flex justify-center ">
        <div class="w-full mt-6 bg-white max-w-7xl card">
          <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
              @csrf
              <div class="grid gap-4 md:grid-cols-2">
                {{-- left --}}
                <div class="flex flex-col gap-4">

                  {{-- informasi pribadi --}}
                  <div class="p-4 border rounded-lg">
                    <h3 class="mb-4 text-lg font-semibold ">Informasi Pribadi</h3>

                    {{-- nik --}}
                    <x-form.input label="NIK" name="nik" placeholder="Nomor Induk Kependudukan" type="number" />

                    {{-- nama lengkap --}}
                    <x-form.input label="Nama Lengkap" name="name" placeholder="" value="{{ auth()->user()->name }}" />

                    {{-- tempat lahir --}}
                    <x-form.input label="Tempat Lahir" name="tempat_lahir" placeholder="" />

                    {{-- grouping --}}
                    <div class="flex gap-2">
                      {{-- tanggal lahir --}}
                      <x-form.input label="Tanggal Lahir" name="tanggal_lahir" type="date" placeholder="" />

                      {{-- jenis kelamin --}}
                      <div class="w-full mb-4 form-control">
                        <label class="label">
                          <span class="label-text">Jenis Kelamin</span>
                        </label>
                        <select class="select select-bordered" name="jenis_kelamin">
                          <option disabled selected>Pilih Jenis Kelamin</option>
                          <option value="l">Laki-laki</option>
                          <option value="p">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <small class="mt-4 text-red-500">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>

                    {{-- provinsi --}}
                    <div class="w-full mb-4 form-control">
                      <label class="label">
                        <span class="label-text">Provinsi</span>
                      </label>
                      <div class="p-3 border rounded-lg">Banten</div>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                      {{-- kabupaten --}}
                      <div class="w-full mb-4 form-control">
                        <label class="label">
                          <span class="label-text">Kabupaten/Kota</span>
                        </label>
                        <div class="p-3 border rounded-lg">Pandeglang</div>
                      </div>


                      {{-- kecamatan --}}
                      <div class="w-full mb-4 form-control">
                        <label class="label">
                          <span class="label-text">Kecamatan</span>
                        </label>
                        <select class="select select-bordered" name="kecamatan_id">
                          @foreach($kecamatan as $row)
                          <option value="{{ $row->id }}">{{ $row->name }}</option>
                          @endforeach
                        </select>
                        @error('kecamatan_id')
                        <small class="mt-4 text-red-500">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                      {{-- kelurahan --}}
                      <x-form.input label="kelurahan" name="kelurahan" />

                      {{-- kode pos --}}
                      <x-form.input label="Kode Pos" name="kode_pos" type="number" />
                    </div>

                    {{-- alamat lengkap --}}
                    <x-form.textarea label="Alamat Lengkap" name="alamat_lengkap" />
                  </div>
                  {{-- end informasi pribadi --}}


                  {{-- informasi tambahan --}}
                  <div class="p-4 border rounded-lg">
                    <h3 class="mb-4 text-lg font-semibold ">Informasi Lanjutan</h3>

                    {{-- no hp --}}
                    <x-form.input label="No HP" name="no_hp" type="number" />

                    {{-- agama --}}
                    <div class="w-full mb-4 form-control">
                      <label class="label">
                        <span class="label-text">Agama</span>
                      </label>
                      <select class="select select-bordered" name="agama_id">
                        @foreach($agama as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                      </select>
                      @error('agama_id')
                      <small class="mt-4 text-red-500">{{ $message }}</small>
                      @enderror
                    </div>

                    {{-- status perkawinan --}}
                    <div class="w-full mb-4 form-control">
                      <label class="label">
                        <span class="label-text">Status Perkawinan</span>
                      </label>
                      <select class="select select-bordered" name="status_perkawinan_id">
                        @foreach($statusPerkawinan as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                      </select>
                      @error('status_perkawinan_id')
                      <small class="mt-4 text-red-500">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                      {{-- Tinggi badan --}}
                      <x-form.input label="Tinggi Badan" name="tinggi_badan" type="number" placeholder="" />
                      {{-- berat badan --}}
                      <x-form.input label="Berat Badan" name="berat_badan" type="number" placeholder="" />
                    </div>

                    {{-- penyandang disabilitas --}}
                    <div class="w-full mb-4 form-control">
                      <label class="label">
                        <span class="label-text">Penyandang Disabilitas</span>
                      </label>
                      <select class="select select-bordered" name="disabilitas">
                        <option value="0">Tidak</option>
                        <option value="1">Ya</option>
                      </select>
                      @error('disabilitas')
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
                        <select class="select select-bordered" name="pendidikan_terakhir_id">
                          @foreach($pendidikan as $row)
                          <option value="{{ $row->id }}">{{ $row->name }}</option>
                          @endforeach
                        </select>
                        @error('pendidikan_terakhir_id')
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
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>



          </div>

        </div>
      </div>
    </div>
  </div>
  </div>/
  </div>
  </div>
</x-app-layout>