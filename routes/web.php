<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/', [TinController::class, 'index'])->name('home');
Route::get('/gioithieu', [TinController::class, 'gioithieu'])->name('giothieu');
Route::get('content/{id}', [TinController::class, 'loadAll'])->name('content');
Route::get('chiTiet/{id}', [TinController::class, 'chiTiet'])->name('chiTiet');
Route::get('lienHe', [TinController::class, 'lienHe'])->name('lienHe');
Route::get('search', [TinController::class, 'search'])->name('search');
// Route::post('/comments/create', [CommentController::class, 'create'])->name('comments.create');
// Route::post('/comments', [CommentController::class, 'store'])->middleware('auth');
Route::post('comments/{tin_id}', [TinController::class, 'store'])->name('comments.store')->middleware('auth');

// Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('homeAdmin', [AdminController::class, 'index'])->name('admin');
