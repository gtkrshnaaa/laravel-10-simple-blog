<?php
// routes/web.php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LogoutController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to the
| "web" middleware group, which contains the middleware group "web".
| Now create something great!
|
*/

// Rute untuk mengarahkan root URL ke halaman home
Route::redirect('/', '/home');

// Rute untuk halaman login dan register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('auth.logout');


// Rute resource untuk artikel dalam dasbor
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('dashboard.articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('dashboard.articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('dashboard.articles.store');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('dashboard.articles.show');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('dashboard.articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('dashboard.articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('dashboard.articles.destroy');
});

// Rute untuk halaman home
Route::get('/home', [ArticleController::class, 'home'])->name('home');
