@foreach($comments as $comment)
    {{-- show the comment markup --}}
    @include('comments.show', ['comment' => $comment])

    @if($comment->children->count() > 0)
        {{-- recursively include this view, passing in the new collection of comments to iterate --}}
        @include('comments.index', ['comments' => $comment->children])
    @endif
@endforeach