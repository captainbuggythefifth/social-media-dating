<div id="modal-comment" class="modal">
    {!!  Form::open(array('url' => 'comment/create', 'id' => 'comment-form', 'files' => true)) !!}
    <input type="hidden" name="comment-to-user-id">
    <input type="hidden" name="comment-from-type">
    <input type="hidden" name="comment-from-id">
    <div class="modal-content">
        <div class="row">
            <div class="comment-item">
                {{-- what to display --}}
            </div>
        </div>
        <div class="row comment-form-container">
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="comment-photo">
                </div>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="comment-photo-text" name="comment-text" type="text" class="validate">
                <label for="comment-photo-text">Add Comment</label>
            </div>
            <div class="row photo-comment-preview" style="clear: both; display: none;">
                <div class="" style="max-width: 300px">
                    <div class="right-align comment-photo-delete"><i class="material-icons">pause_circle_outline</i></div>
                    <img class="responsive-img"/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="waves-effect waves-green btn-flat">SUBMIT</button>
    </div>
    {!! Form::close() !!}
</div>