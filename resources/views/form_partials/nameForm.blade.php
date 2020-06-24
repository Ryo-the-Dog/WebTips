{{-- nameフォーム部分 --}}
<div class="p-form-card__group">
    <label for="name" class="p-form-card__label">{{ __('Name') }}</label>

    <div class="p-form-card__input-area">

        <UserNameForm
            :input-name="{{json_encode(old('name', !empty($userAuth->name) ? $userAuth->name: ''))}}"
            @error('name')
            :error="{{json_encode(true)}}"
            @enderror
        ></UserNameForm>

        @error('name')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
