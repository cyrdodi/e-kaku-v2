<div class="card">
  <div class="card-body">
    <h1>Edit Berkas</h1>

    {{-- berkas --}}
    <div class="flex flex-col gap-4">
      <div class="p-4 border rounded-lg">
        <h3 class="mb-4 text-lg font-semibold ">Berkas</h3>

        {{-- pas foto --}}
        @if($biodata->pas_foto_path != '')
        {{-- {{ dd($pas_foto_path) }} --}}
        <img src="{{ asset('storage/' .  $biodata->pas_foto_path) }}" alt="Pas Foto" class="object-cover w-52">
        {{-- delete berkas --}}
        <button wire:click="deletePasFoto" class="text-red-500">Delete</button>
        @else
        <x-form.input type="file" label="Pas Foto" name="pas_foto" altLabel="Format: jgp, png. Max 2 MB"
          wire:model="pas_foto" />

        <button wire:action="savePasFoto">Upload Pas Foto</button>
        @endif

        {{-- Foto ktp --}}
        @if($biodata->ktp_path != '')
        <img src="{{ asset('storage/' .  $biodata->ktp_path) }}" alt="Pas Foto" class="object-cover w-52">

        {{-- delete berkas --}}
        <button wire:click="deleteKtp" class="text-red-500">Delete</button>
        @else
        <x-form.input type="file" label="Foto KTP" name="ktp" altLabel="Format: jpg, png. Max 2 MB" wire:model="ktp" />
        @endif


        {{-- foto ijazah --}}
        @if($biodata->ijazah_path != '')
        <div>
          <a href="{{ asset('storage/' . $biodata->ijazah_path) }}" class="underline">{{ $biodata->ijazah }}</a>
          <button wire:click="deleteIjazah" class="text-red-600">Delete Ijazah</button>
        </div>
        @else
        <x-form.input type="file" label="Ijazah" name="ijazah" altLabel="Format: pdf. Max 2 MB" />
        @endif
        {{-- sertifikat --}}
        @if($biodata->sertifikat_path)
        <div>
          <a href="{{ asset('storage/' . $biodata->sertifikat_path) }}" class="underline">{{ $biodata->sertifikat }}</a>
          <button wire:click="deleteSertifikat" class="text-red-600">Delete Sertifikat</button>
        </div>
        @else
        <x-form.input type="file" label="Sertifikat" name="sertifikat" altLabel="Format: pdf. Max 2 MB" />
        @endif

      </div>
    </div> {{-- end berkas --}}
  </div>
</div>