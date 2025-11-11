<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexblog()
    {
        $user = Auth::user();

        $blogs = $user->blogs()->get(['id', 'title']);

        return view('dashboard.blog.index', compact('blogs'));
    }

    public function showblog(Blog $blog)
    {
        $user = Auth::user();

        if ($blog->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $talks = $blog->talks()->get(['id', 'title', 'description']);

        return view('dashboard.blog.show', compact('blog', 'talks'));
    }
}
