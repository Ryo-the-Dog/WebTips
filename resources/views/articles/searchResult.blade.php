{{-- STEP検索結果一覧のビュー --}}
@extends('layouts.app')

@section('title', __('Search Result'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-articles">
                <h2 class="c-title--page">[&nbsp;{{$keyword}}&nbsp;]の検索結果：{{$countSearchArticles}}件</h2>
                <div class="p-articles l-flexbox">
                    @forelse($searchArticles as $article)
                        <articleitem
                            :article="{{json_encode($article)}}"
                            :child-steps="{{json_encode($article->chapters)}}"
                            :step-categories="{{json_encode($article->categories)}}"
                            :challenge-count="{{json_encode(count($article->learns))}}"
                            :step-challenges="{{json_encode($article->user->learns)}}"
                            :step-user="{{json_encode($article->user)}}"
                            :step-route="{{json_encode(route('articles.show', $article->id))}}"
                            :step-url="{{json_encode(url("articles/detail/{$article->id}"))}}"
                            :limit-title="{{json_encode(Str::limit($article->title,53))}}"
                            @if(!empty($userAuth))
                                :user-auth="{{json_encode($userAuth)}}"
                                :default-challenge="{{json_encode($article->learns->where('user_id', $userAuth->id)->first())}}"
                            @endif
                        ></articleitem>
                    @empty
                        <div class="c-guide-msg">
                            <p class="c-guide-msg__text">投稿された記事がありません。</p>
                            <p class="c-guide-msg__text">あなたの知識や経験をシェアしませんか？</p>
                            <a class="c-btn--yellow c-guide-msg__link" href="{{ route('articles.new') }}">{{ __('POST Now') }}</a>
                        </div>
                    @endforelse
                </div>
            </div>
            @if ( $searchArticles->hasPages() )
                {{ $searchArticles->appends(Request::only('keyword'))->links('pagination::default') }}
            @elseif(count($searchArticles)!==0 )
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
