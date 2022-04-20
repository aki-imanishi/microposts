@if(Auth::user()->is_favorite($micropost->id))
    {{-- unfavoriteボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => 'btn btn-success btn-sm']) !!}
        <input type='hidden' name='micropost_id' value="{{$micropost->id}}">
    {!! Form::close() !!}
@else
    {{-- favoriteボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.favorite', $micropost->id], 'method' => 'post']) !!}
        {!! Form::submit('Favorite', ['class' => 'btn btn-warning btn-sm']) !!}
        <input type='hidden' name='micropost_id' value="{{$micropost->id}}">
    {!! Form::close() !!}
@endif

