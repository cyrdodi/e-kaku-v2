<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
  /**
   * Display the registration view.
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return redirect('/')->with('status', 'Pendaftaran mandiri telah dinonaktifkan. Layanan pembuatan Kartu Pencari Kerja (AK.1) beralih ke aplikasi Didingklik.');
  }

  /**
   * Handle an incoming registration request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(Request $request)
  {
    return redirect('/')->with('status', 'Pendaftaran mandiri telah dinonaktifkan. Layanan pembuatan Kartu Pencari Kerja (AK.1) beralih ke aplikasi Didingklik.');
  }
}
