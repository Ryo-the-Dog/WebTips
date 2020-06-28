{{-- STEP一覧画面で使用するSTEP単体のパネル --}}
<div class="p-step-panel c-panel">

    <!-- パネル全体をリンクにする -->
    <a href="{{route('steps.show', $step->id)}}" class="p-step-panel__link-large" title="チャレンジページ"></a>

    <div class="p-step-panel__stepImg-area">
        <img src="@if(empty($step->step_img)){{asset('/img/no_img_step.png')}}
        @else{{$step->step_img}}@endif" class="p-step-panel__stepImg" alt="STEPの画像">
    </div>

    <!-- STEPパネルの下半分 -->
    <div class="p-step-panel__contents">

        <div class="p-step-panel__title-area l-flexbox">
            <h3 class="p-step-panel__title">{{Str::limit($step->title,53)}}</h3>
        </div>

        <div class="p-step-panel__item p-step-panel__category-area">
            @forelse($step->categories as $category)
                <span class="p-step-panel__category c-badge">{{ $category->name }}</span>
            @empty
                <span class="p-step-panel__category c-badge">カテゴリー未登録</span>
            @endforelse
        </div>

{{--        <div class="p-step-panel__item">--}}
{{--            <p class="u-text-gray-500">--}}
{{--                目安達成時間：{{$step->time}} 時間--}}
{{--            </p>--}}
{{--        </div>--}}

        <div class="p-step-panel__item">
            @if(!empty($step->childSteps))
                <p class="u-text-gray-500">
                    全{{count($step->childSteps)}}ステップ
                </p>
            @endif
        </div>

        <div class="p-step-panel__bottom l-flexbox">

            <div class="p-step-panel__twitter-area">
                <a href="http://twitter.com/intent/tweet?url={{url("steps/detail/{$step->id}")}}&text=「{{$step->title}}」に挑戦中！！&hashtags=STEP" title="Twitterでつぶやく">
                    <i class="fab fa-twitter c-icon--twitter"></i>
                </a>
            </div>

            <div class="@if( Route::currentRouteName() === 'mypage.mystep') p-step-panel__myStep-challenge-area @else u-ml-auto @endif
                 @if(empty($step->challenges->where('user_id', Auth::id())->first())) u-text-gray-500 @else u-text-red @endif">
                <i class="fas fa-fire-alt"></i>
                <span>{{count($step->challenges)}}人が挑戦中！</span>
            </div>

            @if(Route::currentRouteName() === 'mypage.mystep')
                <form action="{{ route('step.delete', $step->id) }}" method="POST" class="p-step-panel__deleteForm">
                    @csrf
                    <button onclick="return confirm('本当にこのSTEPを削除してよろしいですか？');"
                            class="c-btn c-btn--red c-btn--mystep p-step-panel__delete">
                        {{__('Delete')}}
                    </button>
                </form>
                <a class="c-btn c-btn--blue c-btn--mystep" href="{{route('mypage.mystepEdit', $step->id)}}">{{__('Edit')}}</a>
            @endif

        </div>

    </div>

</div>
