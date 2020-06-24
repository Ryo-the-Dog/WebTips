@if ($paginator->hasPages())
    <ul role="navigation" class="c-pagination">
        {{-- First Page View --}}
        <li class="c-pagination__page-item {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
            <a class="c-pagination__page-link" href="{{ $paginator->url(1) }}">&laquo;</a>
        </li>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-disabled="true" aria-label="@lang('pagination.previous')" class="c-pagination__page-item disabled">
                <span aria-hidden="true" class="c-pagination__page-link">&lsaquo;</span>
            </li>
        @else
            <li class="c-pagination__page-item">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="c-pagination__page-link">&lsaquo;</a>
            </li>
        @endif

        <?php $display_page_num = 5; ?>
        @if ($paginator->lastPage() > $display_page_num)

            {{-- 現在ページが表示するリンクの中心位置よりも左の時 --}}
            @if ($paginator->currentPage() <= floor($display_page_num / 2))
                <?php $start_page = 1; //最初のページ ?>
                <?php $end_page = $display_page_num; ?>

                {{-- 現在ページが表示するリンクの中心位置よりも右の時 --}}
            @elseif ($paginator->currentPage() > $paginator->lastPage() - floor($display_page_num / 2))
                <?php $start_page = $paginator->lastPage() - $display_page_num + 1 ; ?>
                <?php $end_page = $paginator->lastPage(); ?>

                {{-- 現在ページが表示するリンクの中心位置の時 --}}
            @else
                <?php $start_page = $paginator->currentPage() - (floor(($display_page_num % 2 == 0 ? $display_page_num - 1 : $display_page_num)  / 2)); ?>
                <?php $end_page = $paginator->currentPage() + floor($display_page_num / 2); ?>
            @endif

            {{-- 定数よりもページ数が少ない時 --}}
        @else
            <?php $start_page = 1; ?>
            <?php $end_page = $paginator->lastPage() ; ?>
        @endif

        {{-- 処理部分 --}}
        @for ($i = $start_page; $i <= $end_page; $i++)
            @if ($i == $paginator->currentPage())
                <li class="c-pagination__page-item active">
                    <span class="c-pagination__page-link">{{ $i }}</span>
                </li>
            @else
                <li class="c-pagination__page-item">
                    <a href="{{ $paginator->url($i) }}" class="c-pagination__page-link">{{ $i }}</a>
                </li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="c-pagination__page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="c-pagination__page-link">&rsaquo;</a>
            </li>
        @else
            <li class="c-pagination__page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true" class="c-pagination__page-link">&rsaquo;</span>
            </li>
        @endif
        {{-- Last Page Link --}}
        <li class="c-pagination__page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="c-pagination__page-link">&raquo;</a>
        </li>
    </ul>
@endif
