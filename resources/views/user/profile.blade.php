<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>
        <div class="flex mt-16">
            <div class="flex-1"></div>
            <div class="py-2 flex-none mx-auto inline-block flex content-start sm:px-6 lg:px-8" style="width: 1000px;">
                <div class="  inline-block" style="width:750px;">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">

                        <div class="p-6 bg-white border-b border-gray-200 ">

                            <div class=" flex -px-2 mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
                                <div class="mx-4">Overview</div>
                                <div class="mx-4">Posts</div>
                                <div class="mx-4">Comments</div>
                            </div>
                            @isset($posts)
                            @foreach ($posts as $post)
                                @include('Post.onePost')
                            @endforeach
                            <div class="flex justify-center py-3">
                                {!! $posts->links('vendor.pagination.custom') !!}
                            </div>
                            @endisset
                            @if (count($posts) === 0)
                                Nothing to see here!
                            @endif
                        </div>
                    </div>
                </div>
                <div class="inline-block mt-10 " style="width: 250px; ">
                    <div class="-my-8">
                        <div class="border-gray-300 border-2 p-2 my-8" >
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

                        </div>
                        <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;"><a href="route('user.settings')">Settings</a> </div>
                        <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Karma: </div>
                        <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Birthdate: </div>
                        <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Send message</div>
                        <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Block user</div>
                        <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Report user</div>
                    </div>
                </div>
            </div>

            <div class="flex-1"></div>

        </div>
</x-guest-layout>
