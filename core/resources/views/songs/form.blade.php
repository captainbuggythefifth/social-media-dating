<div class="row">
    <div class="input-field col s6">
        {{--<i class="material-icons prefix">mode_edit</i>--}}
        {!! Form::text('title', null, ['class' => 'validate', 'id' => 'title']) !!}
        <label for="title">Title</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        {{--<i class="material-icons prefix">mode_edit</i>--}}
        {!! Form::textarea('lyrics', null, ['class' => 'validate materialize-textarea', 'id' => 'lyrics']) !!}
        <label for="lyrics">Lyrics</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        {{--<i class="material-icons prefix">mode_edit</i>--}}
        {!! Form::text('slug', null, ['class' => 'validate materialize-textarea', 'id' => 'slug']) !!}
        <label for="slug">Slug</label>
    </div>
</div>