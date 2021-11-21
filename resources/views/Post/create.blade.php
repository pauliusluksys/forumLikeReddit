<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class=" flex -px-2 mt-12 p-2 border-gray-300 border-2 border-opacity-75 rounded-sm">
        <form class="w-full max-w-sm" method="POST" enctype="multipart/form-data" id="upload-post" action="{{ route('post.store') }}" >
            @csrf
            <div class="md:flex md:items-center mb-6">


                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="title">
                        Title
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="title" type="text" name="title">
                </div>

            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="title">
                        Content
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="invisible" type="hidden" value="{{$community->id}}">
                    <textarea class="bg-gray-200 appearance-none border-2 border-gray-200
                    rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                              id="body" type="text" value="body" name="body">

                    </textarea>
                    <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <input type="file" name="image" placeholder="Choose image" id="image">
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>

