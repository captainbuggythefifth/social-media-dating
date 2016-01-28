<div id="modal-delete-character" class="modal">
    {!!  Form::open(array('url' => 'character/delete', 'id' => 'delete-used-character')) !!}
    <div class="modal-content">
        <h4>Delete Character</h4>
        <input type="hidden" name="character_id">
        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    Do you really want to delete this character?
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="row" style="margin-bottom: 0">
            <div class="col s6"><button type="submit" class="waves-effect waves-green btn-large" style="width: 100%">Confirm</button></div>
            <div class="col s6"><a class="waves-effect waves-light btn-large orange darken-4 modal-action modal-close" style="width: 100%">Cancel</a></div>
        </div>
        {{--<button class="waves-effect waves-green btn-flat">Sign In</button>--}}
    </div>
    {!! Form::close() !!}
</div>