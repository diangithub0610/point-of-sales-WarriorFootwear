<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\resellerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kelolapesananController;
use App\Http\Controllers\kelolaresellerController;
use App\Http\Controllers\kelolapersediaanController;
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
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});
route::post("/login",[AuthController::class,"login"])->name("login.process");

Route::get('/admin/dashboard', [DashboardController::class,'admin'])->name('admin.dashboard');
Route::get('/admin/persediaan/index', [kelolapersediaanController::class,'index'])->name('persediaan.dashboard');
Route::get('/admin/pesanan/index', [kelolapesananController::class,'index'])->name('pesanan.dashboard');
Route::get('/admin/reseller/index', [kelolaresellerController::class,'index'])->name('reseller.dashboard');
route::get('/admin/laporan/index', [laporanController::class,'index'])->name('laporan.dashboard');
route::get('admin/checkout/index',[checkoutController::class,'index'])->name('checkout.dashboard');
route::get('reseller/dashboard',[resellerController::class,'index'])->name('reseller.dashboard');
route::get('reseller/checkout/index',[resellercheckoutController::class,'index'])->name('resellercheckout.dashboard');

route::post('admin/persediaan/index',[kelolapersediaanController::class,'store'])->name('barang.store');
route::get('admin/persediaan/tabel',[kelolapersediaanController::class,'tabel'])->name('barang.tabel');
route::post('admin/reseller/index',[kelolaresellerController::class,'store'])->name('tambahreseller.store');
route::get('admin/persediaan/index/{id}',[kelolapersediaanController::class,'indexupdate'])->name('viewbarang.update');
route::put('admin/persediaan/index/{id}',[kelolapersediaanController::class,'update'])->name('barang.update');
route

