<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card update-card-container small">
                <div class="col s12">
                    <div class="row" style="border-bottom: 1px solid rgba(160,160,160,0.2); height: auto;">
                        <div class="col s12" style="height: inherit; padding: 10px">
                            <img class="img-responsive circle" width="40" height="40" src="{{ $aUpdate['comment']['to_user']['current_character_avatar_mini'] }}">
                            <div style="position: absolute; margin-top: -36px">
                                <div style="padding-left: 50px;">
                                        <span style="font-size: inherit;">
                                            <a href="{{ url($aUpdate['comment']['to_user']['user_name']) }}">
                                                {{ $aUpdate['comment']['to_user']['first_name'] . " " . $aUpdate['comment']['to_user']['last_name'] }}
                                            </a>
                                        </span>
                                    <span> commented on this </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="col s12">
                        <img class="img-responsive circle" width="40" height="40" src="{{ $aUpdate['comment']['from_user']['current_character_avatar_mini'] }}">
                        <div style="position: absolute; margin-top: -36px">
                            <div style="padding-left: 50px">
                                <span style="font-size: inherit;">
                                    <a href="{{ url($aUpdate['comment']['from_user']['user_name']) }}">
                                        {{ $aUpdate['comment']['from_user']['first_name'] . " " . $aUpdate['comment']['from_user']['last_name'] }}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a class="btn-floating btn-large red modal-trigger user-comment-add" href="#modal-comment"><i class="material-icons" data-comment-from-id="{{--{{ $aUser['user']['photo_id'] }}--}}" data-comment-from-type="{{ \App\Comment::COMMENT_FROM_TYPE_PHOTO }}">comment</i></a>
                    <a class="btn-floating btn-large blue {{--@if($aUser['current_photo']['logged_in_user']['has_liked'] == true) darken-3 @else lighten-1 @endif user-like-from-photo"--}} "><i class="material-icons" data-like-from-id="{{--{{ $aUser['user']['photo_id'] }}--}}" data-like-from-type="{{ \App\Like::LIKE_TYPE_PHOTO }}" data-to-animate="false">thumb_up</i></a>
                </div>
            </div>
        </div>
    </div>
</div>