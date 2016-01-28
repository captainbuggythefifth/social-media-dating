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
    <div class="collapsible-body character-details-container user-profile-information" data-character="{{ json_encode($aCharacter) }}" data-user="{{ $aUser['user']['id'] }}">
        <div class="center-align">
            <p class="left-align">
                <span class="span-collapsible-body-character-description">{{ $aCharacter['character_description'] }}</span>
                <br/><br/>
                <div class="hide-on-small">
                    @if($bLoggedInUser == true)
                        @if($bOwner == true)
                            <a class="btn-large btn-floating red character-options-change tooltipped" data-position="top"
                               data-tooltip="Use this character" data-character-option="change_current_character" style=""><i
                                        class="material-icons">play_circle_outline</i></a>
                            <a class="btn-large btn-floating yellow darken-1 character-options-edit modal-trigger tooltipped"
                               data-position="top" data-tooltip="Edit this character" href="#modal-edit-character"
                               data-character-option="edit_character"><i
                                        class="material-icons">mode_edit</i></a>
                            <a class="btn-large btn-floating green character-options-delete modal-trigger tooltipped"
                               data-position="top" data-tooltip="Drop this character" data-character-option=""
                               href="#modal-delete-character"><i class="material-icons">delete</i></a>
                            <a class="btn-large btn-floating blue character-options-archive tooltipped" data-position="top"
                               data-tooltip="Archive this character" data-character-option=""><i
                                        class="material-icons">input</i></a>
                        @elseif($bOwner == false)
                            <a class="btn-large btn-floating blue @if($aCharacter['logged_in_user']['has_liked'] == true) darken-3 @else lighten-1 @endif user-like-from-character"><i class="material-icons" data-like-from-id="{{ $aCharacter['id'] }}" data-like-from-type="{{ \App\Like::LIKE_TYPE_CHARACTER }}" data-to-animate="true">thumb_up</i></a>
                            <a class="btn-large btn-floating red modal-trigger user-comment-add" href="#modal-comment"><i class="material-icons" data-comment-from-id="{{ $aCharacter['id'] }}" data-comment-from-type="{{ \App\Comment::COMMENT_FROM_TYPE_CHARACTER }}">comment</i></a>

                        @endif
                    @endif
                </div>
                <div class="hide-on-med-and-up">
                    <div style="position: relative">
                        <div class="fixed-action-btn vertical"
                             style="position: absolute; display: inline-block; right: 24px;">
                            <ul>
                                @if($bLoggedInUser == true)
                                    @if($bOwner == true)
                                        <li>
                                            <a class="btn-large btn-floating red character-options-change tooltipped"
                                               data-position="top" data-tooltip="Use this character"
                                               data-character-option="change_current_character" style="">
                                                <i class="material-icons">play_circle_outline</i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn-large btn-floating yellow darken-1 character-options-edit modal-trigger tooltipped"
                                               data-position="top" data-tooltip="Edit this character" href="#modal-edit-character"
                                               data-character-option="edit_character"><i
                                                        class="material-icons">mode_edit</i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn-large btn-floating green character-options-delete modal-trigger tooltipped"
                                               data-position="top" data-tooltip="Drop this character" data-character-option=""
                                               href="#modal-delete-character">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn-large btn-floating blue character-options-archive tooltipped" data-position="top"
                                               data-tooltip="Archive this character" data-character-option=""
                                              ><i class="material-icons">input</i>
                                            </a>
                                        </li>
                                    @elseif($bOwner == false)
                                        <li>
                                            <a class="btn-large btn-floating blue @if($aCharacter['logged_in_user']['has_liked'] == true) darken-3 @else lighten-1 @endif user-like-from-character tooltipped" data-position="top" data-tooltip="Like this character"><i class="material-icons" data-like-from-id="{{ $aCharacter['id'] }}" data-like-from-type="{{ \App\Like::LIKE_TYPE_CHARACTER }}" data-to-animate="true">thumb_up</i></a>
                                        </li>
                                        <li>
                                            <a class="btn-large btn-floating red modal-trigger user-comment-add-from-character" href="#modal-comment"><i class="material-icons" data-comment-from-id="{{ $aCharacter['id'] }}" data-comment-from-type="{{ \App\Comment::COMMENT_FROM_TYPE_CHARACTER }}">comment</i></a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </p>
        </div>
    </div>
</li>