<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        return view('comment.index', ['comments' => $comments, 'title' => 'Comments']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('comment.create', ['title' => 'Create Comment']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $blog)
    {
        $post = Post::findOrFail($blog);

        $validated = $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->comments()->create($validated);

        return back()->with('success', 'Comment Added Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comment.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comment.edit', ['comment' => $comment, 'title' => 'Edit Comment']);
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
