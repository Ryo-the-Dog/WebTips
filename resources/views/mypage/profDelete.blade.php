{{-- アカウント削除ページのビュー --}}
@extends('layouts.app')

@section('title', __('Account Release'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="l-form-card">
                <div class="p-form-card">
                    <h3 class="p-form-card__title">
                        {{ __('Delete Account') }}
                    </h3>

                    <div class="p-form-card__body">
                        <form method="POST" action="{{ route('mypage.profDelete') }}">
                            @csrf

                            <p>
                                アカウント情報と投稿したSTEP、チャレンジ履歴が全て削除されます。<br>
                                アカウントを削除してよろしいですか？
                            </p>

                            <div class="p-form-card__submit">
                                <button type="submit" class="c-btn c-btn--red c-btn--form"  onclick="return confirm('本当にアカウントを削除してよろしいですか？');">
                                    {{ __('Delete Now') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
