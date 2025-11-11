<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\StoreBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all(['title','description', 'id', 'image_path']);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Blog::class);

        return to_route('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        //
        Gate::authorize('create', Blog::class);

        $user = Auth::user();

        if ($request->hasFile('image_blog')) {
            $image_path = $request->file('image_blog')->store('image_blog', 'public');
        }

        $user->blogs()->create([
            ...$request->validated(),
            'slug' => Str::slug($request->title),
            'image_path' => $image_path
        ]);

        // Store
        // return dashboard.blog
        // return to_route('')->with('success', 'Formation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $blog = Blog::findOrFail($id);
        $talks = $blog->talks()->get(['title','description', 'id']);
        return view('blog.show', compact('blog','talks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
