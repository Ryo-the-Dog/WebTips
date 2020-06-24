@extends('layouts.app')

@section('title', __('Login'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">

            <div class="l-form-card">
                <div class="p-form-card">

                    <h3 class="p-form-card__title">
                        {{ __('Login') }}
                    </h3>

                    <div class="p-form-card__body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @include('form_partials.emailForm')

                            @include('form_partials.passwordForm')

                            @include('form_partials.rememberForm')

                            <div class="p-form-card__submit">
                                <button type="submit" class="c-btn c-btn--blue c-btn--form">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="p-form-card__forget-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
