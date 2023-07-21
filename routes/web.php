<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GajiKaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;

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


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('sign-out', [AuthController::class, 'signOut'])->name('sign-out');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::resource('karyawan', KaryawanController::class);
    Route::get('karyawan/delete/{id}', [KaryawanController::class, 'delete'])->name('karyawan.delete');
    Route::resource('jabatan', JabatanController::class);
    Route::get('jabatan/delete/{id}', [JabatanController::class, 'delete'])->name('jabatan.delete');
    Route::get('gaji-karyawan', [GajiKaryawanController::class, 'index'])->name('list.gaji-karyawan');
    Route::get('export-csv/{slug}', [GajiKaryawanController::class, 'exportCSV']);
    Route::get('gaji-karyawan/detail/{id}', [GajiKaryawanController::class, 'detail'])->name('detail.gaji-karyawan');
});