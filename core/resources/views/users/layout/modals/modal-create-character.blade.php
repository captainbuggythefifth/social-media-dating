@if(isset($aSpecies))
    <div id="modal-create-character" class="modal">
        {!!  Form::open(array('url' => 'character/store', 'files' => true)) !!}
        <div class="modal-content">
            <h4>Create Character</h4>
            <div class="row">
                <div class="input-field col s12">
                    <select class="option-choose-specy" name="species_id">
                        <option value="" disabled selected>Choose your Kind</option>
                        @foreach($aSpecies as $aSpecy)
                            <option value="{{ $aSpecy['id'] }}">{{ $aSpecy['specy_name'] }}</option>
                        @endforeach
                    </select>
                    <label>Materialize Select</label>
                </div>
                <div class="input-field col s12 div-choose-character">
                    <select class="option-choose-character" name="families_id">
                        <option value="" disabled selected>Choose your Character</option>
                    </select>
                    <label>Materialize Select</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('character_name', null, ['class' => 'validate', 'id' => 'character_name', 'required']) !!}
                        <label for="user_name">Character Name</label>
                        {!! $errors->first('character_name') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('character_age', null, ['class' => 'validate', 'id' => 'character_age', 'required']) !!}
                        <label for="user_name">Character Age</label>
                        {!! $errors->first('character_age') !!}
                    </div>
                </div>
                <div class="row">
                    {{--<div class="input-field col s12">
                        {!! Form::text('character_avatar', null, ['class' => 'validate', 'id' => 'character_avatar', 'required']) !!}
                        <label for="user_name">Character Avatar</label>
                        {!! $errors->first('character_avatar') !!}
                    </div>--}}
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="character_avatar" id="character_avatar" onchange="loadFile(event)" accept="image/*">
                            {{--{!! Form::file('character_avatar', null, ['class' => 'validate', 'id' => 'character_avatar', 'required',  'onchange' => 'loadFile(event)']) !!}--}}
                            {{--<label for="character_avatar">Character Avatar</label>--}}
                        </div>

                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        <div>
                        <span>
                            Please select an image that is less than 300 x 300
                        </span>
                        </div>
                        <div id="preview-pane">
                            <div class="preview-container">
                                <img src="" class="jcrop-preview" alt="Preview" />
                            </div>
                        </div>

                        <input type="hidden" id="x" name="x" />
                        <input type="hidden" id="y" name="y" />
                        <input type="hidden" id="w" name="w" />
                        <input type="hidden" id="h" name="h" />
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::text('character_description', null, ['class' => 'validate', 'id' => 'character_description', 'required']) !!}
                        <label for="user_name">Character Description</label>
                        {!! $errors->first('character_description') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="waves-effect waves-green btn-flat">Sign In</button>
        </div>
        {!! Form::close() !!}
    </div>
@endif