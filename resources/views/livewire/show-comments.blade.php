<div class="space-y-1">
    @if(!empty($comments))
        @foreach($comments as $comment)
            <p>{{ $comment->body }}</p>
        @endforeach
    @endif
</div>