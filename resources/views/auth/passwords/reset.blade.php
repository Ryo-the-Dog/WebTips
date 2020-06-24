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
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            @include('form_partials.emailForm')

                            @include('form_partials.passwordForm')

                            @include('form_partials.passwordConfirmForm')

                            <div class="p-form-card__submit">
                                <button type="submit" class="c-btn c-btn--blue c-btn--form">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
