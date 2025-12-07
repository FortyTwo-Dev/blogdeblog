<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('dashboard/')->name('dashboard.')->middleware('auth')->group(function () {
    Route::name('blog.')->group(function () {
        Route::get('blog', [App\Http\Controllers\DashboardController::class, 'indexblog'])->name('index');
        Route::get('blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('create');
        Route::get('blog/{blog}', [App\Http\Controllers\DashboardController::class, 'showblog'])->name('show');
        Route::get('blog/edit/{blog}', [App\Http\Controllers\BlogController::class, 'edit'])->name('edit');
        Route::post('blog', [App\Http\Controllers\BlogController::class, 'store'])->name('store');
        Route::delete('blog/{blog}/destroy', [App\Http\Controllers\BlogController::class, 'destroy'])->name('destroy');
        Route::put('blog/{blog}/restore', [App\Http\Controllers\BlogController::class, 'restore'])->withTrashed()->name('restore');
        Route::put('blog/{blog}/update', [App\Http\Controllers\BlogController::class, 'update'])->name('update');
    
        Route::prefix('blog/{blog}/')->name('talk.')->group(function () {

            Route::get('talk/create', [App\Http\Controllers\TalkController::class, 'create'])->name('create');
            Route::get('talk/{talk}', [App\Http\Controllers\DashboardController::class, 'showtalk'])->name('show');
            Route::get('talk/edit/{talk}', [App\Http\Controllers\TalkController::class, 'edit'])->name('edit');
            Route::post('talk', [App\Http\Controllers\TalkController::class, 'store'])->name('store');
            Route::delete('talk/{talk}/destroy', [App\Http\Controllers\TalkController::class, 'destroy'])->name('destroy');
            Route::put('talk/{talk}/restore', [App\Http\Controllers\TalkController::class, 'restore'])->withTrashed()->name('restore');
            Route::put('talk/{talk}/update', [App\Http\Controllers\TalkController::class, 'update'])->name('update');

        });
    
    });
});

Route::prefix('blog/')->name('blog.')->group(function () {
    Route::get('search', [App\Http\Controllers\BlogController::class, 'search'])->name('search');
    Route::get('{blog:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('show');
    Route::get('', [App\Http\Controllers\BlogController::class, 'index'])->name('index');

    Route::prefix('{blog:slug}/talk')->name('talk.')->group(function () {
        Route::get('{talk:slug}' , [App\Http\Controllers\TalkController::class, 'show'])->name('show');
        Route::get('' , [App\Http\Controllers\TalkController::class, 'index'])->name('index');
    });
});

// Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->can('update', Blog::class);
// Route::get('/blog', function () {
//     return view('blog.index');
// });

// /blog/{blog:slug}/talk
// /blog/{blog:slug}/talk/{talk:slug}

