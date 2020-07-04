<section class="p-recommend l-flexbox">
    <div class="c-container-body">

        <div class="p-recommend__icon-area">
            <img src="{{asset('/img/step_icon.png')}}" alt="STEPのアイコン" class="p-recommend__icon">
        </div>

        <div class="p-recommend__btn-area">
            <button>
                <a href="{{route('register')}}" class="c-btn c-btn--yellow p-recommend__register" title="会員登録ページ">{{ __('Try Registering') }}</a>
            </button>
        </div>

        <a href="{{route('articles.list')}}" class="p-recommend__link" title="STEP一覧">会員登録しない場合はコチラから</a>

    </div>

</section>
