<div class="mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
    <div class=" flex flex-row ">
        <div class="flex-shrink-0 p-1 text-center">
            likes: {{$post->likeCount}}
            @if(!$post->liked())
                <form action="{{ route('post.like',$post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                    <button class="bg-gray-200 text-gray-500 active:bg-purple-600 font-bold uppercase text-xs px-6  py-2 rounded-full border-2 hover:text-green-600 hover:border-green-500 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Like</button>
                </form>
            @else()
                <form action="{{ route('post.unlike',$post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                    <button class="bg-gray-200 text-gray-500 active:bg-purple-600 font-bold uppercase text-xs px-6  py-2 rounded-full border-2 hover:text-red-800 hover:border-red-700 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Unlike</button>
                </form>
            @endif
        </div>
        <div>
            <div class="flex">
                <div class="text-sm text-center font-bold inline-block">Cat: {{$post->community->name}}</div>
                <div class="text-sm text-center inline-block px-1">Submitted by:</div>
                    <div class=" text-sm text-center inline-block">
                        <a class="text-blue-700 hover:underline" href={{ route('user.show', ['user'=>$post->user->id]) }}>{{  $post->user->name}}</a>
                      {{ $post->created_at->diffForHumans()}}
                    </div>
            </div>
            <a href={{ route('post.show', ['post'=>$post->id]) }}>
                <div class="text-base ">Post Title: {{  $post->title}}</div>
                <div>Post body: {{  $post->body}}</div>
                <div class=" text-purple-600">
                    <div class="inline-block ">Comments({{$post->comments()->count()}})</div>
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
