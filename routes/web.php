<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasMeteranController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\JenisPenggunaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PembayaranController;
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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::put('/admin/profile/store',[AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
}); // End Group Admin Middleware

Route::middleware(['auth', 'role:admin'])->group(function () {


    Route::controller(PetugasMeteranController::class)->group(function(){
        Route::get('/admin/manage-petugas-meteran', 'index')->name('admin.petugas.index');
        Route::get('/admin/petugas/create', 'create')->name('admin.petugas.create');
        Route::post('/admin/petugas/store', 'store')->name('admin.petugas.store');
        Route::get('/admin/petugas/edit/{id_petugas}', 'edit')->name('admin.petugas.edit');
        Route::put('/admin/petugas/update/{id_petugas}', 'update')->name('admin.petugas.update');
        Route::delete('admin/petugas/delete/{id_petugas}','destroy')->name('admin.petugas.delete');
    });

    Route::controller(PelangganController::class)->group(function(){
        Route::get('/admin/manage-pelanggan-meteran', 'index')->name('admin.pelanggan.index');
        Route::get('/admin/pelanggan/create', 'create')->name('admin.pelanggan.create');
        Route::post('/admin/pelanggan/store', 'store')->name('admin.pelanggan.store');
        Route::get('/admin/pelanggan/edit/{id_pelanggan}', 'edit')->name('admin.pelanggan.edit');
        Route::put('/admin/pelanggan/update/{id_pelanggan}', 'update')->name('admin.pelanggan.update');
        Route::delete('admin/pelanggan/delete/{id_pelanggan}','destroy')->name('admin.pelanggan.delete');
    });

    Route::controller(KasirController::class)->group(function(){
        Route::get('/admin/manage-kasir', 'index')->name('admin.kasir.index');
        Route::get('/admin/kasir/create', 'create')->name('admin.kasir.create');
        Route::post('/admin/kasir/store', 'store')->name('admin.kasir.store');
        Route::get('/admin/kasir/edit/{id_kasir}', 'edit')->name('admin.kasir.edit');
        Route::put('/admin/kasir/update/{id_kasir}', 'update')->name('admin.kasir.update');
        Route::delete('admin/kasir/delete/{id_kasir}','destroy')->name('admin.kasir.delete');
    });

    Route::controller(JenisPenggunaController::class)->group(function(){
        Route::get('/admin/jenis-pengguna', 'index')->name('admin.jenis.pengguna.index');
        Route::get('/admin/jenis-pengguna/create', 'create')->name('admin.jenis.pengguna.create');
        Route::post('/admin/jenis-pengguna/store', 'store')->name('admin.jenis.pengguna.store');
        Route::get('/admin/jenis-pengguna/edit', 'edit')->name('admin.jenis.pengguna.edit');
        Route::post('/admin/jenis-pengguna/update/{id_jenis_pengguna}','update')->name('admin.jenis.pengguna.update');
        Route::get('/admin/jenis-pengguna/delete/{id_jenis_pengguna}','destroy')->name('admin.jenis.pengguna.delete');
    });

    Route::controller(TarifController::class)->group(function(){
        Route::get('/admin/manage-tarif', 'index')->name('admin.tarif.index');
        Route::get('/admin/tarif/create', 'create')->name('admin.tarif.create');
        Route::post('/admin/tarif/store', 'store')->name('admin.tarif.store');
        Route::get('/admin/tarif/edit/{id_tarif}', 'edit')->name('admin.tarif.edit');
        Route::put('/admin/tarif/update/{id_tarif}', 'update')->name('admin.tarif.update');
        Route::delete('admin/tarif/delete/{id_tarif}','destroy')->name('admin.tarif.delete');
    });

    Route::controller(AreaController::class)->group(function(){
        Route::get('/admin/manage-area', 'index')->name('admin.area.index');
        Route::get('/admin/area/create', 'create')->name('admin.area.create');
        Route::post('/admin/area/store', 'store')->name('admin.area.store');
        Route::get('/admin/area/edit/{id_area}', 'edit')->name('admin.area.edit');
        Route::put('/admin/area/update/{id_area}', 'update')->name('admin.area.update');
        Route::delete('admin/area/delete/{id_area}','destroy')->name('admin.area.delete');
    });


}); // End Group Admin Middleware



    Route::middleware(['auth', 'role:petugas'])->group(function () {
        Route::get('/petugas/dashboard',[PetugasMeteranController::class, 'PetugasDashboard'])->name('petugas.dashboard');

        Route::controller(PetugasMeteranController::class)->group(function(){
            Route::get('/petugas/manage-penggunaan-air', 'showDaftarPelanggan')->name('petugas.show.daftar.pelanggan');
            Route::get('/petugas/manage-penggunaan-air/show/{id_pelanggan}','showDetailPelanggan')->name('petugas.show.detail.pelanggan');
            Route::get('/petugas/manage-penggunaan-air/create/{id_pelanggan}', 'createPenggunaanAir')->name('petugas.create.penggunaan.air');
            Route::post('/petugas/manage-penggunaan-air/store/{id_pelanggan}','storePenggunaanAir')->name('petugas.store.penggunaan.air');
            Route::get('petugas/manage-penggunaan-air/edit/{id_pelanggan}','editPenggunaanAir')->name('petugas.edit.penggunaan.air');
            Route::put('petugas/manage-penggunaan-air/update/{id_pelanggan', 'updatePenggunaanAir')->name('petugas.update.penggunaan.air');
        });

        Route::controller(TagihanController::class)->group(function(){
            Route::get('/petugas/input-penggunaan-air/create', 'createInputPenggunaanAir')->name('petugas.input.create');
            Route::post('petugas/input-penggunaan-air/store', 'storeInputPenggunaanAir')->name('petugas.input.store');
            Route::get('petugas/generate-tagihan/create', 'generateTagihanCreate')->name('petugas.generate.create');
            Route::post('petugas/generate-tagihan/store', 'generateTagihanStore')->name('petugas.generate.store');
            Route::get('/petugas/generate-tagihan/show','generateTagihanShow')->name('petugas.generate.show');
        });
        
    }); // End Group Petugas Middleware

    Route::middleware(['auth', 'role:pelanggan'])->group(function () {
        Route::get('/pelanggan/dashboard',[PelangganController::class, 'PelangganDashboard'])->name('pelanggan.dashboard');
        
        }); // End Group Pelanggan Middleware

        Route::middleware(['auth', 'role:pelanggan'])->group(function () {

            Route::controller(TagihanController::class)->group(function(){
                Route::get('/pelanggan/tagihan', 'index')->name('pelanggan.tagihan.index');
                Route::get('/pelanggan/daftar-tagihan/{id_tagihan}','show')->name('pelanggan.tagihan.show');
            });

            Route::controller(PembayaranController::class)->group(function(){
                Route::get('/pelanggan/pembayaran', 'index')->name('pelanggan.pembayaran.index');
                Route::get('/pelanggan/pembayaran/create/{id_tagihan}','create')->name('pelanggan.pembayaran.create');
                Route::put('/pelanggan/pembayaran/store/{id_tagihan}', 'store')->name('pelanggan.pembayaran.store');
            });
            
        
    }); // 

// Route::get('/pelanggan/pembayaran/show/{id_pembayaran}', 'show')->name('pelanggan.pembayaran.show');
Route::middleware(['auth', 'role:kasir'])->group(function () {   
    Route::get('/kasir/dashboard',[KasirController::class, 'KasirDashboard'])->name('kasir.dashboard');

    Route::controller(KasirController::class)->group(function(){

        // Daftar Tagihan Menu 
        Route::get('/kasir/cek-tagihan', 'showDaftarTagihan')->name('kasir.cek.daftar.tagihan');
        Route::get('/kasir/cek-tagihan/show/{id_tagihan}','showDetailTagihan')->name('kasir.cek.detail.tagihan');

        // Approval Pembayaran Menu
        Route::get('/kasir/daftar-bukti-pembayaran', 'showDaftarPembayaran')->name('kasir.daftar.bukti.pembayaran');
        Route::get('/kasir/daftar-bukti-pembayaran/show/{id_tagihan}','showDetailPembayaran')->name('kasir.daftar.detail.pembayaran');
        Route::get('/kasir/bukti-pembayaran/show/{id_tagihan}', 'showBuktiPembayaran')->name('kasir.bukti.pembayaran');
        Route::put('/kasir-daftar-bukti-pembayaran/approved/{id_tagihan}','approvePembayaran')->name('kasir.pembayaran.approved');
        Route::put('/kasir-daftar-bukti-pembayaran/declined/{id_tagihan}','declinePembayaran')->name('kasir.pembayaran.declined');

        // Cash Payment Menu
        Route::get('/kasir/pembayaran-tunai', 'showDaftarPembayaranTunai')->name('kasir.daftar.pembayaran.tunai');
        Route::get('/kasir/pembayaran-tunai/show/{id_tagihan}', 'showDetailPembayaranTunai')->name('kasir.detail.pembayaran.tunai');
        Route::put('/kasir/pembayaran-tunai/paid/{id_tagihan}', 'paidPembayaran')->name('kasir.pembayaran.paid');
        // Invoice Pages
        Route::get('/kasir/pembayaran-tunai/invoice-pages/{id_tagihan}', 'invoicePages')->name('kasir.pembayaran.invoice');
        Route::get('/kasir/pembayaran-tunai/cetak-invoice/{id_tagihan}', 'printInvoice')->name('kasir.pembayaran.cetak.invoice');
        Route::get('/kasir/pembayaran-tunai/view-invoice/{id_tagihan}', 'viewInvoice')->name('kasir.pembayaran.view.invoice');
        Route::get('/kasir/pembayaran-tunai/cetak-struk/{id_tagihan}', 'printStruk')->name('kasir.pembayaran.cetak.struk');
    });


}); // End Group Kasir Middleware

Route::get('/admin/login',[AdminController::class, 'AdminLogin'])->name('admin.login');