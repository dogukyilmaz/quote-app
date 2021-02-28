@extends('layouts.app') @section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-gray-700 p-6 rounded-lg">
       @auth
       <form action="{{route('posts') }}" method="post" class="mb-4">
					@csrf
					<div class="mb-4">
							<label for="content" class="sr-only">Content</label>
							<textarea name="content" id="content" cols="30" rows="4" class="bg-gray-500 w-full p-4 rounded-lg @error('content')
							border-red-500                
							@enderror"></textarea>
							@error('content')
							<div class="text-red-500 mt-2 text-sm">
									{{ $message }}
							</div>
							@enderror
					</div>
					<div>
							<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
									Post
							</button>
					</div>
    		</form>
       @endauth
			 @guest
			 <div class="mb-4">
				 <h2 class="text-blue-500"><a href="{{ route('login') }}" class="font-bold">Login</a> to post anything.</h2>
				</div>
			 @endguest
			 

        @if ($posts->count())
            @foreach ($posts as $post) 
            {{-- each one is Post models --}}
                <div class="mb-2">
                    <a href="" class="font-bold">{{ $post->user->name }}</a>
                    <span class="text-gray-400 text-xs">{{ $post->created_at->diffForHumans() }}</span>
                    <p class="mb-2">{{ $post->content }}</p>

                    <div class="flex items-center">
                        @auth
                            @if ($post->likedBy(auth()->user()))
                            <form action="{{ route('posts.likes', $post)}}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400">Dislike</button>
                            </form>
                            @else
                            <form action="{{ route('posts.likes', $post)}}" method="post" class="mr-1">
                                @csrf
                                <button type="submit" class="text-blue-400">Like</button>
                            </form>
                            @endif
                        @endauth
                        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                    </div>

										@if ($post->ownedBy(auth()->user()))
											<div>
												<form action="{{ route('posts.delete', $post) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit" class="text-red-500">Delete</button>
												</form>
											</div>
										@endif
                </div>
            @endforeach
            {{ $posts->links() }}
        @else
            <p>There are no post yet.</p>
        @endif
    </div>
</div>
@endsection