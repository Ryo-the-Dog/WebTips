{{-- STEP登録のビュー --}}
@extends('layouts.app')

@section('title', __('STEP POST'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">

            <div class="l-form-card--post">
                <div class="p-form-card p-form-card--post">

{{--                    <h3 class="p-form-card__title">--}}
{{--                        {{ __('STEP POST') }}--}}
{{--                    </h3>--}}

                    <div class="p-form-card__body">

                        <form method="POST" action="{{ route('articles.new') }}" enctype="multipart/form-data">
                            @csrf

                            @include('form_partials.postForm')

                            <div class="p-form-card__submit">
                                <button type="submit" class="c-btn c-btn--blue c-btn--form">
                                    {{ __('Post') }}
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

            <div class="c-back-btn-area">
                <button type="button" onclick="history.back()" class="c-back-btn">&lt;&lt; Back</button>
            </div>

        </div>
    </div>
@endsection
