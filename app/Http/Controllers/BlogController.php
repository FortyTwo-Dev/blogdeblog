<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;
use \Illuminate\Http\Request;
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
    public function index(): View
    {
        Gate::authorize('viewAny', Blog::class);
        $blogs = Blog::all(['title', 'slug', 'description', 'id', 'image_path']);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Search blogs
     */
    public function search(Request $request): View
    {
        Gate::authorize('viewAny', Blog::class);
        $query = $request->get('search', '');
        $blogs = Blog::where('title', 'like', "%{$query}%")
                     ->orWhere('description', 'like', "%{$query}%")
                     ->get(['title', 'slug', 'description', 'id', 'image_path']);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        Gate::authorize('create', Blog::class);

        $themes = [
            'base',
            'light-blue',
            'light-yellow',
            'light-green',
            'light-pink',
            'light-purple',
            'light-orange',
            'light-red',
            'dark-blue',
            'dark-yellow',
            'dark-green',
            'dark-pink',
            'dark-purple',
            'dark-orange',
            'dark-red',
        ];
        
        return view('dashboard.blog.create', compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
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

        return to_route('dashboard.blog.index')->with('success', 'Blog créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): View
    {
        // $blog = Blog::findOrFail($blog->id);
        $blog = Blog::where('slug', $slug)->firstOrFail();
        Gate::authorize('view', $blog);

        $talks = $blog->talks()->get(['title', 'description', 'content', 'id']);
        return view('blog.show', compact('blog','talks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        Gate::authorize('update', $blog);

        $themes = [
            'base',
            'light-blue',
            'light-yellow',
            'light-green',
            'light-pink',
            'light-purple',
            'light-orange',
            'light-red',
            'dark-blue',
            'dark-yellow',
            'dark-green',
            'dark-pink',
            'dark-purple',
            'dark-orange',
            'dark-red',
        ];

        return view('dashboard.blog.edit', compact('blog', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Blog $blog)
    {
        Gate::authorize('update', $blog);

        $data = [
            ...$request->validated(),
            'slug' => Str::slug($request->title),
        ];

        if ($request->hasFile('image_blog')) {
            $image_path = $request->file('image_blog')->store('image_blog', 'public');
            $data['image_path'] = $image_path;
        }

        $blog->update($data);

        return to_route('dashboard.blog.index')->with('success', 'Blog modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Gate::authorize('delete', $blog);

        $blog->delete();

        return to_route('dashboard.blog.index')->with('success', 'Blog supprimé avec succès.');
    }

    public function restore(Blog $blog) {

        Gate::authorize('restore', $blog);
        
        $blog->restore();

        return to_route('dashboard.blog.index')->with('success', 'Blog restoré avec succès.');
    }
}
