@extends('layouts.app')

@section('title', __('Error'))

@section('content')
    <div class="l-bg-gray">
        <div class="l-container">
            <div class="l-container-sub">
                @php
                    $status_code = $exception->getStatusCode();
                    $message = $exception->getMessage();

                    if (! $message) {
                        switch ($status_code) {
                            case 400:
                                $message = 'Bad Request';
                                break;
                            case 401:
                                $message = '認証に失敗しました';
                                break;
                            case 403:
                                $message = 'アクセス権がありません';
                                break;
                            case 404:
                                $message = '存在しないページです';
                                break;
                            case 405:
                                $detail = '有効でない操作が行われました。';
                                break;
                            case 408:
                                $message = 'タイムアウトです';
                                break;
                            case 414:
                                $message = 'リクエストURIが長すぎます';
                                break;
                            case 419:
                                $message = '不正なリクエストです';
                                break;
                            case 500:
                                $message = 'Internal Server Error';
                                break;
                            case 503:
                                $message = 'Service Unavailable';
                                break;
                            default:
                                $message = 'エラー';
                                break;
                        }
                    }
                @endphp

                <div class="p-error-page">

                    <h1 class="p-error-page__title">{{ $status_code }}エラー {{ $message }}</h1>

                    @if(!empty($detail))
                        <p class="p-error-page__detail">
                            {{$detail}}
                        </p>
                    @else
                        <p>
                            エラーが発生しました。<br/>
                            下部のBackボタンから前のページに戻り、操作やURLに間違いがないか再度ご確認ください。
                        </p>
                    @endif
                    <p>
                        Backボタンが使えない場合は左上の「WebTips」のロゴを押して、トップページにお戻りください。
                    </p>
                </div>

            </div>

            <div class="c-back-btn-area">
                <button type="button" onclick="history.back()" class="c-back-btn">&lt;&lt; Back</button>
            </div>

        </div>
    </div>
@endsection

