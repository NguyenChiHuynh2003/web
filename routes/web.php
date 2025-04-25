<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route gốc
Route::get('/', [WebController::class, 'index'])->name('home');

// Route về trang giới thiệu
Route::get('/about', [WebController::class, 'about'])->name('about');

// Route liên quan đến bài viết
Route::get('/posts', [WebController::class, 'posts'])->name('posts.index');
Route::get('/posts/{post}', [WebController::class, 'show'])->name('posts.show');

// Route dashboard
Route::get('/dashboard', [WebController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Routes bảo vệ bởi middleware 'auth'
Route::middleware('auth')->group(function () {
    // Route về thông tin tài khoản
    Route::get('/account', [WebController::class, 'account'])->name('account');
    Route::post('/account', [AccountController::class, 'update'])->name('account.update');

    // Route về hồ sơ người dùng
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route đăng xuất
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Chuyển hướng về trang đăng nhập
})->name('logout');

// Tệp xác thực
require __DIR__.'/auth.php';
