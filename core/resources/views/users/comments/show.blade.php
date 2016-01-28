<ul class="collection">
    @foreach($aComments as $aComment)
        @include('users.comments.partials.partial-comment-owner')
    @endforeach
</ul>