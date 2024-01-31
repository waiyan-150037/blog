<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Article\CommentController;
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

Route::get('/', [ArticleController::class,"index"]);

Route::get('/home', [ArticleController::class,"index"]);

Auth::routes();

Route::get('/articles', [ArticleController::class, 'index'])->name('home');

Route::get('/articles/detail/{id}',[ArticleController::class,"detail"]);

Route::get('/articles/delete/{id}',[ArticleController::class,"delete"]);

Route::get('/articles/add',[ArticleController::class,"add"]);

Route::post('/articles/add',[ArticleController::class,"create"]);

Route::post('/comments/add',[CommentController::class,"create"]);

Route::get('/comments/delete/{id}',[CommentController::class,"delete"]);