<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::resource('posts', PostController::class);

Route::post('subscribes', [SubscribeController::class, 'store'])->name('subscribes.store');
Route::delete('subscribes', [SubscribeController::class, 'destroy'])->name('subscribes.destroy');
Route::resource('authors', UserController::class);
Route::resource('comments', CommentController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('role:admin');

Route::post('reaction', [\App\Http\Controllers\LikeController::class, 'reaction'])->name('reaction');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
