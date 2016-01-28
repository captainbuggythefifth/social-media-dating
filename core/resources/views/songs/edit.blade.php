@extends('users.layout.index')

@section('content')
    <h1>Nickie's Playlists</h1>


    <div class="row">

        {{--{!! Form::model($song, ['url' => 'songs/'.$song->slug, 'method' => 'PATCH']) !!}--}}
        {!! Form::model($song, ['route' => ['songs.update', $song->slug], 'method' => 'PATCH']) !!}

        @include('songs.form')

        <div class="row">
            <div class="input-field col s6">
                {!! Form::button('Update Song', ['class' => 'waves-effect waves-light btn-large', 'type' => 'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@stop
