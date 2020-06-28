{{-- STEP登録フォーム部分 --}}
<div class="l-flexbox p-form-card__top">
    <div class="p-form-card__group p-form-card__eyecatch">
        <label for="step_img" class="p-form-card__label">{{ __('Eyecatch Image') }}</label>

        <StepImagePreview
            @if(Route::currentRouteName()==='mypage.mystepEdit')
            :step="{{json_encode($step)}}"
            :step-img="{{json_encode($step->step_img)}}"
            @endif
        ></StepImagePreview>

        @error('step_img')
        <span class="c-invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

    <div class="p-form-card__group">
        <label for="category_ids" class="p-form-card__label">{{ __('Category(max:3)') }}</label>

        <div class="p-form-card__category-area u-clearfix">
            @forelse($categoryList as $category)
                <label for="category_{{$category->id}}" class="p-form-card__category-label l-flexbox" >
                    <input id="category_{{$category->id}}" type="checkbox" class="p-form-card__category @error('category_ids') c-is-invalid @enderror"
                           name="category_ids[{{$category->id}}]" value="{{$category->id}}"
                           @if(!empty(old('category_ids')))
                           @if(in_array($category->id,(array)old('category_ids')))
                           checked="checked"
                           @endif
                           @elseif(!empty($thisCategoryIds))
                           @if(in_array($category->id,(array)$thisCategoryIds ))
                           checked="checked"
                        @endif
                        @endif>
                    {{$category->name}}
                </label>
                {{-- 改行で分ける --}}
                @if($category->id == 5)
                    <br/>
                @endif
            @empty

            @endforelse

            @error('category_ids')
            <p class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
        </div>
    </div>

</div>


<div class="p-form-card__group">
    <label for="title" class="p-form-card__label">{{ __('Title') }}</label>

    <div class="p-form-card__input-area">
        <StepTitleForm
            :input-title="{{json_encode(old('title', !empty($step->title) ? $step->title: ''))}}"
            @error('title')
                :error="{{json_encode(true)}}"
            @enderror
        ></StepTitleForm>

        @error('title')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>


<div class="p-form-card__group">
    <label for="description" class="p-form-card__label">{{ __('Description') }}</label>

    <div class="p-form-card__input-area">

        <StepDescriptionForm
            :input-description="{{json_encode(old('description', !empty($step->description) ? $step->description: ''))}}"
            @error('description')
                :error="{{json_encode(true)}}"
            @enderror
        ></StepDescriptionForm>

        @error('description')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<label for="child_step" class="p-form-card__label">
    {{ __('STEP(max:10)') }}
    <Modalquestion></Modalquestion>
</label>

@error('child_step.*.*')
    <p class="c-invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </p>
@enderror

<childstepform
    :old-inputs="{{json_encode(Session::getOldInput("child_step",false))}}"
    {{-- STEP編集ページの場合は登録済みの子STEP情報を渡す --}}
    @if(Route::currentRouteName() === 'mypage.mystepEdit')
        :current-inputs="{{json_encode($step->childSteps)}}"
    @endif
></childstepform>

