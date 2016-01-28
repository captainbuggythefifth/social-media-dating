<ul class="right hide-on-med-and-down">
    <li>
        <a href="{{ url($aLoggedInUser['user']['user_name']) }}" class="modal-trigger" style="position:relative; top: 10px">
            <img src="{{ url($aLoggedInUser['current_character']['character_avatar_mini']) }}" alt="" class="circle responsive-img nav-bar-current-character-avatar-mini current-character-avatar" style="max-height: 30px; max-width: 30px;">
            {{--<img src="{{ url($aCurrentCharacter['character_avatar_mini']) }}" alt="" class="circle responsive-img" style="max-height: 30px; max-width: 30px">--}}
        </a>
    </li>
    {{--<li><a href="/logout">Log Out</a></li>--}}
    <li>
        <a class='dropdown-button' data-beloworigin="true" href='#' data-activates='profile-options'>Profile</a>
    </li>
</ul>
<ul id='profile-options' class='dropdown-content'>
    <li><a href="{{ url($aLoggedInUser['user']['user_name']) }}">Profile</a></li>
    <li><a href="/user/settings">Settings</a></li>
    {{--<li class="divider"></li>--}}
    <li><a href="/user/logout">Log Out</a></li>
</ul>

<ul id="nav-mobile" class="side-nav">
    <li>
        <a href="{{ url($aLoggedInUser['user']['user_name']) }}" class="modal-trigger" style="position:relative; top: 10px">
            <img src="{{ url($aLoggedInUser['current_character']['character_avatar_mini']) }}" alt="" class="circle responsive-img nav-bar-current-character-avatar-mini current-character-avatar" style="max-height: 30px; max-width: 30px;">
            {{--<img src="{{ url($aCurrentCharacter['character_avatar_mini']) }}" alt="" class="circle responsive-img" style="max-height: 30px; max-width: 30px">--}}
        </a>
    </li>
    <li><a href="{{ url($aLoggedInUser['user']['user_name']) }}" class="modal-trigger">Profile</a></li>
    <li><a href="/user/settings">Settings</a></li>
    <li><a href="/user/logout">Log Out</a></li>
</ul>