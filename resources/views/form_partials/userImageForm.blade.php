<div class="p-form-card__group">
    <label for="user_img" class="p-form-card__label">{{ __('Profile Image') }}</label>

    <ImagePreview
        :auth="{{$userAuth}}"
    ></ImagePreview>

    @error('user_img')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
