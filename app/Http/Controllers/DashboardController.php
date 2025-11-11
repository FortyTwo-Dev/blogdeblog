<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class DashboardController extends Controller
{
    public function show()
    {
        $blogs = Blog::all(['id', 'title']);

        return view('dashboard.index', compact('blogs'));
    }
}
