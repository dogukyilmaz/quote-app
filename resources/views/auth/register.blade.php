@extends('layouts.app') @section('content')
<div class="flex justify-center">
	<div class="w-3/12 bg-gray-700 p-6 rounded-lg">
		<form action="{{ route('register') }}" method="POST">
			@csrf
			<div class="mb-4">
				<label for="name" class="sr-only">Name</label>
				<input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name" class="bg-gray-500 border-2 w-full p-4 rounded-lg @error('name')
                    border-red-300
                    @enderror" />
				@error('name')
				<div class="text-red-300 mt-2 text-sm">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="mb-4">
				<label for="username" class="sr-only">Username</label>
				<input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Username" class="bg-gray-500 border-2 w-full p-4 rounded-lg @error('username')
                    border-red-300
                    @enderror" />
				@error('username')
				<div class="text-red-300 mt-2 text-sm">
					{{ $message }}
				</div>
				@enderror
			</div>
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
				<input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password" class="bg-gray-500 border-2 w-full p-4 rounded-lg @error('password')
                    border-red-300
                    @enderror" />
				@error('password')
				<div class="text-red-300 mt-2 text-sm">
					{{ $message }}
				</div>
				@enderror
			</div>
			<div class="mb-4">
				<label for="password_confirmation" class="sr-only">Password (again)</label>
				<input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Password (again)" class="bg-gray-500 border-2 w-full p-4 rounded-lg @error('password_confirmation')
                    border-red-300
                    @enderror" />
				@error('password_confirmation')
				<div class="text-red-300 mt-2 text-sm">
					{{ $message }}
				</div>
				@enderror
			</div>
			<div>
				<button type="submit" class="bg-pink-500 text-white px-4 py-3 rounded font-medium w-full">
					Register
				</button>
			</div>
		</form>
	</div>
</div>
@endsection