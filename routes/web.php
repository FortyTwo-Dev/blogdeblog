<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard/', [App\Http\Controllers\DashboardController::class, 'show'])->middleware('auth');
Route::get('dashboard/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->can('create', Blog::class)->name('blog.create');
// Route::get('dashboard/blog/{id}/update', [App\Http\Controllers\BlogController::class, 'update'])->can('update', Blog::class);

Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
// Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->can('update', Blog::class);
Route::get('/blog', function () {
    return view('blog.index');
});
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
