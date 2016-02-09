@extends('users.layout.index')
@section('content')
    <div class="row" style="margin-top: 50px">
        <div class="col s12 m12 l6 offset-l6">
            <h4>Sign Up</h4>
            {{--<form method="POST" action="/store">--}}
                {!!  Form::open(array('url' => 'user/store')) !!}
            {{--{!! Form::open(['route' => 'users/store']) !!}--}}
                <div class="row">
                    <div class="input-field col s10">
                        {{-- <input name="first_name" id="first_name" type="text" class="validate">
                         <label for="first_name">First Name</label>--}}
                        {{--{!! Form::text('title', null, ['class' => 'validate', 'id' => 'title']) !!}
                        <label for="title">Title</label>--}}
                        {!! Form::text('user_name', null, ['class' => 'validate', 'id' => 'user_name', 'required']) !!}
                        <label for="user_name">User Name</label>
                        {!! $errors->first('user_name') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                       {{-- <input name="first_name" id="first_name" type="text" class="validate">
                        <label for="first_name">First Name</label>--}}
                        {{--{!! Form::text('title', null, ['class' => 'validate', 'id' => 'title']) !!}
                        <label for="title">Title</label>--}}
                        {!! Form::text('first_name', null, ['class' => 'validate', 'id' => 'first_name', 'required']) !!}
                        <label for="first_name">First Name</label>
                        {!! $errors->first('first_name') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        {{--<input name="last_name" id="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>--}}

                        {!! Form::text('last_name', null, ['class' => 'validate', 'id' => 'last_name', 'required']) !!}
                        <label for="last_name">Last Name</label>
                        {!! $errors->first('last_name') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        {{--<input name="email_address" id="email" type="email" class="validate">
                        <label for="email">Email</label>--}}

                        {!! Form::email('email_address', null, ['class' => 'validate', 'id' => 'email_address', 'required']) !!}
                        <label for="email_address">Email Address</label>
                        {!! $errors->first('email_address') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        {{--<input name="password" id="password" type="password" class="validate">
                        <label for="password">Password</label>--}}
                        {!! Form::password('password', null, ['class' => 'validate', 'id' => 'password', 'required']) !!}
                        <label for="password">Password</label>
                        {!! $errors->first('password') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col s10">
                        <div class="input-field">
                            {{--<input type="date" class="datepicker" id="birth_date">
                            <label for="birth_date">Birthday</label>--}}
                            {{--{!! Form::input('birth_date', 'date', ['class' => 'validate', 'id' => 'birth_date']) !!}--}}
                            {!! Form::macro('birth_date', function(){
                                return '<input type="date" name="birth_date" class="datepicker" id="birth_date" required>';
                            }) !!}
                            {!! Form::birth_date() !!}
                            <label for="birth_date">Birth Date</label>
                            {!! $errors->first('birth_date') !!}
                        </div>
                        <div class="input-field col s10">
                            {{--<select id="country" name="country" class="">
                                <option value="" disabled selected>Choose your Country</option>
                                <option value="1">Philippines</option>
                                <option value="2">China</option>
                                <option value="3">Japan</option>
                            </select>--}}
                            {{--{!! Form::select('country', [
                                '1' => 'Philippines',
                                '2' => 'Japan',
                                '3' => 'ISIS'
                            ], ['class' => 'validate', 'required']) !!}
                            {!! $errors->first('country') !!}--}}

                            <select>
                                @foreach($aCountries as $aCountry)
                                    <option value="{{ $aCountry['id'] }}" @if(isset($aUser['user']) && !isEmpty($aUser['user'])) @if($aCountry['id'] == $aUser['user']['country']) selected @endif @endif> {{ $aCountry['country_name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s10">
                        {{--<p>
                            Gender
                        </p>
                        <p>
                            <input class="with-gap" name="gender" type="radio" id="male" value="1" required/>
                            <label for="male">Male</label>
                        </p>
                        <p>
                            <input class="with-gap" name="gender" type="radio" id="female" value="2" />
                            <label for="female">Female</label>
                        </p>
                        <p>
                            <input class="with-gap" name="gender" type="radio" id="in_between" value="3" />
                            <label for="in_between">In Between</label>
                        </p>
                        {!! $errors->first('gender') !!}--}}
                        <p>
                            Gender
                        </p>
                        <p>
                            <input class="with-gap" name="gender" type="radio" id="male" value="{{ \App\User::USER_GENDER_MALE }}" @if(isset($aUser['user']) && !isEmpty($aUser['user'])) @if($aUser['user']['gender'] == \App\User::USER_GENDER_MALE) checked @endif @endif required/>
                            <label for="male">Male</label>
                        </p>
                        <p>
                            <input class="with-gap" name="gender" type="radio" id="female" value="{{ \App\User::USER_GENDER_FEMALE }}" @if(isset($aUser['user']) && !isEmpty($aUser['user'])) @if($aUser['user']['gender'] == \App\User::USER_GENDER_FEMALE) checked @endif @endif/>
                            <label for="female">Female</label>
                        </p>
                        <p>
                            <input class="with-gap" name="gender" type="radio" id="in_between" value="{{ \App\User::USER_GENDER_IN_BETWEEN }}" @if(isset($aUser['user']) && !isEmpty($aUser['user'])) @if($aUser['user']['gender'] == \App\User::USER_GENDER_IN_BETWEEN) checked @endif @endif/>
                            <label for="in_between">In Between</label>
                        </p>
                        <p>
                            <input class="with-gap" name="gender" type="radio" id="currently_confused" value="{{ \App\User::USER_GENDER_CURRENTLY_CONFUSED }}" @if(isset($aUser['user']) && !isEmpty($aUser['user'])) @if($aUser['user']['gender'] == \App\User::USER_GENDER_CURRENTLY_CONFUSED) checked @endif @endif/>
                            <label for="currently_confused">Currently Confused</label>
                        </p>
                        {!! $errors->first('gender') !!}
                    </div>
                </div>
                <div class="col offset-l8">
                    <button type="submit" class="btn-large waves-effect waves-light orange">Sign Up</button>
                </div>
            {!! Form::close() !!}
            {{--{{Form::close()}}--}}
        </div>
    </div>
@stop