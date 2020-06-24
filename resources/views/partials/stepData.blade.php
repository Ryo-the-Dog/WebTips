{{--STEP詳細画面のデータ部分のビュー--}}
<div class="p-step-detail">

    <h2 class="p-step-detail__title">{{$step->title}}</h2>

    @if(Route::currentRouteName()==='steps.show')
        <div class="p-step-detail__eyecatch-area">
            <div class="p-step-detail__category-area">
                @forelse($step->categories as $category)
                    <span class="c-badge">{{ $category->name }}</span>
                @empty
                    <p>
                        <span class="c-badge">カテゴリー未登録</span>
                    </p>
                @endforelse
            </div>

            <img src="@if(empty($step->step_img)){{asset('img/no_img_step.png')}}
            @else{{$step->step_img}}@endif" class="p-step-detail__eyecatch c-eyecatch" alt="STEPの画像">
        </div>
    @endif

    <div class="p-step-detail__stepData-area">

        <div class="p-step-detail__description-area">
            <p>
                【 目安達成時間：{{$step->time}} 時間 】
            </p>
            <p>
                {!! nl2br(e($step->description)) !!}
            </p>
        </div>

        <div class="p-postdata u-text-gray-500 l-flexbox">
            <div class="p-postdata__profile-area l-flexbox">

                <!-- 投稿者の画像と名前全体をリンクにする -->
                @if(empty($step->user))

                @else
                    @auth
                        <a href="@if($userAuth->id === $step->user->id){{route('mypage.challenge')}}@else{{route('userProfile.challenge', $step->user->id)}}@endif" class="p-step-detail__profile-link"></a>
                    @else
                        <a href="{{route('userProfile.challenge', $step->user->id)}}" class="p-step-detail__profile-link p-postdata__profile-link"></a>
                    @endauth
                @endif

                <div class="p-postdata__avatar-area">
                    <img src="@if(empty($step->user->user_img)){{asset('img/blank-profile.png')}}@else{{$step->user->user_img}}@endif"
                         alt="投稿者の画像" class="c-avatar">
                </div>
                <p class="p-postdata__name">
                    @if(empty($step->user->name))
                        削除済みユーザー
                    @else
                        {{$step->user->name}}
                    @endif
                </p>

            </div>

            <p class="p-postdata__post-date">
                {{$step->updated_at->format('Y/m/d')}}
            </p>
        </div>

        <div class="p-step-detail__icon-area l-flexbox">
            <div>
                <a href="http://twitter.com/intent/tweet?url={{url("steps/detail/{$step->id}")}}&text=「{{$step->title}}」に挑戦中！！&hashtags=STEP" title="Twitterでつぶやく">
                    <i class="fab fa-twitter c-icon--twitter"></i>
                </a>
            </div>
            <div class="@if(empty($defaultChallenged)) u-text-gray-500 @else u-text-red @endif">
                <i class="fas fa-fire-alt"></i>
                <span>{{count($step->challenges)}}人が挑戦中！</span>
            </div>
        </div>

    </div>

    <div class="p-step-detail__bottom u-text-gray-500 l-flexbox">

        <div class="p-step-detail__item">

            @if(!empty($defaultChallenged))
                @if(!empty($allClearFlg))
                    <div class="c-allClear l-flexbox">
                        <img src="{{asset('/img/allClear_left.png')}}" alt="" class="c-allClear__icon">
                        <span class="c-allClear__msg u-text-red">
                            <strong>全てクリアしました！！</strong>
                        </span>
                        <img src="{{asset('/img/allClear_right.png')}}" alt="" class="c-allClear__icon">
                    </div>
                @else
                    <span>{{$thisClearChildStepsCount ? $thisClearChildStepsCount : 0}}/{{$childStepsCount}}&nbsp;STEPクリア中！</span>
                @endif
            @endif

        </div>

        <div class="p-step-detail__item">

            @if(!empty($defaultChallenged))
                <form action="{{route('step.unchallenge', $step->id)}}" method="post">
                    @csrf
                    <button type="submit" class="c-btn c-btn--red c-btn--challenge">
                        {{ __('Challenge Cancel') }}
                    </button>
                </form>
            @else
                <form action="{{route('step.challenge', $step->id)}}" method="post">
                    @csrf
                    <button type="submit" class="c-btn c-btn--blue c-btn--challenge">
                        {{ __('Challenge') }}
                    </button>
                </form>
            @endif

        </div>

    </div>

</div>


