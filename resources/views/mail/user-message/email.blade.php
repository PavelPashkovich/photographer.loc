<h3>Hello {{ $userName }}!</h3>
<h4><a href="{{ route('main.index') }}/user/{{ $messageUserId }}">
    {{ $messageAuthor }}</a> send this message to you via <a href="{{ route('main.index') }}}" target="_blank">photographers.cf</a>:</h4>
<h4>"{{ $userMessage }}"</h4>

<p>You can reply to {{ $messageAuthorEmail }}</p>

<p>Yours sincerely, Admin <a href="{{ route('main.index') }}" target="_blank">photographers.cf</a></p>

