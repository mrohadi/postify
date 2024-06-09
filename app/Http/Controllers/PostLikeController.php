<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware(middleware: 'auth'),
        ];
    }

    public function store(Post $post, Request $request)
    {
        if ($post->likeBy($request->user())) {
            return response(null, 409);
        }
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        // only send an email to never liked post before,
        // here we are using soft delete to check if the post unlike before,
        // if the post not unlike before, then send the email

        // $url = route('posts.show', $post);
        // dd($url);
        if (!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($post->user)->queue((new PostLiked(auth()->user(), $post))->afterCommit());
        }

        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
