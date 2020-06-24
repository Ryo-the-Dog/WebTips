{{-- STEP登録のビュー --}}
@extends('layouts.app')

@section('title', __('STEP Edit'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="l-form-card">
                <div class="p-form-card">
                    <h3 class="p-form-card__title">
                        {{ __('STEP Edit') }}
                    </h3>

                    <div class="p-form-card__body">
                        <form method="POST" action="{{ route('mypage.mystepEdit', $step->id) }}" enctype="multipart/form-data">
                            @csrf

                            @include('form_partials.stepForm')

                            <div class="p-form-card__submit">
                                <button type="submit" class="c-btn c-btn--blue c-btn--form">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
