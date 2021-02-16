<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quote App</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-800 text-white">
  <nav class="p-6 bg-dark flex justify-between mb-6">
    <ul class='flex items-center'>
      <li>
        <a class='p-3' href="{{ route('home') }}">Home</a>
      </li>
      @auth
      <li>
        <a class='p-3' href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a class='p-3' href="{{ route('posts') }}">Post</a>
      </li>
     @endauth
    </ul>
    <ul class='flex items-center'>

      @auth
      <li>
        <a class='p-3' href="">{{ auth()->user()->name }}</a>
      </li>
      <li>
        <form action=" {{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">Logout</button>
          </form>
      </li>
      @endauth
      @guest
      <li>
        <a class='p-3' href="{{ route('login') }}">Login</a>
      </li>
      <li>
        <a class='p-3' href="{{ route('register') }}">Register</a>
      </li>
      @endguest
    </ul>

  </nav>
  @yield('content')
</body>

</html>