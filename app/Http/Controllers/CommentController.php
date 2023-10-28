<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        // Validasi input komentar
        $this->validate($request, [
            'comment' => 'required',
        ]);

        // Simpan komentar ke database
        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->body = $request->comment;
        $comment->save();

        return redirect()->route('mypost.show', ['post' => $comment->post->slug]);
    }

    public function destroy(Comment $comment)
    {
        // Hanya pemilik komentar atau admin yang dapat menghapusnya

    }
}
