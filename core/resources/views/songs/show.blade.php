@extends('users.layout.index')

@section('content')
    <h1>Nickie's Playlists</h1>

    {{--@foreach($songs as $index => $song)
        <li><a href="/songs/{{ $index }}">{{ $song }}</li>
    @endforeach--}}
    {{$song->title}}
@stop