<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Talk;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexblog()
    {
        $user = Auth::user();

        $blogs = $user->blogs()->withTrashed()->get(['id', 'title', 'deleted_at']);

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

    // public function showtalk(Blog $blog, Talk $talk)
    // {
    //     $user = Auth::user();

    //     if ($blog->user_id !== $user->id && $blog->id == $talk->blog_id) {
    //         abort(403, 'Unauthorized action.');
    //     }

    //     $talk = $talk->get(['id', 'title', 'description']);

    //     return view('dashboard.blog.talk.show', compact('blog', 'talk'));
    // }
}
