<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('dashboard/')
    ->name('dashboard.')
    ->middleware('auth')
    ->group(function () {

    Route::get('', [App\Http\Controllers\DashboardController::class, 'indexblog'])->name('blog.index');

    Route::get('blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('blog.create');

    Route::get('blog/edit/{blog}', [App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');

    Route::get('blog/{blog}', [App\Http\Controllers\DashboardController::class, 'showblog'])->name('blog.show');

    Route::post('blog', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');

    Route::delete('blog/{blog}/destroy', [App\Http\Controllers\BlogController::class, 'destroy'])->name('blog.destroy');

    Route::put('blog/{blog}/restore', [App\Http\Controllers\BlogController::class, 'restore'])->withTrashed()->name('blog.restore');

    Route::put('blog/{blog}/update', [App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');
});


Route::get('/blog/{blog:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
// Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->can('update', Blog::class);
// Route::get('/blog', function () {
//     return view('blog.index');
// });

// /blog/{blog:slug}/talk
// /blog/{blog:slug}/talk/{talk:slug}

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
