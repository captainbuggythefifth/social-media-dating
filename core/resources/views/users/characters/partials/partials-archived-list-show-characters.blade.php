<li>
    <div class="collapsible-header">
        <div class="col s12">
            <i class="material-icons avatar">
                <img src="{{ url($aCharacter['character_avatar_mini']) }}" alt="" class="circle responsive-img">
            </i>
            <span class="span-collapsible-header-character-name">
                {{ $aCharacter['character_name'] }}
            </span>
        </div>
    </div>
    <div class="collapsible-body character-details-container" data-character="{{ json_encode($aCharacter) }}">
        <div class="center-align">
            <p class="left-align">
                <span class="span-collapsible-body-character-description">{{ $aCharacter['character_description'] }}</span>
                <br/><br/>
                <div class="hide-on-small">
                    <a class="btn-large btn-floating yellow darken-1 character-options-edit modal-trigger tooltipped"
                       data-position="top" data-tooltip="Edit this character" href="#modal-edit-character"
                       data-character-option="edit_character" style="margin-left: 10px"><i
                                class="material-icons">mode_edit</i></a>
                    <a class="btn-large btn-floating green character-options-delete modal-trigger tooltipped"
                       data-position="top" data-tooltip="Drop this character" data-character-option=""
                       href="#modal-delete-character" style="margin-left: 10px"><i class="material-icons">delete</i></a>
                    <a class="btn-large btn-floating blue character-options-activate tooltipped" data-position="top"
                       data-tooltip="Activate this character" data-character-option="" style="margin-left: 10px"><i
                                class="material-icons">swap_horiz</i></a>
                </div>
                <div class="hide-on-med-and-up">
                    <div style="position: relative">
                        <div class="fixed-action-btn vertical"
                             style="position: absolute; display: inline-block; right: 24px;">

                            <ul>

                                <li>
                                    <a class="btn-large btn-floating yellow darken-1 character-options-edit modal-trigger tooltipped"
                                       data-position="top" data-tooltip="Edit this character" href="#modal-edit-character"
                                       data-character-option="edit_character" style="margin-left: 10px"><i
                                                class="material-icons">mode_edit</i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-large btn-floating green character-options-delete modal-trigger tooltipped"
                                       data-position="top" data-tooltip="Drop this character" data-character-option=""
                                       href="#modal-delete-character" style="margin-left: 10px"><i class="material-icons">delete</i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-large btn-floating blue character-options-activate tooltipped" data-position="top"
                                       data-tooltip="Activate this character" data-character-option=""
                                       style="margin-left: 10px"><i class="material-icons">swap_horiz</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </p>
        </div>
    </div>
</li>