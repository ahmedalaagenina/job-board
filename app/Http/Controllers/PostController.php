<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->cursorPaginate(10);

        return view('post.index', ['posts' => $posts, 'title' => 'Posts']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ['title' => 'Create Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->getAuthIdentifier();
        $post = Post::create($validated);

        return redirect()->route('blog.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('post.show', ['post' => $post, 'title' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view('post.edit', ['post' => $post, 'title' => 'Edit Post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, Post $post)
    {
        if (! $post) {
            return redirect()->route('blog.index')->with('error', 'Post not found Or May Have Been Deleted.');
        }
        // Gate::authorize('update', $post);
        $validated = $request->validated();
        $post->update($validated);

        return redirect()->route('blog.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        if (! $post) {
            return redirect()->route('blog.index')->with('error', 'Post not found Or May Have Been Deleted.');
        }
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Post deleted successfully.');
    }
}
