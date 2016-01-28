<div class="row" style="position: absolute; margin-left: 100%;">
    {!!  Form::open(array('url' => 'mates/store')) !!}
    <input type="hidden" id="logged-in-user" data-user="{{ $aLoggedInUser['user']['id'] }}">
    <input type="hidden" id="mate-info-container" data-mate="{{ json_encode($aUser['mate']) }}">
    {!! Form::close() !!}
    <div class="fixed-action-btn user-profile-information horizontal" style="position: inherit; z-index: inherit;" data-user="{{ $aUser['user']['id'] }}">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">toc</i>
        </a>
        <ul class="user-profile-options-selection">
            <li><a class="btn-floating red modal-trigger user-comment-add" href="#modal-comment"><i class="material-icons" data-comment-from-id="{{ $aUser['user']['photo_id'] }}" data-comment-from-type="{{ \App\Comment::COMMENT_FROM_TYPE_PHOTO }}">comment</i></a></li>
            <li><a class="btn-floating blue @if($aUser['current_photo']['logged_in_user']['has_liked'] == true) darken-3 @else lighten-1 @endif user-like-from-photo"><i class="material-icons" data-like-from-id="{{ $aUser['user']['photo_id'] }}" data-like-from-type="{{ \App\Like::LIKE_TYPE_PHOTO }}" data-to-animate="false">thumb_up</i></a></li>

            @if((is_null($aUser['mate']) || $aUser['mate']['status'] == \App\Mate::MATE_STATUS_DECLINED_BY_ADMIN || $aUser['mate']['status'] == \App\Mate::MATE_STATUS_DECLINED_BY_USER || $aUser['mate']['status'] == \App\Mate::MATE_STATUS_REMOVED_BY_USER || $aUser['mate']['status'] == \App\Mate::MATE_STATUS_REMOVED_BY_ADMIN) && $bRequestedFromLoggedInUser != true)
                <li><a class="btn-floating green"><i class="material-icons user-add-mate-request">contacts</i></a></li>
            @elseif(($aUser['mate']['status'] == \App\Mate::MATE_STATUS_ADDED_BY_USER || $aUser['mate']['status'] == \App\Mate::MATE_STATUS_ADDED_BY_ADMIN) && $bRequestedFromLoggedInUser != true)
                <li><a class="btn-floating green dropdown-button" data-beloworigin="true" data-activates="user-options-mate-selection"><i class="material-icons user-options-mate">contacts</i></a></li>
            @elseif($aUser['mate']['status'] == \App\Mate::MATE_STATUS_ACCEPTED_BY_USER || $aUser['mate']['status'] == \App\Mate::MATE_STATUS_ACCEPTED_BY_ADMIN)
                <li><a class="btn-floating green"><i class="material-icons user-remove-mate">pause_circle_outline</i></a></li>
            @elseif($bRequestedFromLoggedInUser == true)
                <li><a class="btn-floating green"><i class="material-icons user-cancel-mate-request">pause_circle_outline</i></a></li>
            @endif


        </ul>
        <ul id='user-options-mate-selection' class='dropdown-content'>
            <li style="margin-bottom: 0;"><a class="user-accept-mate-request" style="display: flex"><i class="material-icons user-accept-mate-request">done_all</i> Accept</a></li>
            <li style="margin-bottom: 0;"><a class="user-decline-mate-request" style="display: flex"><i class="material-icons user-decline-mate-request">not_interested</i> Decline</a></li>
        </ul>
    </div>
</div>