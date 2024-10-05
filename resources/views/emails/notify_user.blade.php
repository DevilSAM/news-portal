<p>Привет, {{ $user_name }}!</p>
<p>Посмотри, какие игры мы добавили!</p>

@foreach ($games as $game)
<h2>{{ $game['title'] }}</h2>
<p>{{ $game['plot'] }}</p>
<p>{{ $game['gameplay'] }}</p>

@endforeach
