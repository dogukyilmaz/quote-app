@props(['post' => $post])

<div class="mb-2">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
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

    @can('delete', $post)
        <form action="{{ route('posts.delete', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
    @endcan
</div>