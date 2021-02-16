@extends('layouts.app') @section('content')
<div class="flex justify-center">
  <div class="w-3/12 bg-gray-700 p-6 rounded-lg">
    @if (session()->has('status'))
          {{-- session()->has('status') alternative --}}
          <div class="bg-red-300 mb-4 text-sm p-1 rounded-lg text-white text-center">
            {{ session('status') }}
          </div>
        @endif
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="email" class="sr-only">Email</label>
        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Email" class="bg-gray-500 border-2 w-full p-4 rounded-lg @error('email')
                    border-red-300
                    @enderror" />
        @error('email')
        <div class="text-red-300 mt-2 text-sm">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-500 border-2 w-full p-4 rounded-lg @error('password')
                    border-red-300
                    @enderror" />
        @error('password') 
        <div class="text-red-300 mt-2 text-sm">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
          Login
        </button>
      </div>
    </form>
  </div>
</div>
@endsection