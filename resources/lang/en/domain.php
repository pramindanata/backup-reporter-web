<?php

use App\Enums\UserRole;

return [
    'user' => [
        'role' => [
            UserRole::Admin => 'Admin',
            UserRole::Viewer => 'Viewer',
        ]
    ],
];
