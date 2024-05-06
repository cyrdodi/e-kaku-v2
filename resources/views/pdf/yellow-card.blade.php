@php
$nik = $biodata->nik;
$noPendaftaran = $biodata->no_pendaftaran;

$nik1 = substr($nik, 0, 2);
$nik2 = substr($nik, 2, 4);
$nik3 = substr($nik, 6, 6);
$nik4 = substr($nik, 12);

$noPen1 = substr($noPendaftaran, 0, 4);
$noPen2 = substr($noPendaftaran, 4, 5);
$noPen3 = substr($noPendaftaran, 9);

@endphp

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    @page {
      /* margin: 5px; */
      font-size: 12px;
      font-family: Arial, Helvetica, sans-serif
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 2px;
    }

    .dotted {
      border-bottom: 1px dotted black;
      border-top: 1px dotted black;
    }


    @page {
      margin: 25% 15px 10% 15px;
    }

    header {
      position: fixed;
      top: -90px;
      left: 0px;
      right: 0px;
      /* background-color: lightblue; */
      height: 90px;
    }

    footer {
      position: fixed;
      bottom: -140px;
      left: 0px;
      right: 0px;
      /* background-color: lightblue; */
      height: 120px;
    }

    footer .pagenum:before {
      content: counter(page);
    }

    .title {
      text-align: center;
      font-size: 14px;
      font-weight: bold;
    }

    .ttd {
      border-top: 1px dotted black;
      padding-top: 14px;
      text-align: center
    }

    #keterampilan {
      border: solid 1px;
      /* min-height: 40px; */
      height: 100px;
      overflow: hidden;
      /* white-space: wrap; */
      word-wrap: break-word;
      text-overflow: ellipsis;
      padding: 3px;
    }

    .bold {
      font-weight: bold;
    }

    .kotak {
      padding-left: 0.25rem;
      padding-right: 0.25rem;
      letter-spacing: 0.1em;
      border: 1px solid black;
    }
  </style>


</head>

<body>
  <header>
    <div>
      <div>
        {{-- Left --}}
        <div style="float: left; width: 48%; height: 80%">
          <div class="bold">Pendidikan Formal</div>
          <div class="bold">{{ $biodata->institusi_pendidikan }} Th, {{ $biodata->tahun_lulus }}</div>
          <div class="bold">{{ $biodata->jurusan }}</div>

          <div class="bold" style="margin-top: 8px">Keterampilan</div>
          <p id="keterampilan">
            {{ $biodata->keterampilan }}
          </p>

          {{-- ttd pejabat --}}
          @if($functionary->id !== 2)
          <div style="margin-left:50%; width: 50%; margin-top: 20px">

            <div style="font-weight: bold; text-align: center">{{ $functionary->jabatan }}</div>

            <div style="text-align: center"><img src="{{ public_path('storage/' . $functionary->ttd) }}" alt=""
                style="height: 80px"></div>

            <div style="text-align: center; text-decoration:underline">{{ $functionary->name }}</div>

            <div style="text-align: center">{{ $functionary->nip }}</div>
          </div>
          @endif
          {{-- end ttd pejabat --}}
        </div>

        {{-- right --}}
        <div style="float: right; margin-left: 52%; width: 48%; height: 80%">

          <table>
            <tbody>
              <tr>
                <td rowspan="2" style="vertical-align: top">
                  <img src="{{   public_path('images/logo-pandeglang.png')  }}" alt="" style="width: 70px">
                </td>
                <td style="text-align: center; font-weight:bold; font-size:13px">
                  PEMERINTAH KABUPATEN PANDEGLANG <br />
                  DINAS TENAGA KERJA DAN TRANSMIGRASI
                </td>
                <td rowspan="2" style="vertical-align: top; width:80px">
                  <div style="border: 1px solid; padding: 1px; text-align: center; font-size: 10px">Kartu AK/1</div>
                </td>
              </tr>
              <tr>
                <td style="text-align: center">Jl. Raya Labuan KM.4 Cipacung Pandeglang, Kaduhejo Kabupaten Pandeglang
                  <br />
                  Provinsi Banten 42253 Telp: (0253) 202038
                </td>
              </tr>
            </tbody>
          </table>

          <div style="text-align: center; font-weight:bold; border: 1px solid; margin-top: 8px; font-size: 14px">KARTU
            TANDA BUKTI
            PENDAFTARAN PENCARI
            KERJA</div>

          <table style="margin-top: 8px;">
            <tbody>
              <tr>
                <td>No. Pendaftaran Pencari Kerja</td>
                <td style="text-align: justify">
                  <span class="kotak">{{ $noPen1 }}</span>
                  <span class="kotak">{{ $noPen2 }}</span>
                  <span class="kotak">{{ $noPen3 }}</span>
                </td>
              </tr>
              <tr>
                <td>No. Induk Kependudukan</td>
                <td style="text-align: justify">
                  <span class="kotak">{{ $nik1 }}</span>
                  <span class="kotak">{{ $nik2 }}</span>
                  <span class="kotak">{{ $nik3 }}</span>
                  <span class="kotak">{{ $nik4 }}</span>
                </td>
              </tr>
            </tbody>
          </table>

          <table style="margin-top: 8px;">
            <tbody>
              <tr>
                <td rowspan="8" style="text-align: center; vertical-align: top">
                  <img
                    src="{{  $biodata->pas_foto == 'pas_foto_default' ? public_path($biodata->pas_foto_path) : public_path('storage/' . $biodata->pas_foto_path) }}"
                    style="width: 80px;" />
                </td>
                <td style="width: 100px">Nama Lengkap</td>
                <td>: {{ $biodata->name }}</td>
              </tr>
              <tr>
                <td>Tempat/Tgl. Lahir</td>
                <td>: {{ $biodata->tempat_lahir . '/'. \Carbon\Carbon::parse($biodata->tanggal_lahir)->format('d-m-Y')
                  }}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $biodata->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>: {{ $biodata->statusPerkawinan->name }}</td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>: {{ $biodata->agama->name }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>: {{ $biodata->alamat }}</td>
              </tr>
              <tr>
                <td>Telp/HP</td>
                <td>: {{ $biodata->no_hp }}</td>
              </tr>
              <tr>
                <td>Berlaku s.d</td>
                <td>: {{ \Carbon\Carbon::parse($expDate)->format('d-m-Y') }}</td>
              </tr>
            </tbody>
          </table>
          <p style="text-align: center; width: 80px">Tanda Tangan <br /> Pencari Kerja</p>
        </div>
      </div>



</body>

</html>