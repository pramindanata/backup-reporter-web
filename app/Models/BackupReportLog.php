<?php

namespace App\Models;

use App\Enums\BackupReportStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupReportLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'detail',
    ];

    public function isSuccess(): bool
    {
        return $this->status === BackupReportStatus::Success;
    }
}
