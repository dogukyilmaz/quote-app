<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function like(Post $post, Request $request) // using $id is optional // but needs to make a request to db to get post first.
    {
        if ($post->likedBy($request->user())) {
            return response()->json(['success' => false, 'message' => 'Already liked the post.'], 409);
        }
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();
    }

    public function dislike(Post $post, Request $request)
    {
        $request->user()->liked()->where('post_id', $post->id)->delete();
        return back();
    }
}
