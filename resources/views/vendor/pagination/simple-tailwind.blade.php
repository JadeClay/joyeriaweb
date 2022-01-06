@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="material-icons">
                navigate_before
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <span class="material-icons">
                    navigate_before
                </span>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                <span class="material-icons">
                    navigate_next
                </span>
            </a>
        @else
            <span class="material-icons">
                navigate_next
            </span>
        @endif
    </nav>
@endif
