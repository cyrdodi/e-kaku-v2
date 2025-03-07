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
    'nik' => 'required|numeric|digits:16',
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
    // 'pas_foto' => 'required|max:2048|image',
    // 'ktp' => 'required|max:2048|image',
    // 'ijazah' => 'required|max:2048|mimes:pdf,jpg,jpeg,png',
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
    $this->validate(['ijazah' => 'mimes:pdf,jpg,jpeg,png|max:2048']);
  }
  public function updatedSertifikat()
  {
    $this->validate(['sertifikat' => 'mimes:pdf|max:2048']);
  }

  public function submit()
  {
    $this->validate();

    // jika admin maka dibolehkan tidak upload ijazah
    if (!auth()->user()->is_admin == 1) {
      // $this->validate([
      //   'ijazah' => 'max:2048|mimes:pdf,jpg,jpeg,png',
      // ]);
      $this->validate([
        'ijazah' => 'required|max:2048|mimes:pdf,jpg,jpeg,png',
      ]);
    }

    try {
      if ($this->sertifikat) {
        $this->validate([
          'sertifikat' =>  'max:2048|mimes:pdf'
        ]);

        $sertifikatName = $this->sertifikat->getClientOriginalName();
        $sertifikatPath  = $this->sertifikat->store('berkas');
      }

      if ($this->pas_foto) {

        $pasFotoName = $this->pas_foto->getClientOriginalName();
        $pasFotoPath = $this->pas_foto->store('berkas');
        $ktpName = $this->ktp->getClientOriginalName();
        $ktpPath = $this->ktp->store('berkas');
      }

      if ($this->ijazah) {
        $ijazahName = $this->ijazah->getClientOriginalName();
        $ijazahPath = $this->ijazah->store('berkas');
      }


      Biodata::create([
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
        'pas_foto' => $pasFotoName ?? 'placeholder_pas_foto.png',
        'pas_foto_path' => $pasFotoPath ?? 'images/placeholder_pas_foto.png',
        'ktp' => $ktpName ?? 'placholder_ktp_png',
        'ktp_path' => $ktpPath ?? 'images/placeholder_ktp.png',
        'ijazah' => $ijazahName ?? null,
        'ijazah_path' => $ijazahPath ?? null,
        'sertifikat' => $sertifikatName ?? null,
        'sertifikat_path' => $sertifikatPath ?? null,
        'user_id' => auth()->user()->id,
      ]);

      toastr()->success('Biodata berhasil ditambahkan', 'Sukses');
      return redirect($this->previousUrl);
    } catch (\Exception $e) {
      toastr()->error($e->getMessage(), 'Error');
    }
  }

  public function mount()
  {
    $this->previousUrl = URL::previous();

    if (auth()->user()->is_admin == 0) {
      $this->name = auth()->user()->name;
      $this->email = auth()->user()->email;
    }

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
