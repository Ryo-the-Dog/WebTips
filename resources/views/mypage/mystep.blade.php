{{-- ログインユーザーが投稿したSTEP一覧のビュー --}}
@extends('layouts.app')

@section('title', __('My Post List - Mypage'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="p-step-list">
                <div class="p-steps l-flexbox">
                    @forelse($mySteps as $step)

                        @include('partials.step')

                    @empty
                        <div class="c-guide-msg">
                            <p class="c-guide-msg__text">投稿されたSTEPがありません。</p>
                            <p class="c-guide-msg__text">あなたの成功例をシェアしませんか？</p>
                            <a class="c-btn--yellow c-guide-msg__link" href="{{ route('steps.new') }}">{{ __('STEP POST Now') }}</a>
                        </div>
                    @endforelse
                </div>
            </div>
            @if ( $mySteps->hasPages() )
                {{ $mySteps->links('pagination::default') }}
            @elseif(count($mySteps)!==0 )
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
