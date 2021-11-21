<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>
    <div class=" mt-4 border-gray-300 border-2 border-opacity-75 rounded-sm">
        <div class=" ml-8 mr-8  p-2  inline-block">posts</div><div class="  p-2 inline-block">comments</div>
    </div>
    @isset($posts)

    @foreach ($posts as $post)
        <div class="mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
            <div class=" flex flex-row ">
                <div class="flex-shrink-0 p-1">
                    leave like
                </div>
                <div>
                    <div class="flex">
                        <div class="text-sm font-bold">Category name:</div>
                        <div class="text-xs m-0.5 inline-block	">submitted by: <p class="text-blue-700 inline-block	">{{  $post->user->name}}</p> submitted when: {{ $post->created_at->diffForHumans()}}</div>
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

    {!! $posts->links() !!}
    @endisset

    @if (count($posts) === 0)
        Nothing to see here!
        @endif
    <div class="container">
        <h1>How to Get Current User Location with Laravel - ItSolutionStuff.com</h1>
        <div class="card">
            <div class="card-body">
                @if($currentUserInfo)
                    <h4>IP: {{ $currentUserInfo->ip }}</h4>
                    <h4>Country Name: {{ $currentUserInfo->countryName }}</h4>
                    <h4>Country Code: {{ $currentUserInfo->countryCode }}</h4>
                    <h4>Region Code: {{ $currentUserInfo->regionCode }}</h4>
                    <h4>Region Name: {{ $currentUserInfo->regionName }}</h4>
                    <h4>City Name: {{ $currentUserInfo->cityName }}</h4>
                    <h4>Zip Code: {{ $currentUserInfo->zipCode }}</h4>
                    <h4>Latitude: {{ $currentUserInfo->latitude }}</h4>
                    <h4>Longitude: {{ $currentUserInfo->longitude }}</h4>
                @endif
            </div>
        </div>
    </div>

        <div class="inline-block mt-10 " style="width: 250px; ">
            <div class="-my-8">
                <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">User: {{$user->name}}</div>
                <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;"><a href="">chat</a></div>
                <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Home</div>
            </div>
        </div>
        <div class="flex-1"></div>

</x-guest-layout>
