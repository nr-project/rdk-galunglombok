<?php

use App\Http\Controllers\AbsensiPegawai;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DataManagemenController;
use App\Http\Controllers\GoogleSheetController;
use App\Http\Controllers\LaporanPegawai;
use App\Http\Controllers\SheetHarianDisiplinController;

/** for side bar menu active */
function set_active($route) {
    if (is_array($route )){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}
/** for side bar menu show */
function set_show($route) {
    if (is_array($route )){
        return in_array(Request::path(), $route) ? 'show' : '';
    }
    return Request::path() == $route ? 'show' : '';
}


Route::group(['namespace' => 'App\Http\Controllers'],function()
{
    // -------------------------- main dashboard ----------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->middleware('auth')->name('home');
    });

    Route::controller(AbsensiPegawai::class)->group(function () {
        Route::get('/absensi-harian', 'absensi_harian')->middleware('auth')->name('absensi-harian');
        Route::get('/absensi-disiplin', 'absensi_disiplin')->middleware('auth')->name('absensi-disiplin');
        Route::post('/refresh-harian-presensi', [GoogleSheetController::class, 'refresh'])->name('refresh-harian-presensi');
        Route::post('/refresh-harian-disiplin', [SheetHarianDisiplinController::class, 'refresh'])->name('refresh-harian-disiplin');
    });

    Route::controller(LaporanPegawai::class)->group(function () {
        Route::get('/laporan-presensi', 'laporan_presensi')->middleware('auth')->name('laporan-presensi');
        Route::get('/laporan-disiplin', 'laporan_disiplin')->middleware('auth')->name('laporan-disiplin');
    });
});

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');


Route::get('/read-google-sheet', [GoogleSheetController::class, 'readData']);

require __DIR__.'/auth.php';