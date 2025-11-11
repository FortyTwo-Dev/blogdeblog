<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class DashboardController extends Controller
{
    public function indexblog()
    {
        $blogs = Blog::all(['id', 'title']);

        return view('dashboard.blog.index', compact('blogs'));
    }

    public function showblog(Blog $blog)
    {
        $talks = $blog->talks()->get(['id', 'title', 'description']);

        return view('dashboard.blog.show', compact('blog', 'talks'));
    }
}
