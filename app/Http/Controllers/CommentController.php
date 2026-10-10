<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('comment.index', ['comments' => $comments, 'title' => 'Comments']);
    }

    public function show(int $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comment.show', ['comment' => $comment]);

    }

    public function create()
    {
        Comment::create([
            'author' => 'AG',
            'content' => 'This is a new comment.',
            'post_id' => 2,
        ]);

        return redirect('/blog');

    }
}
