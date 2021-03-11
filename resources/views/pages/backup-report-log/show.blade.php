<x-layouts.main title="Report #{{ $backupReportLog->id }}">
    <div class="container-xl">
        <x-page-header-with-back-btn
            back-route="{{ route('backup-report-logs.index') }}"
            back-tooltip-title="Back to access token list"
            page-title="Report #{{ $backupReportLog->id }}"
        >
            @canany (['delete'], $backupReportLog)
                <x-slot name="actions">
                    <button
                        id="btn-confirm-delete"
                        class="btn btn-danger"
                        data-url="{{ route('api.backup-report-logs.destroy', ['access_token' => $backupReportLog->id]) }}"
                    >Delete</button>
                </x-slot>
            @endcanany
        </x-page-header-with-back-btn>

        <x-base.alert-warning id="alert-deleted" class="d-none">
            Data has been deleted.
        </x-base.alert-warning>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Detail</h2>
            </div>

            <div class="card-body">
                <x-base.inline-form-group label="ID" class="mb-3">
                    <div>#{{ $backupReportLog->id }}</div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Status" class="mb-3">
                    <div class="{{ $statusTextColor }}">
                        {{ $backupReportLog->status }}
                    </div>
                </x-base.inline-form-group>

                <x-base.inline-form-group label="Created At">
                    <div data-bs-toggle="tooltip" title="{{ $backupReportLog->created_at }}">
                        {{ $backupReportLog->created_at->diffForHumans() }}
                    </div>
                </x-base.inline-form-group>
            </div>

            @if ($backupReportLog->isSuccess())
                <div class="card-body">
                    <x-base.inline-form-group label="Project Name" class="mb-3">
                        <div>{{ $backupReportLog->detail['project_name'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="Computer Name" class="mb-3">
                        <div>{{ $backupReportLog->detail['computer_name'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="IP Address" class="mb-3">
                        <div>
                            <a
                                href="http://{{ $backupReportLog->detail['ip'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >{{ $backupReportLog->detail['ip'] }}</a>
                        </div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="Started At" class="mb-3">
                        <div>{{ $backupReportLog->castedStartedAt }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="Finished At" class="mb-3">
                        <div>{{ $backupReportLog->castedFinishedAt }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="DB Name" class="mb-3">
                        <div>{{ $backupReportLog->detail['db_name'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="DB Type" class="mb-3">
                        <div>{{ $backupReportLog->detail['db_type'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="File Path" class="mb-3">
                        <div>{{ $backupReportLog->detail['file_path'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="File Size">
                        <div>{{ $backupReportLog->detail['file_size'] }}</div>
                    </x-base.inline-form-group>
                </div>
            @else
                <div class="card-body">
                    <x-base.inline-form-group label="Project Name" class="mb-3">
                        <div>{{ $backupReportLog->detail['project_name'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="Computer Name" class="mb-3">
                        <div>{{ $backupReportLog->detail['computer_name'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="IP Address" class="mb-3">
                        <div>
                            <a
                                href="http://{{ $backupReportLog->detail['ip'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >{{ $backupReportLog->detail['ip'] }}</a>
                        </div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="Started At" class="mb-3">
                        <div>{{ $backupReportLog->castedStartedAt }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="DB Name" class="mb-3">
                        <div>{{ $backupReportLog->detail['db_name'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="DB Type" class="mb-3">
                        <div>{{ $backupReportLog->detail['db_type'] }}</div>
                    </x-base.inline-form-group>

                    <x-base.inline-form-group label="Error Message" class="mb-3">
                        <div class="text-danger">{{ $backupReportLog->detail['message'] }}</div>
                    </x-base.inline-form-group>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script src="{{ mix('js/pages/backup-report-log/show.js') }}"></script>
    @endpush
</x-layouts.main>
