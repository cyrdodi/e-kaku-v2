<div class="card-body">
  <form wire:submit.prevent="updateBiodata">
    <div class="grid gap-4 md:grid-cols-2">
      {{-- left --}}
      <div class="">

        {{-- informasi pribadi --}}
        <div class="p-4 border rounded-lg">
          <h3 class="mb-4 text-lg font-semibold text-primary ">Informasi Pribadi</h3>

          {{-- nik --}}
          <x-form.input label="NIK" name="nik" placeholder="Nomor Induk Kependudukan" type="number"
            wire:model.defer="nik" />

          {{-- nama lengkap --}}
          <x-form.input label="Nama Lengkap" name="name" placeholder="" wire:model.defer="name" />

          {{-- tempat lahir --}}
          <x-form.input label="Tempat Lahir" name="tempat_lahir" placeholder="" wire:model.defer="tempat_lahir" />

          {{-- grouping --}}
          <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
            {{-- tanggal lahir --}}
            <x-form.input label="Tanggal Lahir" name="tanggal_lahir" type="date" placeholder=""
              wire:model.defer="tanggal_lahir" />
            <x-form.select label="Jenis Kelamin" name="jenis_kelamin" wire:model.defer="jenis_kelamin">
              <option value="l">Laki-laki</option>
              <option value="p">Perempuan</option>
            </x-form.select>
          </div>

          {{-- alamat --}}
          <x-form.textarea label="Alamat" name="alamat" wire:model.defer="alamat" placeholder="Kampung atau nama jalan">
          </x-form.textarea>

          <div class="grid grid-cols-2 gap-2">

            {{-- rtrw --}}
            <x-form.input label="RT/RW" name="rtrw" wire:model.defer="rtrw" />
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
            <x-form.select label="Kecamatan" name="kecamatan_id" wire:model.defer="kecamatan_id">
              @foreach($kecamatan as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
            </x-form.select>
          </div>

          <div class="grid grid-cols-2 gap-2">
            {{-- kelurahan --}}
            <x-form.input label="Desa/Kelurahan" name="kelurahan" wire:model.defer="kelurahan" />

            {{-- kode pos --}}
            <x-form.input label="Kode Pos" name="kode_pos" type="number" wire:model.defer="kode_pos" />
          </div>

        </div>
        {{-- end informasi pribadi --}}


        {{-- informasi tambahan --}}
        <div class="p-4 mt-4 border rounded-lg">
          <h3 class="mb-4 text-lg font-semibold text-primary">Informasi Lanjutan</h3>

          {{-- no hp --}}
          <x-form.input label="No HP" name="no_hp" type="number" wire:model.defer="no_hp" />

          {{-- email --}}
          <x-form.input label="Email" name="email" type="email" wire:model.defer="email" />

          {{-- agama --}}
          <x-form.select label="Agama" name="agama_id" wire:model.defer="agama_id">
            @foreach($agama as $row)
            <option value="{{ $row->id }}">{{
              $row->name }}
            </option>
            @endforeach
          </x-form.select>

          {{-- status perkawinan --}}
          <x-form.select label="Status Perkawinan" name="status_perkawinan_id" wire:model.defer="status_perkawinan_id">
            @foreach($statusPerkawinan as $row)
            <option value="{{ $row->id }}">{{
              $row->name }}</option>
            @endforeach
          </x-form.select>

          <div class="grid grid-cols-2 gap-2">
            {{-- Tinggi badan --}}
            <x-form.input label="Tinggi Badan (cm)" name="tinggi_badan" type="number" placeholder=""
              wire:model.defer="tinggi_badan" />
            {{-- berat badan --}}
            <x-form.input label="Berat Badan (kg)" name="berat_badan" type="number" placeholder=""
              wire:model.defer="berat_badan" />
          </div>

          {{-- penyandang disabilitas --}}
          <x-form.select name="disabilitas" label="Penyandang Disabilitas" wire:model.defer="disabilitas">
            <option value="0">Tidak</option>
            <option value="1">Ya</option>
          </x-form.select>

        </div> {{-- end informasi tambahan --}}
      </div> {{-- end left --}}

      {{-- right --}}
      <div class="flex flex-col gap-4">
        {{-- pendidikan dan pengalaman --}}
        <div class="p-4 border rounded-lg">
          <h3 class="mb-4 text-lg font-semibold text-primary">Pendidikan dan Pengalaman</h3>

          <div class="grid grid-cols-2 gap-2">
            {{-- pendidikan terkahir --}}
            <div class="w-full mb-4 form-control">
              <label class="label">
                <span class="label-text">Pendidikan Terakhir</span>
              </label>
              <select class="select select-bordered" name="pendidikan_terakhir_id"
                wire:model.defer="pendidikan_terakhir_id">
                @foreach($pendidikan as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
              </select>
              @error('pendidikan_terakhir_id')
              <small class="mt-4 text-red-500">{{ $message }}</small>
              @enderror
            </div>

            {{-- tahun lulus --}}
            <x-form.input type="number" label="Tahun Lulus" name="tahun_lulus" wire:model.defer="tahun_lulus" />
          </div>

          {{-- institusi penididikan --}}
          <x-form.input name="institusi_pendidikan" label="Nama Institusi Pendidikan"
            wire:model.defer="institusi_pendidikan" />

          {{-- jurusan --}}
          <x-form.input label="Jurusan" name="jurusan" wire:model.defer="jurusan" />

          {{-- keterampilan --}}
          <x-form.textarea label="keterampilan" name="keterampilan" wire:model.defer="keterampilan" />

          {{-- pengalaman kerja --}}
          <x-form.textarea label="pengalaman" name="pengalaman" wire:model.defer="pengalaman" />

          {{-- tempat/tujuan melamar --}}
          <x-form.input label="Tempat/Tujuan Melamar" name="tujuan_lamaran" wire:model.defer="tujuan_lamaran" />

        </div>
        {{-- end pendidikan dan pengalaman --}}

        {{-- berkas --}}
        <div class="flex flex-col gap-4">
          <div class="p-4 border rounded-lg">
            <h3 class="mb-4 text-lg font-semibold text-primary">Berkas</h3>

            <div class="p-5 mb-6 border rounded-lg shadow-inner">
              {{-- pas foto --}}
              <x-form.input type="file" label="Pas Foto" name="pas_foto" altLabel="Format: jgp, png. Max 2 MB"
                wire:model="pas_foto" />
              {{-- jika upload foto baru dan type nya adalah image maka tampilkan temporaryurl --}}
              @if($pas_foto && Str::contains($pas_foto->getMimeType() , 'image') )
              {{-- jika upload file baru tampilkan temporary upload --}}
              <img src="{{ $pas_foto->temporaryUrl() }}" alt="Pas Foto" class="object-cover w-52">
              @else
              {{-- jika tidak tampilkan file lama --}}
              <div class="relative">
                <img src="{{ asset('storage/' .$biodata->pas_foto_path) }}" alt="Pas Foto" class="object-cover w-52 ">
                <div wire:loading wire:target="pas_foto"
                  class="absolute top-0 flex items-center justify-center w-full h-full text-xl font-bold bg-white opacity-50 ">
                  <div class="animate-pulse">Uploading...</div>
                </div>
              </div>
              @endif

            </div>

            <div class="p-5 mb-6 border rounded-lg shadow-inner">
              {{-- Foto ktp --}}
              <x-form.input type="file" label="Foto KTP" name="ktp" altLabel="Format: jpg, png. Max 2 MB"
                wire:model="ktp" />
              @if($ktp && Str::contains($ktp->getMimeType() , 'image'))
              <img src="{{ $ktp->temporaryUrl() }}" alt="KTP" class="object-cover w-96">
              @else
              <div class="relative">
                <img src="{{ asset('storage/' .$biodata->ktp_path) }}" alt="KTP" class="relative object-cover w-96">
                <div wire:loading wire:target="ktp"
                  class="absolute top-0 flex items-center justify-center w-full h-full text-xl font-bold bg-white opacity-50 ">
                  <div class="animate-pulse">Uploading...</div>
                </div>
              </div>

              @endif
            </div>

            <div class="p-5 mb-6 border rounded-lg shadow-inner">
              {{-- foto ijazah --}}
              <x-form.input type="file" label="Ijazah" name="ijazah" altLabel="Format: pdf. Max 2 MB"
                wire:model="ijazah" />
              @if(!$ijazah)
              <a href="{{ asset('storage/' . $biodata->ijazah_path) }}" class="underline">{{ $biodata->ijazah }}</a>
              @endif
            </div>

            <div class="p-5 mb-6 border rounded-lg shadow-inner">
              {{-- sertifikat --}}
              <x-form.input type="file" label="Sertifikat" name="sertifikat" altLabel="Format: pdf. Max 2 MB"
                wire:model="sertifikat" />
              @if(!$sertifikat)
              <a href="{{ asset('storage/' . $biodata->sertifikat_path) }}" class="underline">{{ $biodata->sertifikat
                }}</a>
              @endif
            </div>



          </div>
        </div> {{-- end berkas --}}


      </div> {{-- end right --}}
    </div>
    <div class="flex justify-end mt-4">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>



</div>