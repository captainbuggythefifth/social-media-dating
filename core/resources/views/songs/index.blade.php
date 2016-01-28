@extends('users.layout.index')

@section('content')
    <h1>Nickie's Playlists</h1>

    View Songs: <br/>
    @foreach($songs as $song)
        <li><a href="/songs/{{ $song->slug }}">{{ $song->title }}</a></li>
    @endforeach

    Edit Songs: <br/>

    @foreach($songs as $song)
        <li><a href="/songs/{{ $song->slug }}/edit">{{ $song->title }}</a></li>
    @endforeach
@stop