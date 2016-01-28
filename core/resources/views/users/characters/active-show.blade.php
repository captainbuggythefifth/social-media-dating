{!! Form::open(['class' => 'character-options-form']) !!}
    <div class="col s12 m12 l6 collapsible-active-characters-container" data-character-status="active">
        <h4 class="center">Active</h4>
        <ul class="collapsible popout" data-collapsible="accordion">
            @foreach($aUser['active_characters'] as $aCharacter)
                @include('users.characters.partials.partials-active-list-show-characters')
            @endforeach
        </ul>
    </div>
{!! Form::close() !!}
