<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\UsersController;
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
Auth::routes();

Route::get('/gioithieu', [TinController::class, 'gioithieu'])->name('giothieu');
Route::get('content/{id}', [TinController::class, 'loadAll'])->name('content');
Route::get('chiTiet/{id}', [TinController::class, 'chiTiet'])->name('chiTiet');
Route::get('lienHe', [TinController::class, 'lienHe'])->name('lienHe');
Route::get('search', [TinController::class, 'search'])->name('search');
Route::post('comments/{tin_id}', [TinController::class, 'store'])->name('comments.store')->middleware('auth');


Route::get('/', [TinController::class, 'index'])->name('home');
Route::get('/adminHome', [AdminController::class, 'index'])->name('admin');
Route::resource('category', CategoryController::class);
Route::resource('tin', ArticleController::class);
Route::resource('comment', CommentController::class)->middleware('auth');
Route::resource('user', UsersController::class);
Route::get('searchAdmin', [AdminController::class, 'search'])->name('searchAdmin');

