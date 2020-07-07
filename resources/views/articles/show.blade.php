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
                        <li class=" ">
                            <div class="p-chapter-list__title-outer l-flexbox">

{{--                                <a class="p-chapter-list__link l-flexbox @if(!empty($defaultLearned)) challenged @endif" href="{{route('childStep.show', $chapter->id)}}">--}}

                                    <span class="p-chapter-list__number c-number">{{$chapter->chapter_number}}</span>

                                    <p class="p-chapter-list__title">{{$chapter->title}}</p>

{{--                                </a>--}}
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
                    @if(!empty($defaultCleared))
                        <form action="{{route('article.unclear', $article->id)}}" method="post">
                            @csrf
                            <button type="submit" class="c-btn--uncleared">
                                <i class="fas fa-times-circle"></i>
                                {{__('Not Cleared')}}
                            </button>
                        </form>

                    @else
                        <form action="{{route('article.clear', $article->id)}}" method="post">
                            @csrf
                            <button type="submit" class="c-btn--cleared">
                                <i class="fas fa-check-circle"></i>
                                {{__('Cleared')}}
                            </button>
                        </form>

                    @endif

                @endif
            </div>

            <div class="c-back-btn-area">
                <button type="button" onclick="history.back()" class="c-back-btn">&lt;&lt; Back</button>
            </div>
        </div>
    </div>
@endsection
