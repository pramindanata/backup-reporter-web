<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Success()
 * @method static static Failed()
 */
final class BackupReportStatus extends Enum
{
    const Success = 'SUCCESS';
    const Failed = 'FAILED';
}
