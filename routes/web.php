<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaDinasController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UndanganController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/disposisi', function () {
    return view('disposisi');
})->name('disposisi');
Route::get('/', [HomeController::class,'index'])->name('index');
Route::prefix('surat-masuk')->group(function () {
    Route::get('/', [SuratMasukController::class,'index'])->name('surat-masuk');
    Route::post('/', [SuratMasukController::class,'store'])->name('surat-masuk.store');
    Route::post('/verified-kasubbag/{id}', [SuratMasukController::class,'verifiedKasubbag'])->name('surat-masuk.verified-kasubbag');
    Route::post('/verified-sekban/{id}', [SuratMasukController::class,'verifiedSekban'])->name('surat-masuk.verified-sekban');
    Route::post('/verified-kaban/{id}', [SuratMasukController::class,'verifiedKaban'])->name('surat-masuk.verified-kaban');
    Route::post('/kasubbag-tujuan/{id}', [SuratMasukController::class,'bidangTujuan'])->name('surat-masuk.kasubbag-tujuan');
});

Route::prefix('surat-keluar')->group(function () {
    Route::get('/', [SuratKeluarController::class,'index'])->name('surat-keluar');
    Route::post('/', [SuratKeluarController::class,'store'])->name('surat-keluar.store');
    Route::post('/verified-kasubbag/{id}', [SuratKeluarController::class,'verifiedKasubbag'])->name('surat-keluar.verified-kasubbag');
    Route::post('/verified-sekban/{id}', [SuratKeluarController::class,'verifiedSekban'])->name('surat-keluar.verified-sekban');
    Route::post('/verified-kaban/{id}', [SuratKeluarController::class,'verifiedKaban'])->name('surat-keluar.verified-kaban');
    Route::post('/bidang-tujuan/{id}', [SuratKeluarController::class,'bidangTujuan'])->name('surat-keluar.bidang-tujuan');
});
Route::prefix('undangan')->group(function () {
    Route::get('/', [UndanganController::class,'index'])->name('undangan');
    Route::post('/', [UndanganController::class,'store'])->name('undangan.store');
    Route::post('/verified-kasubbag/{id}', [UndanganController::class,'verifiedKasubbag'])->name('undangan.verified-kasubbag');
    Route::post('/verified-sekban/{id}', [UndanganController::class,'verifiedSekban'])->name('undangan.verified-sekban');
    Route::post('/verified-kaban/{id}', [UndanganController::class,'verifiedKaban'])->name('undangan.verified-kaban');
    Route::post('/kasubbag-tujuan/{id}', [UndanganController::class,'kasubbagTujuan'])->name('undangan.kasubbag-tujuan');
});
Route::prefix('nota-dinas')->group(function () {
    Route::get('/', [NotaDinasController::class,'index'])->name('nota-dinas');
    Route::post('/', [NotaDinasController::class,'store'])->name('nota-dinas.store');
    Route::post('/verified-kasubbag/{id}', [NotaDinasController::class,'verifiedKasubbag'])->name('nota-dinas.verified-kasubbag');
    Route::post('/verified-sekban/{id}', [NotaDinasController::class,'verifiedSekban'])->name('nota-dinas.verified-sekban');
    Route::post('/verified-kaban/{id}', [NotaDinasController::class,'verifiedKaban'])->name('nota-dinas.verified-kaban');
    Route::post('/kasubbag-tujuan/{id}', [NotaDinasController::class,'kasubbagTujuan'])->name('nota-dinas.kasubbag-tujuan');
});