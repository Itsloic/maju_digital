<?php

use Laravel\Fortify\Features;

return [
    'guard' => 'web',
    'middleware' => ['web'],
    'auth_middleware' => 'auth',
    'passwords' => 'users',
    'username' => 'email',
    'email' => 'email',
    'views' => true,
    'home' => '/',
    'prefix' => '',
    'domain' => null,
    'lowercase_usernames' => false,
    'limiters' => [
        'login' => 'login',
        'passkeys' => null,
        'two-factor' => 'two-factor',
    ],
    'paths' => [
        'login' => 'login',
        'logout' => 'logout',
        'password' => [
            'request' => 'forgot-password',
            'reset' => 'reset-password/{token}',
            'email' => 'password-reset-sent',
            'update' => 'reset-password',
            'confirm' => 'password/confirm',
            'confirmation' => 'password/confirmed',
        ],
        'register' => 'register',
        'verification' => [
            'notice' => 'email/verify',
            'verify' => 'email/verify/{id}/{hash}',
            'send' => 'email/verification-notification',
        ],
        'user-profile-information' => [
            'update' => 'user/profile-information',
        ],
        'user-password' => [
            'update' => 'user/password',
        ],
        'two-factor' => [
            'login' => 'two-factor-challenge',
            'enable' => 'user/two-factor-authentication',
            'confirm' => 'user/confirmed-two-factor-authentication',
            'disable' => 'user/two-factor-authentication',
            'qr-code' => 'user/two-factor-qr-code',
            'secret-key' => 'user/two-factor-secret-key',
            'recovery-codes' => 'user/two-factor-recovery-codes',
        ],
        'passkey' => [
            'login-options' => 'passkey/login-options',
            'login' => 'passkey/login',
            'confirm-options' => 'passkey/confirm-options',
            'confirm' => 'passkey/confirm',
            'registration-options' => 'passkey/registration-options',
            'store' => 'passkey',
            'destroy' => 'passkey/{credentialId}',
        ],
    ],
    'redirects' => [
        'login' => '/',
        'logout' => '/',
        'password-confirmation' => 'user.password.confirm',
        'register' => '/',
        'email-verification' => '/',
        'password-reset' => '/',
    ],
    'passkeys' => [
        'relying_party_id' => parse_url(config('app.url'), PHP_URL_HOST),
        'allowed_origins' => [config('app.url')],
        'user_handle_secret' => env('PASSKEYS_USER_HANDLE_SECRET', config('app.key')),
        'timeout' => 60000,
    ],
    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),
        Features::updatePasswords(['confirm' => true, 'confirmPassword' => true]),
        Features::twoFactorAuthentication(['confirm' => true, 'confirmPassword' => true]),
    ],
];
