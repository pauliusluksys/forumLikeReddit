@if ($paginator->hasPages())
    <div>

        @if ($paginator->onFirstPage())
                <div class="bg-gray-800 text-white text-sm font-medium rounded-sm inline-flex items-center py-2 px-4">
                    ← Previous
                </div>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <div class="bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium rounded-sm inline-flex items-center py-2 px-4">
                    ← Previous
                </div>
            </a>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <div class="disabled bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium rounded-sm inline-flex items-center py-2 px-4"><span>{{ $element }}</span></div>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class=" bg-gray-400 text-white text-sm font-medium rounded-sm inline-flex items-center py-2 px-4"><span>{{ $page }}</span></div>
                    @else
                            <a href="{{ $url }}"><div class="bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium rounded-sm inline-flex items-center py-2 px-4  ">{{ $page }}</div></a>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <div class="bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium rounded-sm inline-flex items-center py-2 px-4">
                        Next →
                    </div>
                </a>
            @else
            <div class=" disabled bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium rounded-sm inline-flex items-center py-2 px-4">
                Next →
            </div>
            @endif
    </div>
@endif
