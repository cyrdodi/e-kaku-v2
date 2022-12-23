<?php

namespace App\Http\Livewire\Biodata;

use App\Models\Agama;
use App\Models\Biodata;
use Livewire\Component;
use App\Models\Kecamatan;
use App\Models\StatusPerkawinan;
use App\Models\PendidikanTerakhir;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

// use Illuminate\Support\Facades\File as FacFile;

class EditForm extends Component
{
  use WithFileUploads;

  // public $biodata;
  public $keacamatan, $agama, $statusPerkawinan, $pendidikan;

  public $biodata;
  // form
  public $biodataId, $nik, $no_pendaftaran, $name, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $provinsi, $kabupaten, $kecamatan_id, $kelurahan, $kode_pos, $alamat, $rtrw, $no_hp, $email, $agama_id, $status_perkawinan_id, $tinggi_badan, $berat_badan, $disabilitas, $pendidikan_terakhir_id, $institusi_pendidikan, $tahun_lulus, $jurusan, $keterampilan, $pengalaman, $tujuan_lamaran, $pas_foto, $pas_foto_path, $ktp, $ktp_path, $ijazah, $ijazah_path, $sertifikat, $sertifikat_path;


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
    $this->pas_foto = $biodata->pas_foto;
    $this->pas_foto_path = $biodata->pas_foto_path;
    $this->ktp = $biodata->ktp;
    $this->ktp_path = $biodata->ktp_path;
    $this->ijazah = $biodata->ijazah;
    $this->ijazah_path = $biodata->ijazah_path;
    $this->sertifikat = $biodata->sertifikat;
    $this->sertifikat_path = $biodata->sertifikat_path;
  }

  public function render()
  {

    return view('livewire.biodata.edit-form');
  }

  public function deletePasFoto()
  {
    // delete file
    Storage::delete($this->pas_foto_path);

    // update value to empty
    $this->biodata->pas_foto_path = '';
    $this->biodata->pas_foto = '';
    $this->biodata->save();

    toastr()->success('Pas Foto berhasil dihapus!');
  }

  public function deleteKtp()
  {

    // delete file
    Storage::delete($this->ktp_path);

    // update value to empty
    $this->biodata->ktp_path = '';
    $this->biodata->ktp = '';
    $this->biodata->save();

    toastr()->success('KTP berhasil dihapus!');
  }

  public function deleteIjazah()
  {
    // delete file
    Storage::delete($this->ijazah_path);

    // update value to empty
    $this->biodata->ijazah_path = '';
    $this->biodata->ijazah = '';
    $this->biodata->save();

    toastr()->success('Ijazah berhasil dihapus!');
  }

  public function deleteSertifikat()
  {
    // delete file
    Storage::delete($this->sertifikat_path);

    // update value to empty
    $this->biodata->sertifikat_path = '';
    $this->biodata->sertifikat = '';
    $this->biodata->save();

    toastr()->success('Sertifikat berhasil dihapus!');
  }

  public function updateBiodata()
  {
    $this->validate();


    if ($this->pas_foto_path == '' && $this->ktp_path && $this->ijazah_path) {
      $this->validate([
        'pas_foto' => ['required', 'max:2048', 'image'],
        'ktp' => ['required', 'max:2048', 'image'],
        'ijazah' => ['required', 'max:2048', 'mime:pdf'],
      ]);
    }
    if ($this->ktp_path == '') {
      $this->validate([]);
    }
    if ($this->ijazah_path == '') {
      $this->validate([]);
    }

    /**
     * 1. validasi data
     * 2. jika tidak hapus berkas
     * 3. berkas tersebut tidak perlu divalidasi
     * 4. jika ada berkas dihapus
     *    - validasi berkas
     *    - store ke storage
     * 
     */
  }
}
