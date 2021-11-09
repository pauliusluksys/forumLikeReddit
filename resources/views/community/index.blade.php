<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class=" flex -px-2 mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">

    </div>

    <div class=" flex -px-2 mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
        <div class="mx-4">Best</div>
        <div class="mx-4">Hot</div>
        <div class="mx-4">New</div>
        <div class="mx-4"> Top</div>
    </div>
        @foreach($communities as $community)
        <div class="mt-4 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
            <a href={{route('community.show', ['community'=>$community->id])}}>{{$loop->index+1}}   {{$community->name}}</a>
        </div>

        @endforeach
        </div>

        </div>

        </div>
        <div class="inline-block mt-10 " style="width: 250px; ">
            <div class="-my-8">
            </div>
            <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Premium</div>
            <div class="border-gray-300 border-2 p-2 my-8" style="height: 50px;">Home</div>
        </div>
        </div>
        </div>
        <div class="flex-1"></div>
        </div>

</x-guest-layout>
