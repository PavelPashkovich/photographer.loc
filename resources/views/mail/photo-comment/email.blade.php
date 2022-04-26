<h3>Hello {{ $photoAuthorName }}</h3>
<h4><a href="http://photographer.loc/user/{{ $commentUserId }}">
    {{ $messageAuthor }}</a> has left comment "{{ $commentMessage }}" to your photo
    <a href="http://photographer.loc/photo/{{ $photoId }}" target="_blank">{{ $photoName }}</a>
    on <a href="http://photographer.loc/" target="_blank">photographer.loc</a></h4>

<p>Yours sincerely, Admin <a href="http://photographer.loc/" target="_blank">photographer.loc</a></p>

