<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;


class PostController extends Controller
{
    public function index()
    {
        // untuk eager loading, jangan ditaruh di model nanti error
        $posts = Post::with(['author', 'category'])->latest();

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        return view('posts.index', [
            'title' => 'All Posts',
            'posts' => $posts->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->latest('created_at')->get();
        return view('posts.show', [
            'title' => 'single post',
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
