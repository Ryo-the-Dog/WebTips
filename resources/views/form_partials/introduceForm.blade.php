<div class="p-form-card__group">
    <label for="introduce" class="p-form-card__label">{{ __('Introduction') }}</label>

    <div class="p-form-card__input-area">
        <UserIntroduceForm
            :input-introduce="{{json_encode(old('introduce', !empty($userAuth->introduce) ? $userAuth->introduce: ''))}}"
            @error('introduce')
                :error="{{json_encode(true)}}"
            @enderror
        ></UserIntroduceForm>
        @error('introduce')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
