<div class="card">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <div class="card-title">
                <a href="{{ route('backup-report-logs.show', ['backup_report_log' => $backupReportLog->id]) }}">
                    {{ $backupReportLog->project_name }}
                </a>
            </div>

            @canany (['delete'], $backupReportLog)
                <div class="dropdown">
                    <button class="btn w-100 btn-icon border-0" type="button" id="Action Button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                        </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="Action Button">
                        <li>
                            <div
                                class="btn-confirm-delete dropdown-item text-danger cursor-pointer"
                                data-url="{{ route('api.backup-report-logs.destroy', ['backup_report_log' => $backupReportLog->id]) }}"
                            >Delete</div>
                        </li>
                    </ul>
                </div>
            @endcanany
        </div>
    </div>
    <div class="card-body">
        <div class="row gy-2">
            <div class="col-xl-6 col-md-auto d-flex {{ $getStatusTextColorClass() }}">
                <div class="me-1">
                    @if ($backupReportLog->isSuccess())
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    @endif
                </div>

                <div>{{ $backupReportLog->status }}</div>
            </div>

            <div class="col-xl-6 col-md-auto d-flex text-muted">
                <div class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                        <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                        <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
                    </svg>
                </div>
                <div>{{ $backupReportLog->db_name }}</div>
            </div>

            <div class="col-xl-6 col-md-auto d-flex text-muted">
                <div class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="3.6" y1="9" x2="20.4" y2="9"></line>
                        <line x1="3.6" y1="15" x2="20.4" y2="15"></line>
                        <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                        <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                    </svg>
                </div>
                <div>{{ $backupReportLog->ip }}</div>
            </div>

            <div class="col-xl-6 col-md-auto d-flex text-muted">
                <div class="me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <polyline points="12 7 12 12 15 15"></polyline>
                    </svg>
                </div>
                <div data-bs-toggle="tooltip" title="{{ $backupReportLog->created_at }}">
                    {{ $backupReportLog->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
