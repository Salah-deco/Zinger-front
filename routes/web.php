<?php

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Mail\IdeaStatusUpdatedMailable;
use App\Mail\testMail;

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

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');;
Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
Route::get('/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('idea.show');

// Route for Mailing
// Route::get('/email', function(){
//     return new IdeaStatusUpdatedMailable(Idea::find(87));
// });

Route::get('/email', [MailController::class, 'sendMail']);

// Route::get('/', function () {
//     return view('index', [
//         'ideas' => Idea::all(),
//         'categories' => Category::all()
//     ]);
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
// Route::get('/ideas/{idea}', [IdeaController::class, 'show']); //->name('idea.show');




require __DIR__.'/auth.php';
