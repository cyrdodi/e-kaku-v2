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
      padding: 4px;
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
      top: -130px;
      left: 0px;
      right: 0px;
      /* background-color: lightblue; */
      height: 130px;
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
  </style>


</head>

<body>
  <header>
    <div>
      <div>
        <div style="float: left; width: 48%; height: 80%">
          <div>Pendidikan Formal</div>
          <div>{{ $biodata->institusi_pendidikan }} Th, {{ $biodata->tahun_lulus }}</div>
          <div>Akuntansi</div>

          <div>Keterampilan</div>
          <div style="border : solid 1px; height: 40px;"></div>

          <div style="margin-left:50%; width: 50%; height:80px;">
            <div style="font-weight: bold; text-align: center">{{ $functionary->jabatan }}</div>

            <div style="text-align: center; text-decoration:underline">{{ $functionary->name }}</div>

            <div><img src="{{ public_path('storage/' . $functionary->ttd) }}" alt="" style="width: 40px"></div>

            <div style="text-align: center">{{ $functionary->nip }}</div>
          </div>
        </div>

        <div style="float: right; margin-left: 52%; width: 48%; height: 80%">

          <table>
            <tbody>
              <tr>
                <td rowspan="4">
                  <img src="{{   public_path('images/logo-pandeglang.png')  }}" alt="" style="width: 40px">
                </td>
                <td style="text-align: center; font-weight:bold">
                  PEMERINTAH KABUPATEN PANDEGLANG
                </td>
                <td rowspan="4">
                  Kartu AK/1
                </td>
              </tr>
              <tr>
                <td style="text-align: center; font-weight:bold">DINAS TENAGA KERJA DAN TRANSMIGRASI</td>
              </tr>
              <tr>
                <td style="text-align: center">Jl. Raya Labuan KM.4 Cipacung Pandeglang, Kaduhejo Kabupaten Pandeglang
                </td>
              </tr>
              <tr>
                <td style="text-align:center">Provinsi Banten 42253 Telp: (0253) 202038</td>

              </tr>
            </tbody>
          </table>

          <div style="text-align: center; font-weight:bold; border: 1px solid">KARTU TANDA BUKTI PENDAFTARAN PENCARI
            KERJA</div>

          <table>
            <tbody>
              <tr>
                <td>No. Pendaftaran Pencari Kerja</td>
                <td>1607 00626 30042024</td>
              </tr>
              <tr>
                <td>No. Induk Kependudukan</td>
                <td>16 0708 701097 0002</td>
              </tr>
            </tbody>
          </table>

          <table>
            <tbody>
              <tr>
                <td rowspan="7" style="text-align: center">
                  <img
                    src="{{  $biodata->pas_foto == 'pas_foto_default' ? public_path($biodata->pas_foto_path) : public_path('storage/' . $biodata->pas_foto_path) }}"
                    style="width: 80px;" />
                </td>
                <td>Nama Lengkap</td>
                <td>: {{ $biodata->name }}</td>
              </tr>
              <tr>
                <td>Tempat/Tgl. Lahir</td>
                <td>: {{ $biodata->tanggal_lahir }}</td>
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
                <td style="text-align: center">Tanda Tangan <br /> Pencari Kerja</td>
                <td>Berlaku s.d</td>
                <td>: xxx</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>



</body>

</html>