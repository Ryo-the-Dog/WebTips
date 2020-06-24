<section class="p-step-introduction l-bg-gray-top">
    <div class="l-container">
        <h2 class="c-title--container">STEP一覧</h2>
        <div class="p-step-list">
            <div class="p-steps l-flexbox">

                @forelse($steps as $step)

                    <step
                        :step="{{json_encode($step)}}"
                        :child-steps="{{json_encode($step->childSteps)}}"
                        :step-categories="{{json_encode($step->categories)}}"
                        :challenge-count="{{json_encode(count($step->challenges))}}"
                        :step-challenges="{{json_encode($step->user->challenges)}}"
                        :step-user="{{json_encode($step->user)}}"
                        :step-route="{{json_encode(route('steps.show', $step->id))}}"
                        :limit-title="{{json_encode(Str::limit($step->title,53))}}"
                        @if(!empty($userAuth))
                            :user-auth="{{json_encode($userAuth)}}"
                            :default-challenge="{{json_encode($step->challenges->where('user_id', $userAuth->id)->first())}}"
                        @endif
                    ></step>

                @empty

                    <div class="c-guide-msg">
                        <p class="c-guide-msg__text">投稿されたSTEPがありません。</p>
                        <p class="c-guide-msg__text">あなたの成功例をシェアしませんか？</p>
                        <a class="c-btn--yellow c-guide-msg__link" href="{{ route('steps.new') }}">{{ __('STEP POST Now') }}</a>
                    </div>

                @endforelse
            </div>
        </div>

        <a href="{{ route('steps.list') }}" class="c-btn--blue c-btn--allSteps">{{ __('Show All STEPs') }}</a>

    </div>
</section>
