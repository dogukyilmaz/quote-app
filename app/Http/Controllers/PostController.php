<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		return view('posts.index');
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
