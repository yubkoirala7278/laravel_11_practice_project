@component('mail::message')
# Reset Your Password Yubraj Koirala

Hello {{ $user->name ?? 'User' }},

We received a request to reset the password for your account Yubraj Koirala.

@component('mail::button', ['url' => $resetUrl])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent