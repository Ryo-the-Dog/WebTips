{{--STEP詳細のビュー--}}
@extends('layouts.app')

@section('title', $step->title)

@section('content')
    <div class="l-container">
        <div class="l-container-sub">

            @include('partials.stepData')

            <ul class="p-childStep-list">

                @forelse( $step->childSteps as $childStep )
                    <li class="p-childStep-list__item l-flexbox">
                        @if(!empty($defaultChallenged))
                            {{-- １つ目の子STEPは必ずクリアボタンを有効にする --}}
                            @if($loop->first)
                                @php $prevClear = true @endphp
                            @endif
                            {{-- １つ前の子STEPをクリアしていなければ、クリアボタンを無効化する --}}
                            @if(empty($prevClear))
                                <button class="p-childStep-list__clear c-btn c-btn--clear is-disabled" disabled>
                                    <i class="fas fa-lock c-btn--clear__lock c-icon--lock"></i>クリア
                                </button>
                            {{-- １つ前の子STEPをクリアしていて、この子STEPをクリアしていない場合クリアボタンを有効化する --}}
                            @elseif(!$childStep->clears->where('user_id', $userAuth->id)->first())
                                <form action="{{route('childStep.clear', $childStep->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="p-childStep-list__clear c-btn c-btn--blue c-btn--clear">
                                        クリア
                                    </button>
                                </form>
                            {{-- １つ前の子STEPをクリアしていて、この子STEPをクリアしている場合ボタンを無効化してクリア済みマークを表示する --}}
                            @elseif($childStep->clears->where('user_id', $userAuth->id)->first())
                                <button class="p-childStep-list__clear c-btn c-btn--blue c-btn--clear is-cleared" disabled>
                                    <i class="far fa-check-circle c-btn--clear__check c-icon--check"></i>クリア
                                </button>
                            @endif
                            {{-- この子STEPをクリアしていたらtrueを格納する --}}
                            @php
                                $prevClear = false;
                                $prevClear = ($childStep->clears->where('user_id', $userAuth->id)->first()) ? true : false;
                            @endphp

                        @endif

                        <a class="p-childStep-list__link l-flexbox @if(!empty($defaultChallenged)) challenged @endif" href="{{route('childStep.show', $childStep->id)}}">
                            <span class="p-childStep-list__number c-number">{{$childStep->step_number}}</span>
                            <p class="p-childStep-list__title">{{$childStep->title}}</p>
                        </a>

                @empty
                    <p class="p-childStep-list__empty">STEPが登録されていません。</p>
                @endforelse

            </ul>

            @if(!empty($defaultChallenged))
                <form action="{{route('childStep.allunclear', $step->id)}}" method="post">
                    @csrf
                    <button type="submit" class="c-btn c-btn--red c-btn--restart">最初からやり直す</button>
                </form>
            @endif

        </div>

        <div class="c-back-btn-area">
            <button type="button" onclick="history.back()" class="c-back-btn">&lt;&lt; Back</button>
        </div>

    </div>
@endsection
