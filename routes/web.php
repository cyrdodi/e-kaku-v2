<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/', function () {
  return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata.index');
  Route::get('/biodata/create', [BiodataController::class, 'create'])->name('biodata.create');
  Route::post('/biodata/create', [BiodataController::class, 'store']);
  Route::get('/biodata/edit/{biodata}', [BiodataController::class, 'edit'])->name('biodataEdit');

  // delete berkas
  Route::delete('/biodata/delete/berkas', [BiodataController::class, 'destroyBerkas'])->name('biodataDestroyBerkas');

  Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/print', [DashboardController::class, 'print'])->name('dashboard.print');
    Route::get('/dashboard/print-view/{cetak_trans}', [DashboardController::class, 'printView'])->name('dashboardPrintView');
    Route::get('/dashboard/show/{biodata}', [DashboardController::class, 'show'])->name('dashboardShow');
    Route::get('/dashboard/edit/{biodata}', [DashboardController::class, 'edit'])->name('dashboardEdit');
  });
});


Route::get('/test', [BiodataController::class, 'generateNoPendaftaran']);

require __DIR__ . '/auth.php';
