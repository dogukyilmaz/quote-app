@extends('layouts.app') @section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-gray-700 p-6 rounded-lg">
        <form action="{{route('posts') }}" method="post">
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
    </div>
</div>
@endsection