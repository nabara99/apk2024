<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\DptController;
use App\Http\Controllers\DptTps;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\UserController;
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
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class)->middleware('userAccess:admin');
    Route::resource('desa', DesaController::class)->middleware('userAccess:admin');
    Route::resource('dpt', DptController::class)->middleware('userAccess:admin');
    Route::resource('tps', TpsController::class)->middleware('userAccess:kpps');

    Route::resource('dpttps', DptTps::class)->middleware('userAccess:kpps');
    Route::post('/dpt/update-status/{id}', [DptTps::class, 'updateStatus'])->middleware('userAccess:kpps');

});
