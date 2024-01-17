<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SearchSubController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\SubSelectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('pages.auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class)->middleware('userAccess:admin');
    Route::resource('program', ProgramController::class)->middleware('userAccess:user');
    Route::resource('kegiatan', KegiatanController::class)->middleware('userAccess:user');
    Route::resource('sub', SubController::class)->middleware('userAccess:user');
    Route::resource('rekening', RekeningController::class)->middleware('userAccess:user');
    Route::resource('anggaran', AnggaranController::class)->middleware('userAccess:user');
});
