{!! Form::open(['class' => 'character-options-form']) !!}
    <div class="col s12 m12 l6 collapsible-archived-characters-container" data-character-status="archived">
        <h4 class="center">Archived</h4>
        <ul class="collapsible popout" data-collapsible="accordion">
            @foreach($aUser['inactive_characters'] as $aCharacter)
                @include('users.characters.partials.partials-archived-list-show-characters')
            @endforeach
        </ul>
    </div>
{!! Form::close() !!}
