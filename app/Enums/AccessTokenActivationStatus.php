<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Activated()
 * @method static static Unused()
 */
final class AccessTokenActivationStatus extends Enum
{
    const Activated = 'ACTIVATED';
    const NotActivated = 'NOT_ACTIVATED';
}
