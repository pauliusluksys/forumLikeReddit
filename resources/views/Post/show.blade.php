<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>
    <div class="mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
        <div class=" flex flex-row ">
            <div class="flex-shrink-0 p-1">
                leave like
            </div>
            <div>
                <div class="flex">
                    <div class="text-sm font-bold">Category name:</div>
                    <div class="text-xs m-0.5 inline-block	">submitted by: <p class="text-blue-700 inline-block	"><a href={{ route('user.show', ['user'=>$post->user->id]) }}>{{  $post->user->name}}</a></p> submitted when: {{ $post->created_at->diffForHumans()}}</div>
                </div>
                    <div class="text-base ">Post Title: {{  $post->title}}</div>
                    <div>Post body: {{  $post->body}}</div>
                    <div class=" text-purple-600">
                        <div class="inline-block ">Comments</div>
                        <div class="inline-block">Award</div>
                        <div class="inline-block">Share</div>
                    </div>
                @include('Post.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                @auth
                <h4>Add comment</h4>
                <form method="post" action="{{ route('post-comment.add') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment" />
                    </div>
                </form>
                @endauth
                @guest
                <div class="my-5">
                    <a href="{{ route('login') }}" class="bg-transparent border border-black text-black hover:bg-black hover:text-white text-center py-2 px-4 rounded">
                        Login to add a comment
                    </a>
                </div>
                @endguest
            </div>

        </div>
    </div>
</div></div></div></div>

    <div class="inline-block mt-10 " style="width: 250px; ">
        <div class="-my-8">
            <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;"><a href="{{$post->community->name}}">{{$post->community->name}}</a></div>
            <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Premium</div>
            <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Home</div>
        </div>
    </div>

    <div class="flex-1"></div>



</x-guest-layout>
