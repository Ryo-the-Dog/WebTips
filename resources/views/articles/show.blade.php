{{--記事詳細のビュー--}}
@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="l-bg-gray">

        <div class="l-container-sub">

            <div class="l-article">

                @include('partials.articleData')

                <ul class="p-chapter-list">

                    @forelse( $article->chapters as $chapter )
                        <li>
                            <div class="p-chapter-list__title-outer l-flexbox">

                                    <span class="p-chapter-list__number c-number">{{$chapter->chapter_number}}</span>

                                    <p class="p-chapter-list__title">{{$chapter->title}}</p>

                            </div>

                            <div class="p-chapter-list__content">
                                {!! GitDown::parseAndCache($chapter->content) !!}
                            </div>

                        </li>
                    @empty
                        <p class="p-chapter-list__empty">まだ記事内容が登録されていません。</p>
                    @endforelse

                </ul>

                @if(!empty($defaultLearned))
                <clearbtn
                :notcleared-en="{{json_encode(__('Not Cleared'))}}"
                :cleared-en="{{json_encode(__('Cleared'))}}"
                :article="{{json_encode($article)}}"
                :article-id="{{json_encode($article->id)}}"
                @if(!empty($userAuth))
                    :user-auth="{{json_encode($userAuth)}}"
                    :default-clear="{{json_encode($article->clears->where('user_id', $userAuth->id)->first())}}"
                @endif

                ></clearbtn>

                @endif
            </div>

            <div class="c-back-btn-area">
                <button type="button" onclick="history.back()" class="c-back-btn">&lt;&lt; Back</button>
            </div>
        </div>
    </div>
@endsection
