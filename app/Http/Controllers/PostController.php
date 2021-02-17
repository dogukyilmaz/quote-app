<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		// Collection
		$posts = Post::get()->sortByDesc('created_at'); // all posts // ::where ::find(id) etc. eloquent
		return view('posts.index', [
			'posts' => $posts
		]);
	}

	public function post(Request $req)
	{
		$this->validate($req, [
			'content' => 'required'
		]);

		// Post::create([
		// 	'user_id' => auth()->id(),
		// 	'content' => $req->content,
		// ]);

		// auth()->user()->post()->create();

		$req->user()->posts()->create($req->only('content'));

		return back();
	}
}
