<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'username',
        'first_name',
    ];
}
