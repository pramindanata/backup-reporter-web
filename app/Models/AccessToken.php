<?php

namespace App\Models;

use App\Enums\AccessTokenActivationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AccessToken extends Model
{
    use HasFactory;

    public const TOKEN_LENGTH = 150;
    public const SHORT_TOKEN_LENGTH = 8;

    protected $fillable = [
        'name',
        'access_token',
        'short_access_token',
        'activation_status',
    ];

    public static function generateToken(): string
    {
        $length = self::TOKEN_LENGTH;
        $token = Str::random($length);

        return $token;
    }

    public function isActivated()
    {
        return $this->access_token === AccessTokenActivationStatus::Activated;
    }
}
