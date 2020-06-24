@extends('layouts.app')

@section('title', __('User Register'))

@section('content')
<div class="l-bg-gray">
    <div class="l-container">
        <div class="l-form-card">
            <div class="p-form-card">
                <h3 class="p-form-card__title">
                    {{ __('User Register') }}
                </h3>

                <div class="p-form-card__body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        @include('form_partials.nameForm')

                        @include('form_partials.emailForm')

                        @include('form_partials.passwordForm')

                        @include('form_partials.passwordConfirmForm')

                        <div class="p-form-card__submit">
                            <button type="submit" class="c-btn c-btn--blue c-btn--form">
                                {{ __('Register Now(free)') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
