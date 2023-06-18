<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasMeteranController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KasirController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard',[AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

Route::get('/petugas/dashboard',[PetugasMeteranController::class, 'PetugasDashboard'])->name('petugas.dashboard');

Route::get('/pelanggan/dashboard',[PelangganController::class, 'PelangganDashboard'])->name('pelanggan.dashboard');

Route::get('/kasir/dashboard',[KasirController::class, 'KasirDashboard'])->name('kasir.dashboard');