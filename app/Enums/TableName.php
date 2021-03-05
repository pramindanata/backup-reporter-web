<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static User()
 * @method static static AccessToken()
 * @method static static TelegramAccount()
 */
final class TableName extends Enum
{
    const User = 'users';
    const AccessToken = 'access_tokens';
    const TelegramAccount = 'telegram_accounts';
}
