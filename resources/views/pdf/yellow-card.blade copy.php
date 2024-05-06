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

      <div class="title">Surat Jalan</div>
      <br>
      <table>
        <tr>
          <td colspan="2" class="dotted">No. Surat Jalan: xxx</td>
        </tr>
        <tr>
          <td style="width: 350px">
            <table>
              <tr>
                <td style=" padding: 0px 12px 0px 0px" rowspan="2">
                  <img src="{{ public_path('images/logo.png') }}" alt="logo toko" style="width: 55px">
                </td>
                <td style="border: none; font-weight: bold;">xxx</td>
              </tr>
              <tr>
                <td style="border: none">xxx</td>
              </tr>
            </table>

          </td>
          <td>
            <table>
              <tr>
                <td style="border: none">Tanggal DO</td>
                <td style="border: none">:
                  xxx
                </td>
              </tr>
              <tr>
                <td style="border: none">
                  Pengemudi
                </td>
                <td style="border: none">:
                  xxx
                </td>
              </tr>
              <tr>
                <td style="border: none">
                  Kendaraan
                </td>
                <td style="border: none">:
                  xxx
                  <span>xxx</span>
                </td>
              </tr>
            </table>
          </td>

        </tr>

      </table>
    </div>
  </header>

  <footer>
    <div class="pagenum-container">
      <table style="width: 100%">
        <tr>
          <td style="width: 50%" class="dotted">
            Halaman <span class="pagenum"></span>
          </td>
          <td class="dotted">
            Tanggal cetak Surat Jalan: wewe
          </td>
        </tr>
      </table>
    </div>
  </footer>

  <main>
    <table style="margin-top: 12px">
      <thead>
        <tr>
          <th class="dotted">No.</th>
          <th class="dotted">No. Faktur</th>
          <th class="dotted">Pelanggan</th>
          <th class="dotted">Alamat</th>
          <th class="dotted">Salesman</th>
          <th class="dotted">Harga</th>
        </tr>
      </thead>
      <tbody>
        {{-- @php $total = 0 @endphp
        @foreach($deliveryOrder->details as $row) --}}

        <tr>
          <td>xxx</td>
          <td>xxx</td>
          <td>xxx</td>
          <td>xxx</td>
          <td>xxx</td>
          <td style="text-align: right;">xxx</td>
        </tr>
        {{-- @php $total += $row->salesTransaction->getGrandTotal() @endphp --}}
        {{-- @endforeach --}}

        <tr>
          <td colspan="5" style="text-align: right; font-weight: bold;">Total</td>
          <td style="text-align: right; font-weight: bold;">xxx</td>
        </tr>
      </tbody>
    </table>
    <br>
    <br>
    <table>
      <tr>
        <td class="ttd">
          <div>Yang Menerima</div>
          <br>
          <br>
          <br>
          <div>(.............................)</div>
        </td>
        {{-- <td style="border: 0px; text-align: center">
          <div>Yang Menyerahkan</div>
          <br>
          <br>
          <br>
          <div>(.............................)</div>
        </td> --}}
        <td class="ttd">
          <div>Pandeglang, {{ date('d-m-Y') }}</div><br>
          <br>
          <br>
          <div>(Admin Operasional)</div>
        </td>
      </tr>
    </table>
  </main>

</body>

</html>