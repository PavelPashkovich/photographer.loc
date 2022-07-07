<h3>Hello {{ $userName }}!</h3>
<h4><a href="http://photographer.loc/user/{{ $messageUserId }}">
    {{ $messageAuthor }}</a> send this message to you via <a href="http://photographer.loc/" target="_blank">photographer.loc</a>:</h4>
<h4>"{{ $userMessage }}"</h4>

<p>You can reply to {{ $messageAuthorEmail }}</p>

<p>Yours sincerely, Admin <a href="http://photographer.loc/" target="_blank">photographer.loc</a></p>

