<h1>Thank you for Singning Up {{ $user->name }}</h1>
<p>Please verrify</p>
<a href="{{ config('app.url') }}/verify/{{ $user->token }}">Click this link</a>
<br>
<p>OR</p>
<a href="http://127.0.0.1:8000/verify/{{ $user->token }}">Click this link</a>

