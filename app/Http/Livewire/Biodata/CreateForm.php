<?php

namespace App\Http\Livewire\Biodata;

use App\Models\Agama;
use App\Models\Biodata;
use Livewire\Component;
use App\Models\Kecamatan;
use Livewire\WithFileUploads;
use App\Models\StatusPerkawinan;
use App\Models\PendidikanTerakhir;
use Illuminate\Support\Facades\URL;

class CreateForm extends Component
{
  use WithFileUploads;


  // form
  public $no_pendaftaran, $nik, $name, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $kecamatan_id, $kelurahan, $kode_pos, $alamat, $rtrw, $no_hp, $email, $agama_id, $status_perkawinan_id, $tinggi_badan, $berat_badan, $disabilitas, $pendidikan_terakhir_id, $tahun_lulus, $institusi_pendidikan, $jurusan, $keterampilan, $pengalaman, $tujuan_lamaran, $pas_foto, $pas_foto_path, $ktp, $ktp_path, $ijazah, $ijazah_path, $sertifikat, $sertifikat_path;

  // form select
  public $kecamatan, $agama, $statusPerkawinan, $pendidikan;

  public $previousUrl;

  protected $rules = [
    'nik' => 'required|numeric',
    'name' => 'required',
    'tempat_lahir' => 'required',
    'tanggal_lahir' => 'date|required',
    'jenis_kelamin' => 'required',
    'kecamatan_id' => 'required',
    'kelurahan' => 'required',
    'kode_pos' => 'required|numeric',
    'alamat' => 'required',
    'rtrw' => 'required',
    'no_hp' => 'required|numeric',
    'email' => 'required|email',
    'agama_id' => 'required',
    'status_perkawinan_id' => 'required',
    'tinggi_badan' => 'required|numeric',
    'berat_badan' => 'required|numeric',
    'disabilitas' => 'required',
    'pendidikan_terakhir_id' => 'required',
    'tahun_lulus' => 'required|numeric',
    'institusi_pendidikan' => 'required',
    'jurusan' => 'required',
    'pas_foto' => 'required|max:2048|image',
    'ktp' => 'required|max:2048|image',
    'ijazah' => 'required|max:2048|mimes:pdf',
    // 'sertifikat' =>  'max:2048|mimes:pdf'
  ];

  public function updatedPasFoto()
  {
    $this->validate(['pas_foto' => 'mimes:jpg,jpeg,png|max:2048']);
  }

  public function updatedKtp()
  {
    $this->validate(['ktp' => 'mimes:jpg,jpeg,png|max:2048']);
  }
  public function updatedIjazah()
  {
    $this->validate(['ijazah' => 'mimes:pdf|max:2048']);
  }
  public function updatedSertifikat()
  {
    $this->validate(['sertifikat' => 'mimes:pdf|max:2048']);
  }

  public function submit()
  {
    $this->validate();

    try {
      if ($this->sertifikat) {
        $this->validate([
          'sertifikat' =>  'max:2048|mimes:pdf'
        ]);

        $sertifikatName = $this->sertifikat->getClientOriginalName();
        $sertifikatPath  = $this->sertifikat->store('berkas');
      }

      $pasFotoName = $this->pas_foto->getClientOriginalName();
      $pasFotoPath = $this->pas_foto->store('berkas');
      $ktpName = $this->ktp->getClientOriginalName();
      $ktpPath = $this->ktp->store('berkas');
      $ijazahName = $this->ijazah->getClientOriginalName();
      $ijazahPath = $this->ijazah->store('berkas');


      Biodata::create([
        'no_pendaftaran' => $this->generateNoPendaftaran($this->nik),
        'nik' => $this->nik,
        'name' => $this->name,
        'tempat_lahir' => $this->tempat_lahir,
        'tanggal_lahir' => $this->tanggal_lahir,
        'jenis_kelamin' => $this->jenis_kelamin,
        'kecamatan_id' => $this->kecamatan_id,
        'kelurahan' => $this->kelurahan,
        'kode_pos' => $this->kode_pos,
        'alamat' => $this->alamat,
        'rtrw' => $this->rtrw,
        'no_hp' => $this->no_hp,
        'email' => $this->email,
        'agama_id' => $this->agama_id,
        'status_perkawinan_id' => $this->status_perkawinan_id,
        'tinggi_badan' => $this->tinggi_badan,
        'berat_badan' => $this->berat_badan,
        'disabilitas' => $this->disabilitas,
        'pendidikan_terakhir_id' => $this->pendidikan_terakhir_id,
        'tahun_lulus' => $this->tahun_lulus,
        'institusi_pendidikan' => $this->institusi_pendidikan,
        'jurusan' => $this->jurusan,
        'keterampilan' => $this->keterampilan,
        'pengalaman' => $this->pengalaman,
        'tujuan_lamaran' => $this->tujuan_lamaran,
        // 
        'pas_foto' => $pasFotoName,
        'pas_foto_path' => $pasFotoPath,
        'ktp' => $ktpName,
        'ktp_path' => $ktpPath,
        'ijazah' => $ijazahName,
        'ijazah_path' => $ijazahPath,
        'sertifikat' => $sertifikatName ?? null,
        'sertifikat_path' => $sertifikatPath ?? null,
        'user_id' => auth()->user()->id,
      ]);

      toastr()->success('Sukses', 'Biodata berhasil ditambahkan');
      return redirect($this->previousUrl);
    } catch (\Exception $e) {
      toastr()->error('error', $e->getMessage());
    }
  }

  public function generateNoPendaftaran($nik)
  {

    $prefix = substr($nik, 0, 4);
    $suffix = date('dmY');

    // cek apakah ada data pada bulan ini
    $noUrut = Biodata::whereYear('created_at', date('Y'))
      ->whereMonth('created_at', date('m'))
      ->count();

    $noUrut = sprintf('%05d', $noUrut + 1);

    return $prefix . $noUrut . $suffix;
  }

  public function mount()
  {
    $this->previousUrl = URL::previous();

    $this->kecamatan = Kecamatan::orderBy('name')->get();
    $this->agama = Agama::where('is_active', 1)->get();
    $this->statusPerkawinan = StatusPerkawinan::where('is_active', 1)->get();
    $this->pendidikan = PendidikanTerakhir::where('is_active', 1)->get();
  }

  public function render()
  {
    return view('livewire.biodata.create-form');
  }
}
