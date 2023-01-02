<div>
  {{-- tanggal --}}
  <div class="flex justify-between mb-4">
    <div class="">
      <form wire:submit.prevent="filter">
        <div class="flex items-end w-1/2">
          <select name="bulan" label="Bulan" class="mr-2 select select-bordered @error('bulan') select-error @enderror"
            wire:model.defer="bulan">
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
          @error('bulan')
          <small class="text-red-500">{{ $message }}</small>
          @enderror

          <input class="mr-2 input input-bordered @error('tahun') input-error @enderror" type="number" label="Tahun"
            name="tahun" wire:model.defer="tahun" />
          @error('tahun')
          <small class="text-red-500">{{ $message }}</small>
          @enderror
          <button type="submit" class="btn btn-primary btn-outline">Pilih</button>
        </div>
      </form>
    </div>

    <div>
      <a href="{{ route('report.export', ['bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-6 h-6 mr-2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
        </svg>
        <span>Export</span>
      </a>
    </div>
  </div>

  @if($list)
  {{-- table --}}
  <div class="overflow-x-auto bg-white rounded-lg shadow ">
    <table class="w-full overflow-x-auto text-sm">
      <thead>
        <tr>
          <th class="px-2 py-1">#</th>
          <th class="px-2 py-1">No. Pendaftaran</th>
          <th class="px-2 py-1">Tanggal</th>
          <th class="px-2 py-1">Nama</th>
          <th class="px-2 py-1">TTL</th>
          <th class="px-2 py-1">JK</th>
          <th class="px-2 py-1">Kecamatan</th>
          <th class="px-2 py-1">Status</th>
          <th class="px-2 py-1">Pendidikan</th>
          <th class="px-2 py-1">Jurusan</th>
          <th class="px-2 py-1">Tahun Lulus</th>
          <th class="px-2 py-1">No. HP</th>
          <th class="px-2 py-1">Email</th>
        </tr>
      </thead>
      <tbody>
        @forelse($list as $item)
        <tr class="divide-y">
          <td class="px-2 py-1">{{ $list->firstItem() + $loop->index }}</td>
          <td class="px-2 py-1">{{ $item->biodata->no_pendaftaran }}</td>
          <td class="px-2 py-1">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
          <td class="px-2 py-1">{{ $item->biodata->name}}</td>
          <td class="px-2 py-1">{{ $item->biodata->tempat_lahir .'/'. $item->biodata->tanggal_lahir}}</td>
          <td class="px-2 py-1">{{ $item->biodata->jenis_kelamin}}</td>
          <td class="px-2 py-1">{{ $item->biodata->kecamatan->name}}</td>
          <td class="px-2 py-1">{{ $item->biodata->statusPerkawinan->name}}</td>
          <td class="px-2 py-1">{{ $item->biodata->pendidikanTerakhir->name}}</td>
          <td class="px-2 py-1">{{ $item->biodata->jurusan}}</td>
          <td class="px-2 py-1">{{ $item->biodata->tahun_lulus}}</td>
          <td class="px-2 py-1">{{ $item->biodata->no_hp}}</td>
          <td class="px-2 py-1">{{ $item->biodata->email}}</td>
        </tr>
        @empty
        <tr>
          <td class="p-2 text-center " colspan="12">
            <div class="text-red-500">Tidak ada data</div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $list->links() }}
  </div>

  @else
  <div class="bg-white shadow-lg alert">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 stroke-info">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span>Tentukan <b>bulan</b> dan <b>tahun</b> terlebih dahulu</span>
    </div>
  </div>
  @endif
</div>