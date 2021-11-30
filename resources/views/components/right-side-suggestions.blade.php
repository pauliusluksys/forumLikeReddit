<div class="inline-block mt-10 " style="width: 250px; ">
    <div class="-my-8">
        <div class="border-gray-300 border-2 p-2 my-8" >
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
