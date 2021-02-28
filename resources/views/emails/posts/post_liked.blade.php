@component('mail::message')
# Your post is on fire!

{{ $liker->name }} liked one of your posts.

@component('mail::button', ['url' => route('posts.display', $post)])
  View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
