<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard/', [App\Http\Controllers\DashboardController::class, 'indexblog'])->middleware('auth')->name('dashboard.blog.index');

Route::get('dashboard/blog/{blog}', [App\Http\Controllers\DashboardController::class, 'showblog'])->middleware('auth')->name('dashboard.blog.show');

Route::get('dashboard/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->middleware('auth')->name('dashboard.blog.create');

Route::post('dashboard/blog', [App\Http\Controllers\BlogController::class, 'store'])->middleware('auth')->name('blog.store');
// Route::get('dashboard/blog/{blog}/update', [App\Http\Controllers\BlogController::class, 'update'])->can('update', 'blog');

Route::get('/blog/{blog:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
// Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->can('update', Blog::class);
// Route::get('/blog', function () {
//     return view('blog.index');
// });

// /blog/{blog:slug}/talk
// /blog/{blog:slug}/talk/{talk:slug}

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
