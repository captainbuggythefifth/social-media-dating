{!! Form::open(['class' => 'character-options-form']) !!}
    <div class="row">
        <h4>Active</h4>
        <div class="col s12 m12 l6">
            <ul class="collapsible popout" data-collapsible="accordion">
                @foreach($aActiveCharacters as $aCharacter)
                <li>
                    <div class="collapsible-header">
                        <div class="col s12">
                            <i class="material-icons avatar">
                                <img src="{{ url($aCharacter['character_avatar_mini']) }}" alt="" class="circle responsive-img">
                            </i>
                            <span class="left">
                                <span class="span-collapsible-header-character-name">
                                    {{ $aCharacter['character_name'] }}
                                </span>
                            </span>
                            <span class="right">
                                {{--<div class="switch">
                                    <label>
                                        Off
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                        On
                                    </label>
                                </div>--}}
                            </span>
                        </div>
                    </div>
                    <div class="collapsible-body character-details-container" data-character="{{ json_encode($aCharacter) }}">
                        <div class="center-align">
                            <p class="left-align"><span class="span-collapsible-body-character-description">{{ $aCharacter['character_description'] }}</span> <br/><br/>
                            {{--<a href="#!" data-character="{{ json_encode($aCharacter) }}" class="character-options">

                            </a>--}}
                            <div class="hide-on-small">
                                <a class="btn-large btn-floating red character-options-change tooltipped" data-position="top" data-tooltip="Use this character" data-character-option="change_current_character" style=""><i class="material-icons">play_circle_outline</i></a>
                                <a class="btn-large btn-floating yellow darken-1 character-options-edit modal-trigger tooltipped" data-position="top" data-tooltip="Edit this character" href="#modal-edit-character" data-character-option="edit_character" style="margin-left: 10px"><i class="material-icons">mode_edit</i></a>
                                <a class="btn-large btn-floating green character-options-delete modal-trigger tooltipped" data-position="top" data-tooltip="Drop this character" data-character-option="" href="#modal-delete-character" style="margin-left: 10px"><i class="material-icons">delete</i></a>
                                <a class="btn-large btn-floating blue character-options-archive tooltipped" data-position="top" data-tooltip="Archive this character" data-character-option="" style="margin-left: 10px"><i class="material-icons">input</i></a>
                            </div>
                            <div class="hide-on-med-and-up">
                                <div style="position: relative">
                                    <div class="fixed-action-btn vertical" style="position: absolute; display: inline-block; right: 24px;">
                                        {{--<a class="btn-floating btn-large red">
                                            <i class="large material-icons">mode_edit</i>
                                        </a>--}}
                                        <ul>
                                            {{--<li><a class="btn-floating red character-options" data-character-option="change_current_character"><i class="material-icons">play_circle_outline</i></a></li>
                                            <li><a class="btn-floating yellow darken-1 character-options" data-character-option="edit_character"><i class="material-icons">mode_edit</i></a></li>
                                            <li><a class="btn-floating green character-options"><i class="material-icons">delete</i></a></li>
                                            <li><a class="btn-floating blue character-options"><i class="material-icons">input</i></a></li>
                                        --}}
                                           <li><a class="btn-large btn-floating red character-options-change tooltipped" data-position="top" data-tooltip="Use this character" data-character-option="change_current_character" style=""><i class="material-icons">play_circle_outline</i></a></li>
                                           <li><a class="btn-large btn-floating yellow darken-1 character-options-edit modal-trigger tooltipped" data-position="top" data-tooltip="Edit this character" href="#modal-edit-character" data-character-option="edit_character" style="margin-left: 10px"><i class="material-icons">mode_edit</i></a></li>
                                           <li><a class="btn-large btn-floating green character-options-delete modal-trigger tooltipped" data-position="top" data-tooltip="Drop this character" data-character-option="" href="#modal-delete-character" style="margin-left: 10px"><i class="material-icons">delete</i></a></li>
                                           <li><a class="btn-large btn-floating blue character-options tooltipped" data-position="top" data-tooltip="Archive this character" data-character-option="" style="margin-left: 10px"><i class="material-icons">input</i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
{!! Form::close() !!}
