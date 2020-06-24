{{-- マイページのチャレンジ関連のSTEP一覧のビュー --}}
@extends('layouts.app')

@section('title', __('My Challenge List - Mypage'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-step-list">
                {{-- チャレンジ中のSTEP一覧 --}}
                <h2 class="c-title--page">チャレンジ中のSTEP</h2>
                <div class="p-steps l-flexbox">
                    @forelse($challengeSteps as $step)

                        @include('partials.step')

                    @empty
                        <div class="p-steps__empty">
                            <p class="p-steps__empty-text">
                                チャレンジ中のSTEPはありません。
                            </p>
                            <a href="{{ route('steps.list') }}" class="c-btn--yellow p-steps__empty-link">STEPを探してみる</a>
                        </div>
                    @endforelse
                </div>

                {{-- クリア済みのSTEP一覧 --}}
                <h2 class="c-title--page">達成済みのSTEP</h2>
                <div class="p-steps l-flexbox">
                    @forelse($allClearSteps as $step)

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
