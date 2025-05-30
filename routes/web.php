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
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');

require __DIR__.'/auth.php';
