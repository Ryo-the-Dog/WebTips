{{-- 記事投稿フォーム部分 --}}
<div class="l-flexbox p-form-card__top">
    <div class="p-form-card__group p-form-card__eyecatch">
        <label for="article_img" class="p-form-card__label">{{ __('Eyecatch Image') }}</label>

        <articleimagepreview
            @if(Route::currentRouteName()==='mypage.mystepEdit')
                :article="{{json_encode($article)}}"
                :article-img="{{json_encode($article->article_img)}}"
            @endif
        ></articleimagepreview>

        @error('article_img')
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
        <articletitleform
            :input-title="{{json_encode(old('title', !empty($article->title) ? $article->title: ''))}}"
            @error('title')
                :error="{{json_encode(true)}}"
            @enderror
        ></articletitleform>

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

        <articledescriptionform
            :input-description="{{json_encode(old('description', !empty($article->description) ? $article->description: ''))}}"
            @error('description')
                :error="{{json_encode(true)}}"
            @enderror
        ></articledescriptionform>

        @error('description')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<label for="child_step" class="p-form-card__label">
    {{ __('Item(max:20)') }}
    <Modalquestion></Modalquestion>
</label>

@error('chapter.*.*')
    <p class="c-invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </p>
@enderror

<chapterform
    :old-inputs="{{json_encode(Session::getOldInput("chapter",false))}}"
    {{-- 記事編集ページの場合は登録済みのチャプター情報を渡す --}}
    @if(Route::currentRouteName() === 'mypage.myarticleEdit')
        :current-inputs="{{json_encode($article->chapters)}}"
    @endif
></chapterform>

