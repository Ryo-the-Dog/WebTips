@extends('layouts.app')

@section('title', __('Edit Profile'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="l-form-card">
                <div class="p-form-card">
                    <h3 class="p-form-card__title">
                        {{ __('Edit Password') }}
                    </h3>
                    <div class="p-form-card__body">
                        <form method="POST" action="{{ route('mypage.passEdit') }}">
                            @csrf

                            @include('form_partials.passwordOldForm')

                            @include('form_partials.passwordForm')

                            @include('form_partials.passwordConfirmForm')

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
