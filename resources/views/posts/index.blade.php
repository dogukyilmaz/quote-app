@extends('layouts.app') @section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-gray-700 p-6 rounded-lg">
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

        @if ($posts->count())
            @foreach ($posts as $post) 
            {{-- each one is Post models --}}
                <div class="mb-2">
                    <a href="" class="font-bold">{{ $post->user->name }}</a>
                    <span class="text-gray-400 text-xs">{{ $post->created_at->diffForHumans() }}</span>
                    <p class="mb-2">{{ $post->content }}</p>
                </div>
            @endforeach
            {{ $posts->links() }}
        @else
            <p>There are no post yet.</p>
        @endif
    </div>
</div>
@endsection