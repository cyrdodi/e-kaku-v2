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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\File as FacFile;

class EditForm extends Component
{
  use WithFileUploads;

  // public $biodata;
  public $keacamatan, $agama, $statusPerkawinan, $pendidikan;

  public $biodata;
  // form
  public $biodataId, $nik, $no_pendaftaran, $name, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $provinsi, $kabupaten, $kecamatan_id, $kelurahan, $kode_pos, $alamat, $rtrw, $no_hp, $email, $agama_id, $status_perkawinan_id, $tinggi_badan, $berat_badan, $disabilitas, $pendidikan_terakhir_id, $institusi_pendidikan, $tahun_lulus, $jurusan, $keterampilan, $pengalaman, $tujuan_lamaran, $pas_foto, $pas_foto_path, $ktp, $ktp_path, $ijazah, $ijazah_path, $sertifikat, $sertifikat_path;


  public $previousUrl;

  // validation
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
    // 'pas_foto' => ['required', 'max:2048', 'image'],
    // 'ktp' => ['required', 'max:2048', 'image'],
    // 'ijazah' => ['required', 'max:2048', 'mimes:pdf'],
    // 'sertifikat' => ['max:2048', 'mimes:pdf']
  ];

  public function mount(Biodata $biodata)
  {
    // assign model to variable
    $this->biodata = $biodata;

    $this->kecamatan = Kecamatan::orderBy('name')->get();
    $this->agama = Agama::where('is_active', 1)->get();
    $this->statusPerkawinan = StatusPerkawinan::where('is_active', 1)->get();
    $this->pendidikan = PendidikanTerakhir::where('is_active', 1)->get();


    $this->biodataId = $biodata->id;
    $this->nik = $biodata->nik;
    $this->no_pendaftaran = $biodata->no_pendaftaran;
    $this->name = $biodata->name;
    $this->tempat_lahir = $biodata->tempat_lahir;
    $this->tanggal_lahir = $biodata->tanggal_lahir;
    $this->jenis_kelamin = $biodata->jenis_kelamin;
    $this->provinsi = $biodata->provinsi;
    $this->kabupaten = $biodata->kabupaten;
    $this->kecamatan_id = $biodata->kecamatan_id;
    $this->kelurahan = $biodata->kelurahan;
    $this->kode_pos = $biodata->kode_pos;
    $this->alamat = $biodata->alamat;
    $this->rtrw = $biodata->rtrw;
    $this->no_hp = $biodata->no_hp;
    $this->email = $biodata->email;
    $this->agama_id = $biodata->agama_id;
    $this->status_perkawinan_id = $biodata->status_perkawinan_id;
    $this->tinggi_badan = $biodata->tinggi_badan;
    $this->berat_badan = $biodata->berat_badan;
    $this->disabilitas = $biodata->disabilitas;
    $this->pendidikan_terakhir_id = $biodata->pendidikan_terakhir_id;
    $this->institusi_pendidikan = $biodata->institusi_pendidikan;
    $this->tahun_lulus = $biodata->tahun_lulus;
    $this->jurusan = $biodata->jurusan;
    $this->keterampilan = $biodata->disabilitas;
    $this->pengalaman = $biodata->pengalaman;
    $this->tujuan_lamaran = $biodata->tujuan_lamaran;


    $this->previousUrl = URL::previous();
  }

  public function render()
  {
    return view('livewire.biodata.edit-form');
  }

  public function updatedPasFoto()
  {
    $this->validate([
      'pas_foto' => 'mimes:jpg,jpeg,png|max:2048'
    ]);
  }

  public function updatedKtp()
  {
    $this->validate([
      'ktp' => 'mimes:jpg,jpeg,png|max:2048'
    ]);
  }

  public function updatedIjazah()
  {
    $this->validate([
      'ijazah' => 'mimes:pdf|max:2048'
    ]);
  }

  public function updatedSertifikat()
  {
    $this->validate([
      'sertifikat' => 'mimes:pdf|max:2048'
    ]);
  }


  public function updateBiodata()
  {
    $this->validate();
    /**
     * 1. validasi data
     * 2. jika tidak hapus berkas
     * 3. berkas tersebut tidak perlu divalidasi
     * 4. jika ada berkas dihapus
     *    - validasi berkas
     *    - store ke storage
     * 
     */

    //  update pas foto
    if ($this->pas_foto) {
      $this->validate([
        'pas_foto' => 'image|max:2048'
      ]);

      // delete old file
      Storage::delete($this->biodata->pas_foto_path);

      // store new file
      $path = $this->pas_foto->store('berkas');

      // update database
      Biodata::find($this->biodata->id)
        ->update([
          'pas_foto' => $this->pas_foto->getClientOriginalName(),
          'pas_foto_path' => $path
        ]);
    }

    // update ktp
    if ($this->ktp) {
      $this->validate([
        'ktp' => 'image|max:2048'
      ]);

      // delete old file
      Storage::delete($this->biodata->ktp_path);

      // store new file
      $path = $this->ktp->store('berkas');

      Biodata::find($this->biodata->id)
        ->update([
          'ktp' => $this->ktp->getClientOriginalName(),
          'ktp_path' => $path
        ]);
    }

    // update ijazah
    if ($this->ijazah) {
      $this->validate([
        'ijazah' => 'mimes:pdf|max:2048'
      ]);

      // delete old file
      Storage::delete($this->biodata->ijazah_path);

      // store new file
      $path = $this->ijazah->store('berkas');

      Biodata::find($this->biodata->id)
        ->update([
          'ijazah' => $this->ijazah->getClientOriginalName(),
          'ijazah_path' => $path
        ]);
    }

    if ($this->sertifikat) {
      $this->validate([
        'sertifikat' => 'mimes:pdf|max:2048'
      ]);

      if ($this->biodata->sertifikat_path !== null) {
        Storage::delete($this->biodata->sertifikat_path);
      }

      $path = $this->sertifikat->store('berkas');

      Biodata::find($this->biodata->id)
        ->update([
          'sertifikat' => $this->sertifikat->getClientOriginalName(),
          'sertifikat_path' => $path
        ]);
    }

    Biodata::find($this->biodata->id)
      ->update([
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
        'institusi_pendidikan' => $this->institusi_pendidikan,
        'tahun_lulus' => $this->tahun_lulus,
        'jurusan' => $this->jurusan,
        'keterampilan' => $this->keterampilan,
        'pengalaman' => $this->pengalaman,
        'tujuan_lamaran' => $this->tujuan_lamaran,
      ]);

    toastr()->success('Biodata updated');

    return redirect($this->previousUrl);
  }
}
