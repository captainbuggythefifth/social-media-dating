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

    @if($bLoggedInUser == true)
        @if($bOwner == true)
            @include('users.users.partials.profile-options.profile-owner-options')
        @elseif($bOwner == false)
            @include('users.users.partials.profile-options.profile-non-owner-options')
        @endif
    @endif


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

        @if($bLoggedInUser == true)
            @if($bOwner == true)
                <div class="row">
                    <div class="fixed-action-btn tooltipped add-character" data-tooltip="Add Character" data-position="top" style="bottom: 45px; right: 24px; visibility: hidden">
                        <a class="btn-floating btn-large red modal-trigger" href="#modal-create-character">
                            <i class="large material-icons">add</i>
                        </a>
                    </div>
                </div>
            @elseif($bOwner == false)
            @endif
        @endif

    </div>
@stop
