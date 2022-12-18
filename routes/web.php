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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', function () {
  return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata.index');
  Route::get('/biodata/create', [BiodataController::class, 'create'])->name('biodata.create');
  Route::post('/biodata/create', [BiodataController::class, 'store']);

  Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/print', [DashboardController::class, 'print'])->name('dashboard.print');
    Route::get('/dashboard/print-view', [DashboardController::class, 'printView'])->name('dashboard.printView');
  });
});

require __DIR__ . '/auth.php';
