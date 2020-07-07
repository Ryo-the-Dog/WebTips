{{-- ユーザープロフィール　ユーザーが学習済みの記事一覧のビュー --}}
@extends('layouts.app')

@section('title', $userProf->name.__("'s Clear List"))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-articles">

                <div class="p-articles l-flexbox">
                    @forelse($userClearArticles as $article)

                        @include('partials.article')

                    @empty
                        <div class="p-articles__empty">
                            <p class="p-articles__empty-text">
                                学習済みの記事はありません。
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>

            @if ( $userClearArticles->hasPages() )
                {{ $userClearArticles->links('pagination::default') }}
            @elseif(count($userClearArticles)!==0 )
                {{-- ページが１ページでもページネーションを表示する --}}
                <ul class="c-pagination">
                    <li aria-disabled="true" aria-label="« Previous" class="c-pagination__page-item disabled">
                        <span aria-hidden="true" class="c-pagination__page-link">‹</span>
                    </li>
                    <li aria-current="page" class="c-pagination__page-item active">
                        <span class="c-pagination__page-link">1</span>
                    </li>
                    <li aria-disabled="true" aria-label="Next »" class="c-pagination__page-item disabled">
                        <span aria-hidden="true" class="c-pagination__page-link">›</span>
                    </li>
                </ul>
            @else

            @endif

        </div>
    </div>

@endsection
