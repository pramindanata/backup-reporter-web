<?php

namespace App\Models;

use App\Enums\BackupReportStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupReportLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'detail',
    ];

    protected $casts = [
        'detail' => AsArrayObject::class,
    ];

    public function getCastedStartedAtAttribute()
    {
        return Carbon::parse($this->detail['started_at']);
    }

    public function getCastedFinishedAtAttribute()
    {
        return Carbon::parse($this->detail['finished_at']);
    }

    public function isSuccess(): bool
    {
        return $this->status === BackupReportStatus::Success;
    }
}
