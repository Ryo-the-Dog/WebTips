{{-- ログイン状態保存のチェックボックス --}}
<div class="p-form-card__group">
    <label class="p-form-card__remember-label l-flexbox" for="remember">
        <input class="p-form-card__remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        {{ __('Remember Me') }}
    </label>
</div>
