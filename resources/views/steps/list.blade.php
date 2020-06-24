{{-- STEP一覧のビュー --}}
@extends('layouts.app')

@section('title', __('STEP List'))

@section('content')
<div class="l-bg-gray">
    <div class="l-container">

        <div class="p-steps l-flexbox">

            @forelse($steps as $step)

                <step
                :step="{{json_encode($step)}}"
                :step-user="{{json_encode($step->user)}}"
                :child-steps="{{json_encode($step->childSteps)}}"
                :step-categories="{{json_encode($step->categories)}}"
                :challenge-count="{{json_encode(count($step->challenges))}}"
                :step-challenges="{{json_encode($step->user->challenges)}}"
                :step-route="{{json_encode(route('steps.show', $step->id))}}"
                :step-url="{{json_encode(url("steps/detail/{$step->id}"))}}"
                :limit-title="{{json_encode(Str::limit($step->title,53))}}"
                @if(!empty($userAuth))
                    :user-auth="{{json_encode($userAuth)}}"
                    :default-challenge="{{json_encode($step->challenges->where('user_id', $userAuth->id)->first())}}"
                @endif
                ></step>

            @empty

                <div class="c-guide-msg">
                    <p class="c-guide-msg__text">投稿されたSTEPがありません。</p>
                    <p class="c-guide-msg__text">あなたの成功例をシェアしませんか？</p>
                    <a class="c-btn--yellow c-guide-msg__link" href="{{ route('steps.new') }}">{{ __('STEP POST Now') }}</a>
                </div>

            @endforelse
        </div>

        @if ( $steps->hasPages() )
            {{ $steps->links('pagination::default') }}
        @elseif(count($steps)!==0 )
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
@endsection
