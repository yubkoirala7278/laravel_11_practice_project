@component('mail::message')
# Verify Your Email Address

Hello {{ $user->name ?? 'User' }},

@component('mail::button', ['url' => $verificationUrl, 'color' => 'primary'])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent