<!DOCTYPE html>
<html>

<head>
  <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
  {{--
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" --}} {{--
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 10px;
    }



    .container {
      width: 100%;
      margin: 0 auto;
    }

    .column {
      float: left;
      width: 50%;
      padding: 20px;
    }

    .left {
      background-color: #e67e22;
    }

    .right {
      background-color: #3498db;
    }

    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }

    @page {
      margin: 2px
    }
  </style>

</head>

<body>
  <div class="container">
    <div class="column left">
      <h2>PENDIDIKAN FORMAL</h2>
      <div>SMA NEGERI 12 PANDEGLANG Th. 2022</div>
      <div>
        Matematika dan Ilmu Pengetahuan Alam
      </div>

      <div>
        Keterampilan
      </div>
      <div style="width:100%; height: 100px">
        Isi dari keterampilan
      </div>


      <div>Pelaksana Seksi Penempatan Tenaga Kerja</div>
      <div style="height:50px;">
        TTD
      </div>
      <div>Hesti Agustini, S.Sos</div>
      <div>NIP: 3432423u40234</div>
    </div>


    <div class="column right">
      <table>
        <tr>
          <td rowspan="4">
            <img src="{{ asset('images/logo-pandeglang.png') }}" alt="">
          </td>
          <td>Pemerintah Kabupaten Pandeglang</td>
          <td>Kartu AK/1</td>
        </tr>
        <tr>
          <td>DINAS TENAGA KERJA DAN TRANSMIGRASI</td>
        </tr>
        <tr>
          <td>Jl. Raya Labuan Km. 3 Ciapcung</td>
        </tr>
        <tr>
          <td>Provinsi Banten 4253 Telp 234234</td>
        </tr>
      </table>
      <div>KARTU TANDA BUKTI PENDAFTARAN PENCARI KERJA</div>
    </div>
    <div class="clearfix"></div>
  </div>
</body>

</html>