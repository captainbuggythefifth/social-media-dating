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