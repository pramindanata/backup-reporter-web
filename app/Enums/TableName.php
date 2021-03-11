<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static User()
 * @method static static AccessToken()
 * @method static static TelegramAccount()
 * @method static static BackupReportLog()
 */
final class TableName extends Enum
{
    const User = 'users';
    const AccessToken = 'access_tokens';
    const TelegramAccount = 'telegram_accounts';
    const BackupReportLog = 'backup_report_logs';
}
