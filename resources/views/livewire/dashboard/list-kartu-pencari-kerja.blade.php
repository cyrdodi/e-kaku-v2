<div>
  {{-- <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900"> --}}
      {{-- search menu here --}}

      {{-- search --}}
      <div class="mb-4">
        <input type="text" placeholder="Pencari" class="w-full max-w-xs input input-bordered" wire:model="search" />
      </div>

      {{-- table --}}
      <div class="overflow-hidden bg-white rounded-lg shadow">
        <table class="w-full text-sm">
          <thead class="border-b">
            <tr>
              <th class="p-2">#</th>
              <th class="p-2 text-left">No. Pendaftaran</th>
              <th class="p-2 text-left">Nama</th>
              <th class="p-2 text-left">Alamat</th>
              <th class="p-2">Jenis Kelamin</th>
              <th class="p-2">Pendidikan</th>
              <th class="p-2">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($biodata as $row)
            <tr>
              <td class="p-2 text-center">1</td>
              <td class="p-2 ">{{ $row->no_pendaftaran }}</td>
              <td class="p-2">
                <div>{{ $row->name }}</div>
                <div class="text-xs text-gray-400">{{ $row->nik }}</div>
              </td>
              <td class="p-2">
                {{ $row->kecamatan->name }}
              </td>
              <td class="p-2">{{ $row->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
              <td class="p-2">
                {{ $row->pendidikanTerakhir->name . ' ('. $row->tahun_lulus . ')' }}
              </td>
              <td class="p-2 text-center">
                <a class="btn btn-sm btn-primary" href="{{ route('dashboard.printView') }}">Cetak</a>
              </td>
            </tr>
            @endforeach
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