<?php

use App\Enums\AccessTokenActivationStatus;
use App\Enums\UserRole;

return [
    'user' => [
        'role' => [
            UserRole::Admin => 'Admin',
            UserRole::Viewer => 'Viewer',
        ]
    ],
    'accessToken' => [
        'activationStatus' => [
            AccessTokenActivationStatus::Activated => 'Activated',
            AccessTokenActivationStatus::NotActivated => 'Not Activated'
        ]
    ]
];
