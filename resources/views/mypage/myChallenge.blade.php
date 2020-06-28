{{-- マイページのチャレンジ関連のSTEP一覧のビュー --}}
@extends('layouts.app')

@section('title', __('My Challenge List - Mypage'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-step-list">
                {{-- 学習中のSTEP一覧 --}}
                <h2 class="c-title--page">学習中の記事</h2>
                <div class="p-steps l-flexbox">
                    @forelse($challengeSteps as $step)

                        @include('partials.step')

                    @empty
                        <div class="p-steps__empty">
                            <p class="p-steps__empty-text">
                                学習中の記事はありません。
                            </p>
                            <a href="{{ route('steps.list') }}" class="c-btn--yellow p-steps__empty-link">記事を探してみる</a>
                        </div>
                    @endforelse
                </div>

                {{-- 習得済みのSTEP一覧 --}}
                <h2 class="c-title--page">習得済みの記事</h2>
                <div class="p-steps l-flexbox">
                    @forelse($allClearSteps as $step)

                        @include('partials.step')

                    @empty
                        <div class="p-steps__empty">
                            <p class="p-steps__empty-text">
                                習得済みの記事はありません。
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
