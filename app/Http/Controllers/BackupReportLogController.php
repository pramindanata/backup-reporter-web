<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackupReportLogCatalog;
use App\Models\BackupReportLog;
use App\Service\BackupReportLogService;
use Illuminate\Http\Request;

class BackupReportLogController extends Controller
{
    //
    private BackupReportLogService $backupReportLogService;

    public function __construct(BackupReportLogService $backupReportLogService)
    {
        $this->backupReportLogService = $backupReportLogService;
    }

    public function index(BackupReportLogCatalog $request)
    {
        $this->authorize('viewAny', BackupReportLog::class);

        $filter = [
            'search' => $request->search ?? '',
            'order' => $request->order ?? 'created_at',
            'sort' => $request->sort ?? 'DESC',
        ];
        $logs = $this->backupReportLogService->getCatalogPaginator($filter);

        return view('pages.backup-report-log.index', [
            'backupReportLogs' => $logs,
            'filter' => $filter,
        ]);
    }

    public function show($id)
    {
        $backupReportLog = $this->backupReportLogService->getDetail($id);

        if (!$backupReportLog) {
            abort(404);
        }

        $this->authorize('view', $backupReportLog);

        return view('pages.backup-report-log.show', [
            'backupReportLog' => $backupReportLog,
            'statusTextColor' => $backupReportLog->isSuccess() ? 'text-success' : 'text-danger',
        ]);
    }
}
