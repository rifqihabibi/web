<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [BookController::class, 'tampil'])->name('books.tampil');
Route::get('/books/show/{id}', [BookController::class, 'show']);

// Route::get('/about', function () {
//     return view('about', [
//         "title" => "About",
//         "nama" => "Muhammad Agi Febi Faisal",
//         "email" => "3103120140@student.smktelkom-pwt.sch.id",
//         "gambar" => "Agi2.jpeg"
//     ]);
// });

Route::get('/gallery', function () {
    return view('gallery', [
        "title" => "Gallery"
    ]);
});
//Route::resource('/books', BookController::class);

// Route::get('books/search', [BookController::class, 'search']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/books/index', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/books/{id}/update', [BookController::class, 'update'])->name('books.update');
    Route::get('/books/{id}/destroy', [BookController::class, 'destroy'])->name('books.destroy');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/export-buku', [BookController::class, 'export_excel'])->name('export');
    Route::get('/exportpdf', [BookController::class, 'exportpdf'])->name('exportpdf');

});