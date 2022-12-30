<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
  @vite(['resources/css/app.css'])
  <style>
    @page {
      size: auto;
      margin: 0mm;
    }

    @media print {
      .noprint {
        visibility: hidden;
      }
    }
  </style>
</head>

<body class="text-[10px]">
  <div class="grid grid-cols-2 gap-8 p-3 ">
    {{-- left --}}
    <div class="">
      <section>
        <div class="font-semibold">Pendidikan Formal</div>
        <div>{{ $cetakTrans->biodata->institusi_pendidikan }} Th. {{ $cetakTrans->biodata->tahun_lulus }}</div>
        <div>{{ $cetakTrans->biodata->jurusan }}</div>
      </section>

      <section class="mt-8 ">
        <div class="font-semibold">Keterampilan</div>
        <div class="w-full p-2 overflow-hidden bg-gray-200 border rounded-lg ">
          <div class="h-[100px] ">
            {{ $cetakTrans->biodata->keterampilan }}
          </div>
        </div>
      </section>

      {{-- ttd --}}
      <section class="flex justify-end mt-4 ">
        <div>
          <div class="font-semibold text-center">{{ $cetakTrans->functionary->jabatan }}</div>
          <div class="flex justify-center">
            @if($cetakTrans->functionary->id == 1)
            <img src="{{ asset('images/ttd.png') }}" alt="ttd" class="object-fill w-32" />
            @endif
          </div>
          <div class="mt-4 text-center">
            <div class="underline">{{ $cetakTrans->functionary->name }}</div>
            <div>{{ $cetakTrans->functionary->nip }}</div>
          </div>
        </div>
      </section>
    </div>

    {{-- right --}}
    <div>
      {{-- kop --}}
      <div>
        <div class="relative flex ">
          <div>
            <img src="{{ asset('images/logo-pandeglang.png') }}" class="w-16" alt="Logo Pdg">
          </div>
          <div>
            <div class="font-semibold text-center">PEMERINTAH KABUPATEN PANDEGLANG</div>
            <div class="font-semibold text-center">DINAS TENAGA KERJA DAN TRANSMIGRASI</div>
            <div class="text-xs text-center">Jl. Raya Labuan KM. 4 Cipacung Pandeglang, Kaduhejo, Kabupaten
              Pandeglang</div>
            <div class="text-xs text-center">Provinsi Banten 42253 Telp: (0253) 202038</div>
          </div>
          <div class="absolute top-0 right-0 p-1 font-semibold bg-white border rounded-lg">Kartu AK/1</div>
        </div>
      </div>

      <div class="p-2 my-4 font-semibold text-center border rounded-lg border-sm">KARTU TANDA BUKTI PENDAFTARAN PENCARI
        KERJA</div>

      <section>
        <table>
          <tr>
            <td>No. Pendaftaran Pencari Kerja</td>
            <td>{{ $cetakTrans->biodata->no_pendaftaran }}</td>
          </tr>
          <tr>
            <td>No. Induk Kependudukan</td>
            <td>{{ $cetakTrans->biodata->nik }}</td>
          </tr>
        </table>
      </section>

      {{-- --}}
      <section>
        <div class="flex gap-2">
          {{-- foto dan ttd --}}
          <div class="w-[170px]">
            <img src="{{ asset('storage/' . $cetakTrans->biodata->pas_foto_path) }}" alt="Pas Foto"
              class="w-[170px] object-cover rounded-lg mb-2"></a>
            <div>Tanda Tangan Pencari kerja</div>
          </div>

          {{-- data diri --}}
          <div>
            <table>
              <tr>
                <td class="w-28">Nama Lengkap</td>
                <td>{{ $cetakTrans->biodata->name }}</td>
              </tr>
              <tr>
                <td>Tempat/Tgl Lahir</td>
                <td>{{ $cetakTrans->biodata->tempat_lahir }} / {{ date('d-m-Y',
                  strtotime($cetakTrans->biodata->tanggal_lahir)) }}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $cetakTrans->biodata->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>{{ $cetakTrans->biodata->statusPerkawinan->name }}</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>{{ $cetakTrans->biodata->agama->name }}</td>
              </tr>
              <tr>
                <td class="flex">Alamat</td>
                <td>{{ $cetakTrans->biodata->alamat .', RT/RW ' . $cetakTrans->biodata->rtrw .', '.
                  $cetakTrans->biodata->kelurahan .', '.
                  $cetakTrans->biodata->kecamatan->name .', '. $cetakTrans->biodata->kabupaten .', '.
                  $cetakTrans->biodata->provinsi .' - '.
                  $cetakTrans->biodata->kode_pos}}</td>
              </tr>
              <tr>
                <td>Telp/HP</td>
                <td>{{ $cetakTrans->biodata->no_hp }}</td>
              </tr>
              <tr>
                <td>Berlaku s.d</td>
                <td>{{ date_format(date_create($cetakTrans->expired), 'd F Y') }}</td>
              </tr>
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>
  <div class="flex justify-between p-4 mt-8 noprint">
    <a href="{{ route('dashboardShow', ['biodata' => $cetakTrans->biodata->id]) }}" class="btn btn-secondary noprint"
      on>Kembali</a>
    <button class="btn btn-primary noprint" onclick="window.print()">Cetak</button>
  </div>

</body>

</html>