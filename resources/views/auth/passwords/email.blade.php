@extends('layouts.app')

@section('title', __('Reset Password'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="l-form-card">
                <div class="p-form-card">
                    <h3 class="p-form-card__title">
                        {{ __('Reset Password') }}
                    </h3>

                    <div class="p-form-card__body">
                        @if (session('status'))
                            <div class="p-form-card__alert" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            @include('form_partials.emailForm')

                            <div class="p-form-card__submit">
                                <button type="submit" class="c-btn c-btn--blue c-btn--form">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
