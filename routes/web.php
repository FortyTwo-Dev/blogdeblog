<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('dashboard/', [App\Http\Controllers\DashboardController::class, 'indexblog'])->middleware('auth')->name('dashboard.blog.index');

Route::get('dashboard/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->middleware('auth')->name('dashboard.blog.create');

Route::get('dashboard/blog/edit/{blog}', [App\Http\Controllers\BlogController::class, 'edit'])->middleware('auth')->name('dashboard.blog.edit');

Route::get('dashboard/blog/{blog}', [App\Http\Controllers\DashboardController::class, 'showblog'])->middleware('auth')->name('dashboard.blog.show');

Route::post('dashboard/blog', [App\Http\Controllers\BlogController::class, 'store'])->middleware('auth')->name('blog.store');

Route::delete('dashboard/blog/{blog}/destroy', [App\Http\Controllers\BlogController::class, 'destroy'])->name('blog.destroy');

Route::put('dashboard/blog/{blog}/restore', [App\Http\Controllers\BlogController::class, 'restore'])->withTrashed()->name('blog.restore');

// Route::put('dashboard/blog/edit/{blog}', [App\Http\Controllers\BlogController::class, 'update'])->middleware('auth')->name('blog.update');
Route::put('dashboard/blog/{blog}/update', [App\Http\Controllers\BlogController::class, 'update'])->middleware('auth')->name('blog.update');

Route::get('/blog/{blog:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
// Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->can('update', Blog::class);
// Route::get('/blog', function () {
//     return view('blog.index');
// });

// /blog/{blog:slug}/talk
// /blog/{blog:slug}/talk/{talk:slug}

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
