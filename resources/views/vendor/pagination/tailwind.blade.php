@if ($paginator->hasPages())
    <div class="pagination-container"  aria-label="{{ __('Pagination Navigation') }}">
        <div class="">
            @if ($paginator->onFirstPage())
                <span class="">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="">

            <div>
                <span class="">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="" aria-label="{{ __('pagination.previous') }}">

                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="" aria-label="{{ __('pagination.next') }}">

                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="" >
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </div>
@endif
