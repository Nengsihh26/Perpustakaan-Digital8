<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Authors\AuthorController;
use App\Http\Controllers\Books\BooksController;
use App\Http\Controllers\Pengunjung\PengunjungController;
use App\Http\Controllers\Users\UserController;
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

// Route::get('/users', function () {
//     // return view('users/user');

// });

Route::group(['prefix' => 'users'], function () {
    Route::get('/index', [UserController::class, 'index']);
});
Route::group(['prefix' => 'books'], function () {
    Route::get('/index', [BooksController::class, 'index']);
    Route::get('/get-books', [BooksController::class, 'getBooks']); // Tambahkan route baru untuk mendapatkan data buku
    Route::post('/save-book', [BooksController::class, 'saveBook']);
    Route::delete('/delete-book', [BooksController::class, 'deleteBook']);
});

Route::group(['prefix' => 'authors'], function () {
    Route::get('/index', [AuthorController::class, 'index']);
    Route::get('/get-authors', [AuthorController::class, 'getAuthors']); // Tambahkan route baru untuk mendapatkan data penulis
    Route::post('/save-authors', [AuthorController::class, 'saveAuthors']);
});

Route::group(['prefix' => 'pengunjung'], function () {
    Route::get('/index', [PengunjungController::class, 'index']);
    Route::get('/get-pengunjung', [PengunjungController::class, 'getPengunjung']); // Tambahkan route baru untuk mendapatkan data pengunjung
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [LoginController::class, 'index']);
});

