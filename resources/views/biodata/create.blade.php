<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Home') }}
    </h2>
  </x-slot>

  <div class="container py-12 mx-auto">
    <div>
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
                      <x-form.select label="Jenis Kelamin" name="jenis_kelamin">
                        <option value="l" {{ old('jenis_kelamin')=='l' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="p" {{ old('jenis_kelamin')=='p' ? 'selected' : '' }}>Perempuan</option>
                      </x-form.select>
                    </div>

                    {{-- alamat --}}
                    <x-form.textarea label="Alamat" name="alamat" />

                    <div class="grid grid-cols-2 gap-2">

                      {{-- rtrw --}}
                      <x-form.input label="RT/RW" name="rtrw" />
                      {{-- provinsi --}}
                      <div class="w-full mb-4 form-control">
                        <label class="label">
                          <span class="label-text">Provinsi</span>
                        </label>
                        <div class="p-3 border rounded-lg">Banten</div>
                      </div>
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
                      <x-form.select label="Kecamatan" name="kecamatan_id">
                        @foreach($kecamatan as $row)
                        <option value="{{ $row->id }}" {{ old('kecamatan_id')==$row->id ? 'selected' : '' }}>{{
                          $row->name
                          }}</option>
                        @endforeach
                      </x-form.select>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                      {{-- kelurahan --}}
                      <x-form.input label="kelurahan" name="kelurahan" />

                      {{-- kode pos --}}
                      <x-form.input label="Kode Pos" name="kode_pos" type="number" />
                    </div>

                  </div>
                  {{-- end informasi pribadi --}}


                  {{-- informasi tambahan --}}
                  <div class="p-4 border rounded-lg">
                    <h3 class="mb-4 text-lg font-semibold ">Informasi Lanjutan</h3>

                    {{-- no hp --}}
                    <x-form.input label="No HP" name="no_hp" type="number" />

                    {{-- agama --}}
                    <x-form.select label="Agama" name="agama_id">
                      @foreach($agama as $row)
                      <option value="{{ $row->id }}" {{ old('agama_id')==$row->id ? 'selected' : '' }}>{{ $row->name }}
                      </option>
                      @endforeach
                    </x-form.select>

                    {{-- status perkawinan --}}
                    <x-form.select label="Status Perkawinan" name="status_perkawinan_id">
                      @foreach($statusPerkawinan as $row)
                      <option value="{{ $row->id }}" {{ old('status_perkawinan_id')==$row->id ? 'selected' : '' }}>{{
                        $row->name }}</option>
                      @endforeach
                    </x-form.select>

                    <div class="grid grid-cols-2 gap-2">
                      {{-- Tinggi badan --}}
                      <x-form.input label="Tinggi Badan" name="tinggi_badan" type="number" placeholder="" />
                      {{-- berat badan --}}
                      <x-form.input label="Berat Badan" name="berat_badan" type="number" placeholder="" />
                    </div>

                    {{-- penyandang disabilitas --}}
                    <x-form.select name="disabilitas" label="Penyandang Disabilitas">
                      <option value="0" {{ old('disabilitas')=='0' ? 'selected' : "" }}>Tidak</option>
                      <option value="1" {{ old('disabilitas')=='1' ? 'selected' : "" }}>Ya</option>
                    </x-form.select>

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

                    {{-- tempat/tujuan melamar --}}
                    <x-form.input label="Tempat/Tujuan Melamar" name="tujuan_lamaran" />

                  </div>
                  {{-- end pendidikan dan pengalaman --}}

                  {{-- berkas --}}
                  <div class="flex flex-col gap-4">
                    <div class="p-4 border rounded-lg">
                      <h3 class="mb-4 text-lg font-semibold ">Berkas</h3>

                      {{-- pas foto --}}
                      <x-form.input type="file" label="Pas Foto" name="pas_foto"
                        altLabel="Format: jgp, png. Max 2 MB" />

                      {{-- Foto ktp --}}
                      <x-form.input type="file" label="Foto KTP" name="ktp" altLabel="Format: jpg, png. Max 2 MB" />

                      {{-- foto ijazah --}}
                      <x-form.input type="file" label="Ijazah" name="ijazah" altLabel="Format: pdf. Max 2 MB" />

                      {{-- sertifikat --}}
                      <x-form.input type="file" label="Sertifikat" name="sertifikat" altLabel="Format: pdf. Max 2 MB" />

                    </div>
                  </div> {{-- end berkas --}}

                </div> {{-- end right --}}


              </div>
              <div class="flex justify-end mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
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