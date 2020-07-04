{{-- 記事登録のビュー --}}
@extends('layouts.app')

@section('title', __('Article Edit'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="l-form-card--post">
                <div class="p-form-card">

                    <div class="p-form-card__body">
                        <form method="POST" action="{{ route('article.edit', $article->id) }}" enctype="multipart/form-data">
                            @csrf

                            @include('form_partials.postForm')

                            <div class="p-form-card__submit">
                                <button type="submit" class="c-btn c-btn--blue c-btn--form">
                                    {{ __('Save') }}
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
