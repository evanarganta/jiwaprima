@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" style="display: flex; justify-content: space-between; align-items: center; width: 100%; font-family: var(--uk-font); font-size: 19px;">
        <div>
            @if ($paginator->onFirstPage())
                <span class="uk-btn uk-btn-sm" style="color: var(--uk-gray); cursor: not-allowed; opacity: 0.5;">&laquo; PREV</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="uk-btn uk-btn-sm">&laquo; PREV</a>
            @endif
        </div>

        <div style="display: flex; gap: 8px; align-items: center; justify-content: center;">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span style="color: var(--uk-gray); padding: 0 4px;">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="uk-page-btn uk-page-active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="uk-page-btn">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        <div>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="uk-btn uk-btn-sm">NEXT &raquo;</a>
            @else
                <span class="uk-btn uk-btn-sm" style="color: var(--uk-gray); cursor: not-allowed; opacity: 0.5;">NEXT &raquo;</span>
            @endif
        </div>
    </nav>
@endif
