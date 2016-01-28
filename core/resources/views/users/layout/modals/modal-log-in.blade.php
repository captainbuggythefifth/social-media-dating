<div id="modal-login" class="modal">
    {!!  Form::open(array('url' => 'user/login')) !!}
    <div class="modal-content">
        <h4>Sign In</h4>
        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::email('email_address', isset($email_address) ? $email_address : "", ['class' => 'validate', 'id' => 'email_address', 'required']) !!}
                    <label for="email_address">Email Address</label>
                    {!! $errors->first('email_address') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div>
                <input type="checkbox" name="remember"> Remember Me
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="waves-effect waves-green btn-flat">Sign In</button>
    </div>
    {!! Form::close() !!}
</div>