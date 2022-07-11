<h3>Hello {{ $photoAuthorName }}</h3>
<h4><a href="{{ route('main.index') }}/user/{{ $commentUserId }}">
    {{ $messageAuthor }}</a> has left comment "{{ $commentMessage }}" to your photo
    <a href="{{ route('main.index') }}/photo/{{ $photoId }}" target="_blank">{{ $photoName }}</a>
    on <a href="{{ route('main.index') }}" target="_blank">photographers.cf</a></h4>

<p>Yours sincerely, Admin <a href="{{ route('main.index') }}" target="_blank">photographers.cf</a></p>

