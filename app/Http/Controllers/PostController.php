<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

	public function __construct()
	{
		// except, only etc...
		$this->middleware(['auth'])->only('post', 'delete');
	}

	public function index()
	{
		// Collection // all posts // ::where ::find(id) etc. eloquent
		// ->orderBy('created_at', 'desc') alternative latest()
		$posts = Post::latest()->with(['user', 'likes'])->paginate(10);
		// dd($posts);
		return view('posts.index', [
			'posts' => $posts
		]);
	}

	public function display(Post $post)
	{
		return view('posts.display', [
			'post' => $post
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

	public function delete(Post $post)
	{
		$this->authorize('delete', $post);
		$post->delete();
		return back();
	}
}
