<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Biodata;
use App\Models\Kecamatan;
use App\Models\PendidikanTerakhir;
use App\Models\StatusPerkawinan;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
  public function index()
  {
    return view('biodata/index');
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
    $attributes = $request->validate([
      'nik' => 'required|numeric',
      'name' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'date|required',
      'jenis_kelamin' => 'required',
      'kecamatan_id' => 'required',
      'kelurahan' => 'required',
      'kode_pos' => 'required|numeric',
      'alamat_lengkap' => 'required',
      'no_hp' => 'required|numeric',
      'agama_id' => 'required',
      'status_perkawinan_id' => 'required',
      'tinggi_badan' => 'required|numeric',
      'berat_badan' => 'required|numeric',
      'disabilitas' => 'required',
      'pendidikan_terakhir_id' => 'required',
      'tahun_lulus' => 'required|numeric',
      'jurusan' => 'required',
    ]);

    $attributes['keterampilan'] = $request->keterampilan;
    $attributes['pengalaman'] = $request->pengalaman;

    $attributes['no_pendaftaran'] = rand(0, 9000);
    $attributes['email'] = auth()->user()->email;
    $attributes['user_id'] = auth()->user()->id;

    $attributes['pas_foto'] = 'test';
    $attributes['ktp'] = 'test';
    $attributes['ijazah'] = 'test';
    $attributes['sertifikat'] = 'test';

    try {
      Biodata::create($attributes);
      toastr()->success('Bioadata berhasil dibuat');
      return redirect()->route('biodata.index');
    } catch (\Error $e) {
      toastr()->error($e->getMessage());
      return back();
    }
  }
}
