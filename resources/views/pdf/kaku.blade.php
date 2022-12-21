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

<body class="text-[11px]">
  <div class="grid grid-cols-2 gap-8 p-3 ">
    {{-- left --}}
    <div class="">
      <section>
        <div class="font-semibold">Pendidikan Formal</div>
        <div>{{ $biodata->institusi_pendidikan }} Th. {{ $biodata->tahun_lulus }}</div>
        <div>{{ $biodata->jurusan }}</div>
      </section>

      <section class="mt-8 ">
        <div class="font-semibold">Keterampilan</div>
        <div class="w-full p-2 overflow-hidden bg-gray-200 border rounded-lg ">
          <div class="h-[200px] ">
            {{ $biodata->keterampilan }}
          </div>
        </div>
      </section>

      {{-- ttd --}}
      <section class="flex justify-end mt-2 ">
        <div>
          <div class="font-semibold text-center">Pelaksana Seksi Penempatan Tenaga Kerja</div>

          <div class="mt-20 text-center">
            <div class="underline">Hesti Agustini, S.Sos</div>
            <div>NIP: 19850831201012010</div>
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
            <img src="{{ asset('images/logo-pandeglang.png') }}" class="w-20" alt="Logo Pdg">
          </div>
          <div>
            <div class="font-semibold text-center">PEMERINTAH KABUPATEN PANDEGLANG</div>
            <div class="font-semibold text-center">DINAS TENAGA KERJA DAN TRANSMIGRASI</div>
            <div class="text-xs font-medium text-center">Jl. Raya Labuan KM. 4 Cipacung Pandeglang, Kaduhejo, Kabupaten
              Pandeglang</div>
            <div class="text-xs font-medium text-center">Provinsi Banten 42253 Telp: (0253) 202038</div>
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
            <td>{{ $biodata->no_pendaftaran }}</td>
          </tr>
          <tr>
            <td>No. Induk Kependudukan</td>
            <td>{{ $biodata->nik }}</td>
          </tr>
        </table>
      </section>

      {{-- --}}
      <section>
        <div class="flex gap-2">
          {{-- foto dan ttd --}}
          <div class="w-[170px]">
            <img src="{{ asset('storage/' . $biodata->pas_foto_path) }}" alt="Pas Foto"
              class="w-[170px] object-cover rounded-lg"></a>
            <div>Tanda Tangan Pencari kerja</div>
          </div>

          {{-- data diri --}}
          <div>
            <table>
              <tr>
                <td class="w-28">Nama Lengkap</td>
                <td>{{ $biodata->name }}</td>
              </tr>
              <tr>
                <td>Tempat/Tgl Lahir</td>
                <td>{{ $biodata->tempat_lahir }} / {{ date('d-m-Y', strtotime($biodata->tanggal_lahir)) }}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $biodata->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>{{ $biodata->statusPerkawinan->name }}</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>{{ $biodata->agama->name }}</td>
              </tr>
              <tr>
                <td class="flex">Alamat</td>
                <td>{{ $biodata->alamat .', RT/RW ' . $biodata->rtrw .', '. $biodata->kelurahan .', '.
                  $biodata->kecamatan->name .', '. $biodata->kabupaten .', '. $biodata->provinsi .' - '.
                  $biodata->kode_pos}}</td>
              </tr>
              <tr>
                <td>Telp/HP</td>
                <td>{{ $biodata->no_hp }}</td>
              </tr>
              <tr>
                <td>Berlaku s.d</td>
                {{-- TODO: generate tanggal berlaku --}}
                <td>07 Juli 2024</td>
              </tr>
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>
  <div class="flex justify-between p-4 mt-8">
    <a href="{{ route('dashboardShow', ['biodata' => $biodata->id]) }}" class="btn btn-secondary noprint" on>Kembali</a>
    <button class="btn btn-primary noprint" onclick="window.print()">Cetak</button>
  </div>

</body>

</html>