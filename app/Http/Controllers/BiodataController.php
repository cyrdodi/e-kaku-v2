<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Biodata;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\StatusPerkawinan;
use App\Models\PendidikanTerakhir;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
  public function index()
  {
    $biodata = Biodata::where('user_id', auth()->user()->id)->first();

    return view('biodata/index', compact('biodata'));
  }

  public function create()
  {
    $kecamatan = Kecamatan::orderBy('name')->get();
    $agama = Agama::where('is_active', 1)->get();
    $statusPerkawinan = StatusPerkawinan::where('is_active', 1)->get();
    $pendidikan = PendidikanTerakhir::where('is_active', 1)->get();


    return view('biodata/create', compact('kecamatan', 'agama', 'statusPerkawinan', 'pendidikan'));
  }

  public function store(Request $request)
  {

    $request->validate([
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
      'pas_foto' => ['required', 'max:2048', 'image'],
      'ktp' => ['required', 'max:2048', File::image()->max(2000)],
      'ijazah' => ['required', 'max:2048', File::types(['pdf'])->max(2000)],
      'sertifikat' => ['max:2048', File::types(['pdf'])->max(2000)]
    ]);


    try {


      // file processing
      $pasFotoTitle = $request->pas_foto->getClientOriginalName();
      $pasFotoPath = $request->pas_foto->store('berkas');
      $ktpTitle = $request->ktp->getClientOriginalName();
      $ktpPath = $request->ktp->store('berkas');
      $ijazahTitle = $request->ijazah->getClientOriginalName();
      $ijazahPath = $request->ijazah->store('berkas');

      $sertifikatTitle = null;
      $sertifikatPath = null;

      if ($request->hasFile('sertifikat')) {
        $sertifikatTitle = $request->sertifikat->getClientOriginalName();
        $sertifikatPath = $request->sertifikat->store('berkas');
      }


      Biodata::create([
        'no_pendaftaran' => $this->generateNoPendaftaran($request->nik), // TODO: buat method generate no pendaftaran
        'nik' => $request->nik,
        'name' => $request->name,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'kecamatan_id' => $request->kecamatan_id,
        'kelurahan' => $request->kelurahan,
        'kode_pos' => $request->kode_pos,
        'alamat' => $request->alamat,
        'rtrw' => $request->rtrw,
        'no_hp' => $request->no_hp,
        'email' => auth()->user()->email,
        'agama_id' => $request->agama_id,
        'status_perkawinan_id' => $request->status_perkawinan_id,
        'tinggi_badan' => $request->tinggi_badan,
        'berat_badan' => $request->berat_badan,
        'disabilitas' => $request->disabilitas,
        'pendidikan_terakhir_id' => $request->pendidikan_terakhir_id,
        'tahun_lulus' => $request->tahun_lulus,
        'institusi_pendidikan' => $request->institusi_pendidikan,
        'jurusan' => $request->jurusan,
        'keterampilan' => $request->keterampilan,
        'pengalaman' => $request->pengalaman,
        'tujuan_lamaran' => $request->tujuan_lamaran,
        'pas_foto' => $pasFotoTitle,
        'pas_foto_path' => $pasFotoPath,
        'ktp' => $ktpTitle,
        'ktp_path' => $ktpPath,
        'ijazah' => $ijazahTitle,
        'ijazah_path' => $ijazahPath,
        'sertifikat' => $sertifikatTitle,
        'sertifikat_path' => $sertifikatPath,
        'user_id' => auth()->user()->id
      ]);
      toastr()->success('Bioadata berhasil dibuat');
      return redirect()->route('biodata.index');
    } catch (\Exception $e) {
      toastr()->error($e->getMessage());
      return redirect()->back()->withInput();
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

  public function edit($biodata)
  {
    return view('biodata/edit', compact('biodata'));
  }

  public function destroyBerkas(Request $request)
  {
    /**
     * delete file
     * empty path and name
     */

    $path = $request->colName . '_path';

    $biodata = Biodata::where('id', $request->biodataId)->first();

    // delete file
    Storage::delete($request->filename);

    // update value to empty
    $biodata->$path = '';
    $biodata->$request->colName = '';
    $biodata->save();

    return redirect()->back();
  }
}
