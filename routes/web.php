<?php

use App\Http\Controllers\UsulanKerjasamaController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DataUserController;
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

Route::get('/', function () {
	return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');


Route::middleware('auth:sanctum')->group(function () {
	// Route::resource('kerjasama', KerjasamaController::class);
	Route::group(['middleware' => ['admin']], function () {
		Route::resource('riwayat', RiwayatController::class);
		Route::resource('data_user', DataUserController::class);
		Route::get('usulan_kerjasama/{accepted}/accepted', [UsulanKerjasamaController::class, 'accepted'])->name('accepted');
		Route::get('usulan_kerjasama/{rejected}/rejected', [UsulanKerjasamaController::class, 'rejected'])->name('rejected');
	});
	Route::resource('kerjasama', KerjasamaController::class);
	Route::resource('usulan_kerjasama', UsulanKerjasamaController::class);
});
