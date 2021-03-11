<?php

use App\Enums\AccessTokenActivationStatus;
use App\Enums\BackupReportStatus;
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
    ],
    'backupReportLog' => [
        'status' => [
            BackupReportStatus::Success => 'Success',
            BackupReportStatus::Failed => 'Failed',
        ]
    ]
];
