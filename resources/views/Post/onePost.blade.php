<div class="mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
    <div class=" flex flex-row ">
        <div class="flex-shrink-0 p-1">
            likes/dislikes: {{$post->likeCount}}
            @if(!$post->liked())
                <form action="{{ route('post.like',$post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                    <button>Like</button>
                </form>
            @else()
                <form action="{{ route('post.unlike',$post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                    <button>Unlike</button>
                </form>
            @endif
        </div>
        <div>
            <div class="flex">
                <div class="text-sm font-bold">Category name:</div>
                <div class="text-xs m-0.5 inline-block	">submitted by: <p
                        class="text-blue-700 inline-block	"><a
                            href={{ route('user.show', ['user'=>$post->user->id]) }}>{{  $post->user->name}}</a>
                    </p> submitted when: {{ $post->created_at->diffForHumans()}}</div>
            </div>
            <a href={{ route('post.show', ['post'=>$post->id]) }}>
                <div class="text-base ">Post Title: {{  $post->title}}</div>
                <div>Post body: {{  $post->body}}</div>
                <div class=" text-purple-600">
                    <div class="inline-block ">Comments</div>
                    <div class="inline-block">Award</div>
                    <div class="inline-block">Share</div>

                    @if(!(in_array($post->id,$savedPosts)))
                        <form method="post" action="{{route('userSavePost.attach')}}">
                            @csrf
                            <input type="hidden" value="{{$post->id}}" name="postId">
                            <button type="submit">save</button>
                        </form>
                    @else
                        <form method="post" action="{{route('userSavePost.detach')}}">
                            @csrf
                            <input type="hidden" value="{{$post->id}}" name="postId">
                            <button type="submit">usave</button>
                        </form>
                    @endif

                </div>
            </a>
        </div>
    </div>
</div>
