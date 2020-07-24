{{-- ユーザープロフィールのビュー --}}
@extends('layouts.app')

@section('title', $userProf->name.__("'s Posted Articles"))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-articles l-flexbox">
                @forelse($userPostArticles as $article)

                    <articleitem
                        :article="{{json_encode($article)}}"
                        :article-user="{{json_encode($article->user)}}"
                        :chapters="{{json_encode($article->chapters)}}"
                        :article-categories="{{json_encode($article->categories)}}"
                        :learn-count="{{json_encode(count($article->learns))}}"
                        :article-learns="{{json_encode($article->user->learns)}}"
                        :article-route="{{json_encode(route('articles.show', $article->id))}}"
                        :userprofile-route="{{json_encode(route('userProfile.learn', $article->user->id))}}"
                        :mypage-route="{{json_encode(route('mypage.learn'))}}"
                        :article-url="{{json_encode(url("articles/detail/{$article->id}"))}}"
                        :limit-title="{{json_encode(Str::limit($article->title,53))}}"
                        @if(!empty($userAuth))
                        :user-auth="{{json_encode($userAuth)}}"
                        :default-learn="{{json_encode($article->learns->where('user_id', $userAuth->id)->first())}}"
                        @endif
                    ></articleitem>

                @empty
                    <div class="p-articles__empty">
                        <p class="p-articles__empty-text">
                            投稿された記事がありません。
                        </p>
                    </div>
                @endforelse

            </div>
            @if ( $userPostArticles->hasPages() )
                {{ $userPostArticles->links('pagination::default') }}
            @elseif(count($userPostArticles)!==0 )
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
