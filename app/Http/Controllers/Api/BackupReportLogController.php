<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    //
    public function destroy($id)
    {
        $accessToken = $this->backupReportLogService->getDetail($id);

        if (!$accessToken) {
            abort(404);
        }

        $this->authorize('delete', $accessToken);
        $this->backupReportLogService->delete($accessToken);

        return response('ok');
    }
}
