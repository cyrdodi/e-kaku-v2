<h1>E-KAKU</h1>
<h2>DINAS TENAGA KERJA DAN TRANSMIGRASI KAB. PANDEGLANG</h2>
<div></div>
<table class="bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Tanggal</th>
      <th>No. Pendaftaran</th>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Alamat Lengkap</th>
      <th>Kecamatan</th>
      <th>Status</th>
      <th>Pendidikan</th>
      <th>Jurusan</th>
      <th>Tahun Lulus</th>
      <th>Pengalaman</th>
      <th>Pengalaman</th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $item)
    <tr>
      <td>{{ $loop->index +1 }}</td>
      <td>{{ $item->created_at }}</td>
      <td>{{ $item->biodata->no_pendaftaran }}</td>
      <td>{{ $item->biodata->name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>