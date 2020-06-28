{{-- ユーザープロフィールのビュー --}}
@extends('layouts.app')

@section('title', $userProf->name.__("'s Posted Articles"))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-step-list">
                <div class="p-steps l-flexbox">
                    @forelse($userPostSteps as $step)

                            @include('partials.step')

                    @empty
                        <div class="p-steps__empty">
                            <p class="p-steps__empty-text">
                                投稿された記事がありません。
                            </p>
                        </div>
                    @endforelse

                </div>
            </div>
            @if ( $userPostSteps->hasPages() )
                {{ $userPostSteps->links('pagination::default') }}
            @elseif(count($userPostSteps)!==0 )
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
