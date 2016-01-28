@extends('users.layout.index')
@section('content')

    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                {{--<div class="row center">
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>--}}

            </div>
        </div>
        <div class="parallax">
            <img src="@if($aUser['user']['avatar'] != "" || $aUser['user']['avatar'] != null) {{ url("")."/".$aUser['user']['avatar'] }} @else http://materializecss.com/templates/parallax-template/background2.jpg @endif" alt="Unsplashed background img 2" style="display: block; transform: translate3d(-50%, 124px, 0px);">
        </div>
    </div>

    <div class="row profile-current-character-avatar">
        <div class="col s5 m4 l2">
            <img class="circle current-character-avatar responsive-img" src="@if($aUser['current_character']['character_avatar_mini'] != "" || $aUser['current_character']['character_avatar_mini'] != null) {{ url($aUser['current_character']['character_avatar_mini']) }} @else http://materializecss.com/templates/parallax-template/background2.jpg @endif" height="100%" width="100%">
        </div>
    </div>

    <div class="row" style="position: absolute; margin-left: 100%;">

        <div class="fixed-action-btn edit-parallax-photo horizontal" style="position: inherit; z-index: inherit;">
            <a class="btn-floating btn-large red">
                <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green user-change-avatar"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
            </ul>
        </div>
        {!!  Form::open(array('url' => 'character/store', 'files' => true, 'id' => 'user-change-form')) !!}
            <input type="file" name="user_avatar" id="user_avatar" accept="image/*" style="display: none">
        {!! Form::close() !!}
    </div>


    <div class="container character-main-container">
        <div class="section">

        </div>
        <br><br>

        <div class="section">
            <div class="center header">
                <h2>My Characters</h2>
            </div>
            @if(count($aUser['active_characters']) > 0)
                @include('users.characters.active-show')
            @endif
        </div>
    </div>
    @include('users.layout.modals.modal-create-character')
    @include('users.layout.modals.modal-character-avatar-preview')
    @include('users.layout.modals.modal-edit-character')
@stop
