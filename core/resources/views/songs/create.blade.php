@extends('users.layout.index')

@section('content')
    <h1>Nickie's Playlists</h1>


    <div class="row">

        {!! Form::open(['route' => ['songs.store']]) !!}

        @include('songs.form')

        <div class="row">
            <div class="input-field col s6">
                {!! Form::button('Save Song', ['class' => 'waves-effect waves-light btn-large', 'type' => 'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@stop
