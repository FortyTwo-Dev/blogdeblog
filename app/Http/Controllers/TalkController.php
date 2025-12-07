<?php

namespace App\Http\Controllers;

use App\Http\Requests\Talk\StoreRequest;
use App\Http\Requests\Talk\UpdateRequest;
use App\Models\Blog;
use App\Models\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Blog $blog)
    {
        return view('dashboard.blog.talk.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Blog $blog)
    {
        //$user = Auth::user();

        if ($request->hasFile('image_talk')) {
            $image_path = $request->file('image_talk')->store('image_talk', 'public');
        }

        $blog->talks()->create([
            ...$request->validated(),
            'slug' => Str::slug($request->title),
            'image_path' => $image_path
        ]);

        return to_route('dashboard.blog.show', $blog)->with('success', 'Blog créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Talk $talk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog, Talk $talk)
    {
        return view('dashboard.blog.talk.edit', compact('blog','talk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Blog $blog, Talk $talk)
    {
        $data = [
            ...$request->validated(),
            'slug' => Str::slug($request->title),
        ];

        if ($request->hasFile('image_talk')) {
            $image_path = $request->file('image_talk')->store('image_talk', 'public');
            $data['image_path'] = $image_path;
        }

        $talk->update($data);

        return to_route('dashboard.blog.show', $blog)->with('success', 'Blog modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talk $talk, Blog $blog)
    {
        $talk->delete();
        return redirect()->back()->with('success', 'Discution supprimée avec succès.');
    }

    public function restore(Talk $talk, Blog $blog) {
        
        $talk->restore();
        return redirect()->back()->with('success', 'Discution restorée avec succès.');
    }
}
