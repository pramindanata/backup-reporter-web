<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackupReportLogCatalog;
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
    }
}
