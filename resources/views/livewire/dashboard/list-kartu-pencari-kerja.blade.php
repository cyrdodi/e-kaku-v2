<div>
  {{-- <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900"> --}}
      {{-- search menu here --}}

      {{-- search --}}
      <div class="flex justify-between mb-4">
        <div class="flex gap-3">
          {{-- <form wire:submit.prevent="search"> --}}
            <input type="text" placeholder="Pencarian by nama/nik"
              class="md:w-[400px] w-lg max-w-lg  input input-bordered" wire:model="search" />
            {{-- <button type="submit" class="btn btn-outline btn-primary">Search</button> --}}
            {{--
          </form> --}}
        </div>

        <a href="{{ route('dashboardCreate') }}" class="btn btn-primary">
          <x-icons.plus class="mr-2" />
          <span>Tambah Baru</span>
        </a>
      </div>

      {{-- table --}}
      <div class="overflow-x-auto bg-white rounded-lg shadow ">
        <table class="w-full overflow-x-auto text-sm">
          <thead class="border-b">
            <tr>
              <th class="p-2">#</th>
              <th class="p-2 text-left">NIK</th>
              <th class="p-2 text-left">Nama</th>
              <th class="p-2 text-left">Alamat (Kecamatan)</th>
              <th class="p-2 text-left">Jenis Kelamin</th>
              <th class="p-2 text-left">Pendidikan</th>
              <th class="p-2">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($biodata as $row)
            <tr class="divide-y">
              <td class="p-2 text-center">{{ $biodata->firstItem() + $loop->index }}</td>
              <td class="p-2 ">{{ $row->nik }}</td>
              <td class="p-2">
                <div>{{ $row->name }}</div>
                <div class="text-xs text-gray-400">{{ $row->no_pendaftaran }}</div>
              </td>
              <td class="p-2">
                {{ $row->kecamatan->name }}
              </td>
              <td class="p-2">{{ $row->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
              <td class="p-2">
                {{ $row->pendidikanTerakhir->name . ' ('. $row->tahun_lulus . ')' }}
              </td>
              <td class="p-2 text-center">
                <a class="btn btn-sm btn-primary btn-outline"
                  href="{{ route('dashboardShow', ['biodata' => $row->id]) }}">Detail</a>
              </td>
            </tr>
            @empty
            <tr>
              <td class="p-3 font-semibold text-center text-red-500" colspan="7">Data tidak ditemukan</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div> {{-- end table --}}

      <div class="mt-4">
        {{ $biodata->links() }}
      </div>
      {{--
    </div>
  </div> --}}
</div>