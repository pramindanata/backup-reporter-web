<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Admin()
 * @method static static Viewer()
 */
final class UserRole extends Enum
{
    const Admin = 'ADMIN';
    const Viewer = 'VIEWER';
}
