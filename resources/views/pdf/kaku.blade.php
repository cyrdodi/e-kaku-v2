@php
$nik = $cetakTrans->biodata->nik;
$noPendaftaran = $cetakTrans->biodata->no_pendaftaran;

$group1 = substr($nik, 0, 2);
$group2 = substr($nik, 2, 4);
$group3 = substr($nik, 6, 6);
$group4 = substr($nik, 12);

$noPen1 = substr($noPendaftaran, 0, 4);
$noPen2 = substr($noPendaftaran, 4, 5);
$noPen3 = substr($noPendaftaran, 9);

@endphp


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

    body {
      font-family: Arial, Helvetica, sans-serif;
      /* font-family: 'Times New Roman', Times, serif; */
    }
  </style>
</head>

<body class="text-[10px]">
  <div class="flex justify-center ">
    <div class="w-[1133px] h-[415px] grid grid-cols-2 gap-8 p-3 ">
      {{-- left --}}
      <div class="">
        <section>
          <div class="font-semibold">Pendidikan Formal</div>
          <div>{{ $cetakTrans->biodata->institusi_pendidikan }} Th. {{ $cetakTrans->biodata->tahun_lulus }}</div>
          <div>{{ $cetakTrans->biodata->jurusan }}</div>
        </section>

        <section class="mt-8 ">
          <div class="font-semibold">Keterampilan</div>
          <div class="w-full p-2 overflow-hidden border border-gray-300 rounded-lg ">
            <div class="h-[70px] ">
              {{ $cetakTrans->biodata->keterampilan }}
            </div>
          </div>
        </section>

        {{-- ttd --}}
        <section class="flex justify-end mt-4 ">
          <div>
            <div class="font-semibold text-center w-60">{{ $cetakTrans->functionary->jabatan }}</div>
            <div class="flex justify-center">
              @if($cetakTrans->functionary->id == 1)
              <img src="{{ asset('images/ttd.png') }}" alt="ttd" class="object-fill w-32 " />
              @endif
            </div>
            <div class="mt-0 text-center">
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
          <div class="relative flex">
            <div class="mr-2">
              <img src="{{ asset('images/logo-pandeglang.png') }}" class="w-14" alt="Logo Pdg">
            </div>
            <div>
              <div class="font-semibold text-center text-[14px]">PEMERINTAH KABUPATEN PANDEGLANG</div>
              <div class="font-semibold text-center text-[14px]">DINAS TENAGA KERJA DAN TRANSMIGRASI</div>
              <div class="text-xs text-center">Jl. Raya Labuan KM. 4 Cipacung Pandeglang, Kaduhejo, Kabupaten
                Pandeglang</div>
              <div class="text-xs text-center">Provinsi Banten 42253 Telp: (0253) 202038</div>
            </div>
            <div class="absolute top-0 right-0 p-1 font-semibold bg-white border rounded-lg">Kartu AK/1</div>
          </div>
        </div>

        <div class="px-2 py-1 my-1 font-semibold text-center border border-gray-800 rounded-lg border-sm text-[14px]">
          KARTU
          TANDA BUKTI
          PENDAFTARAN PENCARI
          KERJA</div>

        <section class="mb-2">
          <table class="text-[12px] w-full">
            <tr>
              <td class="w-[300px]">No. Pendaftaran Pencari Kerja</td>
              <th class="flex justify-around gap-2">
                <span class="px-1 tracking-widest border border-gray-700">{{ $noPen1 }}</span>
                <span class="px-1 tracking-widest border border-gray-700">{{ $noPen2 }}</span>
                <span class="px-1 tracking-widest border border-gray-700">{{ $noPen3 }}</span>
              </th>
            </tr>
            <tr class="">
              <td>No. Induk Kependudukan</td>
              <th class="flex justify-around gap-2 text-right">
                <span class="px-1 tracking-widest border border-gray-700">{{ $group1 }}</span>
                <span class="px-1 tracking-widest border border-gray-700">{{ $group2 }}</span>
                <span class="px-1 tracking-widest border border-gray-700">{{ $group3 }}</span>
                <span class="px-1 tracking-widest border border-gray-700">{{ $group4 }}</span>
              </th>
            </tr>
          </table>
        </section>

        {{-- --}}
        <section>
          <div class="flex gap-6">
            {{-- foto dan ttd --}}
            <div class="">
              <img src="{{ asset('storage/' . $cetakTrans->biodata->pas_foto_path) }}" alt="Pas Foto"
                class="w-[113] max-h-[151px] object-cover rounded-lg mb-2"></a>
              <div class="mt-4 text-center">Tanda Tangan Pencari kerja</div>
            </div>

            {{-- data diri --}}
            <div>
              <table>
                <tr>
                  <td class="w-28">Nama Lengkap</td>
                  <td>:</td>
                  <td>{{ $cetakTrans->biodata->name }}</td>
                </tr>
                <tr>
                  <td>Tempat/Tgl Lahir</td>
                  <td>:</td>
                  <td>{{ $cetakTrans->biodata->tempat_lahir }} / {{ date('d-m-Y',
                    strtotime($cetakTrans->biodata->tanggal_lahir)) }}</td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td>{{ $cetakTrans->biodata->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td>{{ $cetakTrans->biodata->statusPerkawinan->name }}</td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td>:</td>
                  <td>{{ $cetakTrans->biodata->agama->name }}</td>
                </tr>
                <tr>
                  <td class="align-text-top">Alamat</td>
                  <td class="align-text-top">:</td>
                  <td class="align-text-top">{{ $cetakTrans->biodata->alamat .', RT/RW ' . $cetakTrans->biodata->rtrw
                    .', '.
                    $cetakTrans->biodata->kelurahan .', '.
                    $cetakTrans->biodata->kecamatan->name .', '. $cetakTrans->biodata->kabupaten .', '.
                    $cetakTrans->biodata->provinsi .' - '.
                    $cetakTrans->biodata->kode_pos}}</td>
                </tr>
                <tr>
                  <td>Telp/HP</td>
                  <td>:</td>
                  <td>{{ $cetakTrans->biodata->no_hp }}</td>
                </tr>
                <tr>
                  <td>Berlaku s.d</td>
                  <td>:</td>
                  <td>{{ date_format(date_create($cetakTrans->expired), 'd F Y') }}</td>
                </tr>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>


  <div class="flex justify-center ">
    <div class="flex justify-between p-4 mt-8 noprint w-[1133px] border-t ">
      <a href="{{ route('dashboardShow', ['biodata' => $cetakTrans->biodata->id]) }}" class="btn btn-secondary noprint"
        on>
        <x-icons.chevron-left class="mr-2" />
        <span>Kembali</span>
      </a>
      <button class="btn btn-primary noprint" onclick="window.print()">
        <x-icons.printer-solid class="mr-2" />
        <span>Cetak</span>
      </button>
    </div>
  </div>

</body>

</html>