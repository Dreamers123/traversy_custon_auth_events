<h1>Dear {{ $user->name }},seems like you haven't been verified yet</h1>
<p>Please verrify by clicking those links below</p>
<a href="{{ config('app.url') }}/verify/{{ $user->token }}">Click this link</a>
<br>
<p>OR</p>
<a href="http://127.0.0.1:8000/verify/{{ $user->token }}">Click this link</a>

