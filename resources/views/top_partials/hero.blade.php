{{--トップページのヒーロー画像のビュー--}}
<section class="p-hero" id="top">
    <div class="p-hero__area l-container l-flexbox">

        <h2 class="p-hero__title">web開発の知識をシェアしよう</h2>

        <p class="p-hero__text u-text-white">
            WebTipsはweb開発の情報をシェアすることで<br/>
            エンジニアをサポートするサービスです
        </p>

        <button>
            <a href="{{ route('register') }}" class="c-btn c-btn--yellow p-hero__register" title="会員登録ページ">{{ __('Try Registering') }}</a>
        </button>

        <a href="{{ route('articles.list') }}" class="p-hero__link" title="STEP一覧">会員登録しない場合はコチラから</a>

    </div>
</section>
