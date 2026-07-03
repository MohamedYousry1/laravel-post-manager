@if ($paginator->hasPages())
    <nav class="pro-pagination" role="navigation" aria-label="Pagination Navigation">
        <div class="pro-pagination-meta">
            <span class="pro-pagination-label">
                <i class="bi bi-journals"></i>
                Showing
                <strong>{{ $paginator->firstItem() }} – {{ $paginator->lastItem() }}</strong>
                of
                <strong>{{ $paginator->total() }}</strong>
                {{ $paginator->total() === 1 ? 'post' : 'posts' }}
            </span>
            <span class="pro-chip pro-chip-muted">
                Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
            </span>
        </div>

        <ul class="pro-pagination-list">
            {{-- Previous --}}
            <li>
                @if ($paginator->onFirstPage())
                    <span class="pro-pagination-btn pro-pagination-btn--nav is-disabled" aria-disabled="true">
                        <i class="bi bi-chevron-left"></i>
                        <span class="d-none d-sm-inline">Previous</span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pro-pagination-btn pro-pagination-btn--nav" aria-label="Previous page">
                        <i class="bi bi-chevron-left"></i>
                        <span class="d-none d-sm-inline">Previous</span>
                    </a>
                @endif
            </li>

            {{-- Page numbers: current page + next 2, then ... , then last page --}}
            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();
                $visibleEnd = min($current + 2, $last);
            @endphp

            @for ($page = $current; $page <= $visibleEnd; $page++)
                <li>
                    @if ($page == $current)
                        <span class="pro-pagination-btn is-active" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $paginator->url($page) }}" class="pro-pagination-btn" aria-label="Go to page {{ $page }}">{{ $page }}</a>
                    @endif
                </li>
            @endfor

            @if ($visibleEnd < $last - 1)
                <li>
                    <span class="pro-pagination-btn pro-pagination-btn--ellipsis" aria-hidden="true">&hellip;</span>
                </li>
            @endif

            @if ($visibleEnd < $last)
                <li>
                    <a href="{{ $paginator->url($last) }}" class="pro-pagination-btn" aria-label="Go to page {{ $last }}">{{ $last }}</a>
                </li>
            @endif

            {{-- Next --}}
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pro-pagination-btn pro-pagination-btn--nav" aria-label="Next page">
                        <span class="d-none d-sm-inline">Next</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                @else
                    <span class="pro-pagination-btn pro-pagination-btn--nav is-disabled" aria-disabled="true">
                        <span class="d-none d-sm-inline">Next</span>
                        <i class="bi bi-chevron-right"></i>
                    </span>
                @endif
            </li>
        </ul>
    </nav>
@endif
