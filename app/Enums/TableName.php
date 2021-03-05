<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static User()
 * @method static static AccessToken()
 */
final class TableName extends Enum
{
    const User = 'users';
    const AccessToken = 'access_tokens';
}
