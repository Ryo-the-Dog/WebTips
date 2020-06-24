@extends('layouts.app')

@section('title', __('Edit Profile'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="l-form-card">
                <div class="p-form-card">
                    <h3 class="p-form-card__title">
                        {{ __('Edit Profile') }}
                    </h3>
                    <div class="p-form-card__body">
                        <form method="POST" action="{{ route('mypage.profEdit') }}" enctype="multipart/form-data">
                            @csrf

                            @include('form_partials.nameForm')

                            @include('form_partials.emailForm')

                            @include('form_partials.userImageForm')

                            @include('form_partials.introduceForm')

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
