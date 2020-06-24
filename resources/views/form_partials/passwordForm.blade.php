{{-- passwordフォーム部分 --}}
<div class="p-form-card__group">
    <label for="password" class="p-form-card__label">
        @if(Route::CurrentRouteName()==='mypage.passEdit')
            {{ __('New Password') }}
        @else
            {{ __('Password') }}
        @endif
    </label>

    <div class="p-form-card__remember-label">
        <input id="password" type="password" class="c-input @error('password') c-is-invalid @enderror"
               name="password" placeholder="8文字以上" required autocomplete="password">

        @error('password')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
