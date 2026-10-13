@php
    $formId = $formId ?? 'login-form';
    $passwordInputId = $passwordInputId ?? 'password';
    $passwordToggleId = $passwordToggleId ?? 'password-toggle';
@endphp

<h2 class="h2 text-center mb-4">{{ $title }}</h2>
<form id="{{ $formId }}" action="{{ $action }}" method="post" autocomplete="off" novalidate>
    @csrf
    <input type="hidden" name="fcm_token" value="">
    <input type="hidden" name="device_type" value="web">
    <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="your@email.com"
               autocomplete="off"/>
    </div>
    <div class="mb-2">
        <label class="form-label">
            Password
            <span class="form-label-description"><a href="{{ $forgotPasswordRoute }}">I forgot password</a></span>
        </label>
        <div class="input-group input-group-flat">
            <input type="password" class="form-control" name="password"
                   placeholder="Your password"
                   autocomplete="off" id="{{ $passwordInputId }}"/>
            <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" id="{{ $passwordToggleId }}"
                   data-password-toggle="#{{ $passwordInputId }}"
                   data-bs-toggle="tooltip">
                    Show
                </a>
            </span>
        </div>
    </div>
    <div class="mb-2">
        <label class="form-check">
            <input type="checkbox" class="form-check-input"/>
            <span class="form-check-label">Remember me on this device</span>
        </label>
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Sign in</button>
    </div>
</form>
