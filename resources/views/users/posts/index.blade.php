@extends('layouts.app') @section('content')
<div class="flex justify-center">
  <div class="w-8/12">
    <div class="p-6">
      <h2 class="text-2xl font-medium mb-1">{{ $user->name }}</h2>
      <p>
        <span>Post: {{ $posts->count() }}</span>
        <span>Likes: {{ $likeCount }}</span>
        <span>Liked: {{ $user->likes()->count() }}</span>
      </p>
    </div>

    <div class=" bg-gray-700 p-6 rounded-lg">
      @if ($posts->count())
      @foreach ($posts as $post) 
      {{-- each one is Post models --}}
          <x-post :post="$post"/>
      @endforeach
      {{ $posts->links() }}
      @else
          <p>{{ $user->name}} does not have any post yet.</p>
      @endif
    </div>
  </div>
</div>
@endsection