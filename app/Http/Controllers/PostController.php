<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware(middleware: 'auth', only: ['store']),
        ];
    }

    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(10);
        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required'
        ]);

        auth()->user()->posts()->create($validated);

        return back();
    }

    public function destroy(Post $post)
    {
        if (!$post->ownedBy(auth()->user())) {
            dd('no');
        }

        $post->delete();
        return back();
    }
}
