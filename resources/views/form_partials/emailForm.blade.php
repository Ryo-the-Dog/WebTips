{{-- emailフォーム部分 --}}
<div class="p-form-card__group">
    <label for="email" class="p-form-card__label">{{ __('E-Mail Address') }}</label>

    <div class="p-form-card__email-area">
        <input id="email" type="email" class="c-input @error('email') c-is-invalid @enderror"
               name="email" value="@if(!empty(old('email'))){{ old('email') }}@elseif(!empty($userAuth->email)){{$userAuth->email}}@else @endif" required autocomplete="email">

        @error('email')
        <span class="c-invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
