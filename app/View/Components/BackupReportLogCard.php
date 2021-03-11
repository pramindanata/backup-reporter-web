<?php

namespace App\View\Components;

use App\Models\BackupReportLog;
use Illuminate\View\Component;

class BackupReportLogCard extends Component
{
    public BackupReportLog $backupReportLog;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BackupReportLog $backupReportLog)
    {
        $this->backupReportLog = $backupReportLog;
    }

    public function render()
    {
        return view('components.backup-report-log-card');
    }

    public function getStatusTextColorClass()
    {
        if ($this->backupReportLog->isSuccess()) {
            return 'text-success';
        }

        return 'text-danger';
    }
}
