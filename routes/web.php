<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CreatePostinganController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\CreatePostinganController::class, 'index'])->name('create');
Route::get('/lihatpostingan', [App\Http\Controllers\LihatPostinganController::class, 'index'])->name('lihatpostingan');
Route::get('/explore', [App\Http\Controllers\LihatPostinganController::class, 'explore'])->name('explore');
Route::get('/edit/{id}', [App\Http\Controllers\EditController::class, 'edit'])->name('edit');
Route::post('/addpost', [PostController::class, 'addpost'])->name('addpost');
Route::post('/addcomment', [CommentController::class, 'addcomment'])->name('addcomment');


Route::post('/updatedata/{id}', [PostController::class, 'updatedata'])->name('updatedata');
Route::get('delete/{id}', [PostController::class, 'delete'])->name('delete');
