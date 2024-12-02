<?php

use App\Models\Book;
use App\Models\User;
use App\Models\pinjamBuku;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Requests\ProfileUpdateRequest;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalBuku = Book::sum('jumlah_stock');
    $totalPinjam = pinjamBuku::count();
    $totalDiperiksa = User::sum('buku_diperiksa');
    $totalRusak = User::sum('buku_rusak');

    return view('dashboard', compact('totalBuku', 'totalPinjam', 'totalDiperiksa', 'totalRusak'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:admin']], function (){
    route::resource('/search', BookController::class)->names(['index' => 'search']);
    Route::get('log', [BookController::class, 'log'])->name('books.log');

    Route::put('/riwayat/perpanjang/{id}',[bookController::class,'perpanjang'])->name('books.perpanjang');
    Route::get('/admin/riwayat', [BookController::class, 'riwayat'])->name('books.riwayat');
    Route::patch('/admin/riwayat/{id}', [BookController::class, 'updateRiwayat'])->name('books.update.riwayat');
    Route::delete('/admin/riwayat/{id}', [BookController::class, 'deleteRiwayat'])->name('books.delete.riwayat');
    Route::delete('/admin/riwayat-destroy/{id}', [BookController::class, 'destroyRiwayat'])->name('books.destroy.riwayat');
    Route::resource('books', BookController::class);
    Route::resource('users', UsersController::class);
});


Route::group(['middleware' => ['auth', 'role:anggota']], function (){
    Route::resource('anggota', AnggotaController::class);
    // Route::get('/riwayat', [BookController::class])->name('books.riwayat');
    Route::get('/riwayat', [AnggotaController::class, 'riwayat'])->name('anggota.riwayat');
});

require __DIR__.'/auth.php';
