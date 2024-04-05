<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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
    return view('home');
})->name('home');

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*Route::view('posts/create', 'posts.create');
Route::view('posts/{post}/edit', 'posts.edit');*/

Route::get('/posts/create', \App\Livewire\CreatePost::class)->name('posts.create');
Route::get('/help', \App\Livewire\ShowHelp::class);
Route::get('/posts', \App\Livewire\ShowPosts::class)->name('posts');
Route::get('/comments', \App\Livewire\ShowComments::class);
Route::get('post/{post}', \App\Livewire\ViewPost::class);

Route::get('products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('products/create', \App\Livewire\ProductsCreate::class)->name('products.create');
Route::get('products/{product}/edit', \App\Livewire\ProductsEdit::class)->name('products.edit');

