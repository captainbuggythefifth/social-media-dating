<div class="col s12">
    <div class="card">
    @if($iFromType == \App\Comment::COMMENT_FROM_TYPE_USER)
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator comment-from-photo" src="">
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
    @elseif($iFromType == \App\Comment::COMMENT_FROM_TYPE_CHARACTER)
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator comment-from-photo" src="">
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
    @elseif($iFromType == \App\Comment::COMMENT_FROM_TYPE_CHARACTER)
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator comment-from-photo" src="">
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
    @elseif($iFromType == \App\Comment::COMMENT_FROM_TYPE_FAMILY)
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator comment-from-photo" src="">
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
    @elseif($iFromType == \App\Comment::COMMENT_FROM_TYPE_SPECY)
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator comment-from-photo" src="">
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
    @elseif($iFromType == \App\Comment::COMMENT_FROM_TYPE_PHOTO)
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator comment-from-photo" src="{{ url($aFromItem['photo_link']) }}">
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{ $aFromItem['photo_name'] }}<i class="material-icons right">close</i></span>
            <p>{{ $aFromItem['photo_description'] }}</p>
            <ul>
                <li>
                    <a class="btn-large btn-floating blue @if($aFromItem['logged_in_user']['has_liked'] == true) darken-3 @else lighten-1 @endif user-like-from-photo tooltipped" data-position="top" data-tooltip="Like this character"><i class="material-icons" data-like-from-id="{{ $aFromItem['id'] }}" data-like-from-type="{{ \App\Like::LIKE_TYPE_PHOTO }}">thumb_up</i></a>
                </li>
            </ul>
        </div>
    @elseif($iFromType == \App\Comment::COMMENT_FROM_TYPE_POST)
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator comment-from-photo" src="">
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
    @elseif($iFromType == \App\Comment::COMMENT_FROM_TYPE_MATE)
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator comment-from-photo" src="">
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
    @endif
    </div>
</div>