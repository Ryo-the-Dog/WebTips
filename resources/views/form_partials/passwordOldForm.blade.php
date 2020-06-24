{{-- 現在のpasswordフォーム部分 --}}
<div class="p-form-card__group">
    <label for="old-password" class="p-form-card__label">{{ __('Old Password') }}</label>

    <div class="p-form-card__remember-label">
        <input id="old-password" type="password" class="c-input @error('password') c-is-invalid @enderror"
               name="old-password" required autocomplete="old-password" placeholder="8文字以上">

        @error('old-password')
        <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
