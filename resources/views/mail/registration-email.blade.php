<h3>Hello {{ $name }}!</h3>
<h4>You've just registered on <a href="{{ route('main.index') }}" target="_blank">photographers.cf</a></h4>

<p>Your login: {{ $email }}</p>
<p>Your password: {{ $password }}</p>

<p>Yours sincerely, Admin <a href="{{ route('main.index') }}" target="_blank">photographers.cf</a></p>
