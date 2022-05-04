<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Http;

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
Route::get('/Commente',[CommentController:: class,'show']);
Route::get('/signle',[CommentController:: class,'affi']);
Route::post('/Commente',[CommentController:: class,'store']);
Route::get('/edit',[CommentController:: class,'update']);
Route::get('/delet',[CommentController:: class,'delete']);

Route::get('/Report',[CommentController:: class,'Report'])->name('Report.ReportComment');

Route::post('/Report',[CommentController:: class,'ReportComment'])->name('Report.ReportComment');
//Route::post('/Commente',[CommentController:: class,'ReportComment'])->name('Report.ReportComment');
