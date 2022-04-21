<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');
//Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post.show');


// Route::get('/',function() {
//     return view('index');
// });

Route::resource("profil", ProfilController::class);
Route::resource("post",PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
