{{-- ユーザープロフィール　ユーザーがチャレンジしているSTEP一覧のビュー --}}
@extends('layouts.app')

@section('title', $userProf->name.__("'s Challenge List"))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-step-list">
                {{-- 学習中のSTEP一覧 --}}
                <h2 class="c-title--page">学習中の記事</h2>
                <div class="p-steps l-flexbox">
                    @forelse($userChallengeSteps as $step)

                        @include('partials.step')

                    @empty
                        <div class="p-steps__empty">
                            <p class="p-steps__empty-text">
                                学習中の記事はありません。
                            </p>
                        </div>

                    @endforelse

                </div>

                {{-- 習得済みのSTEP一覧 --}}
                <h2 class="c-title--page">習得済みの記事</h2>
                <div class="p-steps l-flexbox">
                    @forelse($userAllClearSteps as $step)

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
