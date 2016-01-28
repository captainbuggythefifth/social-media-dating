@extends('users.layout.index')
@section('content')
    <div class="container">
            <div class="row">
                <div class="col s12 hide-on-small-and-down">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#profile-settings-tab">Account Settings</a></li>
                        <li class="tab col s3"><a class="active" href="#character-settings-tab">Character Settings</a></li>
                        <li class="tab col s3"><a href="#chat-settings-tab">Chat Settings</a></li>
                    </ul>
                </div>
                <div id="profile-settings-tab" class="col s12">
                    <div class="col grid-example s12 blue lighten-1" style="height: 20px"><span class="flow-text"></span></div>
                    <div class="col s12" style="margin-top: 20px">
                        {!!  Form::open(array('url' => 'user/settings', 'id' => 'user-profile-settings-form')) !!}
                            <?php $iUserProfileSettings = $aUser['user_settings']['user_profile']; ?>
                            <?php $iUserProfileStatus = $aUser['user_settings']['user_profile_status']; ?>
                            <div class="col s6" style="height: 50px;">
                                <div class="switch" style="margin-top: 20px">
                                    <label>
                                        Off
                                        <input id="user-profile-disable-options"
                                        @if($iUserProfileStatus == \App\UserSetting::PROFILE_STATUS_DEFAULT || $iUserProfileStatus == \App\UserSetting::PROFILE_STATUS_ENABLED_BY_USER || $iUserProfileStatus == \App\UserSetting::PROFILE_STATUS_ENABLED_BY_ADMIN)
                                               checked
                                               @endif
                                               type="checkbox">
                                        <span class="lever"></span>
                                        On
                                    </label>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="align-right">
                                    <p>Who can view my Profile?
                                        <button class="user-profile-privacy-settings dropdown-button btn" data-beloworigin="true" href='#' data-activates='user-profile-settings-options'
                                        @if($iUserProfileStatus == \App\UserSetting::PROFILE_STATUS_DISABLED_BY_USER || $iUserProfileStatus == \App\UserSetting::PROFILE_STATUS_DISABLED_BY_ADMIN)
                                                disabled
                                                @endif
                                                >
                                                    <span class="user-profile-privacy-settings-badge">
                                                        {{--Everyone--}}

                                                        @if($iUserProfileSettings == \App\UserSetting::PROFILE_SETTINGS_PUBLIC)
                                                            Everyone
                                                        @elseif($iUserProfileSettings == \App\UserSetting::PROFILE_SETTINGS_PRIVATE)
                                                            No One
                                                        @elseif($iUserProfileSettings == \App\UserSetting::PROFILE_SETTINGS_MY_MATES)
                                                            My Mates
                                                        @endif
                                                    </span>
                                        </button>
                                    </p>
                                    <ul id='user-profile-settings-options' class='dropdown-content'>
                                        <li><a href="#!" data-user-profile-settings-list="{{ \App\UserSetting::PROFILE_SETTINGS_PUBLIC }}">Everyone</a></li>
                                        <li><a href="#!" data-user-profile-settings-list="{{ \App\UserSetting::PROFILE_SETTINGS_PRIVATE }}">No One</a></li>
                                        <li><a href="#!" data-user-profile-settings-list="{{ \App\UserSetting::PROFILE_SETTINGS_MY_MATES }}">My Mates</a></li>
                                    </ul>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        </div>
                        <div class="row">
                            <div class="col s12 div-profile-settings-container">
                                <div class="card-panel">
                                    <div class="row">
                                        <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                                            <li class="">
                                                <div class="collapsible-header">
                                                    <i class="material-icons">filter_drama</i>
                                                    Name
                                                </div>
                                                <div class="collapsible-body">
                                                    {!!  Form::open(array('url' => 'user/settings', 'id' => 'user-profile-name-form')) !!}
                                                        <div class="row user-profile-information-container-partials">
                                                            <div class="col s12">
                                                                <div class="col s12">
                                                                    <div class="col s10 m10 l6">
                                                                        <div class="input-field s10 m10 l6">
                                                                            {!! Form::text('first_name', $aUser['user']['first_name'], ['class' => 'validate', 'id' => 'first_name', 'required']) !!}
                                                                            <label for="first_name">First Name</label>
                                                                            {!! $errors->first('first_name') !!}
                                                                        </div>
                                                                        <div class="input-field s10 m10 l6">
                                                                            {!! Form::text('middle_name', $aUser['user']['middle_name'], ['class' => 'validate', 'id' => 'middle_name', 'required']) !!}
                                                                            <label for="middle_name">Middle Name</label>
                                                                            {!! $errors->first('middle_name') !!}
                                                                        </div>
                                                                        <div class="input-field s10 m10 l6">
                                                                            {!! Form::text('last_name', $aUser['user']['last_name'], ['class' => 'validate', 'id' => 'last_name', 'required']) !!}
                                                                            <label for="middle_name">Last Name</label>
                                                                            {!! $errors->first('last_name') !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12 m12 l12">
                                                                <div class="col s12 m6 l6">
                                                                    <button class="btn waves-effect waves-light right-align" type="submit" name="action">Save
                                                                        <i class="material-icons right">done</i>
                                                                    </button>
                                                                    <a class="btn waves-effect waves-light right-align red cancel-accordion-button">Cancel
                                                                        <i class="material-icons right">not_interested</i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="collapsible-header">
                                                    <i class="material-icons">place</i>Email
                                                </div>
                                                <div class="collapsible-body">
                                                    {!!  Form::open(array('url' => 'user/settings', 'id' => 'user-profile-emailaddress-form')) !!}
                                                    <div class="row user-profile-information-container-partials">
                                                        <div class="col s12">
                                                            <div class="col s12">
                                                                <div class="col s10 m10 l6">
                                                                    <div class="input-field s10 m10 l6">
                                                                        {!! Form::email('email_address', $aUser['user']['email_address'], ['class' => 'validate', 'id' => 'email_address', 'required']) !!}
                                                                        <label for="first_name">Email Address</label>
                                                                        {!! $errors->first('email_address') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12 m12 l12">
                                                            <div class="col s12 m6 l6">
                                                                <button class="btn waves-effect waves-light right-align" type="submit" name="action">Save
                                                                    <i class="material-icons right">done</i>
                                                                </button>
                                                                <a class="btn waves-effect waves-light right-align red cancel-accordion-button">Cancel
                                                                    <i class="material-icons right">not_interested</i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="collapsible-header">
                                                    <i class="material-icons">whatshot</i>Password
                                                </div>
                                                <div class="collapsible-body">
                                                    {!!  Form::open(array('url' => 'user/settings', 'id' => 'user-profile-password-form')) !!}
                                                    <div class="row user-profile-information-container-partials">
                                                        <div class="col s12">
                                                            <div class="col s12">
                                                                <div class="col s10 m10 l6">
                                                                    <div class="input-field s10 m10 l6">
                                                                        {!! Form::password('old_password', null, ['class' => 'validate', 'id' => 'old_password', 'required']) !!}
                                                                        <label for="first_name">Old Password</label>
                                                                        {!! $errors->first('old_password') !!}
                                                                    </div>
                                                                    <div class="input-field s10 m10 l6">
                                                                        {!! Form::password('new_password', null, ['class' => 'validate', 'id' => 'new_password', 'required']) !!}
                                                                        <label for="first_name">New Password</label>
                                                                        {!! $errors->first('new_password') !!}
                                                                    </div>
                                                                    <div class="input-field s10 m10 l6">
                                                                        {!! Form::password('new_password_retype', null, ['class' => 'validate', 'id' => 'new_password_retype', 'required']) !!}
                                                                        <label for="first_name">Retype New Password</label>
                                                                        {!! $errors->first('new_password_retype') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12 m12 l12">
                                                            <div class="col s12 m6 l6">
                                                                <button class="btn waves-effect waves-light right-align" type="submit" name="action">Save
                                                                    <i class="material-icons right">done</i>
                                                                </button>
                                                                <a class="btn waves-effect waves-light right-align red cancel-accordion-button">Cancel
                                                                    <i class="material-icons right">not_interested</i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="collapsible-header">
                                                    <i class="material-icons">star</i>Birth Date
                                                </div>
                                                <div class="collapsible-body">
                                                    {!!  Form::open(array('url' => 'user/settings', 'id' => 'user-profile-birthdate-form')) !!}
                                                    <div class="row user-profile-information-container-partials">
                                                        <div class="col s12">
                                                            <div class="col s12">
                                                                <div class="col s10 m10 l6">
                                                                    <div class="input-field s10 m10 l6">
                                                                        {!! Form::macro('birth_date', function(){
                                                                        return '<input type="date" name="birth_date" class="datepicker" id="birth_date" value="" required>';
                                                                        }) !!}
                                                                        {!! Form::birth_date() !!}
                                                                        <label for="birth_date">Birth Date</label>
                                                                        {!! $errors->first('birth_date') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12 m12 l12">
                                                            <div class="col s12 m6 l6">
                                                                <button class="btn waves-effect waves-light right-align" type="submit" name="action">Save
                                                                    <i class="material-icons right">done</i>
                                                                </button>
                                                                <a class="btn waves-effect waves-light right-align red cancel-accordion-button">Cancel
                                                                    <i class="material-icons right">not_interested</i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="collapsible-header">
                                                    <i class="material-icons">my_location</i>Country
                                                </div>
                                                <div class="collapsible-body">
                                                    {!!  Form::open(array('url' => 'user/settings', 'id' => 'user-profile-country-form')) !!}
                                                    <div class="row user-profile-information-container-partials">
                                                        <div class="col s12">
                                                            <div class="col s12">
                                                                <div class="col s10 m10 l6">
                                                                    <div class="input-field s10 m10 l6">
                                                                        <select>
                                                                            @foreach($aCountries as $aCountry)
                                                                                <option value="{{ $aCountry['id'] }}" @if($aCountry['id'] == $aUser['user']['country']) selected @endif> {{ $aCountry['country_name'] }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12 m12 l12">
                                                            <div class="col s12 m6 l6">
                                                                <button class="btn waves-effect waves-light right-align" type="submit" name="action">Save
                                                                    <i class="material-icons right">done</i>
                                                                </button>
                                                                <a class="btn waves-effect waves-light right-align red cancel-accordion-button">Cancel
                                                                    <i class="material-icons right">not_interested</i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="collapsible-header">
                                                    <i class="material-icons">invert_colors</i>Gender
                                                </div>
                                                <div class="collapsible-body">
                                                    {!!  Form::open(array('url' => 'user/settings', 'id' => 'user-profile-gender-form')) !!}
                                                    <div class="row user-profile-information-container-partials">
                                                        <div class="col s12">
                                                            <div class="col s12">
                                                                <div class="col s10 m10 l6">
                                                                    <div class="input-field s10 m10 l6">
                                                                        <p>
                                                                            Gender
                                                                        </p>
                                                                            <input class="with-gap" name="gender" type="radio" id="male" value="{{ \App\User::USER_GENDER_MALE }}" @if($aUser['user']['gender'] == \App\User::USER_GENDER_MALE) checked @endif required/>
                                                                            <label for="male">Male</label>
                                                                            <input class="with-gap" name="gender" type="radio" id="female" value="{{ \App\User::USER_GENDER_FEMALE }}" @if($aUser['user']['gender'] == \App\User::USER_GENDER_FEMALE) checked @endif/>
                                                                            <label for="female">Female</label>
                                                                            <input class="with-gap" name="gender" type="radio" id="in_between" value="{{ \App\User::USER_GENDER_IN_BETWEEN }}" @if($aUser['user']['gender'] == \App\User::USER_GENDER_IN_BETWEEN) checked @endif/>
                                                                            <label for="in_between">In Between</label>
                                                                            <input class="with-gap" name="gender" type="radio" id="currently_confused" value="{{ \App\User::USER_GENDER_CURRENTLY_CONFUSED }}" @if($aUser['user']['gender'] == \App\User::USER_GENDER_CURRENTLY_CONFUSED) checked @endif/>
                                                                            <label for="currently_confused">Currently Confused</label>
                                                                        {!! $errors->first('gender') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12 m12 l12">
                                                            <div class="col s12 m6 l6">
                                                                <button class="btn waves-effect waves-light right-align" type="submit" name="action">Save
                                                                    <i class="material-icons right">done</i>
                                                                </button>
                                                                <a class="btn waves-effect waves-light right-align red cancel-accordion-button">Cancel
                                                                    <i class="material-icons right">not_interested</i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div id="character-settings-tab" class="col s12">
                    <div class="col grid-example s12 teal lighten-1" style="height: 20px"><span class="flow-text"></span></div>
                    <div class="col s12" style="margin-top: 20px">
                        <div class="row">
                            @include('users.characters.active-show')
                            @include('users.characters.archived-show')
                        </div>
                    </div>
                </div>
                <div id="chat-settings-tab" class="col s12">
                    <div class="col grid-example s12 purple lighten-3" style="height: 20px"><span class="flow-text"></span></div>
                    <div class="col s12" style="margin-top: 20px">
                        {!!  Form::open(array('url' => 'user/settings', 'id' => 'user-chat-settings-form')) !!}
                        <?php $iUserChatSettings = $aUser['user_settings']['user_chat']; ?>
                        <?php $iUserChatStatus = $aUser['user_settings']['user_chat_status']; ?>
                        <div class="col s12">
                            <div class="switch">
                                <label>
                                    Off
                                    <input id="user-chat-disable-options"
                                        @if($iUserChatStatus == \App\UserSetting::CHAT_STATUS_DEFAULT || $iUserChatStatus == \App\UserSetting::CHAT_STATUS_ENABLED_BY_USER || $iUserChatStatus == \App\UserSetting::CHAT_STATUS_ENABLED_BY_ADMIN)
                                           checked
                                        @endif
                                        type="checkbox">
                                    <span class="lever"></span>
                                    On
                                </label>
                            </div>
                        </div>
                        <div class="col s12 div-chat-settings-container">
                            <div class="card-panel">
                                <p>Who can chat me?
                                    <button class="user-chat-privacy-settings dropdown-button btn" data-beloworigin="true" href='#' data-activates='user-chat-settings-options'
                                            @if($iUserChatStatus == \App\UserSetting::CHAT_STATUS_DISABLED_BY_USER || $iUserChatStatus == \App\UserSetting::CHAT_STATUS_DISABLED_BY_ADMIN)
                                                disabled
                                            @endif
                                            >
                                            <span class="user-chat-privacy-settings-badge">
                                                {{--Everyone--}}

                                                @if($iUserChatSettings == \App\UserSetting::CHAT_SETTINGS_PUBLIC)
                                                    Everyone
                                                @elseif($iUserChatSettings == \App\UserSetting::CHAT_SETTINGS_PRIVATE)
                                                    No One
                                                @elseif($iUserChatSettings == \App\UserSetting::CHAT_SETTINGS_MY_MATES)
                                                    My Mates
                                                @endif
                                            </span>
                                    </button>
                                </p>
                                <ul id='user-chat-settings-options' class='dropdown-content'>
                                    <li><a href="#!" data-user-chat-settings-list="{{ \App\UserSetting::CHAT_SETTINGS_PUBLIC }}">Everyone</a></li>
                                    <li><a href="#!" data-user-chat-settings-list="{{ \App\UserSetting::CHAT_SETTINGS_PRIVATE }}">No One</a></li>
                                    <li><a href="#!" data-user-chat-settings-list="{{ \App\UserSetting::CHAT_SETTINGS_MY_MATES }}">My Mates</a></li>
                                </ul>
                            </div>
                        </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
    </div>
    @include('users.layout.modals.modal-create-character')
    @include('users.layout.modals.modal-character-avatar-preview')
    @include('users.layout.modals.modal-edit-character')
    @include('users.layout.modals.modal-delete-character')
@stop