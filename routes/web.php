<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UlasanController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', [BukuController::class, 'landing'])->name('welcome');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::group(['middleware' => 'role:admin,petugas'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('buku', BukuController::class);
    Route::resource('/pinjam', PeminjamanController::class);
    Route::get('pinjam-cetak', [PeminjamanController::class, 'cetak']);
    Route::resource('user', UserController::class);

    Route::resource('kategori', KategoriController::class);
});

Route::group(['middleware' => 'role:peminjam'], function () {
    Route::get('/Buku/detail/{slug}', [KoleksiController::class, 'create']);
    Route::post('/koleksi', [KoleksiController::class, 'store'])->name('koleksi.store');
    Route::delete('koleksi/{id}', [KoleksiController::class, 'destroy'])->name('koleksi.delete');
    Route::get('/koleksi', [KoleksiController::class, 'index']);
    Route::post('ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
});

Route::get('/List-Buku', [BukuController::class, 'list']);






// Route::get('/koleksi/index', [KoleksiController::class, 'index']);


require __DIR__ . '/auth.php';
