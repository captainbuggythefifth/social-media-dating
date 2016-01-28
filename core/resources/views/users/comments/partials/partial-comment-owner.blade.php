<li class="collection-item avatar">
    <img src="{{ url($aComment['from_user']['current_character_avatar_mini']) }}" alt="" class="circle">
    <a href="{{ url($aComment['from_user']['user_name']) }}" style="padding-top: 15px"><span class="title">{{ $aComment['from_user']['first_name'] }} {{ $aComment['from_user']['last_name'] }}</span></a>

    <p> {{ $aComment['comment_text'] }}
        <br>
        @if(isset($aComment['photo_comment']) && is_array($aComment['photo_comment']) && count($aComment['photo_comment']) > 0)
            <img src="{{ url($aComment['photo_comment']['photo_link']) }}" class="responsive-img user-comment-photo">
        @endif
    </p>
    <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
</li>