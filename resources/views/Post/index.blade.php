<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>
    <div class="flex mt-6">
        <div class="flex-1"></div>
        <div class="py-2 flex-none mx-auto inline-block flex content-start sm:px-6 lg:px-8" style="width: 1000px;">
            <div class="  inline-block" style="width:750px;">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="p-6 bg-white border-b border-gray-200 ">
                        <div class=" flex -px-2 mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">

                            <div class="mx-4">Create new post:</div>
                        </div>

                        <div class=" flex -px-2 mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
                            <div class="mx-4">Best</div>
                            <div class="mx-4">Hot</div>
                            <div class="mx-4">New</div>
                            <div class="mx-4"> Top</div>
                        </div>
                        @foreach ($posts as $post)
                            @include('Post.onePost')
                        @endforeach

                        {!! $posts->links() !!}
                    </div>
                </div>

            </div>
            <div class="inline-block mt-10 " style="width: 250px; ">
                <div class="-my-8">
                    <div class="border-gray-300 border-2 p-2 my-8" style="">
                        <h1>Some communities for you:</h1>
                        @foreach($communities as $community)
                            <div class="PostIndexPageCommunities"><a
                                href={{route('community.show',['community'=>$community->id])}}> {{$community->name}}</a>
                    </div>
                    @endforeach
                </div>
                <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Premium</div>
                <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Home</div>
            </div>
        </div>
    </div>


    <div class="flex-1"></div>
    </div>
</x-guest-layout>
