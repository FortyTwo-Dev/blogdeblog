<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->can('create', Blog::class);