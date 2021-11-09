@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong><a
                href={{ route('user.show', ['user'=>$comment->user->id]) }}>{{ $comment->user->name }}</a></strong>
        <p>{{ $comment->body }}</p>
        @auth
        <a href="" id="reply"></a>
        <form method="post" action={{ route('post-comment.add') }}>
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" autocomplete="off"/>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @endauth
        @include('Post.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
