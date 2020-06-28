{{--子STEP詳細のビュー--}}
@extends('layouts.app')

@section('title', $childStep->title)

@section('content')
    <div class="l-container">
        <div class="l-container-sub">

            @include('partials.stepData')

            <div class="p-childStep-detail">
                <div class="p-childStep-detail__title-area l-flexbox">
                    <span class="p-childStep-detail__number c-number">{{$childStep->step_number}}</span>
                    <h3 class="p-childStep-detail__title">{{$childStep->title}}</h3>
                </div>

                <div class="p-childStep-detail__content">

                    <p>{!! GitDown::parseAndCache($childStep->content) !!}</p>

                </div>
            </div>

        </div>

        <div class="c-back-btn-area">
            <button type="button" onclick="history.back()" class="c-back-btn">&lt;&lt; Back</button>
        </div>

    </div>
@endsection

