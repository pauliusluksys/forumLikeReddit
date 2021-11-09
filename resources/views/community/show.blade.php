<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class=" flex -px-2 mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">

        <div class="mx-4">Create new post:</div>
    </div>

    <div class=" flex -px-2 mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
        <div class="mx-4">Best</div>
        <div class="mx-4">Hot</div>
        <div class="mx-4">New</div>
        <div class="mx-4"> Top</div>
    </div>
    <p class="text-2xl">{{$community->name}}
        @if(!$community->members->contains(auth()->user()))
         <form method="POST" action={{route('communityMember.store')}}>
             @csrf
             <input name="communityId" type="hidden" value="{{$community->id}}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Join
            </button>
        </form>
        @else
        <form method="POST" action={{route('communityMember.destroy')}}>
            @method('DELETE')
            @csrf

            <input name="communityId" type="hidden" value="{{$community->id}}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Unsubscribe
            </button>
        </form>

        @endif
    @foreach ($community->posts as $post)
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
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

        </div>
        </div>

        </div>
        <div class="inline-block mt-10 " style="width: 250px; ">
            <div class="-my-8">
                <div class="border-gray-300 border-2 p-2 my-8" style="">
                        {{$community->posts_count}}
{{--                    @foreach($communities as $community)--}}
{{--                        <div class="PostIndexPageCommunities"}"><a href=""> {{$community->name}}</a></div>--}}
{{--                @endforeach--}}
            </div>
            <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Premium</div>
            <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Home</div>
        </div>
        </div>
        </div>
        <div class="flex-1"></div>
        </div>

</x-guest-layout>
<script>
    import ChatForm from "@/Components/ChatForm";
    export default {
        components: {ChatForm}
    }
</script>
