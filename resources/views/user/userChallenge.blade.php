{{-- ユーザープロフィール　ユーザーがチャレンジしているSTEP一覧のビュー --}}
@extends('layouts.app')

@section('title', $userProf->name.__("'s Challenge List"))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-step-list">
                {{-- チャレンジ中のSTEP一覧 --}}
                <h2 class="c-title--page">チャレンジ中のSTEP</h2>
                <div class="p-steps l-flexbox">
                    @forelse($userChallengeSteps as $step)

                        @include('partials.step')

                    @empty
                        <div class="p-steps__empty">
                            <p class="p-steps__empty-text">
                                チャレンジ中のSTEPはありません。
                            </p>
                        </div>

                    @endforelse

                </div>

                {{-- クリア済みのSTEP一覧 --}}
                <h2 class="c-title--page">達成済みのSTEP</h2>
                <div class="p-steps l-flexbox">
                    @forelse($userAllClearSteps as $step)

                        @include('partials.step')

                    @empty
                        <div class="p-steps__empty">
                            <p class="p-steps__empty-text">
                                達成済みのSTEPはありません。
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
